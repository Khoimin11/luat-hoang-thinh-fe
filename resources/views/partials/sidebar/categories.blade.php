{{-- Section: SidebarCategories --}}
<section class="sidebar-panel" aria-labelledby="sidebar-categories-title">
  <h2 id="sidebar-categories-title" class="sidebar-heading">Danh mục bài viết</h2>
  <ul class="sidebar-services">
    @foreach ([
      'Tin tức pháp lý - Chính sách mới',
      'Văn bản pháp luật cập nhật',
      'Bài viết - Kiến thức pháp lý',
      'Giải đáp thắc mắc thường gặp',
      'Hoạt động của Hoàng Thịnh Luật',
    ] as $category)
      <li><span class="sidebar-service-unavailable"><span aria-hidden="true">›</span> {{ $category }}</span></li>
    @endforeach
  </ul>
</section>
