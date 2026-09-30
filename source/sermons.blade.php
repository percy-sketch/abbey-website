---
extends: _layouts.master
section: content
title: Sermons
---

<div class="bg-abbey-parchment/40 border-b border-abbey-parchment">
  <div class="max-w-5xl mx-auto px-6 md:px-12 py-14">
    <h1 class="section-heading">Sermons</h1>
    <p class="font-sans text-abbey-sage mt-2">
      Watch live on <a href="{{ $page->links['youtube'] }}" target="_blank" rel="noopener" class="underline">YouTube</a>,
      or browse the archive below.
    </p>
  </div>
</div>

<div class="max-w-5xl mx-auto px-6 md:px-12 py-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
  @foreach ($page->sermons as $sermon)
    <a href="{{ $sermon->getUrl() }}" class="block group">
      <div class="aspect-video bg-abbey-parchment overflow-hidden">
        @if (!empty($sermon->youtube_id))
          <img src="https://i3.ytimg.com/vi/{{ $sermon->youtube_id }}/hqdefault.jpg" alt="{{ $sermon->title }}" class="w-full h-full object-cover group-hover:opacity-90">
        @endif
      </div>
      <p class="font-serif text-lg mt-3 text-abbey-midnight group-hover:text-abbey-green">{{ $sermon->title }}</p>
      <p class="font-sans text-xs text-abbey-sage mt-1">
        {{ \DateTime::createFromFormat('Y-m-d', (string) $sermon->date)->format('F j, Y') }}
        @if (!empty($sermon->speaker)) &middot; {{ $sermon->speaker }} @endif
      </p>
    </a>
  @endforeach
</div>
