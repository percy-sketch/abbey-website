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
    <div class="max-w-5xl mx-auto px-6 md:px-12 py-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      ${items.map((s) => `
        <a href="${esc(s.u)}" class="block group">
          <div class="aspect-video bg-abbey-parchment overflow-hidden">
            ${s.y ? `<img src="https://i3.ytimg.com/vi/${esc(s.y)}/hqdefault.jpg" alt="${esc(s.t)}" loading="lazy" class="w-full h-full object-cover group-hover:opacity-90">` : ''}
          </div>
          <p class="font-serif text-lg mt-3 text-abbey-midnight group-hover:text-abbey-green">${esc(s.t)}</p>
          <p class="font-sans text-xs text-abbey-sage mt-1">${esc(s.l)}${s.s ? ` &middot; ${esc(s.s)}` : ''}</p>
        </a>`).join('')}
    </div>`;

  const listHtml = (items) => `
    <div class="max-w-5xl mx-auto px-6 md:px-12 py-14 overflow-x-auto">
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
      : '<p class="max-w-5xl mx-auto px-6 md:px-12 py-14 font-sans text-abbey-sage">No sermons match your search.</p>';
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
  panel.className = 'col-span-full bg-abbey-parchment/40 border-t-4 border-abbey-green p-6 md:p-10 relative';
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
