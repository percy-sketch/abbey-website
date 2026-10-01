<section
  data-carousel
  data-interval="9000"
  class="relative bg-abbey-midnight overflow-hidden h-[calc(100svh-7rem)] min-h-[440px] max-h-[900px] group/hero"
  role="region"
  aria-roledescription="carousel"
  aria-label="The Abbey at Pawleys Island"
>
  <div class="absolute inset-0" data-carousel-track>
    @foreach ($page->heroSlides as $i => $slide)
      <div
        data-carousel-slide
        class="absolute inset-0 transition-opacity duration-500 ease-in-out {{ $i === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none' }}"
        role="group"
        aria-roledescription="slide"
        aria-label="{{ $i + 1 }} of {{ count($page->heroSlides) }}"
        @if ($i !== 0) aria-hidden="true" @endif
      >
        <img
          src="{{ $page->baseUrl }}assets/images/{{ $slide['image'] }}"
          alt="{{ $slide['alt'] }}"
          class="w-full h-full object-cover object-left"
          @if ($i !== 0) loading="lazy" @endif
        >

        @if (isset($slide['panel']))
          @php $panel = $slide['panel']; @endphp
          <div class="absolute inset-0 flex items-center justify-center px-4 md:px-8 pb-12 pointer-events-none">
            <div class="w-full max-w-[792px] bg-[#b9aaa1]/90 text-white px-6 pt-8 pb-10 md:px-14 md:pt-10 md:pb-14 md:[clip-path:polygon(0_0,100%_0,100%_100%,12%_100%,0_81%)]">
              <h2 class="font-serif font-semibold text-3xl md:text-6xl text-white leading-tight">{{ $panel['heading'] }}</h2>
              <p class="font-sans font-light text-base md:text-2xl leading-snug md:leading-relaxed mt-3 md:mt-4">{{ $panel['body'] }}</p>
              <p class="font-sans uppercase tracking-wide text-xl md:text-4xl leading-tight mt-5 md:mt-7 {{ count($panel['tagline']) > 1 ? 'font-light text-center' : 'font-semibold' }}">
                @foreach ($panel['tagline'] as $line){{ $line }}@if (!$loop->last)<br>@endif @endforeach
              </p>
            </div>
          </div>
        @endif
      </div>
    @endforeach
  </div>

  <button type="button" data-carousel-prev aria-label="Previous slide"
    class="hidden md:flex absolute left-6 top-1/2 -translate-y-1/2 w-12 h-12 items-center justify-center rounded-full bg-black/40 hover:bg-black/60 text-white opacity-0 group-hover/hero:opacity-100 focus:opacity-100 transition-opacity">
    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
  </button>
  <button type="button" data-carousel-next aria-label="Next slide"
    class="hidden md:flex absolute right-6 top-1/2 -translate-y-1/2 w-12 h-12 items-center justify-center rounded-full bg-black/40 hover:bg-black/60 text-white opacity-0 group-hover/hero:opacity-100 focus:opacity-100 transition-opacity">
    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
  </button>

  <div class="absolute bottom-5 left-0 right-0 flex items-center justify-center gap-3">
    <button type="button" data-carousel-toggle aria-label="Pause slideshow" class="w-8 h-8 flex items-center justify-center rounded-full bg-black/40 hover:bg-black/60 text-white">
      <svg data-icon-pause class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 5h4v14H6zM14 5h4v14h-4z"/></svg>
      <svg data-icon-play class="h-3.5 w-3.5 hidden" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 4l13 8-13 8z"/></svg>
    </button>
    <div class="flex items-center gap-2 bg-black/30 rounded-full px-3 py-2">
      @foreach ($page->heroSlides as $i => $slide)
        <button type="button" data-carousel-dot="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"
          class="w-2.5 h-2.5 rounded-full bg-white/50 aria-[current=true]:bg-white aria-[current=true]:scale-125 transition"
          @if ($i === 0) aria-current="true" @endif></button>
      @endforeach
    </div>
  </div>
</section>
