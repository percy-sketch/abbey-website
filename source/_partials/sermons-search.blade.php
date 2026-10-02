<div class="max-w-6xl mx-auto px-6 md:px-12 pt-6">
  <label for="sermon-search" class="sr-only">Search sermons</label>
  <input
    id="sermon-search"
    type="search"
    data-sermon-search
    data-view="{{ $view }}"
    placeholder="Search by title, speaker, or date&hellip;"
    autocomplete="off"
    class="w-full sm:max-w-md font-sans text-sm border border-abbey-sage rounded-lg px-4 py-2 bg-white focus:outline-none focus:border-abbey-green"
  >
  <p data-search-status class="font-sans text-xs text-abbey-sage mt-2 min-h-[1rem]" aria-live="polite"></p>
</div>

<script type="application/json" id="sermon-index">{!! json_encode($sermons->map(function ($s) {
  $ts = is_numeric($s->date) ? $s->date : strtotime($s->date);
  return [
    't' => $s->title,
    's' => $s->speaker,
    'u' => $s->getUrl(),
    'y' => $s->youtube_id,
    'l' => date('F j, Y', $ts),
    'n' => date('m/d/Y', $ts),
    'i' => date('Y-m-d', $ts),
  ];
})->values()->all(), JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>

<div data-search-results hidden></div>
