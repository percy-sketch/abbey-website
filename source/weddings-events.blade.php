---
extends: _layouts.page
section: body
title: Weddings + Events
centered: true
---

@section('body')
<div class="not-prose font-serif text-xl md:text-2xl leading-relaxed text-abbey-midnight/90 space-y-6">
  <p>
    St. Paul calls marriage a &ldquo;mystery&rdquo; and says that the union between a husband and a wife
    points to the union of Christ and His Church.
  </p>
  <p>
    Our campus is beautiful, and we are delighted to share it for weddings and other special events.
    We consider it a joy and a privilege to minister to families from our parish and beyond through the
    mystery of marriage.
  </p>
  <p>
    As with all our ministries, The Abbey provides oversight for every wedding that takes place in our
    church, and one of our clergy presides over each ceremony. Reach out for more information or to ask
    about using our space for a wedding or event.
  </p>
</div>
@endsection

@section('after')
<div class="max-w-6xl mx-auto px-6 md:px-12 pb-14 -mt-4">
  <div class="grid gap-6 sm:grid-cols-3">
    <img src="{{ $page->baseUrl }}assets/images/wedding-1.jpg" alt="A wedding at The Abbey" class="w-full aspect-[3/2] object-cover rounded-2xl">
    <div class="aspect-[3/2] bg-abbey-sage flex items-center justify-center rounded-2xl overflow-hidden">
      <img src="{{ $page->baseUrl }}assets/images/weddings-scripture.png" alt="Philippians 4:4 — Rejoice in the Lord always; again I will say, rejoice." class="w-full h-full object-contain">
    </div>
    <img src="{{ $page->baseUrl }}assets/images/wedding-2.jpg" alt="A wedding at The Abbey" class="w-full aspect-[3/2] object-cover rounded-2xl">
  </div>

  <p class="text-center mt-10">
    <a href="mailto:{{ $page->contact['weddingsEmail'] }}?subject={{ rawurlencode('Wedding / event inquiry') }}" class="btn">Ask about Weddings/Events</a>
  </p>
</div>
@endsection
