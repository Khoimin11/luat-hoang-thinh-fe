{{-- Section: SidebarLatestPosts --}}
<section class="sidebar-panel" aria-labelledby="sidebar-latest-title">
  <h2 id="sidebar-latest-title" class="sidebar-heading">Bài viết mới nhất</h2>
  <div class="sidebar-latest-posts">
    @foreach ($posts ?? [] as $post)
      <article class="sidebar-post">
        <img src="{{ asset('assets/images/'.$post['image']) }}" alt="" width="60" height="60" loading="lazy">
        <div>
          <h3>
            @if (!empty($post['href']))
              <a href="{{ $post['href'] }}">{{ $post['title'] }}</a>
            @else
              {{ $post['title'] }}
            @endif
          </h3>
          <time datetime="{{ $post['date'] }}">{{ \Illuminate\Support\Carbon::parse($post['date'])->format('d/m/Y') }}</time>
        </div>
      </article>
    @endforeach
  </div>
</section>
