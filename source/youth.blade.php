---
extends: _layouts.master
section: content
title: Youth
description: Yabbey is The Abbey's ministry for middle and high school students. Sundays, 5:00–6:30 PM in the Pub.
---

@section('content')
@php
  // Yabbey photos for the carousel at the top. 'position' keeps the important part of each
  // photo in view when it's cropped; 'fit' => 'whole' shows an entire tall photo (blurred sides).
  $youthSlides = [
    ['image' => 'youth-sanctuary.jpg', 'position' => 'center 68%',
     'alt' => 'A large group of Yabbey students gathered at the front of the sanctuary'],
    ['image' => 'youth-worship-band.jpg', 'fit' => 'whole', 'position' => 'center 45%',
     'alt' => 'Students leading worship with guitars and vocals beside the tall sanctuary windows'],
    ['image' => 'youth-bowling-group.jpg', 'position' => 'center 45%',
     'alt' => 'Seven Yabbey students smiling together at the bowling alley'],
    ['image' => 'youth-house.jpg', 'position' => 'center 60%',
     'alt' => 'Students gathered around a kitchen island at a Yabbey party, with a golden retriever wandering through'],
    ['image' => 'youth-pizza.jpg', 'position' => 'center 55%',
     'alt' => 'Students sharing pizza and watching football together in a wood-paneled library'],
    ['image' => 'youth-bowling.jpg', 'position' => 'center 50%',
     'alt' => 'Students bowling and hanging out at the lanes during a Yabbey outing'],
  ];

  $values = ['Be with Jesus', 'Become like Jesus', 'Do what Jesus did'];

  $ways = [
    ['Yabbey Small Groups', 'Growing in faith, studying Scripture, and building meaningful relationships with other students.'],
    ['One-on-One Discipleship', 'Building relationships with mentors who encourage students in their faith and walk with Jesus.'],
    ['Yabbey Fun Events', 'Making memories and building community through events like Waffle House outings, bowling, Friendsgiving, our Christmas party, and more!'],
    ['Family Worship', 'Gathering together as a church family to worship God and grow in our faith.'],
  ];

  $email = 'mailto:peyton@theabbeypawleysisland.com?' . http_build_query(['subject' => 'Yabbey'], '', '&', PHP_QUERY_RFC3986);
  $instagram = 'https://www.instagram.com/yabbeypi/';
@endphp

<div class="bg-[#f5f1e6]">
  <div class="h-1.5 bg-abbey-green"></div>

  {{-- Welcome --}}
  <div class="max-w-6xl mx-auto px-6 md:px-12 pt-12 md:pt-16 pb-10">
    <div class="grid md:grid-cols-[1fr_auto] items-center gap-8">
      <div>
        <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Youth at The Abbey</p>
        <h1 class="font-serif text-5xl md:text-7xl text-abbey-midnight leading-[1.05] mt-3">Welcome to Yabbey!</h1>
        <div class="flex items-center gap-3 mt-6 text-abbey-gold max-w-md" aria-hidden="true">
          <span class="h-px w-20 bg-abbey-gold/70"></span><span>&#10022;</span><span class="h-px flex-1 bg-gradient-to-r from-abbey-gold/70 to-transparent"></span>
        </div>
        <p class="font-serif text-xl md:text-2xl italic text-abbey-midnight/80 mt-6">For middle and high school students</p>
      </div>
      <img src="{{ $page->baseUrl }}assets/images/yabbey-logo.png" alt="Yabbey logo: In Pawleys as it is in Heaven"
           class="w-56 md:w-72 mx-auto md:mx-0">
    </div>
  </div>

  {{-- Photos --}}
  <div class="max-w-6xl mx-auto px-6 md:px-12">
    <div class="rounded-2xl overflow-hidden shadow-md">
      @include('_partials.hero-carousel', [
        'slides' => $youthSlides,
        'height' => 'h-[62vw] sm:h-[52vw] md:h-[560px] max-h-[640px]',
        'label' => 'Yabbey photos',
        'noH1' => true,
      ])
    </div>
  </div>

  <div class="max-w-4xl mx-auto px-6 md:px-12 py-16 space-y-16">

    {{-- Who We Are --}}
    <section>
      <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Who We Are</p>
      <p class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-4">
        Yabbey is a ministry for middle and high school students at The Abbey. Our mission is to help students become
        disciples of Jesus by living out our three core values: <em class="text-abbey-green">be with Jesus</em>,
        <em class="text-abbey-green">become like Jesus</em>, and <em class="text-abbey-green">do what Jesus did</em>.
      </p>
      <div class="grid gap-4 sm:grid-cols-3 mt-8">
        @foreach ($values as $n => $name)
          <div class="bg-white/70 border border-abbey-parchment rounded-xl p-6 text-center">
            <p class="font-sans text-xs uppercase tracking-[0.3em] text-abbey-sage">{{ ['One', 'Two', 'Three'][$n] }}</p>
            <h2 class="font-serif text-2xl text-abbey-midnight mt-2">{{ $name }}</h2>
          </div>
        @endforeach
      </div>
    </section>

    {{-- When We Meet --}}
    <section class="bg-abbey-green text-white rounded-2xl px-8 py-10 md:px-12 grid md:grid-cols-[auto_1fr] gap-6 md:gap-12 items-center">
      <div>
        <p class="font-sans text-xs uppercase tracking-[0.3em] text-white/70">When We Meet</p>
        <p class="font-serif text-4xl md:text-5xl mt-2 leading-tight">Sundays<br>5:00&ndash;6:30 PM</p>
      </div>
      <p class="font-serif text-xl leading-relaxed text-white/90">
        Yabbey meets every Sunday from 5:00&ndash;6:30 PM in the <strong class="font-semibold text-white">Pub at The Abbey</strong>.
      </p>
    </section>

    {{-- What We Do --}}
    <section>
      <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">What We Do</p>
      <p class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-4">
        We want to help students grow in their faith, deepen their relationship with Jesus, and learn what it means to
        follow Him in everyday life. Here are some of the ways we pursue discipleship together:
      </p>
      <div class="grid gap-5 sm:grid-cols-2 mt-8">
        @foreach ($ways as [$name, $text])
          <div class="bg-white border border-abbey-parchment rounded-xl p-6 shadow-sm">
            <h3 class="font-serif text-2xl text-abbey-midnight">{{ $name }}</h3>
            <p class="font-sans text-base leading-relaxed text-abbey-midnight/80 mt-2">{{ $text }}</p>
          </div>
        @endforeach
      </div>
    </section>

    {{-- Get Connected --}}
    <section class="text-center bg-white/70 border border-abbey-parchment rounded-2xl px-6 py-12 md:px-12">
      <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Get Connected!</p>
      <p class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-4 max-w-2xl mx-auto">
        Want to learn more about Yabbey, what we do, or how you can be part of what God is doing in the lives of students
        at The Abbey? We would love to hear from you!
      </p>
      <div class="flex flex-wrap justify-center gap-3 mt-8">
        <a href="{{ $email }}" class="inline-block bg-abbey-green text-white font-sans text-sm px-6 py-3 rounded-full hover:opacity-90">Email Peyton</a>
        <a href="{{ $instagram }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 border border-abbey-green text-abbey-green font-sans text-sm px-6 py-3 rounded-full hover:bg-abbey-green hover:text-white">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
          Follow @yabbeypi
        </a>
      </div>
      <p class="font-sans text-sm text-abbey-sage mt-5">Peyton Andreucci, Student Discipleship Pastor</p>
    </section>
  </div>
</div>
@endsection
