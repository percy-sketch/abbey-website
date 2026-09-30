---
extends: _layouts.page
section: body
title: Page Not Found
---

@section('body')
<p>Sorry, we couldn't find that page.</p>

<p><a href="{{ $page->baseUrl }}" class="btn">Back to Home</a></p>
@endsection
