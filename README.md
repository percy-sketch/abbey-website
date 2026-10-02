# The Abbey at Pawleys Island — site source

A static rebuild of theabbeypawleysisland.com using [Jigsaw](https://jigsaw.tighten.com)
(PHP static site generator), styled from **The Abbey Brand Guide.pdf**
and built to deploy to GitHub Pages for free — no more hosting charges.

## What's here vs. what's still a placeholder

This scaffold has the real structure, navigation, brand colors, fonts, and logo
(extracted directly from the brand guide PDF), and a working sermons collection.
It does **not** have the church's real photography or the actual body copy for
Who We Are / Our Beliefs — those pages currently have placeholder text and the
homepage uses generated placeholder images (clearly labeled) in place of real
photos. Search the project for `REPLACE` to find every spot that needs real
content before launch.

## Local development (Docker)

No local PHP/Composer/Node install needed — everything runs in the container:

```sh
docker compose up
```

This installs PHP + JS dependencies on first run and starts Jigsaw's dev
server. Visit [localhost](**http://localhost:8000**). Vite's dev server runs on
port 5273 for asset hot-reloading.

To run commands inside the container directly (e.g. after adding a package):

```sh
docker compose exec jigsaw composer install
docker compose exec jigsaw npm install
```

### Without Docker

Requires PHP 8.2+, Composer, and Node 18+:

```sh
composer install
npm install
npm run dev        # in one terminal — Vite watcher
vendor/bin/jigsaw serve   # in another — Jigsaw dev server, http://localhost:8000
```

## Adding a new sermon

Drop a new file in `source/_sermons/`, named `YYYY-MM-DD-slug.md`:

```md
---
extends: _layouts.sermon
section: body
title: "Sermon Title"
date: 2026-09-20
speaker: "Fr. John Smith"   # optional
youtube_id: "dQw4w9WgXcQ"    # the part after youtu.be/ or ?v= in the YouTube URL
---

Optional notes/transcript — rendered below the video.
```

It'll automatically show up on `/sermons`, newest first — no other file needs
to change.

## Editing site-wide settings

`config.php` holds the navigation menu, service time, address/phone/email,
and the external links to OnRealm (giving + the My Abbey member portal),
Facebook, Instagram, and YouTube. Change those in one place rather than
hunting through templates.

## Brand assets

`source/assets/images/abbey-logo-*.png` and `abbey-logomark.png` were
extracted directly from **The Abbey Brand Guide.pdf** at full resolution with
proper transparency — full color, white (for dark backgrounds/photos), and
monochrome green variants, plus the standalone knot logomark (used as the
favicon). Colors and fonts in `tailwind.config.js` are copied from the same
guide. Two font notes:

- **Avenir** (the guide's secondary font) is a commercial Linotype font with
  no free web-embed license. This scaffold substitutes **Jost** (Google
  Fonts), a similar geometric sans, as a placeholder — swap in real Avenir
  web font files in `source/_assets/css/app.css` if the church has a
  license (e.g. via Adobe Fonts).
- **Ellume** (the guide's "use sparingly" display font for social/posters)
  isn't wired up at all — `font-display` in the Tailwind config currently
  falls back to Cormorant Garamond. It's only meant for occasional graphics
  per the brand guide, not body content, so this wasn't a priority for the
  initial build.

The brand guide also has a set of approved hand-drawn icons (dove, chalice,
bible, cross, etc.) and decorative vine graphics that aren't pulled into this
scaffold yet — extract them the same way (see the PDF, page 7) if you want
them on the homepage service-icon row or elsewhere.

## Contact form

The site currently has no contact form — GitHub Pages can't run the
server-side handler the Jigsaw blog template's example form posts to, and
shipping a form that silently fails is worse than not having one. Two easy
options once you're ready:

1. **Formspree** (or a similar forms-as-a-service provider) — point a plain
   HTML `<form>` at their endpoint, no backend needed.
2. Keep it simple with the `mailto:` links already in place on the Contact
   and Weddings + Events pages.

## Deploying to GitHub Pages

`.github/workflows/deploy.yml` builds the site with Actions (GitHub Pages
itself has no PHP runtime, so it can't build a Jigsaw site the way it
auto-builds Jekyll) and publishes the result. One-time setup once this is
pushed to a GitHub repo:

1. In the repo's **Settings → Pages**, set the source to **GitHub Actions**.
2. Update `siteUrl` in `config.php` to match the real GitHub Pages URL (or
   custom domain, if you point one at it).
3. Push to `main` — the workflow builds and deploys automatically. You can
   also trigger it manually from the Actions tab.

### A note on the old URLs

The current site's pages are things like `Give.html` and
`Weddings---Events.html`. This scaffold uses cleaner paths (`/give`,
`/weddings-events`). If those old URLs are linked anywhere that matters
(church bulletins, Google's cached listing, etc.), add redirect stub pages
at the old paths before cutting over, or accept the 404s — worth a quick
decision before launch rather than an accident after.
