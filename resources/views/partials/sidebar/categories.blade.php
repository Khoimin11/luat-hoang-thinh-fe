{{-- Section: SidebarCategories --}}
<section class="sidebar-panel" aria-labelledby="sidebar-categories-title">
  <h2 id="sidebar-categories-title" class="sidebar-heading">Danh mục bài viết</h2>
  <ul class="sidebar-services">
    @foreach ($newsCategories as $newsCategory)
      <li><a href="{{ route('news.category', $newsCategory['slug']) }}" @if(request()->route('slug') === $newsCategory['slug']) aria-current="page" @endif><span aria-hidden="true">›</span> {{ $newsCategory['title'] }}</a></li>
    @endforeach
  </ul>
</section>
