<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? $page->siteName }} &middot; {{ $page->siteName }}</title>
  <meta name="description" content="{{ $description ?? $page->siteDescription }}">
  <link rel="icon" href="{{ $page->baseUrl }}assets/images/abbey-logomark.png">
  <link rel="canonical" href="{{ $page->getUrl() }}">

  {{-- Vite-compiled Tailwind CSS + JS, via the official @tighten/jigsaw-vite-plugin. --}}
  @viteRefresh()
  <link rel="stylesheet" href="{{ vite('source/_assets/css/app.css') }}">
  <script defer type="module" src="{{ vite('source/_assets/js/app.js') }}"></script>
</head>
<body class="antialiased">

  @include('_partials.nav')
  @include('_partials.announcement-bar')

  <main>
    @yield('content')
  </main>

  @include('_partials.footer')

</body>
</html>
