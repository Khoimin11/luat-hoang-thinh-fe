@props([
  'title',
  'image' => asset('assets/images/hero-page-2-img-1.png'),
  'breadcrumbs' => null,
  'headingId' => 'hero-page-2-title',
])

{{-- Hero kiểu 2 dùng chung tiêu đề và breadcrumb của hero-page-1. --}}
<x-heroes.hero-page-1
  :title="$title"
  :image="$image"
  :breadcrumbs="$breadcrumbs"
  :heading-id="$headingId"
  {{ $attributes->class(['hero-page-2']) }}
/>
