---
extends: _layouts.master
section: content
title: Our Beliefs
description: Who we are and what we believe — an Ancient-Future, Three-Stream Anglican church in Pawleys Island, SC.
---

@section('content')
{{--
  Built from pages 3–5 of The Abbey's Orientation Booklet (chapter numbers dropped for the web),
  plus the History, Vision and Worship text that was already on this page.
  Icons and the vine are the booklet's own artwork.
--}}
@php
  $ornament = '<div class="flex items-center justify-center gap-3 text-abbey-gold" aria-hidden="true"><span class="h-px w-20 bg-current opacity-70"></span><span>&#10022;</span><span class="h-px w-20 bg-current opacity-70"></span></div>';
  $pillars = [
    ['icon-bible.png', 'Scripture for All People', 'God’s Word, read and proclaimed in the language of the people—so that everyone may hear, understand and follow.'],
    ['icon-hill.png', 'Faithful Teaching', 'Clergy entrusted to teach the true Christian faith—the good news handed down from the apostles. A community called to equip the saints for the work of ministry as a priesthood of believers.'],
    ['icon-chalice.png', 'Worship that Connects', 'Worship shaped by the <em>Book of Common Prayer</em>—a liturgical pattern that draws hearts near to God and helps form us as faithful followers of Jesus Christ in this world and beyond.'],
  ];
  $streams = [
    ['Scripture', 'icon-bible.png', 'the evangelical tradition', 'We are formed by the living Word—Jesus Christ—revealed and proclaimed in the Holy Scriptures, the authority for our lives and for the whole Church.'],
    ['Sacrament', 'icon-chalice.png', 'the catholic tradition', 'We receive the historic faith and the means of grace—the sacraments—handed down through the ages, with the creeds, prayers, and liturgies Christians have held for centuries.'],
    ['Spirit', 'icon-dove.png', 'the charismatic tradition', 'We depend on the Spirit’s living presence and power—transforming us, giving gifts, and empowering us for mission.'],
  ];
@endphp

<div class="bg-[#f5f1e6]">
  <div class="h-1.5 bg-abbey-green"></div>

  {{-- Who we are & what we believe --}}
  <section class="max-w-4xl mx-auto px-6 md:px-12 pt-14 md:pt-20 pb-16 text-center">
    <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Our Beliefs</p>
    <h1 class="font-serif text-5xl md:text-6xl text-abbey-midnight leading-tight mt-3">Who We Are &amp;<br>What We Believe</h1>
    <div class="mt-6">{!! $ornament !!}</div>
    <p class="font-serif text-xl md:text-2xl leading-relaxed text-abbey-midnight/90 mt-8">
      We are <strong class="text-abbey-green">orthodox Protestant Christians</strong>&mdash;creedal believers who confess the
      historic faith of the Church&mdash;and we are <strong class="text-abbey-green">Anglicans</strong>, part of the
      third-largest Christian tradition in the world.
    </p>

    <div class="grid gap-5 md:grid-cols-3 mt-12 text-left">
      @foreach ($pillars as [$icon, $title, $text])
        <div class="bg-[#faf8f1] border border-abbey-parchment rounded-xl p-6">
          <img src="{{ $page->baseUrl }}assets/images/{{ $icon }}" alt="" class="h-16 w-auto">
          <h2 class="font-sans text-sm font-semibold uppercase tracking-[0.2em] text-abbey-midnight mt-5">{{ $title }}</h2>
          <p class="font-serif text-lg leading-relaxed text-abbey-midnight/85 mt-2">{!! $text !!}</p>
        </div>
      @endforeach
    </div>

    {{-- History & vision, from the original page --}}
    <div class="grid gap-5 md:grid-cols-2 mt-5 text-left">
      <div class="bg-[#faf8f1] border border-abbey-parchment rounded-xl p-6">
        <h2 class="font-sans text-sm font-semibold uppercase tracking-[0.2em] text-abbey-midnight">Our Story</h2>
        <p class="font-serif text-lg leading-relaxed text-abbey-midnight/85 mt-2">
          The Abbey was planted in 2012 as a Three-Stream, Ancient-Future, Anglican Mission in America church.
        </p>
      </div>
      <div class="bg-[#faf8f1] border border-abbey-parchment rounded-xl p-6">
        <h2 class="font-sans text-sm font-semibold uppercase tracking-[0.2em] text-abbey-midnight">Our Vision</h2>
        <p class="font-serif text-lg leading-relaxed text-abbey-midnight/85 mt-2">
          Like the Celtic abbeys of old, we desire to transform the world by proclaiming the Gospel of Jesus Christ through
          radical hospitality, cultural engagement, and spiritual renewal.
        </p>
      </div>
    </div>
  </section>

  {{-- An Ancient-Future Faith --}}
  <section class="relative overflow-hidden bg-abbey-midnight text-[#f5f1e6]">
    <img src="{{ $page->baseUrl }}assets/images/beliefs-vine.png" alt="" aria-hidden="true"
         class="pointer-events-none select-none absolute -left-6 bottom-0 w-32 md:w-44 opacity-[0.15]">
    <div class="relative max-w-4xl mx-auto px-6 md:px-12 py-16 md:py-20 text-center">
      <h2 class="font-serif text-4xl md:text-5xl text-[#f5f1e6]">An Ancient-Future Faith</h2>
      <div class="mt-6">{!! $ornament !!}</div>
      <p class="font-serif text-xl leading-relaxed text-[#f5f1e6]/90 mt-8">
        Anglicanism was forged in the turbulence of the sixteenth century. Reformers&mdash;among them the martyrs
        <em class="text-abbey-gold">Cranmer, Latimer, and Ridley</em>&mdash;gave their lives to recover the gospel, embracing the
        great convictions of the Reformation while retaining the deep, catholic roots of the ancient Church.
      </p>

      <div class="grid gap-5 md:grid-cols-2 mt-10 text-left">
        <div class="border border-white/15 bg-white/5 rounded-xl p-6">
          <h3 class="font-sans text-xs font-semibold uppercase tracking-[0.2em] text-abbey-gold">Recovered in the Reformation</h3>
          <ul class="font-serif text-lg leading-relaxed mt-3 space-y-2">
            <li><em>Sola Scriptura</em> &mdash; Scripture alone as our final authority.</li>
            <li><em>Sola Gratia</em> &mdash; saved by grace, not by works.</li>
            <li>The priesthood of <em>all</em> believers.</li>
          </ul>
        </div>
        <div class="border border-white/15 bg-white/5 rounded-xl p-6">
          <h3 class="font-sans text-xs font-semibold uppercase tracking-[0.2em] text-abbey-gold">Retained from the Ancients</h3>
          <ul class="font-serif text-lg leading-relaxed mt-3 space-y-2">
            <li>A true <em>catholicity</em>&mdash;the faith of the whole Church.</li>
            <li><em>Creedal</em>, not narrowly doctrinaire.</li>
            <li>Governed by wise, historic order.</li>
          </ul>
        </div>
      </div>

      <h3 class="font-display text-3xl text-abbey-gold mt-14">The Via Media &mdash; the Middle Way</h3>
      <p class="font-serif text-lg text-[#f5f1e6]/85 mt-3">With Richard Hooker, we hold together three gifts God has given for knowing and following him:</p>
      <div class="grid grid-cols-3 gap-3 md:gap-5 max-w-2xl mx-auto mt-6">
        @foreach (['Scripture' => 'border-abbey-gold', 'Tradition' => 'border-abbey-teal', 'Reason' => 'border-abbey-sage'] as $gift => $line)
          <div class="bg-white/5 border-t-4 {{ $line }} py-5 font-serif text-xl md:text-2xl">{{ $gift }}</div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- The Three-Stream Church --}}
  <section class="max-w-4xl mx-auto px-6 md:px-12 py-16 md:py-20 text-center">
    <h2 class="font-serif text-4xl md:text-5xl text-abbey-midnight">The Three-Stream Church</h2>
    <div class="mt-6">{!! $ornament !!}</div>
    <p class="font-serif text-xl leading-relaxed text-abbey-midnight/90 mt-8">
      As a parish of the
      <a href="https://theamia.org" target="_blank" rel="noopener" class="font-semibold text-abbey-green hover:underline">Anglican Mission in America</a>
      and part of the worldwide Anglican Communion, our life flows from three streams of the one Triune God&mdash;held
      together, not chosen between.
    </p>

    <div class="mt-10 text-left bg-[#faf8f1] border border-abbey-parchment rounded-xl divide-y divide-abbey-parchment">
      @foreach ($streams as [$name, $icon, $tradition, $text])
        <div class="grid grid-cols-[4.5rem_1fr] md:grid-cols-[10rem_6rem_1fr] items-center gap-x-5 gap-y-2 p-6">
          <div class="md:order-2 row-span-2 md:row-span-1"><img src="{{ $page->baseUrl }}assets/images/{{ $icon }}" alt="" class="w-16 md:w-20 h-auto"></div>
          <div class="md:order-1">
            <h3 class="font-display text-3xl text-abbey-green">{{ $name }}</h3>
          </div>
          <p class="md:order-3 col-start-2 md:col-start-auto font-serif text-lg leading-relaxed text-abbey-midnight/85">{{ $text }}</p>
        </div>
      @endforeach
    </div>

    <p class="font-serif text-lg leading-relaxed text-abbey-midnight/80 mt-8">
      Our beliefs are rooted in the Bible and summarized in <em>The Book of Common Prayer</em> and the historic Nicene and Apostles&rsquo; Creeds.
    </p>
    <p class="font-serif text-2xl md:text-3xl italic text-abbey-midnight/75 mt-8">
      A <strong class="not-italic font-semibold text-abbey-green">mission society</strong>, not merely a diocese&mdash;<br class="hidden md:inline">
      sent out together for the sake of the harvest.
    </p>
  </section>

  {{-- Worship @ The Abbey --}}
  <section class="max-w-4xl mx-auto px-6 md:px-12 pb-16">
    <div class="bg-[#faf8f1] border border-abbey-parchment rounded-xl overflow-hidden">
      <div class="grid md:grid-cols-[1fr_15rem]">
        <div class="p-8 md:p-10">
          <p class="font-sans text-sm uppercase tracking-[0.3em] text-abbey-gold">Join us Sundays</p>
          <h2 class="font-serif text-4xl text-abbey-midnight mt-2">Worship @ The Abbey</h2>
          <p class="font-serif text-lg leading-relaxed text-abbey-midnight/85 mt-4">
            We cannot wait to have you join us on Sundays. It&rsquo;s where you get a sense of who The Abbey is and who God has
            called us to be for our community. Taking elements from the ancient church liturgies with an eye toward life in the
            contemporary world, our Ancient-Future, Three-Stream service is centered on the Eucharist (Holy Communion) and based on
            <em>The Book of Common Prayer</em>, filled with evangelical preaching focused on the Gospel as understood by the English
            Reformation, and charismatically expectant that the Holy Spirit works in us today in healing, gifting, and empowering.
          </p>
          <div class="border-t border-abbey-parchment mt-6 pt-6">
            <p class="font-sans text-xs uppercase tracking-[0.3em] text-abbey-gold">Sundays at 4 PM</p>
            <h3 class="font-serif text-2xl text-abbey-midnight mt-1">Family Worship</h3>
            <p class="font-serif text-lg leading-relaxed text-abbey-midnight/85 mt-2">
              Family Worship is about formation over formality, participation over perfection. Students and families serving
              alongside clergy makes this casual, hour-long service meaningful and fun.
            </p>
          </div>
          <div class="flex flex-wrap gap-3 mt-6">
            <a href="{{ $page->baseUrl }}live-stream" class="inline-block bg-abbey-green text-white font-sans text-sm px-5 py-3 rounded-full hover:opacity-90">Watch the live stream</a>
            <a href="{{ $page->baseUrl }}contact" class="inline-block border border-abbey-green text-abbey-green font-sans text-sm px-5 py-3 rounded-full hover:bg-abbey-green hover:text-white">Plan your visit</a>
          </div>
        </div>
        <dl class="bg-abbey-green text-white p-8 md:p-10 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-1 gap-6 content-center font-sans">
          <div><dt class="text-xs uppercase tracking-[0.2em] text-white/70">When</dt><dd class="font-serif text-xl mt-1">{{ $page->service['day'] }}, {{ $page->service['time'] }}</dd></div>
          <div><dt class="text-xs uppercase tracking-[0.2em] text-white/70">Where</dt><dd class="font-serif text-xl mt-1">The sanctuary</dd></div>
          <div><dt class="text-xs uppercase tracking-[0.2em] text-white/70">Length</dt><dd class="font-serif text-xl mt-1 leading-snug">10:30 AM: about 1&frac14; hrs<br>4 PM: about 1 hr</dd></div>
        </dl>
      </div>
    </div>
  </section>

  {{-- Closing verse, in the same quote style as Luke 10:2 on the Who We Are page --}}
  <section class="max-w-4xl mx-auto px-6 md:px-12 pb-20">
    <blockquote class="bg-abbey-sage/10 border-l-4 border-abbey-green px-6 md:px-8 py-7">
      <p class="font-serif text-2xl italic leading-snug text-abbey-midnight">
        &ldquo;For God is not a God of confusion but of peace, as in all the churches of the saints.&rdquo;
      </p>
      <footer class="font-sans text-xs uppercase tracking-[0.3em] text-abbey-sage mt-4">
        <a href="https://www.biblegateway.com/passage/?search=1%20Corinthians%2014%3A33&amp;version=ESV" target="_blank" rel="noopener" class="hover:text-abbey-green">1 Corinthians 14:33</a>
      </footer>
    </blockquote>
  </section>
</div>
@endsection
