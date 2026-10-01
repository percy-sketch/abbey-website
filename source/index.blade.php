---
extends: _layouts.master
section: content
title: Home
---

@section('content')
{{--
  Layout mirrors the homepage as reviewed in abbeyweb.pdf, with the
  reviewer's own markup addressed:
   - the "Join Us Sundays" strip moved up under the nav (see
     _partials/announcement-bar.blade.php) instead of sitting at the very
     bottom of the page.
   - the scripture quote block moved up above the video row instead of
     being wedged beneath it.
   - the three feature cards are laid out on an even 3-column grid instead
     of the uneven spacing marked up in the review.
  The hero is the carousel in _partials/hero-carousel.blade.php; its slides live in
  config.php ('heroSlides'). Replace the placeholder YouTube ID below before launch.
--}}

@include('_partials.hero-carousel')

<section class="max-w-6xl mx-auto px-6 md:px-12 py-16 grid gap-8 md:grid-cols-3">
  <div class="relative h-56 overflow-hidden">
    <img src="{{ $page->baseUrl }}assets/images/feature-hospitality.jpg" alt="" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-abbey-midnight/60 p-6 flex flex-col justify-end text-white">
      <p class="font-sans text-xs uppercase tracking-wide text-abbey-sage">Radical Hospitality</p>
      <p class="font-serif text-2xl">Come and See.</p>
    </div>
  </div>
  <div class="relative h-56 overflow-hidden">
    <img src="{{ $page->baseUrl }}assets/images/feature-culture.jpg" alt="" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-abbey-midnight/60 p-6 flex flex-col justify-end text-white">
      <p class="font-sans text-xs uppercase tracking-wide text-abbey-sage">Cultural Engagement</p>
      <p class="font-serif text-2xl">Come and Learn.</p>
    </div>
  </div>
  <div class="relative h-56 overflow-hidden">
    <img src="{{ $page->baseUrl }}assets/images/feature-renewal.jpg" alt="" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-abbey-midnight/60 p-6 flex flex-col justify-end text-white">
      <p class="font-sans text-xs uppercase tracking-wide text-abbey-sage">Spiritual Renewal</p>
      <p class="font-serif text-2xl">Come and Renew.</p>
    </div>
  </div>
</section>

<section class="bg-abbey-parchment/30 py-16">
  <div class="max-w-3xl mx-auto px-6 text-center">
    <img src="{{ $page->baseUrl }}assets/images/abbey-logomark.png" alt="" class="h-10 w-auto mx-auto mb-6">
    <p class="font-serif text-2xl italic text-abbey-midnight">
      &ldquo;Unto him be the glory in the church and in Christ Jesus unto all generations for ever and ever. Amen.&rdquo;
    </p>
    <p class="font-sans text-sm text-abbey-sage mt-4">&mdash; Ephesians 3:21</p>
  </div>
</section>

<section class="max-w-6xl mx-auto px-6 md:px-12 py-16 grid gap-8 md:grid-cols-2">
  <div class="aspect-video">
    <iframe class="w-full h-full" src="https://www.youtube-nocookie.com/embed/REPLACE_WITH_ID" title="The Abbey Pawleys Island" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="aspect-video">
    <iframe class="w-full h-full" src="https://www.youtube-nocookie.com/embed/REPLACE_WITH_ID" title="Sunday at The Abbey" frameborder="0" allowfullscreen></iframe>
  </div>
</section>
@endsection
