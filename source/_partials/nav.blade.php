<header class="relative z-20">
  <nav class="bg-white">
  <div class="max-w-6xl mx-auto flex items-center justify-between px-6 py-4 md:px-12">
    <a href="{{ $page->baseUrl }}" class="flex items-center gap-3 shrink-0">
      <img src="{{ $page->baseUrl }}assets/images/abbey-logo-full-color.png" alt="The Abbey at Pawleys Island" class="h-10 lg:h-12 w-auto">
    </a>

    <button data-nav-toggle class="xl:hidden font-sans text-abbey-midnight" aria-label="Toggle navigation">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <div data-nav-menu class="hidden xl:flex xl:items-center xl:gap-7 xl:ml-6 absolute xl:static top-full left-0 right-0 bg-white xl:bg-transparent shadow-lg xl:shadow-none border-t xl:border-0 border-abbey-parchment px-6 py-4 xl:p-0">
      @foreach ($page->navigation as $item)
        @php
          $href = function ($i) use ($page) {
            return ($i['external'] ?? false) ? $page->links[$i['url']] : $page->baseUrl . ltrim($i['url'], '/');
          };
          $children = $item['children'] ?? [];
        @endphp

        @if ($children)
          <div class="relative group" data-nav-dropdown>
            <div class="flex items-center gap-1">
              <a href="{{ $href($item) }}" class="nav-link block py-2 xl:py-0">{{ $item['title'] }}</a>
              <button type="button" data-nav-dropdown-toggle aria-expanded="false" aria-controls="nav-submenu-{{ $loop->index }}" aria-label="Show {{ $item['title'] }} submenu" class="hidden xl:inline-flex items-center justify-center w-7 h-7 -mr-1 text-abbey-midnight hover:text-abbey-green">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 transition-transform group-data-[open]:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
              </button>
            </div>
            <div id="nav-submenu-{{ $loop->index }}" class="pl-4 xl:pl-0 xl:absolute {{ $loop->last ? 'xl:right-0' : 'xl:left-0' }} xl:top-full xl:pt-3 xl:hidden xl:group-hover:block xl:group-focus-within:block xl:group-data-[open]:block">
              <div class="xl:bg-white xl:shadow-lg xl:border xl:border-abbey-parchment xl:min-w-[11rem] xl:py-2 xl:rounded-lg xl:overflow-hidden">
                @foreach ($children as $child)
                  <a
                    href="{{ $href($child) }}"
                    @if ($child['external'] ?? false) target="_blank" rel="noopener" @endif
                    class="nav-link block py-2 xl:px-5 xl:hover:bg-abbey-parchment/40"
                  >{{ $child['title'] }}</a>
                @endforeach
              </div>
            </div>
          </div>
        @elseif ($item['featured'] ?? false)
          {{-- Featured item (e.g. a campaign): Abbey Green, outlined as a small pill on desktop. --}}
          <a href="{{ $href($item) }}" class="nav-link block py-2 xl:py-1.5 xl:px-4 text-abbey-green font-semibold xl:border xl:border-abbey-green xl:rounded-full xl:hover:bg-abbey-green xl:hover:text-white">{{ $item['title'] }}</a>
        @else
          <a href="{{ $href($item) }}" class="nav-link block py-2 xl:py-0">{{ $item['title'] }}</a>
        @endif
      @endforeach
    </div>
  </div>
  </nav>
</header>
