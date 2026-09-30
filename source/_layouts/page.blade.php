@extends('_layouts.master')

@section('content')
  <div class="bg-abbey-parchment/40 border-b border-abbey-parchment">
    <div class="max-w-4xl mx-auto px-6 md:px-12 py-[18px]">
      <h1 class="section-heading">{{ $page->title }}</h1>
    </div>
  </div>

  <article class="max-w-3xl mx-auto px-6 md:px-12 py-14 prose prose-lg font-serif prose-headings:font-serif prose-headings:text-abbey-midnight prose-a:text-abbey-green">
    @yield('body')
  </article>

  @yield('after')
@endsection
