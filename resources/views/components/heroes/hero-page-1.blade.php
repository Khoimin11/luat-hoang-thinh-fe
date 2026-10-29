@props([
  'title',
  'image' => asset('assets/images/5367853b7c3df6fd8b4ff25acce6c36f968c8e4c.jpg'),
  'breadcrumbs' => null,
  'headingId' => 'hero-page-1-title',
])

@php
  $breadcrumbs ??= [
    ['label' => 'Trang chủ', 'url' => url('/')],
    ['label' => $title],
  ];
@endphp

<section {{ $attributes->class(['hero-page-1']) }} aria-labelledby="{{ $headingId }}">
  <img class="hero-page-1-image" src="{{ $image }}" alt="" fetchpriority="high">
  <div class="hero-page-1-caption">
    @if (count($breadcrumbs))
      <nav class="hero-page-1-breadcrumb" aria-label="Đường dẫn trang">
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
</section>
