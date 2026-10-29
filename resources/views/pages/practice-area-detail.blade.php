@extends('layouts.app')

@section('title', 'Đất đai - Bất động sản')

@section('content')
  {{-- Section: Hero --}}
  <x-heroes.hero-page-1
    title="Luật đất đai, nhà ở, bất động sản, xây dựng"
    heading-id="practice-area-title"
    :image="asset('assets/images/hero-img-practice-area-detail.png')"
    :breadcrumbs="[
      ['label' => 'Trang chủ', 'url' => route('home')],
      ['label' => 'Lĩnh vực hoạt động', 'url' => route('practice-areas')],
      ['label' => 'Đất đai - Bất động sản'],
    ]"
  />

  @php
    $posts = json_decode(
      file_get_contents(resource_path('data/land-posts.json')),
      true,
      512,
      JSON_THROW_ON_ERROR
    );
    $latestPosts = array_map(fn ($index) => $posts[$index], [0, 1, 3, 9, 4]);
  @endphp

  {{-- Section: Content --}}
  <section class="practice-detail practice-detail-layout" aria-labelledby="practice-posts-title">
    {{-- Section: Articles --}}
    <div class="practice-detail-main">
      <h2 id="practice-posts-title" class="practice-detail-heading">Bài viết</h2>
      <div class="practice-detail-posts">
        @foreach ($posts as $post)
          <x-cards.blog-card
            :image="asset('assets/images/'.$post['image'])"
            :image-alt="$post['title']"
            :title="$post['title']"
            :description="$post['description']"
            :date="$post['date']"
            :href="$post['href'] ?? null"
          />
        @endforeach
      </div>

      {{-- Section: Pagination --}}
      <x-navigation.pagination :current-page="1" :last-page="12" />
    </div>

    {{-- Section: Sidebar --}}
    <aside class="practice-detail-sidebar" aria-label="Dịch vụ và bài viết liên quan">
      @include('partials.sidebar.services')
      @include('partials.sidebar.latest-posts', ['posts' => $latestPosts])
      @include('partials.sidebar.consultation')
    </aside>
  </section>

  {{-- Section: Contact --}}
  @include('partials.contact-section')
@endsection
