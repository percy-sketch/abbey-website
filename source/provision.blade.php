---
extends: _layouts.master
section: content
title: Provision
description: Provision is The Abbey's capital campaign to prepare our campus for the people God is bringing through our doors.
noindex: true
---

{{--
  PROVISION campaign page.
  Not linked from the menu on purpose (it is not in 'navigation' in config.php) and marked
  noindex so search engines skip it. To launch it publicly: add it to 'navigation' in
  config.php and remove the noindex line above.
--}}

@section('content')
@php
  $renderings = [
    ['image' => 'provision-rendering-1.jpg', 'position' => 'center 60%',
     'alt' => 'Conceptual rendering of the sanctuary from the street, with the new children and youth wing beyond it'],
    ['image' => 'provision-rendering-2.jpg', 'position' => 'center 60%',
     'alt' => 'Conceptual rendering of the new covered entry, seen from beneath the live oaks'],
    ['image' => 'provision-rendering-3.jpg', 'position' => 'center 55%',
     'alt' => 'Conceptual rendering of the new brick wing set among the live oaks'],
    ['image' => 'provision-rendering-4.jpg', 'position' => 'center 55%',
     'alt' => 'Conceptual rendering of the new gathering space and its outdoor patio'],
    ['image' => 'provision-rendering-5.jpg', 'position' => 'center 50%',
     'alt' => 'Conceptual rendering from above of the enclosed courtyard with its brick inlay'],
  ];

  $needs = [
    ['Nursery', 'Too small for our youngest', 'Our nursery is extremely limited and no longer adequately supports the number of infants and toddlers attending each week.'],
    ['Youth', 'Not accessible to all', 'Our youth gathering space is not handicap accessible, so not every young person can fully take part.'],
    ['Adult Formation', 'A few rooms of about thirty', 'Our adult meeting spaces are limited to only a few rooms that comfortably hold approximately 30 people.'],
    ['Fellowship', 'Nowhere to gather as one', 'Outside the sanctuary, there is no space where the entire church can gather for fellowship, ministry, and formation.'],
  ];

  $plan = [
    ['Children &amp; Youth Wing', 'About 6,000 square feet of classrooms and ministry space for all ages: a nursery, preschool and elementary rooms, a large group room, a youth room, and a welcoming covered entry.'],
    ['Courtyard Enclosure &amp; Kitchen', 'About 1,000 square feet of new gathering space with a serving kitchen, so the whole church can share a meal and be together.'],
    ['Reconfigured Ministry Areas', 'Existing spaces reworked to give us more adult classrooms and offices.'],
    ['Memorial Garden &amp; Columbarium', 'A place of rest on the grounds where members have worshiped.'],
  ];

  $grounds = ['More parking', 'An outdoor worship area', 'An outdoor event area', 'A playground beside the children’s wing'];

  $impact = [
    ['Welcome and disciple young families', 'A nursery and children’s spaces sized for the families arriving each week.'],
    ['Serve children &amp; youth safely', 'Safe, accessible, age-appropriate classrooms, and a youth space every student can reach.'],
    ['Grow adult discipleship &amp; outreach', 'More rooms, and larger ones, for classes, small groups, and ministries that serve Pawleys Island.'],
    ['Gather throughout the week', 'A place where the whole church can be together beyond Sunday morning.'],
  ];

  $email = 'mailto:capers@theabbeypawleysisland.com?' . http_build_query([
    'subject' => 'Provision: I would like more information',
    'body' => "Hi Capers,\n\nI'd like to learn more about Provision.\n\nName:\nPhone:\n",
  ], '', '&', PHP_QUERY_RFC3986);
@endphp

<div class="bg-[#f5f1e6]">
  <div class="h-1.5 bg-abbey-green"></div>

  {{-- Welcome --}}
  <div class="max-w-4xl mx-auto px-6 md:px-12 pt-12 md:pt-16 pb-10 text-center">
    <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">A Capital Campaign of The Abbey</p>
    <img src="{{ $page->baseUrl }}assets/images/provision-logo.png" alt="Provision: Preparing for the Journey"
         class="w-full max-w-xl mx-auto mt-8">
    <div class="flex items-center gap-3 mt-8 text-abbey-gold max-w-sm mx-auto" aria-hidden="true">
      <span class="h-px flex-1 bg-gradient-to-l from-abbey-gold/70 to-transparent"></span><span>&#10022;</span><span class="h-px flex-1 bg-gradient-to-r from-abbey-gold/70 to-transparent"></span>
    </div>
    <p class="font-serif text-xl md:text-2xl italic text-abbey-midnight/85 mt-6 max-w-2xl mx-auto leading-relaxed">
      &ldquo;And my God will supply every need of yours according to his riches in glory in Christ Jesus.&rdquo;
    </p>
    <p class="font-sans text-xs uppercase tracking-[0.3em] text-abbey-sage mt-3">Philippians 4:19</p>
    <a href="{{ $email }}" class="inline-block bg-abbey-green text-white font-sans text-sm px-7 py-3 rounded-full hover:opacity-90 mt-8">Request more information</a>
  </div>

  {{-- Renderings --}}
  <div class="max-w-6xl mx-auto px-6 md:px-12">
    <div class="rounded-2xl overflow-hidden shadow-md">
      @include('_partials.hero-carousel', [
        'slides' => $renderings,
        'height' => 'h-[56vw] sm:h-[48vw] md:h-[520px] max-h-[600px]',
        'label' => 'Conceptual renderings of the Provision building project',
        'noH1' => true,
      ])
    </div>
    <p class="font-sans text-xs uppercase tracking-[0.2em] text-abbey-sage mt-3 text-center">Conceptual renderings &middot; LDD Blueline Architects &middot; design still in progress</p>
  </div>

  <div class="max-w-4xl mx-auto px-6 md:px-12 py-16 space-y-16">

    {{-- Why --}}
    <section>
      <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Why We Need It</p>
      <h1 class="font-serif text-4xl md:text-5xl text-abbey-midnight leading-tight mt-3">Our growth has outgrown our space</h1>
      <p class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-5">
        God has been bringing new people to The Abbey. Growth is a blessing, and it has also revealed real limits in our
        facilities. Every week we feel them in the nursery, in our youth space, in our classrooms, and in the lack of any
        room where the whole church can gather.
      </p>
      <div class="grid gap-5 sm:grid-cols-2 mt-8">
        @foreach ($needs as [$label, $head, $text])
          <div class="bg-white border border-abbey-parchment rounded-xl p-6 shadow-sm">
            <p class="font-sans text-xs uppercase tracking-[0.3em] text-abbey-sage border-b-2 border-abbey-green pb-2">{{ $label }}</p>
            <h3 class="font-serif text-2xl text-abbey-midnight mt-3">{{ $head }}</h3>
            <p class="font-sans text-base leading-relaxed text-abbey-midnight/80 mt-2">{{ $text }}</p>
          </div>
        @endforeach
      </div>
      <p class="font-serif text-2xl md:text-3xl italic text-abbey-green text-center border-y-2 border-abbey-green py-5 mt-10">
        As we live into our vision, we need to provision.
      </p>
    </section>

    {{-- What --}}
    <section>
      <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">What We Hope to Build</p>
      <h2 class="font-serif text-4xl md:text-5xl text-abbey-midnight leading-tight mt-3">A master plan for our campus</h2>
      <p class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-5">
        In response to these needs, The Abbey has worked with LDD Blueline Architects to develop a conceptual master plan
        for our property, extending our existing building among the live oaks.
      </p>
      <ol class="mt-8 space-y-0">
        @foreach ($plan as $i => [$name, $text])
          <li class="grid grid-cols-[2.5rem_1fr] gap-4 border-t border-abbey-sage py-5 {{ $loop->last ? 'border-b' : '' }}">
            <span class="font-serif text-3xl text-abbey-green leading-none">{{ $i + 1 }}</span>
            <div>
              <h3 class="font-serif text-2xl text-abbey-midnight">{!! $name !!}</h3>
              <p class="font-sans text-base leading-relaxed text-abbey-midnight/80 mt-1">{{ $text }}</p>
            </div>
          </li>
        @endforeach
      </ol>
      <div class="bg-abbey-green text-white rounded-2xl px-8 py-8 md:px-10 mt-10">
        <p class="font-sans text-xs uppercase tracking-[0.3em] text-white/70">Around the Grounds</p>
        <ul class="grid sm:grid-cols-2 gap-x-8 gap-y-2 mt-4 font-serif text-xl">
          @foreach ($grounds as $g)
            <li class="flex gap-3"><span class="text-abbey-parchment" aria-hidden="true">&#10022;</span>{{ $g }}</li>
          @endforeach
        </ul>
      </div>
    </section>

    {{-- Impact --}}
    <section>
      <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">What It Makes Possible</p>
      <p class="font-serif text-2xl italic leading-relaxed text-abbey-midnight/90 mt-4">
        This expansion is not simply about adding buildings. It is about creating spaces that enable ministry to flourish
        for generations to come.
      </p>
      <div class="grid gap-5 sm:grid-cols-2 mt-8">
        @foreach ($impact as [$name, $text])
          <div class="bg-white/70 border border-abbey-parchment rounded-xl p-6">
            <h3 class="font-serif text-2xl text-abbey-midnight">{!! $name !!}</h3>
            <p class="font-sans text-base leading-relaxed text-abbey-midnight/80 mt-2">{{ $text }}</p>
          </div>
        @endforeach
      </div>
    </section>

    {{-- Contact --}}
    <section id="contact" class="text-center bg-white/70 border border-abbey-parchment rounded-2xl px-6 py-12 md:px-12">
      <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Learn More</p>
      <h2 class="font-serif text-3xl md:text-4xl text-abbey-midnight mt-3">We would love to talk with you</h2>
      <p class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-4 max-w-2xl mx-auto">
        If you would like more information about Provision, or would like to talk about how you might be part of
        preparing The Abbey for the journey ahead, please reach out.
      </p>
      <a href="{{ $email }}" class="inline-block bg-abbey-green text-white font-sans text-sm px-7 py-3 rounded-full hover:opacity-90 mt-8">Contact Us</a>
      <p class="font-sans text-sm text-abbey-sage mt-5">Capers Barr, Executive Pastor</p>
    </section>
  </div>
</div>
@endsection
