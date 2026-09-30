---
extends: _layouts.page
section: body
title: Who We Are
---

@section('body')
<p class="lead">
  The Abbey at Pawleys Island is a community of believers passionate about sharing the greatness
  and grace of our Savior Jesus Christ.
</p>
@endsection

@section('after')
<div class="max-w-6xl mx-auto px-6 md:px-12 pb-16 -mt-4">
  <div data-staff-grid class="grid gap-x-6 gap-y-10 sm:grid-cols-3">
    @foreach ($page->staff as $i => $person)
      <div data-staff-item>
        <button type="button" data-staff-card aria-expanded="false" aria-controls="staff-bio-{{ $i }}" class="block w-full text-left group">
          <img src="{{ $page->baseUrl }}assets/images/{{ $person['photo'] }}" alt="{{ $person['name'] }}" loading="lazy" class="w-full aspect-square object-cover group-hover:opacity-90 group-aria-expanded:ring-4 group-aria-expanded:ring-abbey-green">
          <span class="block text-center mt-4">
            <span class="block font-serif text-xl text-abbey-midnight group-hover:text-abbey-green">{{ $person['name'] }}</span>
            <span class="block font-sans text-sm text-abbey-sage mt-1">{{ $person['title'] }}</span>
            <span class="block font-sans text-xs uppercase tracking-wide text-abbey-green mt-2"><span data-staff-label>Read bio</span> <span aria-hidden="true" data-staff-icon>+</span></span>
          </span>
        </button>

        <div id="staff-bio-{{ $i }}" data-staff-bio hidden>
          <h2 class="font-serif text-2xl text-abbey-midnight">{{ $person['fullName'] }}</h2>
          <p class="font-sans text-sm text-abbey-sage mt-1 mb-4">{{ $person['title'] }}</p>
          @foreach ($person['bio'] as $paragraph)
            <p class="font-serif text-lg leading-relaxed text-abbey-midnight/90 mb-4">{{ $paragraph }}</p>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>

  <div class="bg-abbey-sage max-w-3xl mt-14">
    <img src="{{ $page->baseUrl }}assets/images/who-scripture.png" alt="Jeremiah 3:15 — Then I will give you shepherds after my own heart, who will feed you on knowledge and understanding." class="w-full h-auto">
  </div>
</div>
@endsection
