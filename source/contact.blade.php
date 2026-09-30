---
extends: _layouts.page
section: body
title: Contact
---

<p class="lead">We'd love to hear from you.</p>

<p>
  {{ $page->contact['address'] }}<br>
  <a href="tel:{{ $page->contact['phoneHref'] }}">{{ $page->contact['phone'] }}</a><br>
  <a href="mailto:{{ $page->contact['email'] }}">{{ $page->contact['email'] }}</a>
</p>

{{--
  The blog starter template ships a contact-form example that posts to a
  server-side handler. GitHub Pages can't run that handler, so this scaffold
  intentionally leaves the form out rather than ship something that silently
  fails — see README.md "Contact form" for the two easy ways to add one back
  (Formspree, or a plain mailto: link like above) once the church decides.
--}}
