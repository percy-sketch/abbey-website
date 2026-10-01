---
extends: _layouts.master
section: content
title: Sermons
pagination:
  collection: sermons
  perPage: 12
---

@section('content')
@include('_partials.sermons-header', ['view' => 'grid'])
@include('_partials.sermons-search', ['view' => 'grid'])

<div data-search-hide class="max-w-6xl mx-auto px-6 md:px-12 pt-6 pb-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
  @foreach ($pagination->items as $sermon)
    <a href="{{ $sermon->getUrl() }}" class="block group">
      <div class="aspect-video bg-abbey-parchment overflow-hidden">
        @if ($sermon->youtube_id)
          <img src="https://i3.ytimg.com/vi/{{ $sermon->youtube_id }}/hqdefault.jpg" alt="{{ $sermon->title }}" loading="lazy" class="w-full h-full object-cover group-hover:opacity-90">
        @endif
      </div>
      <p class="font-serif text-lg mt-3 text-abbey-midnight group-hover:text-abbey-green">
        {{ date("F j, Y", is_numeric($sermon->date) ? $sermon->date : strtotime($sermon->date)) }}
        @if ($sermon->speaker) &middot; {{ $sermon->speaker }} @endif
      </p>
      <p class="font-sans text-xs text-abbey-sage mt-1">{{ $sermon->title }}</p>
    </a>
  @endforeach
</div>

@include('_partials.sermons-pagination')
@endsection
