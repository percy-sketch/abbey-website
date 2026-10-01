---
extends: _layouts.page
section: body
title: Our Beliefs
centered: true
---

@section('before')
<div class="max-w-6xl mx-auto px-6 md:px-12 pt-10 -mb-8">
  <div class="bg-abbey-sage max-w-[576px] mx-auto">
    <img src="{{ $page->baseUrl }}assets/images/beliefs-scripture.png" alt="1 Corinthians 14:33 — For God is not a God of confusion but of peace, as in all the churches of the saints." class="w-full h-auto">
  </div>
</div>
@endsection

@section('body')
<div class="[&_h2]:mt-6 [&_h2]:mb-3 [&_p]:my-3 [&_hr]:my-6 [&>*:first-child]:mt-0">
<h2>History</h2>
<p>
  The Abbey was planted in 2012 as a Three-Stream, Ancient-Future, Anglican Mission in America Church.
</p>

<hr>

<h2>Vision</h2>
<p>
  Like the Celtic abbeys of old, The Abbey at Pawleys Island desires to transform the world by
  proclaiming the Gospel of Jesus Christ through radical hospitality, cultural engagement, and
  spiritual renewal.
</p>

<hr>

<h2>Beliefs</h2>
<p>
  The Abbey is a parish of
  <a href="https://theamia.org" target="_blank" rel="noopener">The Anglican Mission in America (AMiA)</a>
  and a part of the Worldwide Anglican Communion. The Abbey clergy are licensed for ministry in
  North America by Bishops and Dioceses throughout the Anglican Communion. As an Anglican church,
  The Abbey is both Catholic and Reformed and committed to the Gospel of Jesus Christ as understood
  through the English Reformation. Our beliefs are rooted in the Bible and encapsulated in The Book
  of Common Prayer as well as the historic Nicene and Apostles Creeds. As Ancient-Future Anglicans,
  our theology is based on Scripture and Tradition (Patristic, Medieval, and Reformation) and,
  through Reason, applied for the church today and into the future. We are equally nourished by
  each of the Three Streams of Anglicanism:
</p>

<p>
  <strong class="font-sans text-sm uppercase tracking-wide text-abbey-green">Scripture</strong><br>
  We hold that Scripture guides our lives and is the authority for us, as individuals and for the
  whole Church (known as <em>the evangelical tradition</em>).
</p>

<p>
  <strong class="font-sans text-sm uppercase tracking-wide text-abbey-green">Sacraments</strong><br>
  We believe the sacramental life is embodied in the sacraments instituted by Jesus and entrusted
  to the Church, and in the creeds, practices, liturgies, prayers, and teachings based upon those
  sacraments, that Christians have held throughout the centuries (known as <em>the catholic
  tradition</em>).
</p>

<p>
  <strong class="font-sans text-sm uppercase tracking-wide text-abbey-green">Spirit</strong><br>
  We trust the Holy Spirit is at work today in the Church, in the world, and in each of those who
  confess Jesus as the Son of God, the Christ, manifesting His power and preparing us for ministry
  through the bounty of His gifts (known as <em>the charismatic tradition</em>).
</p>

<hr>

<h2>Worship @ The Abbey</h2>
<p>
  We cannot wait to have you join us on Sundays. It&rsquo;s where you get a sense of who The Abbey
  is and who God has called us to be for our community. We meet at {{ $page->service['time'] }} in the sanctuary for
  this Ancient-Future, Three Stream service. Taking elements from the ancient church liturgies with
  an eye towards life in the contemporary world, this service is centered around the Eucharist
  (Holy Communion) and based on The Book of Common Prayer, filled with evangelical preaching
  focused on the Gospel as understood by the English Reformation, and charismatically expectant
  that the Holy Spirit works in us today in healing, gifting, and empowering. The service lasts
  around 1 hour and 15 minutes.
  <a href="{{ $page->links['facebook'] }}" target="_blank" rel="noopener">Watch on Livestream here.</a>
</p>
</div>
@endsection
