{{-- Section: SidebarServices --}}
<section class="sidebar-panel" aria-labelledby="sidebar-services-title">
  <h2 id="sidebar-services-title" class="sidebar-heading">Dịch vụ luật</h2>
  <ul class="sidebar-services">
    @foreach ($practiceAreas as $service)
      <li>
        <a href="{{ route('practice-areas.show', $service['slug']) }}" @if(request()->is('linh-vuc-hoat-dong/'.$service['slug'])) aria-current="page" @endif><span aria-hidden="true">›</span> {{ $service['title'] }}</a>
      </li>
    @endforeach
  </ul>
</section>
