@props([
  'title',
  'image' => asset('assets/images/5367853b7c3df6fd8b4ff25acce6c36f968c8e4c.jpg'),
  'breadcrumbs' => null,
  'headingId' => 'page-hero-title',
])

@php
  $breadcrumbs ??= [
    ['label' => 'Trang chủ', 'url' => url('/')],
    ['label' => $title],
  ];
@endphp

<section {{ $attributes->class(['page-hero']) }} aria-labelledby="{{ $headingId }}">
  <img class="page-hero-image" src="{{ $image }}" alt="" fetchpriority="high">
  <div class="page-hero-caption">
    <div class="page-hero-container">
      @if (count($breadcrumbs))
        <nav class="page-hero-breadcrumb" aria-label="Đường dẫn trang">
          @foreach ($breadcrumbs as $breadcrumb)
            @unless ($loop->first)<span aria-hidden="true">/</span>@endunless
            @if ($loop->last)
              <span aria-current="page">{{ $breadcrumb['label'] }}</span>
            @elseif (!empty($breadcrumb['url']))
              <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
            @else
              <span>{{ $breadcrumb['label'] }}</span>
            @endif
          @endforeach
        </nav>
      @endif
      <h1 id="{{ $headingId }}">{{ $title }}</h1>
    </div>
  </div>
</section>
