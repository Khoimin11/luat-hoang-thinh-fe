@props([
  'image',
  'title',
  'description' => '',
  'date' => null,
  'href' => null,
  'imageAlt' => '',
])

<article {{ $attributes->class(['blog-card']) }}>
  <div class="blog-card-image">
    <img src="{{ $image }}" alt="{{ $imageAlt }}" width="292" height="200" loading="lazy">
  </div>
  <div class="blog-card-body">
    <h3>
      @if ($href)
        <a href="{{ $href }}">{{ $title }}</a>
      @else
        {{ $title }}
      @endif
    </h3>
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
        <a class="blog-card-detail" href="{{ $href }}">Xem chi tiết <span aria-hidden="true"></span><img src="{{ asset('assets/icons/Vector.svg') }}" alt="" width="8" height="15" loading="lazy"></a>
      @else
        <button class="blog-card-detail" type="button" aria-disabled="true">Xem chi tiết <span aria-hidden="true"></span><img src="{{ asset('assets/icons/Vector.svg') }}" alt="" width="8" height="15" loading="lazy"></button>
      @endif
    </div>
  </div>
</article>
