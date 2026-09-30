---
extends: _layouts.page
section: body
title: Give
---

@section('body')
<p class="lead">
  Thank you for supporting the ministry of The Abbey. Giving is handled securely through
  OnRealm, off this site.
</p>

<p>
  <a href="{{ $page->links['give'] }}" target="_blank" rel="noopener" class="btn">Give Online</a>
</p>
@endsection
