@extends('_layouts.master')

@section('content')
  <div class="max-w-3xl mx-auto px-6 md:px-12 py-14">
    <a href="{{ $page->baseUrl }}sermons" class="nav-link">&larr; All sermons</a>

    <h1 class="section-heading mt-4">{{ $title }}</h1>
    <p class="font-sans text-sm text-abbey-sage mt-2">
      {{ \DateTime::createFromFormat('Y-m-d', (string) $date)->format('F j, Y') }}
      @if (!empty($speaker)) &middot; {{ $speaker }} @endif
    </p>

    @if (!empty($youtube_id))
      <div class="aspect-video mt-8">
        <iframe
          class="w-full h-full"
          src="https://www.youtube-nocookie.com/embed/{{ $youtube_id }}"
          title="{{ $title }}"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
        ></iframe>
      </div>
    @endif

    <div class="prose prose-lg font-serif prose-headings:font-serif mt-8">
      @yield('body')
    </div>
  </div>
@endsection
