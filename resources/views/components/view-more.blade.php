@props([
  'href' => null,
  'label' => 'Xem thêm',
])

@if ($href)
  <a {{ $attributes->class(['view-more']) }} href="{{ $href }}">
    {{ $label }}
    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 12h18m-6-6 6 6-6 6"/></svg>
  </a>
@else
  <button {{ $attributes->class(['view-more']) }} type="button" aria-disabled="true">
    {{ $label }}
    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 12h18m-6-6 6 6-6 6"/></svg>
  </button>
@endif
