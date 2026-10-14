---
extends: _layouts.master
section: content
title: The Map
description: The Abbey Map — pathways, not programs. Find where you are and where you're going.
---

@section('content')
@php
  // Content from the "Where Am I? Tool". Each stage: the question people are asking,
  // and the steps that answer it. Keep the order: Traveler → Scout → Explorer → Journeyman.
  $stages = [
    [
      'key' => 't', 'letter' => 'T', 'name' => 'The Traveler', 'who' => 'Visitor',
      'summary' => 'New to The Abbey, or new to faith. Come with your questions.',
      'paths' => [
        ['ask' => 'I’m not sure I fully understand what a Christian is and does, but I am looking for a place where I can ask my questions.',
         'steps' => [['Alpha'], ['Coffee with an Abbey “Guide”', 'children’s minister, youth minister, clergy, women’s or men’s ministry leaders']]],
        ['ask' => 'I am looking for a safe place to ask specific questions about The Abbey. What does it believe? What are its vision and values? Who is in leadership?',
         'steps' => [['The Compass', 'printed guide in the pews and at the welcome table'], ['Orientation', '10 minutes after church — sit with one of our clergy or staff and ask questions'], ['Membership Orientation', 'time with our clergy to ask questions and hear what it means to become a member']]],
        ['ask' => 'I’m curious about the kind of people who are at The Abbey. Could I belong here?',
         'steps' => [['Sunday Worship', '10:30 AM'], ['Sunday Family Worship', '4 PM'], ['Supper Clubs'], ['Men’s Quarterly events'], ['Women’s Quarterly events'], ['Christmas Party'], ['Feast Days', 'lunch after church, three times a year']]],
      ],
    ],
    [
      'key' => 's', 'letter' => 'S', 'name' => 'The Scout', 'who' => 'Attender',
      'summary' => 'You’ve been coming for a while and are discerning whether The Abbey is home.',
      'paths' => [
        ['ask' => 'I’m trying to discern if The Abbey is the right congregation for me and my family. What does this church believe? Who is in charge, and how are decisions made? What are The Abbey’s vision and values?',
         'steps' => [['Membership Orientation', 'time with our clergy to ask questions and hear what it means to become a member']]],
        ['ask' => 'I am seeking to get more connected to the community.',
         'steps' => [['Theology on Tap', 'six weeks every fall'], ['Men’s Retreat', 'spring'], ['Women’s Retreat', 'fall'], ['Co-ed Bible Study', 'all year'], ['Men’s Bible Study', 'all year'], ['Women’s Bible Study', 'all year']]],
        ['ask' => 'I am seeking a place for me to serve.',
         'steps' => [['Service Orientation', 'booklet at the welcome table'], ['Conversation with an Abbey “Guide”', 'after reading the Service Orientation, talk with a leader about serving in their area']]],
        ['ask' => 'I am seeking a church that cares for its members — the newcomer, the sick, the new mother, children and youth, those going to college, those walking through grief, weddings and funerals, the shut-in. How do I ask for the care I need?',
         'steps' => [['Care Ministry contact info', 'at the welcome table'], ['Contact us', 'through this website', '/contact']]],
        ['ask' => 'I am seeking to grow in my faith. I want to learn how to apply Biblical truth to my life.',
         'steps' => [['Orientation to our Growth Opportunities', '“Excursions”'], ['Bible Studies', 'all year'], ['Live Your Calling / Discover Your Gifts', 'winter'], ['Health and Healing for Christians', 'spring'], ['Foundations', 'spring'], ['Journey of Restoration', 'fall']]],
      ],
    ],
    [
      'key' => 'e', 'letter' => 'E', 'name' => 'The Explorer', 'who' => 'Member',
      'summary' => 'The Abbey is your home for this season. You’ve decided to grow, attend, and serve here.',
      'paths' => [
        ['ask' => 'I want to explore my calling and gifting and learn how it fits with the body of Christ at The Abbey.',
         'steps' => [['Live Your Calling / Discover Your Gifts']]],
        ['ask' => 'I want to explore how I might steward my time, talents, and treasures for the advancement of the Kingdom.',
         'steps' => [['Stewardship of Your Life']]],
        ['ask' => 'I want to explore new ways to serve.',
         'steps' => [['Service Orientation', 'booklet at the welcome table'], ['Conversation with an Abbey “Guide”', 'talk with a leader about serving in their area']]],
        ['ask' => 'I want to meet with a small group of others exploring their faith.',
         'steps' => [['Join a Small Group']]],
        ['ask' => 'I want to learn to take my thoughts captive and live in joy, peace, and love with others.',
         'steps' => [['Foundations']]],
        ['ask' => 'I want to explore what may be getting in the way of my wholeness — to forgive, reconcile, and grow in spiritual and emotional health.',
         'steps' => [['Health and Healing']]],
      ],
    ],
    [
      'key' => 'j', 'letter' => 'J', 'name' => 'The Journeyman', 'who' => 'The 72 (Apprentices)',
      'summary' => 'You’ve decided to practice your faith — to be equipped, trained, and sent out in Jesus’ name as a lifelong disciple.',
      'paths' => [
        ['ask' => 'I want to discover my gifts, understand where I fit within the body of Christ, and practice the good works He has prepared for me.',
         'steps' => [['Live Your Calling / Discover Your Gifts']]],
        ['ask' => 'I want to practice being part of the Body of Christ — honoring and encouraging others, giving testimony, knowing and being known.',
         'steps' => [['Round Tables']]],
        ['ask' => 'I want to practice my faith at The Abbey.',
         'steps' => [['One-on-one discipleship', 'a commitment to receiving it and offering it'], ['Excursions, including Round Tables', 'a commitment to attending, and to finding where you can lead and serve others']]],
      ],
    ],
  ];
@endphp

  {{-- Hero: big title over the map's own colors. --}}
  <div class="bg-abbey-parchment/60 border-b border-abbey-parchment">
    <div class="max-w-6xl mx-auto px-6 md:px-12 pt-14 pb-10 text-center">
      <p class="font-sans text-xs uppercase tracking-[0.3em] text-abbey-green">Pathways, not programs</p>
      <h1 class="font-serif text-6xl md:text-8xl text-abbey-midnight mt-3 leading-none">The Map</h1>
      <p class="font-serif text-xl md:text-2xl italic text-abbey-midnight/80 mt-5">
        Where are you <span class="underline decoration-abbey-green decoration-2 underline-offset-4">now</span>?
        Where are you <span class="underline decoration-abbey-green decoration-2 underline-offset-4">going</span>?
      </p>
    </div>
  </div>

  <div class="max-w-6xl mx-auto px-6 md:px-12 py-12">
    <a href="{{ $page->baseUrl }}assets/images/abbey-map.jpg" target="_blank" rel="noopener" class="block" title="Open the map full size">
      <img src="{{ $page->baseUrl }}assets/images/abbey-map.jpg"
         alt="The Abbey Map: four interwoven pathways marked T (Traveler), S (Scout), E (Explorer) and J (Journeyman), lined with Abbey gatherings such as Sunday Worship, Alpha, Small Groups, Theology on Tap, Bible studies, retreats, Round Tables, 1-1 Discipleship and The 72."
         class="w-full h-auto rounded-2xl shadow-lg">
    </a>
    <p class="font-sans text-xs text-abbey-sage text-center mt-3 md:hidden">Tap the map to see it full size.</p>

    {{-- How to use it --}}
    <div class="max-w-3xl mx-auto text-center mt-14">
      <h2 class="font-serif text-4xl text-abbey-midnight">How to use the map</h2>
      <p class="font-serif text-lg leading-relaxed text-abbey-midnight/90 mt-4">
        Everyone at The Abbey is somewhere on the journey of following Jesus. The map marks four places
        along the way, and each path is lined with gatherings that help you take your next step.
        Find the place that sounds most like you, read the questions people there are asking,
        and pick one next step.
      </p>
    </div>

    {{-- Journey line: T → S → E → J. Buttons switch the panel below (all panels show without JavaScript). --}}
    <div class="relative mt-12" role="tablist" aria-label="Where are you on the map?" data-map-tabs>
      <div class="absolute left-[12%] right-[12%] top-9 border-t-2 border-dashed border-abbey-sage hidden sm:block" aria-hidden="true"></div>
      <div class="relative grid grid-cols-2 sm:grid-cols-4 gap-6">
        @foreach ($stages as $i => $s)
          <button type="button" role="tab" id="map-tab-{{ $s['key'] }}" aria-controls="map-panel-{{ $s['key'] }}" aria-selected="{{ $i === 0 ? 'true' : 'false' }}" data-map-tab
                  class="group flex flex-col items-center text-center focus:outline-none">
            <span class="flex items-center justify-center w-[72px] h-[72px] rounded-[50%_50%_50%_0] -rotate-45 bg-white border-2 border-abbey-midnight text-abbey-midnight group-aria-selected:bg-abbey-midnight group-aria-selected:text-white group-hover:bg-abbey-midnight group-hover:text-white group-focus-visible:ring-4 group-focus-visible:ring-abbey-gold transition-colors">
              <span class="rotate-45 font-serif text-3xl">{{ $s['letter'] }}</span>
            </span>
            <span class="font-serif text-xl text-abbey-midnight mt-4">{{ $s['name'] }}</span>
            <span class="font-sans text-xs uppercase tracking-wide text-abbey-sage mt-1">{{ $s['who'] }}</span>
          </button>
        @endforeach
      </div>
    </div>

    @foreach ($stages as $i => $s)
      <section id="map-panel-{{ $s['key'] }}" role="tabpanel" aria-labelledby="map-tab-{{ $s['key'] }}" data-map-panel
               class="mt-10 bg-abbey-parchment/25 border border-abbey-parchment rounded-2xl p-6 md:p-10">
        <div class="flex flex-wrap items-baseline gap-x-4 gap-y-1 border-b border-abbey-parchment pb-5">
          <h2 class="font-serif text-3xl md:text-4xl text-abbey-midnight">{{ $s['letter'] }} &middot; {{ $s['name'] }}</h2>
          <span class="font-sans text-sm uppercase tracking-wide text-abbey-green">{{ $s['who'] }}</span>
          <p class="basis-full font-serif text-lg text-abbey-midnight/80 mt-2">{{ $s['summary'] }}</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 mt-6">
          @foreach ($s['paths'] as $path)
            <div class="bg-white rounded-xl p-6 shadow-sm border border-abbey-parchment/60">
              <p class="font-serif text-lg italic leading-snug text-abbey-midnight">&ldquo;{{ $path['ask'] }}&rdquo;</p>
              <p class="font-sans text-xs uppercase tracking-wide text-abbey-green mt-5 mb-2">Next steps</p>
              <ul class="space-y-2">
                @foreach ($path['steps'] as $step)
                  <li class="flex gap-3 font-sans text-sm text-abbey-midnight">
                    <span class="mt-1.5 h-2 w-2 shrink-0 rounded-full bg-abbey-green" aria-hidden="true"></span>
                    <span>
                      @if (! empty($step[2]))
                        <a href="{{ $page->baseUrl }}{{ ltrim($step[2], '/') }}" class="font-semibold text-abbey-green hover:underline">{{ $step[0] }}</a>
                      @else
                        <span class="font-semibold">{{ $step[0] }}</span>
                      @endif
                      @if (! empty($step[1])) <span class="text-abbey-midnight/70">&mdash; {{ $step[1] }}</span> @endif
                    </span>
                  </li>
                @endforeach
              </ul>
            </div>
          @endforeach
        </div>
      </section>
    @endforeach

    <div class="text-center mt-14">
      <p class="font-serif text-2xl text-abbey-midnight">Not sure where you are?</p>
      <p class="font-sans text-sm text-abbey-midnight/80 mt-2 mb-6">Grab coffee with one of our clergy or staff. We&rsquo;d love to help you find your next step.</p>
      <a href="{{ $page->baseUrl }}contact" class="inline-block bg-abbey-green text-white font-sans text-sm px-6 py-3 rounded-full hover:opacity-90">Get in touch</a>
    </div>
  </div>
@endsection
