#!/usr/bin/env python3
"""One-off diagnostic: which ways of reading stream dates work from GitHub Actions."""
import json, subprocess, urllib.request, re
PL = "UULVJHaxh7fG-EkC2W3a6LZacg"
def run(*a):
    r = subprocess.run(["yt-dlp", "--no-warnings", *a], capture_output=True, text=True)
    return r.returncode, r.stdout, r.stderr.strip()[-200:]
print("== flat playlist with approximate dates")
rc, out, err = run("--flat-playlist", "-J", "--extractor-args", "youtubetab:approximate_date", f"https://www.youtube.com/playlist?list={PL}")
ents = json.loads(out)["entries"] if rc == 0 else []
print(rc, err)
for e in ents[:80]:
    print(e.get("id"), "|", e.get("upload_date"), e.get("timestamp"), "|", e.get("live_status"), "|", e.get("title"))
print("== RSS feed")
try:
    x = urllib.request.urlopen(f"https://www.youtube.com/feeds/videos.xml?playlist_id={PL}", timeout=30).read().decode()
    for vid, title, pub in re.findall(r"<yt:videoId>(.*?)</yt:videoId>.*?<title>(.*?)</title>.*?<published>(.*?)</published>", x, re.S):
        print(vid, pub, title)
except Exception as e:
    print("RSS failed:", e)
print("== per-video with other clients")
vid = next((e["id"] for e in ents if e.get("id")), "oLSl0dg9b1M")
for client in ["web_embedded", "tv", "tv_embedded", "mweb", "web_safari", "ios", "android_vr"]:
    rc, out, err = run("-J", "--skip-download", "--extractor-args", f"youtube:player_client={client}", f"https://www.youtube.com/watch?v={vid}")
    if rc == 0:
        j = json.loads(out); print(client, "OK", j.get("upload_date"), j.get("release_timestamp"), j.get("live_status"))
    else:
        print(client, "FAIL", err[-120:])
