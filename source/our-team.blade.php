---
extends: _layouts.master
section: content
title: Our Team
---

@section('content')
  {{-- Same title band as the other pages (see _layouts/page.blade.php). --}}
  <div class="bg-abbey-parchment/40 border-b border-abbey-parchment">
    <div class="max-w-6xl mx-auto px-6 md:px-12 py-[18px]">
      <h1 class="section-heading">{{ $page->title }}</h1>
    </div>
  </div>

  {{-- Staff come from 'staff' in config.php. --}}
<div class="max-w-6xl mx-auto px-6 md:px-12 py-14">
  <div data-staff-grid class="grid gap-x-6 gap-y-10 sm:grid-cols-3">
    @foreach ($page->staff as $i => $person)
      <div data-staff-item>
        @if (count($person['bio'] ?? []) > 0)
        <button type="button" data-staff-card aria-expanded="false" aria-controls="staff-bio-{{ $i }}" class="block w-full text-left group">
          <img src="{{ $page->baseUrl }}assets/images/{{ $person['photo'] }}" alt="{{ $person['name'] }}" loading="lazy" class="w-full aspect-square object-cover rounded-2xl group-hover:opacity-90 group-aria-expanded:ring-4 group-aria-expanded:ring-abbey-green">
          <span class="block text-center mt-4">
            <span class="block font-serif text-xl text-abbey-midnight group-hover:text-abbey-green">{{ $person['name'] }}</span>
            <span class="block font-sans text-sm text-abbey-sage mt-1">{{ $person['title'] }}</span>
            <span class="block font-sans text-xs uppercase tracking-wide text-abbey-green mt-2"><span data-staff-label>Read bio</span> <span aria-hidden="true" data-staff-icon>+</span></span>
          </span>
        </button>

        <div id="staff-bio-{{ $i }}" data-staff-bio hidden>
          <h2 class="font-serif text-2xl text-abbey-midnight">{{ $person['fullName'] }}</h2>
          <p class="font-sans text-sm text-abbey-sage mt-1 mb-4">{{ $person['title'] }}</p>
          @foreach ($person['bio'] as $paragraph)
            <p class="font-serif text-lg leading-relaxed text-abbey-midnight/90 mb-4">{{ $paragraph }}</p>
          @endforeach
        </div>
        @else
          {{-- No bio yet: show the photo, name and title only (no "Read bio" button). --}}
          <div class="block w-full">
            <img src="{{ $page->baseUrl }}assets/images/{{ $person['photo'] }}" alt="{{ $person['name'] }}" loading="lazy" class="w-full aspect-square object-cover rounded-2xl">
            <span class="block text-center mt-4">
              <span class="block font-serif text-xl text-abbey-midnight">{{ $person['name'] }}</span>
              <span class="block font-sans text-sm text-abbey-sage mt-1">{{ $person['title'] }}</span>
            </span>
          </div>
        @endif
      </div>
    @endforeach
  </div>

  <div class="max-w-3xl mx-auto mt-14 rounded-2xl overflow-hidden shadow-md">
    <img src="{{ $page->baseUrl }}assets/images/team-want-to-grow.jpg" alt="We have all the time in the world for those who want to grow. Learn, grow, serve. Illustration of a person reading, planting, watering and growing alongside a clock and a tree." loading="lazy" class="w-full h-auto">
  </div>
</div>
@endsection
