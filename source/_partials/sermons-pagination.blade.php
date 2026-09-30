@if ($pagination->totalPages > 1)
  <nav data-search-hide class="max-w-5xl mx-auto px-6 md:px-12 pb-16 flex flex-wrap items-center justify-center gap-2 font-sans text-sm" aria-label="Sermon pages">
    @if ($pagination->previous)
      <a href="{{ $pagination->previous }}" class="nav-link px-3 py-2" rel="prev">&larr; Newer</a>
    @endif

    @foreach ($pagination->pages as $number => $path)
      @if ($number == $pagination->currentPage)
        <span class="px-3 py-2 bg-abbey-green text-white" aria-current="page">{{ $number }}</span>
      @else
        <a href="{{ $path }}" class="nav-link px-3 py-2">{{ $number }}</a>
      @endif
    @endforeach

    @if ($pagination->next)
      <a href="{{ $pagination->next }}" class="nav-link px-3 py-2" rel="next">Older &rarr;</a>
    @endif
  </nav>
@endif
