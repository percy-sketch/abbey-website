---
extends: _layouts.master
section: content
title: Who We Are
description: Welcome, pilgrim. You were made for the journey.
---

@section('content')
{{-- Welcome page, adapted from page 2 of The Abbey's Orientation Booklet. --}}
<div class="relative overflow-hidden bg-[#f5f1e6]">
  <div class="h-1.5 bg-abbey-green"></div>

  <img src="{{ $page->baseUrl }}assets/images/welcome-vine.png" alt="" aria-hidden="true"
       class="pointer-events-none select-none absolute right-0 top-1.5 w-40 md:w-56 opacity-20">

  <div class="relative max-w-3xl mx-auto px-6 md:px-12 py-14 md:py-20">
    <div class="flex items-center gap-4">
      <img src="{{ $page->baseUrl }}assets/images/abbey-logomark.png" alt="" class="h-10 w-10">
      <span class="font-sans text-xs uppercase tracking-[0.3em] text-abbey-sage">The Abbey at Pawleys Island</span>
    </div>

    <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold mt-12">Welcome, Pilgrim</p>
    <h1 class="font-serif text-5xl md:text-7xl text-abbey-midnight leading-[1.05] mt-3">You were made<br>for the journey.</h1>

    <div class="flex items-center gap-3 mt-8 text-abbey-gold" aria-hidden="true">
      <span class="h-px w-20 bg-abbey-gold/70"></span><span>&#10022;</span><span class="h-px flex-1 bg-gradient-to-r from-abbey-gold/70 to-transparent"></span>
    </div>

    <div class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-8 space-y-6">
      <p>
        We are so glad you&rsquo;re here. At The Abbey we think of our life together as a
        <em class="text-abbey-green">journey</em>&mdash;one marked by waypoints, seasons, and the places where we sense the
        Lord leading. Wherever you find yourself on the road, there is a place for you at our table.
      </p>
      <p>
        This site is a map of sorts. It offers a glimpse of who we are&mdash;an
        <a href="{{ $page->baseUrl }}our-beliefs" class="italic text-abbey-green hover:underline">Ancient-Future Anglican</a>
        community rooted in Scripture, the Sacraments, and the Spirit&mdash;and it points to the many
        <a href="{{ $page->baseUrl }}the-map" class="italic text-abbey-green hover:underline">growth opportunities</a>
        that help pilgrims and travelers take their next faithful step.
      </p>
    </div>

    <blockquote class="mt-10 bg-abbey-sage/10 border-l-4 border-abbey-green px-6 md:px-8 py-7">
      <p class="font-serif text-2xl italic leading-snug text-abbey-midnight">
        &ldquo;The harvest is plentiful, but the laborers are few. Ask the Lord of the harvest, therefore, to send out laborers into his harvest.&rdquo;
      </p>
      <footer class="font-sans text-xs uppercase tracking-[0.3em] text-abbey-sage mt-4">
        <a href="https://www.biblegateway.com/passage/?search=Luke%2010%3A2&amp;version=ESV" target="_blank" rel="noopener" class="hover:text-abbey-green">Luke 10:2</a>
      </footer>
    </blockquote>

    <div class="flex items-end justify-between gap-6 mt-12">
      <div>
        <p class="font-serif text-lg italic text-abbey-midnight/80">With joy on the road with you,</p>
        <p class="font-display text-3xl md:text-4xl text-abbey-green mt-1">The Clergy &amp; Vestry of The Abbey</p>
      </div>
      <img src="{{ $page->baseUrl }}assets/images/welcome-compass.png" alt="" aria-hidden="true" class="w-20 md:w-24 shrink-0">
    </div>

    {{-- Where to go next --}}
    <nav class="grid gap-4 sm:grid-cols-3 mt-16" aria-label="Get to know The Abbey">
      @foreach ([['Our Beliefs', 'What we believe and where we come from', 'our-beliefs'], ['Our Team', 'Meet our clergy and staff', 'our-team'], ['The Map', 'Find where you are and your next step', 'the-map']] as [$t, $d, $u])
        <a href="{{ $page->baseUrl }}{{ $u }}" class="group block bg-white/70 border border-abbey-parchment rounded-xl p-5 hover:border-abbey-green transition-colors">
          <span class="block font-serif text-xl text-abbey-midnight group-hover:text-abbey-green">{{ $t }} &rarr;</span>
          <span class="block font-sans text-sm text-abbey-midnight/70 mt-1">{{ $d }}</span>
        </a>
      @endforeach
    </nav>
  </div>
</div>
@endsection
