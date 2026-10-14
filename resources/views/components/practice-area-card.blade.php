@props([
  'image',
  'title',
  'description' => '',
  'icon' => null,
  'href' => null,
  'imageAlt' => '',
])

<article {{ $attributes->class(['practice-area-card']) }}>
  <img class="practice-area-card-image" src="{{ $image }}" alt="{{ $imageAlt }}" loading="lazy" width="390" height="130">
  <div class="practice-area-card-body">
    @if ($icon)
      <span class="practice-area-card-icon" aria-hidden="true"><img src="{{ $icon }}" alt="" width="20" height="20" loading="lazy"></span>
    @endif
    <div>
      <h3>
        @if ($href)
          <a class="practice-area-card-link" href="{{ $href }}">{{ $title }}</a>
        @else
          {{ $title }}
        @endif
      </h3>
      @if ($description)
        <p>{{ $description }}</p>
      @endif
    </div>
  </div>
</article>
