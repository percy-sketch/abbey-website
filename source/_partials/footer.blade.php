<footer class="bg-abbey-midnight text-white">
  <div class="max-w-6xl mx-auto px-6 md:px-12 py-12 grid gap-10 md:grid-cols-3">
    <div>
      <img src="{{ $page->baseUrl }}assets/images/abbey-logo-white.png" alt="The Abbey at Pawleys Island" class="h-10 w-auto mb-4">
      <p class="font-sans text-sm text-abbey-parchment">{{ $page->siteDescription }}</p>
    </div>

    <div class="font-sans text-sm space-y-2">
      <h3 class="text-white uppercase tracking-wide text-xs mb-3">Visit</h3>
      <p>{{ $page->contact['address'] }}</p>
      <p><a href="tel:{{ $page->contact['phoneHref'] }}" class="hover:text-abbey-sage">{{ $page->contact['phone'] }}</a></p>
      <p><a href="mailto:{{ $page->contact['email'] }}" class="hover:text-abbey-sage">{{ $page->contact['email'] }}</a></p>
      <p>{{ $page->service['day'] }} at {{ $page->service['time'] }}</p>
    </div>

    <div class="font-sans text-sm space-y-3">
      <h3 class="text-white uppercase tracking-wide text-xs mb-3">Connect</h3>
      <div class="flex gap-4">
        <a href="{{ $page->links['facebook'] }}" target="_blank" rel="noopener" class="hover:text-abbey-sage">Facebook</a>
        <a href="{{ $page->links['instagram'] }}" target="_blank" rel="noopener" class="hover:text-abbey-sage">Instagram</a>
        <a href="{{ $page->links['youtube'] }}" target="_blank" rel="noopener" class="hover:text-abbey-sage">YouTube</a>
      </div>
      <a href="{{ $page->links['myAbbey'] }}" target="_blank" rel="noopener" class="block mt-4 hover:text-abbey-sage">My Abbey (member portal) &rarr;</a>
      <a href="{{ $page->links['give'] }}" target="_blank" rel="noopener" class="block hover:text-abbey-sage">Give online &rarr;</a>
    </div>
  </div>

  <div class="border-t border-white/10 py-4 text-center font-sans text-xs text-abbey-parchment">
    &copy; {{ date('Y') }} The Abbey at Pawleys Island
  </div>
</footer>
