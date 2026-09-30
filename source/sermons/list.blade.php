---
extends: _layouts.master
section: content
title: Sermons
pagination:
  collection: sermons
  perPage: 50
---

@section('content')
@include('_partials.sermons-header', ['view' => 'list'])

<div class="max-w-5xl mx-auto px-6 md:px-12 py-14 overflow-x-auto">
  <table class="w-full text-left font-sans text-sm">
    <thead>
      <tr class="border-b-2 border-abbey-green text-abbey-midnight">
        <th class="py-3 pr-6 font-semibold whitespace-nowrap">Date</th>
        <th class="py-3 pr-6 font-semibold">Title</th>
        <th class="py-3 font-semibold">Speaker</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pagination->items as $sermon)
        <tr class="border-b border-abbey-parchment odd:bg-abbey-parchment/20">
          <td class="py-3 pr-6 whitespace-nowrap text-abbey-sage">
            {{ date('m/d/Y', is_numeric($sermon->date) ? $sermon->date : strtotime($sermon->date)) }}
          </td>
          <td class="py-3 pr-6">
            <a href="{{ $sermon->getUrl() }}" class="font-serif text-base text-abbey-midnight hover:text-abbey-green">{{ $sermon->title }}</a>
          </td>
          <td class="py-3 text-abbey-sage">{{ $sermon->speaker }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@include('_partials.sermons-pagination')
@endsection
