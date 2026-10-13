<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $page->title ?? $page->siteName }} &middot; {{ $page->siteName }}</title>
  <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">
  <link rel="icon" href="{{ $page->baseUrl }}assets/images/abbey-logomark.png">
  <link rel="canonical" href="{{ $page->getUrl() }}">

  {{-- Vite-compiled Tailwind CSS + JS, via the official @tighten/jigsaw-vite-plugin. --}}
  {{-- vite() returns root-relative paths; prefix baseUrl so the site also works from a subfolder. --}}
  @php $asset = fn ($u) => str_starts_with($u, '/') ? rtrim($page->baseUrl, '/') . $u : $u; @endphp
  @viteRefresh()
  <link rel="stylesheet" href="{{ $asset(vite('source/_assets/css/app.css')) }}">
  <script defer type="module" src="{{ $asset(vite('source/_assets/js/app.js')) }}"></script>
</head>
<body class="antialiased">

  {{-- The whole site is one centered column (max-w-6xl) on a white page, so on wide
       screens every band — header, announcement bar, title band, hero, footer — stops
       at the column edge and leaves white gutters either side. --}}
  <div class="max-w-6xl mx-auto bg-white min-h-screen flex flex-col shadow-[0_0_32px_rgba(0,0,0,0.10)]">
    @include('_partials.nav')
    @include('_partials.announcement-bar')

    <main class="flex-1">
      @yield('content')
    </main>

    @include('_partials.footer')
  </div>

</body>
</html>
