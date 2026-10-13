---
extends: _layouts.master
section: content
title: Calendar
---

@section('content')
@php
  // Embedded Google Calendar: month grid on larger screens, a simple list of upcoming
  // events on phones. Events are edited in Google Calendar, never here.
  $cal = 'https://calendar.google.com/calendar/embed?' . http_build_query([
      'src' => $page->publicCalendar,
      'ctz' => 'America/New_York',
      'showTitle' => 0, 'showPrint' => 0, 'showCalendars' => 0, 'showTz' => 0,
  ]);
  $subscribe = 'https://calendar.google.com/calendar/render?cid=' . rawurlencode($page->publicCalendar);
@endphp
  <div class="bg-abbey-parchment/40 border-b border-abbey-parchment">
    <div class="max-w-6xl mx-auto px-6 md:px-12 py-[18px]">
      <h1 class="section-heading">{{ $page->title }}</h1>
    </div>
  </div>

  <div class="max-w-6xl mx-auto px-6 md:px-12 py-14">
    <div class="hidden md:block rounded-2xl overflow-hidden shadow-md border border-abbey-parchment">
      <iframe src="{{ $cal }}&amp;mode=MONTH" title="The Abbey calendar (month view)" class="w-full h-[720px]" frameborder="0" scrolling="no" loading="lazy"></iframe>
    </div>
    <div class="md:hidden rounded-2xl overflow-hidden shadow-md border border-abbey-parchment">
      <iframe src="{{ $cal }}&amp;mode=AGENDA" title="The Abbey calendar (upcoming events)" class="w-full h-[600px]" frameborder="0" loading="lazy"></iframe>
    </div>

    <p class="font-sans text-sm text-abbey-sage text-center mt-6">
      <a href="{{ $subscribe }}" target="_blank" rel="noopener" class="text-abbey-green hover:underline">Add this calendar to your Google Calendar &rarr;</a>
    </p>
  </div>
@endsection
