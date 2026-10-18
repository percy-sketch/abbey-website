---
extends: _layouts.master
section: content
title: Live Stream
description: Watch The Abbey's Sunday worship live, or catch up on the most recent service.
---

@section('content')
  <div class="bg-abbey-parchment/40 border-b border-abbey-parchment">
    <div class="max-w-6xl mx-auto px-6 md:px-12 py-[18px]">
      <h1 class="section-heading">{{ $page->title }}</h1>
    </div>
  </div>

  <div class="max-w-5xl mx-auto px-6 md:px-12 py-14">
    {{-- Same player as the home page: always the newest stream in the YouTube "Live streams"
         list ('liveStreamPlaylist' in config.php). While a service is live, it plays that one. --}}
    <div class="aspect-video shadow-md rounded-2xl overflow-hidden bg-black">
      <iframe
        class="w-full h-full"
        src="https://www.youtube-nocookie.com/embed/videoseries?list={{ $page->liveStreamPlaylist }}&rel=0"
        title="Latest live stream from The Abbey"
        frameborder="0"
        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>
    </div>

    <div class="text-center mt-8">
      <p class="font-serif text-xl text-abbey-midnight">Join us live {{ $page->service['day'] }} at {{ $page->service['time'] }}.</p>
      <p class="font-sans text-sm text-abbey-midnight/70 mt-2">
        The most recent service plays above. Earlier services are in the
        <a href="{{ $page->links['youtube'] }}" target="_blank" rel="noopener" class="text-abbey-green hover:underline">Abbey YouTube channel</a>.
      </p>
    </div>
  </div>
@endsection
