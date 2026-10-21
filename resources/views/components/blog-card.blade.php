@props([
  'image',
  'title',
  'description' => '',
  'date' => null,
  'href' => null,
  'imageAlt' => '',
])

@if ($href)
<a href="{{ $href }}" {{ $attributes->class(['blog-card']) }}>
@else
<article {{ $attributes->class(['blog-card']) }}>
@endif
  <div class="blog-card-image">
    <img src="{{ $image }}" alt="{{ $imageAlt }}" width="292" height="200" loading="lazy">
  </div>
  <div class="blog-card-body">
    <h3>{{ $title }}</h3>
    @if ($description)
      <p class="blog-card-description">{{ $description }}</p>
    @endif
    <div class="blog-card-meta">
      @if ($date)
        <span class="blog-card-date">
          <img src="{{ asset('assets/icons/10156100 1.svg') }}" alt="" width="14" height="14" loading="lazy">
          <time datetime="{{ \Illuminate\Support\Carbon::parse($date)->format('Y-m-d') }}">{{ \Illuminate\Support\Carbon::parse($date)->format('d/m/Y') }}</time>
        </span>
      @endif
      @if ($href)
        <span class="blog-card-detail">Xem chi tiết <span aria-hidden="true"></span><img src="{{ asset('assets/icons/Vector.svg') }}" alt="" width="8" height="15" loading="lazy"></span>
      @else
        <button class="blog-card-detail" type="button" aria-disabled="true">Xem chi tiết <span aria-hidden="true"></span><img src="{{ asset('assets/icons/Vector.svg') }}" alt="" width="8" height="15" loading="lazy"></button>
      @endif
    </div>
  </div>
@if ($href)
</a>
@else
</article>
@endif
