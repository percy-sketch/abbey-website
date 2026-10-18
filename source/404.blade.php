---
extends: _layouts.page
section: body
title: Page Not Found
permalink: 404.html
---

@section('body')
{{--
  GitHub Pages shows this page for any address that doesn't exist. Before showing "not found",
  it checks whether the address is from the old website (e.g. Give.html, Weddings---Events.html,
  /sermon/141/...) and, if so, forwards the visitor to the matching new page. Matching ignores
  capital letters, ".html" and trailing slashes. To add an old address, add a line to `old`.
--}}
<script>
(function () {
  var streams = 'https://www.youtube.com/channel/UCJHaxh7fG-EkC2W3a6LZacg/streams';
  var old = {
    'index': '/', 'home': '/', 'default': '/', 'worship-with-us': '/', 'welcome': '/',
    'who-we-are': '/who-we-are', 'about': '/who-we-are', 'about-us': '/who-we-are',
    'our-story': '/who-we-are', 'our-history': '/who-we-are', 'history': '/who-we-are',
    'our-beliefs': '/our-beliefs', 'beliefs': '/our-beliefs', 'what-we-believe': '/our-beliefs',
    'our-team': '/our-team', 'leadership': '/our-team', 'leadership-team': '/our-team',
    'staff': '/our-team', 'our-staff': '/our-team', 'clergy': '/our-team',
    'the-map': '/the-map', 'map': '/the-map',
    'latest-news': '/latest-news', 'news': '/latest-news', 'waypoint': '/latest-news', 'waypoints': '/latest-news', 'newsletter': '/latest-news',
    'calendar': '/calendar', 'events-calendar': '/calendar',
    'weddings---events': '/weddings-events', 'weddings-events': '/weddings-events', 'weddings-and-events': '/weddings-events',
    'weddings': '/weddings-events', 'events': '/weddings-events',
    'contact': '/contact', 'contact-us': '/contact', 'connect': '/contact', 'get-in-touch': '/contact',
    'give': '/give', 'giving': '/give', 'donate': '/give',
    'sermons': streams, 'sermon': streams, 'media': streams,
    'watch': '/live-stream', 'live': '/live-stream', 'livestream': '/live-stream', 'live-stream': '/live-stream'
  };
  var path = location.pathname.toLowerCase().replace(/\.html?$/, '').replace(/\/+$/, '').replace(/^\/+/, '');
  var first = path.split('/')[0];
  var dest = old[path] || old[first];
  if (dest) location.replace(dest + (dest.charAt(0) === '/' ? location.search + location.hash : ''));
})();
</script>

<p>Sorry, we couldn't find that page.</p>

<p class="not-prose"><a href="{{ $page->baseUrl }}" class="btn">Back to Home</a></p>
@endsection
