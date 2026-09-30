{{--
  On the printed mockup review (abbeyweb.pdf), the "JOIN US SUNDAYS" strip
  was marked "Should be right at the top" — it had been buried at the
  bottom of the homepage. Placing it here, directly under the nav on every
  page, addresses that note site-wide rather than just on the homepage.
--}}
<div class="bg-abbey-green text-white text-center py-2 px-4 font-sans text-sm tracking-wide uppercase">
  Join us {{ $page->service['day'] }} at {{ $page->service['time'] }} &middot; {{ $page->contact['address'] }}
</div>
