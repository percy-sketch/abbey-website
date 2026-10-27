// Minimal mobile-nav toggle — no framework needed for a site this size.
document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.querySelector('[data-nav-toggle]');
  const menu = document.querySelector('[data-nav-menu]');

  if (!toggle || !menu) return;

  toggle.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
});

// Staff bios — clicking a person opens their bio in a full-width panel directly
// under that person's row of the grid; clicking again (or another person) swaps/closes it.
document.addEventListener('DOMContentLoaded', () => {
  const grid = document.querySelector('[data-staff-grid]');
  if (!grid) return;

  const items = [...grid.querySelectorAll('[data-staff-item]')];
  const panel = document.createElement('div');
  panel.setAttribute('role', 'region');
  panel.className = 'col-span-full bg-abbey-parchment/40 border-t-4 border-abbey-green p-6 md:p-10 relative rounded-2xl overflow-hidden';
  let open = null;

  const setCard = (item, expanded) => {
    const card = item.querySelector('[data-staff-card]');
    card.setAttribute('aria-expanded', String(expanded));
    card.querySelector('[data-staff-label]').textContent = expanded ? 'Hide bio' : 'Read bio';
    card.querySelector('[data-staff-icon]').textContent = expanded ? '−' : '+';
  };

  // Place the panel after the last item that shares the clicked item's row.
  const place = (item) => {
    const top = item.offsetTop;
    const rowEnd = items.filter((i) => i.offsetTop === top).pop();
    rowEnd.after(panel);
  };

  const close = () => {
    if (!open) return;
    setCard(open, false);
    panel.remove();
    open = null;
  };

  const show = (item) => {
    if (open) setCard(open, false);
    open = item;
    const bio = item.querySelector('[data-staff-bio]');
    panel.innerHTML = bio.innerHTML +
      '<button type="button" data-staff-close class="nav-link absolute top-4 right-5" aria-label="Close bio">Close &times;</button>';
    panel.setAttribute('aria-labelledby', bio.id);
    place(item);
    setCard(item, true);
    panel.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
  };

  grid.addEventListener('click', (e) => {
    if (e.target.closest('[data-staff-close]')) { close(); return; }
    const card = e.target.closest('[data-staff-card]');
    if (!card) return;
    const item = card.closest('[data-staff-item]');
    item === open ? close() : show(item);
  });

  document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close(); });

  // Column count changes with viewport width, so re-seat the panel under the right row.
  let timer;
  window.addEventListener('resize', () => {
    clearTimeout(timer);
    timer = setTimeout(() => { if (open) place(open); }, 100);
  });
});

// Nav dropdown — hover and keyboard focus already open it via CSS; this adds a
// tap/click toggle (chevron button) for touch screens, plus Escape / outside-click to close.
document.addEventListener('DOMContentLoaded', () => {
  const dropdowns = document.querySelectorAll('[data-nav-dropdown]');
  if (!dropdowns.length) return;

  const setOpen = (dd, open) => {
    dd.toggleAttribute('data-open', open);
    dd.querySelector('[data-nav-dropdown-toggle]').setAttribute('aria-expanded', String(open));
  };

  dropdowns.forEach((dd) => {
    dd.querySelector('[data-nav-dropdown-toggle]').addEventListener('click', (e) => {
      e.stopPropagation();
      const willOpen = !dd.hasAttribute('data-open');
      dropdowns.forEach((other) => setOpen(other, false));
      setOpen(dd, willOpen);
    });
  });

  document.addEventListener('click', (e) => {
    dropdowns.forEach((dd) => { if (!dd.contains(e.target)) setOpen(dd, false); });
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') dropdowns.forEach((dd) => setOpen(dd, false));
  });
});

// Home page carousel — fade between slides, autoplay with a pause control, arrows, dots,
// swipe, and ←/→ keys. Autoplay pauses on hover/focus and while the tab is hidden, and
// never starts for visitors who prefer reduced motion.
document.addEventListener('DOMContentLoaded', () => {
  const root = document.querySelector('[data-carousel]');
  if (!root) return;

  const slides = [...root.querySelectorAll('[data-carousel-slide]')];
  const dots = [...root.querySelectorAll('[data-carousel-dot]')];
  const toggle = root.querySelector('[data-carousel-toggle]');
  const interval = Number(root.dataset.interval) || 9000;
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  let index = 0;
  let timer = null;
  let userPaused = reduceMotion;   // the pause button's state
  let hovering = false;

  const show = (next) => {
    index = (next + slides.length) % slides.length;
    slides.forEach((slide, i) => {
      const active = i === index;
      slide.classList.toggle('opacity-100', active);
      slide.classList.toggle('opacity-0', !active);
      slide.classList.toggle('pointer-events-none', !active);
      slide.toggleAttribute('aria-hidden', !active);
      if (active) slide.querySelector('img')?.removeAttribute('loading');
    });
    dots.forEach((dot, i) => dot.setAttribute('aria-current', String(i === index)));
  };

  const stop = () => { clearInterval(timer); timer = null; };
  const start = () => {
    stop();
    if (userPaused || hovering || document.hidden) return;
    timer = setInterval(() => show(index + 1), interval);
  };
  const restart = () => start();

  const syncToggle = () => {
    toggle.setAttribute('aria-label', userPaused ? 'Play slideshow' : 'Pause slideshow');
    toggle.querySelector('[data-icon-pause]').classList.toggle('hidden', userPaused);
    toggle.querySelector('[data-icon-play]').classList.toggle('hidden', !userPaused);
    // Announce slide changes politely only when the user is driving.
    root.querySelector('[data-carousel-track]').setAttribute('aria-live', userPaused ? 'polite' : 'off');
  };

  root.querySelector('[data-carousel-prev]')?.addEventListener('click', () => { show(index - 1); restart(); });
  root.querySelector('[data-carousel-next]')?.addEventListener('click', () => { show(index + 1); restart(); });
  dots.forEach((dot, i) => dot.addEventListener('click', () => { show(i); restart(); }));
  toggle.addEventListener('click', () => { userPaused = !userPaused; syncToggle(); start(); });

  root.addEventListener('mouseenter', () => { hovering = true; stop(); });
  root.addEventListener('mouseleave', () => { hovering = false; start(); });
  root.addEventListener('focusin', stop);
  root.addEventListener('focusout', start);
  document.addEventListener('visibilitychange', start);

  root.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') { show(index - 1); restart(); }
    if (e.key === 'ArrowRight') { show(index + 1); restart(); }
  });

  // Swipe (touch)
  let startX = null;
  root.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; }, { passive: true });
  root.addEventListener('touchend', (e) => {
    if (startX === null) return;
    const dx = e.changedTouches[0].clientX - startX;
    startX = null;
    if (Math.abs(dx) > 50) { show(index + (dx < 0 ? 1 : -1)); restart(); }
  });

  syncToggle();
  start();
});


// Latest News: past Waypoints from Constant Contact's email archive (newest archived first).
// Read the archive fresh on every visit so a newly archived issue shows up as soon as
// Constant Contact publishes it, then show the newest Waypoint in full above the list.
// The featured spot prefers an email with "Waypoint" in its subject, so another email
// archived by mistake (an Overlook, say) is listed but not featured.
document.addEventListener('DOMContentLoaded', () => {
  const archive = document.querySelector('[data-waypoint-archive]');
  const source = document.querySelector('[data-ctct-archive]');
  if (!archive || !source) return;
  const latest = document.querySelector('[data-waypoint-latest]');
  const empty = document.querySelector('[data-waypoint-empty]');

  const showLatest = () => {
    const links = [...archive.querySelectorAll('a[href]')].filter((a) => /^https?:/.test(a.href));
    const link = links.find((a) => /waypoint/i.test(a.textContent)) || links[0];
    if (!link) return false;
    latest.querySelector('[data-waypoint-frame]').src = link.href;
    latest.querySelector('[data-waypoint-open]').href = link.href;
    latest.hidden = false;
    empty.hidden = true;
    document.querySelector('[data-waypoint-past]').hidden = false;
    return true;
  };

  // Fallback: Constant Contact's own widget script.
  const useWidget = () => {
    source.innerHTML = `<div id="archiveList" data-archive-count="${source.dataset.count}" data-m="${source.dataset.ctctArchive}"></div>`;
    const observer = new MutationObserver(() => { if (showLatest()) observer.disconnect(); });
    observer.observe(archive, { childList: true, subtree: true });
    setTimeout(() => observer.disconnect(), 20000);
    const script = document.createElement('script');
    script.id = 'archiveScript';
    script.src = 'https://static.ctctcdn.com/js/archive-static/current/archive-static.min.js';
    document.body.appendChild(script);
  };

  const url = `https://campaignlp.constantcontact.com/v1/archive/${source.dataset.ctctArchive}/activities?limit=${source.dataset.count}&_=${Date.now()}`;
  fetch(url, { cache: 'no-store' })
    .then((r) => { if (!r.ok) throw new Error(r.status); return r.json(); })
    .then((items) => {
      const list = document.createElement('ul');
      list.className = 'space-y-2';
      items.filter((i) => i.subject && i.campaignUrl).forEach((i) => {
        const li = document.createElement('li');
        const a = document.createElement('a');
        a.href = i.campaignUrl; a.target = '_blank'; a.rel = 'noopener'; a.textContent = i.subject;
        li.appendChild(a); list.appendChild(li);
      });
      source.replaceChildren(list);
      showLatest();
    })
    .catch(useWidget);
});

// The Map: T / S / E / J buttons show one stage at a time. Without JavaScript every stage shows.
document.addEventListener('DOMContentLoaded', () => {
  const tabs = [...document.querySelectorAll('[data-map-tab]')];
  const panels = [...document.querySelectorAll('[data-map-panel]')];
  if (!tabs.length) return;

  const select = (tab, focus = false) => {
    tabs.forEach((t) => {
      const on = t === tab;
      t.setAttribute('aria-selected', String(on));
      t.tabIndex = on ? 0 : -1;
    });
    panels.forEach((p) => { p.hidden = p.id !== tab.getAttribute('aria-controls'); });
    if (focus) tab.focus();
  };

  tabs.forEach((tab, i) => {
    tab.addEventListener('click', () => select(tab));
    tab.addEventListener('keydown', (e) => {
      const step = { ArrowRight: 1, ArrowDown: 1, ArrowLeft: -1, ArrowUp: -1 }[e.key];
      if (!step) return;
      e.preventDefault();
      select(tabs[(i + step + tabs.length) % tabs.length], true);
    });
  });

  // Open a stage from the address, e.g. /the-map#scout
  const names = { traveler: 0, scout: 1, explorer: 2, journeyman: 3 };
  select(tabs[names[location.hash.slice(1)] ?? 0]);
});
