{{-- Section: SidebarServices --}}
<section class="sidebar-panel" aria-labelledby="sidebar-services-title">
  <h2 id="sidebar-services-title" class="sidebar-heading">Dịch vụ luật</h2>
  <ul class="sidebar-services">
    @foreach ([
      ['title' => 'Luật sư đất đai - Bất động sản', 'href' => route('practice-areas.land')],
      ['title' => 'Luật sư thừa kế - Di chúc'],
      ['title' => 'Luật sư giao dịch dân sự - Hợp đồng'],
      ['title' => 'Luật sư hôn nhân - Gia đình'],
      ['title' => 'Luật sư doanh nghiệp - đầu tư'],
      ['title' => 'Luật sư thuế'],
      ['title' => 'Luật sư hình sự'],
      ['title' => 'Luật sư hành chính'],
      ['title' => 'Luật sư lao động'],
    ] as $service)
      <li>
        @if (isset($service['href']))
          <a href="{{ $service['href'] }}" @if(url()->current() === $service['href']) aria-current="page" @endif><span aria-hidden="true">›</span> {{ $service['title'] }}</a>
        @else
          <span class="sidebar-service-unavailable"><span aria-hidden="true">›</span> {{ $service['title'] }}</span>
        @endif
      </li>
    @endforeach
  </ul>
</section>
