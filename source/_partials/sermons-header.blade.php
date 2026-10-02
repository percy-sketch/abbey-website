<div class="bg-abbey-parchment/40 border-b border-abbey-parchment">
  <div class="max-w-6xl mx-auto px-6 md:px-12 py-2.5 flex flex-wrap items-end justify-between gap-6">
    <div>
      <h1 class="section-heading">Sermons</h1>
      <p class="font-sans text-abbey-sage mt-2">
        Watch live on <a href="{{ $page->links['youtube'] }}" target="_blank" rel="noopener" class="underline">YouTube</a>,
        or browse the archive below.
      </p>
    </div>

    <div class="inline-flex font-sans text-sm border border-abbey-green rounded-lg overflow-hidden" role="group" aria-label="Sermon view">
      <a href="{{ $page->baseUrl }}sermons"
         class="px-4 py-2 {{ $view === 'grid' ? 'bg-abbey-green text-white' : 'text-abbey-green hover:bg-abbey-parchment' }}"
         @if ($view === 'grid') aria-current="true" @endif>Thumbnails</a>
      <a href="{{ $page->baseUrl }}sermons/list"
         class="px-4 py-2 border-l border-abbey-green {{ $view === 'list' ? 'bg-abbey-green text-white' : 'text-abbey-green hover:bg-abbey-parchment' }}"
         @if ($view === 'list') aria-current="true" @endif>List</a>
    </div>
  </div>
</div>
