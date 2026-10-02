---
extends: _layouts.page
section: body
title: Weddings + Events
centered: true
---

@section('body')
<p>
  Marriage is one of the Christian rites that the Anglican 39 Articles say are &ldquo;commonly called sacraments.&rdquo;
</<p>
</p>
  St. Paul calls marriage a &ldquo;mystery&rdquo; or &ldquo;sacrament&rdquo; and says that the union between a husband and a wife in
  marriage points to the union of Christ and His Church. Our campus is beautiful and we
  are delighted to share it for weddings and other special events at The Abbey and
  consider it a joy and a privilege to minister to families from our parish and beyond
  through the mystery of marriage. As with all our sacraments and ministries, 
</<p>
</p>
  The Abbey provides oversight for all weddings that take place in our church and one of our clergy
  presides over every wedding ceremony. Reach out for more information and/or to enquire
  about using our space for a wedding or event.
</p>
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
    <a href="mailto:{{ $page->contact['email'] }}" class="btn">Enquire by Email</a>
  </p>
</div>
@endsection
