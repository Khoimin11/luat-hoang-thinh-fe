@extends('layouts.app')

@section('title', 'Tin tức và Kiến thức pháp luật')

@section('content')
  {{-- Section: Hero --}}
  <x-hero-slider
    class="news-hero"
    title="Tin tức và Kiến thức pháp luật"
    heading-id="news-title"
    :image="asset('assets/images/hero-tin-tuc.jpg')"
  />

  @php
    $posts = json_decode(
      file_get_contents(resource_path('data/news-posts.json')),
      true,
      512,
      JSON_THROW_ON_ERROR
    );
    $landPosts = json_decode(
      file_get_contents(resource_path('data/land-posts.json')),
      true,
      512,
      JSON_THROW_ON_ERROR
    );
    $latestPosts = array_map(fn ($index) => $landPosts[$index], [0, 1, 3, 9, 4]);
  @endphp

  {{-- Section: Content --}}
  <section class="practice-detail" aria-labelledby="news-posts-title">
    <div class="practice-detail-layout">
      {{-- Section: Articles --}}
      <div class="practice-detail-main">
        <h2 id="news-posts-title" class="practice-detail-heading">Bài viết</h2>
        <div class="practice-detail-posts">
          @foreach ($posts as $post)
            <x-blog-card
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
        <x-pagination :current-page="1" :last-page="12" />
      </div>

      {{-- Section: Sidebar --}}
      <aside class="practice-detail-sidebar" aria-label="Danh mục và bài viết liên quan">
        @include('partials.sidebar.categories')
        @include('partials.sidebar.latest-posts', ['posts' => $latestPosts])
        @include('partials.sidebar.consultation')
      </aside>
    </div>
  </section>

  {{-- Section: Contact --}}
  @include('partials.contact-section')
@endsection
