---
extends: _layouts.master
section: content
title: Contact Us
---

@section('content')
@php
  $newsletterHref = 'mailto:' . $page->contact['newsletterEmail'] . '?' . http_build_query([
      'subject' => 'Subscribe me to Waypoints Weekly',
      'body' => "Please add me to the Waypoints Weekly newsletter.\n\nName:\nEmail:",
  ], '', '&', PHP_QUERY_RFC3986);
  $cards = [
      ['heading' => 'Email Us', 'text' => 'Questions, prayer requests, or just want to say hello? Send us a note and we\'ll get back to you.',
       'href' => 'mailto:' . $page->contact['email'], 'label' => $page->contact['email']],
      ['heading' => 'Waypoints Weekly', 'text' => 'Stay connected with what\'s happening at The Abbey. To subscribe to our weekly newsletter, email Shana at ' . $page->contact['newsletterEmail'] . '.',
       'href' => $newsletterHref, 'label' => 'Subscribe by email'],
      ['heading' => 'Call Us', 'text' => 'Prefer to talk? Give the church office a call.',
       'href' => 'tel:' . $page->contact['phoneHref'], 'label' => $page->contact['phone']],
  ];
@endphp
  <div class="bg-abbey-parchment/40 border-b border-abbey-parchment">
    <div class="max-w-6xl mx-auto px-6 md:px-12 py-[18px]">
      <h1 class="section-heading">{{ $page->title }}</h1>
    </div>
  </div>

  <div class="max-w-6xl mx-auto px-6 md:px-12 py-14">
    <p class="font-serif text-2xl text-abbey-midnight text-center mb-10">We'd love to hear from you.</p>

    <div class="grid gap-6 md:grid-cols-3">
      @foreach ($cards as $card)
        <div class="flex flex-col text-center bg-abbey-parchment/30 border border-abbey-parchment rounded-2xl p-8">
          <h2 class="font-serif text-2xl text-abbey-midnight">{{ $card['heading'] }}</h2>
          <p class="font-sans text-sm text-abbey-midnight/80 mt-3 mb-6 flex-1">{{ $card['text'] }}</p>
          <a href="{{ $card['href'] }}" class="inline-block self-center bg-abbey-green text-white font-sans text-sm px-5 py-3 rounded-full hover:opacity-90 break-all">{{ $card['label'] }}</a>
        </div>
      @endforeach
    </div>

    <div class="text-center font-sans text-sm text-abbey-sage mt-12 space-y-1">
      <p>{{ $page->contact['address'] }}</p>
      <p>Join us {{ $page->service['day'] }} at {{ $page->service['time'] }}</p>
    </div>
  </div>
@endsection
