---
extends: _layouts.master
section: content
title: Latest News
---

@section('content')
@php
  $newsletterHref = 'mailto:' . $page->contact['newsletterEmail'] . '?' . http_build_query([
      'subject' => 'Subscribe me to Waypoints Weekly',
      'body' => "Please add me to the Waypoints Weekly newsletter.\n\nName:\nEmail:",
  ], '', '&', PHP_QUERY_RFC3986);
@endphp
  <div class="bg-abbey-parchment/40 border-b border-abbey-parchment">
    <div class="max-w-6xl mx-auto px-6 md:px-12 py-[18px]">
      <h1 class="section-heading">{{ $page->title }}</h1>
    </div>
  </div>

  <div class="max-w-6xl mx-auto px-6 md:px-12 py-14">
    <div class="flex flex-wrap items-end justify-between gap-4 mb-8">
      <div>
        <h2 class="font-serif text-3xl text-abbey-midnight">Waypoints Weekly</h2>
        <p class="font-sans text-sm text-abbey-sage mt-1">News and happenings from The Abbey, sent every week.</p>
      </div>
      <a href="{{ $newsletterHref }}" class="inline-block bg-abbey-green text-white font-sans text-sm px-5 py-3 rounded-full hover:opacity-90">Subscribe</a>
    </div>

    {{-- The newest issue, shown in full. Filled in by app.js from the first link in the archive below. --}}
    <div data-waypoint-latest hidden>
      <div class="flex items-center justify-between mb-3">
        <p class="font-sans text-xs uppercase tracking-wide text-abbey-green">This week&rsquo;s issue</p>
        <a data-waypoint-open href="#" target="_blank" rel="noopener" class="font-sans text-sm text-abbey-green hover:underline">Open in a new tab &rarr;</a>
      </div>
      <div class="rounded-2xl overflow-hidden shadow-md border border-abbey-parchment bg-white">
        <iframe data-waypoint-frame title="Latest Waypoints Weekly" class="w-full h-[1400px]" frameborder="0" loading="lazy"></iframe>
      </div>
    </div>

    {{-- Shown until the archive has an issue in it. --}}
    <div data-waypoint-empty class="text-center bg-abbey-parchment/30 border border-abbey-parchment rounded-2xl p-10">
      <p class="font-serif text-xl text-abbey-midnight">The latest issue of Waypoints Weekly will appear here soon.</p>
      <p class="font-sans text-sm text-abbey-midnight/80 mt-3">In the meantime, subscribe to get it in your inbox each week.</p>
    </div>

    {{-- The archive widget renders here; the heading shows once it has issues. --}}
    <div class="mt-14">
      <h2 data-waypoint-past hidden class="font-serif text-2xl text-abbey-midnight mb-4">Past issues</h2>
      <div data-waypoint-archive class="font-sans text-sm [&_a]:text-abbey-green [&_a:hover]:underline">
        @include('_partials.waypoint-archive')
      </div>
    </div>
  </div>
@endsection
