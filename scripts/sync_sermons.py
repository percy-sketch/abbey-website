#!/usr/bin/env python3
"""Add new sermons to source/_sermons/ from the church's YouTube "Live streams" list.

Runs in GitHub Actions (see .github/workflows/deploy.yml) on a weekly schedule and on
every push. It only adds streams that are newer than the newest sermon already on the
site, so sermons that were edited or deliberately left out are never touched.

Speakers aren't on YouTube, so new entries have an empty speaker; fill it in by hand
(or ask Claude) if you want it shown.

Needs yt-dlp (`pip install yt-dlp`). Usage: python3 scripts/sync_sermons.py
"""
import json
import re
import subprocess
import sys
from datetime import date, datetime
from pathlib import Path
from zoneinfo import ZoneInfo

PLAYLIST = "UULVJHaxh7fG-EkC2W3a6LZacg"  # channel UCJHaxh7fG-EkC2W3a6LZacg, "Live streams"
SERMONS = Path(__file__).resolve().parent.parent / "source" / "_sermons"
TZ = ZoneInfo("America/New_York")
MAX_NEW = 120  # safety cap per run


def ytdlp(*args):
    out = subprocess.run(["yt-dlp", "--no-warnings", *args], capture_output=True, text=True)
    if out.returncode != 0:
        raise RuntimeError(out.stderr.strip()[-500:])
    return json.loads(out.stdout)


def existing():
    ids, newest = set(), date.min
    for f in SERMONS.glob("*.md"):
        text = f.read_text(encoding="utf-8")
        m = re.search(r"^youtube_id:\s*\"?([\w-]{11})", text, re.M)
        if m:
            ids.add(m.group(1))
        d = re.match(r"(\d{4}-\d{2}-\d{2})", f.name)
        if d:
            newest = max(newest, date.fromisoformat(d.group(1)))
    return ids, newest


def stream_date(info):
    ts = info.get("release_timestamp") or info.get("timestamp")
    if ts:
        return datetime.fromtimestamp(ts, TZ).date()
    if info.get("upload_date"):
        return datetime.strptime(info["upload_date"], "%Y%m%d").date()
    return None


def slugify(title):
    t = re.sub(r"^\s*\d{1,2}(:\d{2})?\s*(am|pm)\b", "", title, flags=re.I)  # "10:30 AM Worship" -> "Worship"
    s = re.sub(r"[^a-z0-9]+", "-", t.lower()).strip("-")
    return s[:60].strip("-") or "worship-service"


def write(info, day):
    title = info.get("title") or "Worship Service"
    name = f"{day.isoformat()}-{slugify(title)}.md"
    path = SERMONS / name
    if path.exists():
        path = SERMONS / f"{day.isoformat()}-{slugify(title)}-{info['id'].lower()}.md"
    path.write_text(
        "---\n"
        "extends: _layouts.sermon\n"
        "section: body\n"
        f"title: {json.dumps(title, ensure_ascii=False)}\n"
        f"date: {day.isoformat()}\n"
        'speaker: ""\n'
        f"youtube_id: {info['id']}\n"
        "---\n",
        encoding="utf-8",
    )
    return path.name


def main():
    ids, newest = existing()
    print(f"{len(ids)} sermons on the site, newest {newest}")
    entries = ytdlp("--flat-playlist", "-J", f"https://www.youtube.com/playlist?list={PLAYLIST}")["entries"]
    print(f"{len(entries)} streams in the YouTube Live streams list")

    added = []
    for entry in entries:  # newest first
        vid = entry.get("id")
        if not vid or vid in ids:
            if vid in ids:
                break  # reached what the site already has
            continue
        try:
            info = ytdlp("-J", "--skip-download", f"https://www.youtube.com/watch?v={vid}")
        except RuntimeError as e:
            print(f"skip {vid}: {e}", file=sys.stderr)
            continue
        if info.get("live_status") in ("is_live", "is_upcoming", "post_live"):
            continue  # not finished yet; next run picks it up
        day = stream_date(info)
        if day is None:
            continue
        if day <= newest:
            break  # older than the site's newest sermon
        added.append(write(info, day))
        if len(added) >= MAX_NEW:
            break

    print(f"added {len(added)}:", *added, sep="\n  ")


if __name__ == "__main__":
    main()
