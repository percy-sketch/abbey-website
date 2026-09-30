<header class="relative z-20">
  <nav class="flex items-center justify-between px-6 py-4 md:px-12 bg-white">
    <a href="{{ $page->baseUrl }}" class="flex items-center gap-3">
      <img src="{{ $page->baseUrl }}assets/images/abbey-logo-full-color.png" alt="The Abbey at Pawleys Island" class="h-12 w-auto">
    </a>

    <button data-nav-toggle class="md:hidden font-sans text-abbey-midnight" aria-label="Toggle navigation">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <div data-nav-menu class="hidden md:flex md:items-center md:gap-8 absolute md:static top-full left-0 right-0 bg-white md:bg-transparent border-t md:border-0 border-abbey-parchment px-6 py-4 md:p-0">
      @foreach ($page->navigation as $item)
        @php
          $isExternal = $item['external'] ?? false;
          $href = $isExternal ? $page->links[$item['url']] : $page->baseUrl . ltrim($item['url'], '/');
        @endphp
        <a
          href="{{ $href }}"
          @if ($isExternal) target="_blank" rel="noopener" @endif
          class="nav-link block py-2 md:py-0"
        >{{ $item['title'] }}</a>
      @endforeach
    </div>
  </nav>
</header>
