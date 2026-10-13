#!/usr/bin/env python3
"""Add new sermons to source/_sermons/ from the church's YouTube "Live streams" list.

Runs in GitHub Actions (see .github/workflows/deploy.yml) on a weekly schedule and on
every push. It only adds streams that are newer than the newest sermon already on the
site, so sermons that were edited or deliberately left out are never touched.

Where the date comes from (YouTube blocks GitHub's servers from opening video pages,
so the date can't be read there):
  1. a date written in the stream's title ("Family Worship June 14, 2026"), else
  2. the stream's publish time in YouTube's public feed, which covers the newest 15.
Streams with neither are listed in the log and skipped rather than given a guessed date.

Speakers aren't on YouTube, so new entries have an empty speaker; fill it in by hand
(or ask Claude) if you want it shown.

Needs yt-dlp (`pip install yt-dlp`). Usage: python3 scripts/sync_sermons.py
"""
import json
import re
import subprocess
import urllib.request
from datetime import date, datetime
from pathlib import Path
from zoneinfo import ZoneInfo

PLAYLIST = "UULVJHaxh7fG-EkC2W3a6LZacg"  # channel UCJHaxh7fG-EkC2W3a6LZacg, "Live streams"
FEED = f"https://www.youtube.com/feeds/videos.xml?playlist_id={PLAYLIST}"
SERMONS = Path(__file__).resolve().parent.parent / "source" / "_sermons"
TZ = ZoneInfo("America/New_York")
MONTHS = {m: i for i, m in enumerate(
    "january february march april may june july august september october november december".split(), 1)}


def playlist():
    """[(id, title, live_status)] newest first. Listing works even where video pages are blocked."""
    out = subprocess.run(
        ["yt-dlp", "--no-warnings", "--flat-playlist", "-J", f"https://www.youtube.com/playlist?list={PLAYLIST}"],
        capture_output=True, text=True, check=True).stdout
    return [(e["id"], e.get("title") or "", e.get("live_status")) for e in json.loads(out)["entries"] if e.get("id")]


def feed_dates():
    """{id: date} for the newest ~15 streams, from YouTube's public feed (Eastern time)."""
    try:
        xml = urllib.request.urlopen(FEED, timeout=30).read().decode("utf-8")
    except Exception as e:
        print(f"feed unavailable: {e}")
        return {}
    dates = {}
    for vid, pub in re.findall(r"<yt:videoId>([\w-]{11})</yt:videoId>.*?<published>([^<]+)</published>", xml, re.S):
        dates[vid] = datetime.fromisoformat(pub).astimezone(TZ).date()
    return dates


def title_date(title):
    """A date written in the title: 'April 19, 2026', 'June 14 2026', '8 30 2026', '8/30/2026', '8-30-26'."""
    t = title.lower()
    m = re.search(r"\b(" + "|".join(MONTHS) + r")\.?\s+(\d{1,2})(?:st|nd|rd|th)?,?\s+(\d{4})\b", t)
    if m:
        y, mo, d = int(m.group(3)), MONTHS[m.group(1)], int(m.group(2))
    else:
        m = re.search(r"\b(\d{1,2})[\s/.-](\d{1,2})[\s/.-](\d{4}|\d{2})\b", t)
        if not m:
            return None
        mo, d, y = int(m.group(1)), int(m.group(2)), int(m.group(3))
        y += 2000 if y < 100 else 0
    try:
        return date(y, mo, d)
    except ValueError:
        return None


def existing():
    ids, newest = set(), date.min
    for f in SERMONS.glob("*.md"):
        m = re.search(r"^youtube_id:\s*\"?([\w-]{11})", f.read_text(encoding="utf-8"), re.M)
        if m:
            ids.add(m.group(1))
        d = re.match(r"(\d{4}-\d{2}-\d{2})", f.name)
        if d:
            newest = max(newest, date.fromisoformat(d.group(1)))
    return ids, newest


def slugify(title):
    t = re.sub(r"^\s*\d{1,2}(:\d{2})?\s*(am|pm)\b", "", title, flags=re.I)  # "10:30 AM Worship" -> "Worship"
    s = re.sub(r"[^a-z0-9]+", "-", t.lower()).strip("-")
    return s[:60].strip("-") or "worship-service"


def write(vid, title, day):
    base = f"{day.isoformat()}-{slugify(title)}"
    path = SERMONS / f"{base}.md"
    if path.exists():
        path = SERMONS / f"{base}-{vid.lower()}.md"
    path.write_text(
        "---\n"
        "extends: _layouts.sermon\n"
        "section: body\n"
        f"title: {json.dumps(title, ensure_ascii=False)}\n"
        f"date: {day.isoformat()}\n"
        'speaker: ""\n'
        f"youtube_id: {vid}\n"
        "---\n",
        encoding="utf-8",
    )
    return path.name


def main():
    print(f"run at {datetime.now(TZ):%Y-%m-%d %H:%M %Z}")
    ids, newest = existing()
    print(f"{len(ids)} sermons on the site, newest {newest}")
    streams = playlist()
    feed = feed_dates()
    print(f"{len(streams)} streams in the YouTube Live streams list; {len(feed)} dated by the feed\n")

    added, undated = [], []
    for vid, title, status in streams:
        if vid in ids:
            continue
        if status != "was_live":
            continue  # scheduled or still live; picked up on a later run
        day = title_date(title) or feed.get(vid)
        if day is None:
            undated.append(f"{vid} | {title}")
            continue
        if day <= newest or day > datetime.now(TZ).date():
            continue
        added.append(write(vid, title, day))

    print(f"added {len(added)}:", *sorted(added), sep="\n  ")
    print(f"\nnot added, no date available ({len(undated)}):", *undated, sep="\n  ")


if __name__ == "__main__":
    main()
