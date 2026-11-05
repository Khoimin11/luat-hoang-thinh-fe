<div id="practice-menu" class="header-practice-panel" aria-labelledby="practice-menu-link" data-practice-panel hidden>
  <div class="header-practice-grid">
    @foreach ($practiceAreas->groupBy('group') as $heading => $items)
      <section class="header-practice-group" aria-labelledby="practice-group-{{ $loop->index }}">
        <h2 id="practice-group-{{ $loop->index }}">{{ $heading }}</h2>
        <ul>
          @foreach ($items as $item)
            <li><a class="header-practice-item" href="{{ route('practice-areas.show', $item['slug']) }}">{{ $item['label'] }}</a></li>
          @endforeach
        </ul>
      </section>
    @endforeach
  </div>
</div>
