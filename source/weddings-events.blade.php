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
    {{-- Same quote style as Luke 10:2 (Who We Are) and 1 Corinthians 14:33 (Our Beliefs). --}}
    <blockquote class="sm:aspect-[3/2] flex flex-col justify-center bg-abbey-sage/10 border-l-4 border-abbey-green rounded-r-2xl px-6 md:px-8 py-7">
      <p class="font-serif text-2xl italic leading-snug text-abbey-midnight">
        &ldquo;Rejoice in the Lord always; again I will say, rejoice.&rdquo;
      </p>
      <footer class="font-sans text-xs uppercase tracking-[0.3em] text-abbey-sage mt-4">
        <a href="https://www.biblegateway.com/passage/?search=Philippians%204%3A4&amp;version=ESV" target="_blank" rel="noopener" class="hover:text-abbey-green">Philippians 4:4</a>
      </footer>
    </blockquote>
    <img src="{{ $page->baseUrl }}assets/images/wedding-2.jpg" alt="A wedding at The Abbey" class="w-full aspect-[3/2] object-cover rounded-2xl">
  </div>

  <p class="text-center mt-10">
    <a href="mailto:{{ $page->contact['weddingsEmail'] }}?subject={{ rawurlencode('Wedding / event inquiry') }}" class="btn">Ask about Weddings/Events</a>
  </p>
</div>
@endsection
