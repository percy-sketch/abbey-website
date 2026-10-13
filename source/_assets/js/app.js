// Minimal mobile-nav toggle — no framework needed for a site this size.
document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.querySelector('[data-nav-toggle]');
  const menu = document.querySelector('[data-nav-menu]');

  if (!toggle || !menu) return;

  toggle.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
});

// Sermon search — filters the full archive client-side (the pages themselves are
// server-paginated), swapping the current page's content for matching results.
document.addEventListener('DOMContentLoaded', () => {
  const input = document.querySelector('[data-sermon-search]');
  const indexEl = document.getElementById('sermon-index');
  const results = document.querySelector('[data-search-results]');
  if (!input || !indexEl || !results) return;

  const view = input.dataset.view;
  const status = document.querySelector('[data-search-status]');
  const hideEls = document.querySelectorAll('[data-search-hide]');
  const index = JSON.parse(indexEl.textContent).map((s) => ({
    ...s,
    haystack: [s.t, s.s, s.l, s.n, s.i].join(' ').toLowerCase(),
  }));

  const esc = (str) =>
    String(str ?? '').replace(/[&<>"']/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));

  const gridHtml = (items) => `
    <div class="max-w-6xl mx-auto px-6 md:px-12 pt-6 pb-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      ${items.map((s) => `
        <a href="${esc(s.u)}" class="block group">
          <div class="aspect-video bg-abbey-parchment overflow-hidden rounded-2xl">
            ${s.y ? `<img src="https://i3.ytimg.com/vi/${esc(s.y)}/hqdefault.jpg" alt="${esc(s.t)}" loading="lazy" class="w-full h-full object-cover group-hover:opacity-90">` : ''}
          </div>
          <p class="font-serif text-lg mt-3 text-abbey-midnight group-hover:text-abbey-green">${esc(s.l)}${s.s ? ` &middot; ${esc(s.s)}` : ''}</p>
          <p class="font-sans text-xs text-abbey-sage mt-1">${esc(s.t)}</p>
        </a>`).join('')}
    </div>`;

  const listHtml = (items) => `
    <div class="max-w-6xl mx-auto px-6 md:px-12 pt-6 pb-14 overflow-x-auto">
      <table class="w-full text-left font-sans text-sm">
        <thead>
          <tr class="border-b-2 border-abbey-green text-abbey-midnight">
            <th class="py-3 pr-6 font-semibold whitespace-nowrap">Date</th>
            <th class="py-3 pr-6 font-semibold">Title</th>
            <th class="py-3 font-semibold">Speaker</th>
          </tr>
        </thead>
        <tbody>
          ${items.map((s) => `
            <tr class="border-b border-abbey-parchment odd:bg-abbey-parchment/20">
              <td class="py-3 pr-6 whitespace-nowrap text-abbey-sage">${esc(s.n)}</td>
              <td class="py-3 pr-6"><a href="${esc(s.u)}" class="font-serif text-base text-abbey-midnight hover:text-abbey-green">${esc(s.t)}</a></td>
              <td class="py-3 text-abbey-sage">${esc(s.s)}</td>
            </tr>`).join('')}
        </tbody>
      </table>
    </div>`;

  const update = () => {
    const terms = input.value.toLowerCase().split(/\s+/).filter(Boolean);
    const searching = terms.length > 0;

    hideEls.forEach((el) => { el.hidden = searching; });
    results.hidden = !searching;

    if (!searching) {
      results.innerHTML = '';
      status.textContent = '';
      return;
    }

    const matches = index.filter((s) => terms.every((t) => s.haystack.includes(t)));
    status.textContent = `${matches.length} of ${index.length} sermons`;
    results.innerHTML = matches.length
      ? (view === 'list' ? listHtml(matches) : gridHtml(matches))
      : '<p class="max-w-6xl mx-auto px-6 md:px-12 pt-6 pb-14 font-sans text-abbey-sage">No sermons match your search.</p>';
  };

  input.addEventListener('input', update);
  input.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && input.value) { input.value = ''; update(); }
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


// Latest News: Constant Contact's archive widget lists past Waypoints (newest first).
// Show the newest one in full above the list. The widget loads after the page, so
// watch for its first link to appear.
document.addEventListener('DOMContentLoaded', () => {
  const archive = document.querySelector('[data-waypoint-archive]');
  if (!archive) return;
  const latest = document.querySelector('[data-waypoint-latest]');
  const empty = document.querySelector('[data-waypoint-empty]');

  const showLatest = () => {
    const link = [...archive.querySelectorAll('a[href]')].find((a) => /^https?:/.test(a.href));
    if (!link) return false;
    latest.querySelector('[data-waypoint-frame]').src = link.href;
    latest.querySelector('[data-waypoint-open]').href = link.href;
    latest.hidden = false;
    empty.hidden = true;
    document.querySelector('[data-waypoint-past]').hidden = false;
    return true;
  };

  if (showLatest()) return;
  const observer = new MutationObserver(() => { if (showLatest()) observer.disconnect(); });
  observer.observe(archive, { childList: true, subtree: true });
  setTimeout(() => observer.disconnect(), 20000);
});
