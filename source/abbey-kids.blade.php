---
extends: _layouts.master
section: content
title: Abbey Kids
description: Abbey Kids is The Abbey's ministry for children up to 6th grade. Sunday mornings at 10:30 AM and Abbey 456 on Sunday evenings.
---

@section('content')
@php
  // Photos for the carousel at the top ('position' keeps the important part in view when cropped).
  // To add more, put the photo in source/assets/images/ and add a line here.
  $kidsSlides = [
    ['image' => 'hero-community-eggs.jpg', 'position' => 'center 40%',
     'alt' => 'Children bending to gather colorful plastic eggs on the lawn during the Easter egg hunt'],
    ['image' => 'hero-3-blessing.jpg', 'position' => 'center 40%',
     'alt' => 'The congregation raises their hands to bless the children gathered at the front for the Back to School Blessing'],
  ];

  // Sunday morning classes. The colored top edge on each card comes from the Abbey Kids logo.
  $mornings = [
    ['Nursery', '6 weeks to 2 years old', '#f9a12a',
     'A safe space where infants and toddlers experience God through the love and care of the staff and volunteers serving.'],
    ['Preschool', '2½ to Kindergarten', '#7f2a86',
     'A safe loving space where children engage in fellowship with adults and children, hear God’s word, worship, and play.'],
    ['Elementary', 'Kindergarten – 6th grade', '#21a89a',
     'A safe space where children feel they belong and can grow in their faith through hearing, seeing, and applying God’s word to their lives.'],
  ];

  $events = [
    'Easter Eggstravaganza',
    'Kids Blast',
    'Girls Camp',
    'Camp Longridge Summer Camp',
    'Children’s Christmas Pageant',
    'Gingerbread Bash',
  ];

  $email = 'mailto:paula@theabbeypawleysisland.com?' . http_build_query(['subject' => 'Abbey Kids'], '', '&', PHP_QUERY_RFC3986);
  $instagram = 'https://www.instagram.com/theabbeykids/';
@endphp

<div class="bg-[#f5f1e6]">
  <div class="h-1.5 bg-abbey-green"></div>

  {{-- Welcome --}}
  <div class="max-w-6xl mx-auto px-6 md:px-12 pt-12 md:pt-16 pb-10">
    <div class="grid md:grid-cols-[1fr_auto] items-center gap-8">
      <div>
        <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Children at The Abbey</p>
        <h1 class="font-serif text-5xl md:text-7xl text-abbey-midnight leading-[1.05] mt-3">Welcome to Abbey Kids!</h1>
        <div class="flex items-center gap-3 mt-6 text-abbey-gold max-w-md" aria-hidden="true">
          <span class="h-px w-20 bg-abbey-gold/70"></span><span>&#10022;</span><span class="h-px flex-1 bg-gradient-to-r from-abbey-gold/70 to-transparent"></span>
        </div>
        <p class="font-serif text-xl md:text-2xl italic text-abbey-midnight/80 mt-6">For children up to 6th grade</p>
      </div>
      <img src="{{ $page->baseUrl }}assets/images/abbey-kids-logo.png" alt="Abbey Kids logo"
           class="w-64 md:w-80 mx-auto md:mx-0">
    </div>
  </div>

  {{-- Photos --}}
  <div class="max-w-6xl mx-auto px-6 md:px-12">
    <div class="rounded-2xl overflow-hidden shadow-md">
      @include('_partials.hero-carousel', [
        'slides' => $kidsSlides,
        'height' => 'h-[62vw] sm:h-[52vw] md:h-[560px] max-h-[640px]',
        'label' => 'Abbey Kids photos',
        'noH1' => true,
      ])
    </div>
  </div>

  <div class="max-w-4xl mx-auto px-6 md:px-12 py-16 space-y-16">

    {{-- Who We Are --}}
    <section>
      <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Who We Are</p>
      <p class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-4">
        Abbey Kids is a ministry for children up to 6th grade. Our mission is to partner with parents to help them raise
        their children to know, love, and follow Jesus through Biblical truth, relational discipleship, and practical
        application so they can live out their faith at home and in their community.
      </p>
      <blockquote class="mt-8 bg-abbey-sage/10 border-l-4 border-abbey-green px-6 md:px-8 py-7">
        <p class="font-serif text-2xl leading-snug text-abbey-midnight">
          All children should know they are <strong class="font-semibold text-abbey-green">LOVED</strong>,
          <strong class="font-semibold text-abbey-green">VALUED</strong>, and God has a plan and purpose for their lives.
        </p>
      </blockquote>
    </section>

    {{-- Sunday Mornings --}}
    <section>
      <div class="bg-abbey-green text-white rounded-2xl px-8 py-8 md:px-12">
        <p class="font-sans text-xs uppercase tracking-[0.3em] text-white/70">Sunday Mornings</p>
        <p class="font-serif text-4xl md:text-5xl mt-2 leading-tight">10:30 AM</p>
      </div>
      <div class="grid gap-5 md:grid-cols-3 mt-5">
        @foreach ($mornings as [$name, $ages, $color, $text])
          <div class="bg-white border border-abbey-parchment rounded-xl p-6 shadow-sm border-t-4" style="border-top-color: {{ $color }}">
            <h2 class="font-serif text-2xl text-abbey-midnight">{{ $name }}</h2>
            <p class="font-sans text-xs uppercase tracking-[0.2em] text-abbey-sage mt-1">{{ $ages }}</p>
            <p class="font-sans text-base leading-relaxed text-abbey-midnight/80 mt-3">{{ $text }}</p>
          </div>
        @endforeach
      </div>
    </section>

    {{-- Sunday Evenings: Abbey 456 --}}
    <section class="bg-white border border-abbey-parchment rounded-2xl overflow-hidden grid md:grid-cols-[auto_1fr]">
      <div class="bg-abbey-midnight text-white px-8 py-8 md:px-10 flex flex-col justify-center">
        <p class="font-sans text-xs uppercase tracking-[0.3em] text-white/70">Sunday Evenings</p>
        <p class="font-serif text-4xl mt-2 leading-tight">5:00&ndash;6:30 PM</p>
      </div>
      <div class="px-8 py-8 md:px-10">
        <h2 class="font-serif text-3xl text-abbey-midnight">Abbey 456</h2>
        <p class="font-sans text-xs uppercase tracking-[0.2em] text-abbey-sage mt-1">Grades 4th&ndash;6th</p>
        <p class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-3">
          Abbey 456 is a weekly ministry for children in grades 4th&ndash;6th. We gather together to share a meal, have fun,
          and meet in small groups to learn more about Jesus and grow in our faith.
        </p>
      </div>
    </section>

    {{-- Other Events and Activities --}}
    <section>
      <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Other Events and Activities</p>
      <ul class="grid gap-3 sm:grid-cols-2 md:grid-cols-3 mt-6">
        @foreach ($events as $event)
          <li class="flex items-center gap-3 bg-white/70 border border-abbey-parchment rounded-xl px-5 py-4">
            <span class="text-abbey-gold" aria-hidden="true">&#10022;</span>
            <span class="font-serif text-lg text-abbey-midnight">{{ $event }}</span>
          </li>
        @endforeach
      </ul>
    </section>

    {{-- Get Connected --}}
    <section class="text-center bg-white/70 border border-abbey-parchment rounded-2xl px-6 py-12 md:px-12">
      <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Get Connected!</p>
      <p class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-4 max-w-2xl mx-auto">
        Follow along on Instagram, or reach out with any questions about Abbey Kids. We would love to hear from you!
      </p>
      <div class="flex flex-wrap justify-center gap-3 mt-8">
        <a href="{{ $email }}" class="inline-block bg-abbey-green text-white font-sans text-sm px-6 py-3 rounded-full hover:opacity-90">Email Paula</a>
        <a href="{{ $instagram }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 border border-abbey-green text-abbey-green font-sans text-sm px-6 py-3 rounded-full hover:bg-abbey-green hover:text-white">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
          Follow @theabbeykids
        </a>
      </div>
      <p class="font-sans text-sm text-abbey-sage mt-5">Paula Johnson, Children&rsquo;s Discipleship Pastor</p>
    </section>
  </div>
</div>
@endsection
