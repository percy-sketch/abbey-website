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
  @foreach ($page->featureCards as $card)
    <img
      src="{{ $page->baseUrl }}assets/images/{{ $card['image'] }}"
      alt="{{ $card['alt'] }}"
      loading="lazy"
      class="relative w-full aspect-video object-cover rounded-2xl md:hover:rounded-md shadow-md transition-all duration-300 ease-out motion-reduce:transition-none md:hover:scale-[3] md:hover:z-30 md:hover:shadow-2xl {{ $loop->first ? 'md:origin-left' : ($loop->last ? 'md:origin-right' : 'md:origin-center') }}"
    >
  @endforeach
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
  <div class="aspect-video shadow-md rounded-2xl overflow-hidden">
    <iframe
      class="w-full h-full"
      src="https://www.youtube-nocookie.com/embed/{{ $page->introVideo['id'] }}?rel=0"
      title="{{ $page->introVideo['title'] }}"
      loading="lazy"
      frameborder="0"
      allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen
    ></iframe>
  </div>

  {{-- Always the newest live stream: see 'liveStreamPlaylist' in config.php. --}}
  <div class="aspect-video shadow-md rounded-2xl overflow-hidden">
    <iframe
      class="w-full h-full"
      src="https://www.youtube-nocookie.com/embed/videoseries?list={{ $page->liveStreamPlaylist }}&rel=0"
      title="Latest live stream from The Abbey"
      loading="lazy"
      frameborder="0"
      allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen
    ></iframe>
  </div>
</section>
@endsection
