<div id="practice-menu" class="header-practice-panel" aria-labelledby="practice-menu-link" data-practice-panel hidden>
  <div class="header-practice-grid">
    @foreach ([
      ['Pháp luật Dân sự & Giao dịch', ['Đất đai - Bất động sản', 'Thừa kế - Di chúc', 'Giao dịch dân sự - Hợp đồng', 'Hôn nhân - Gia đình', 'Sở hữu trí tuệ']],
      ['Pháp luật Doanh nghiệp & Tài chính', ['Doanh nghiệp - Đầu tư', 'Thuế']],
      ['Pháp luật Hình sự & Hành chính', ['Hình sự', 'Hành chính', 'Lao động']],
    ] as [$heading, $items])
      <section class="header-practice-group" aria-labelledby="practice-group-{{ $loop->index }}">
        <h2 id="practice-group-{{ $loop->index }}">{{ $heading }}</h2>
        <ul>
          @foreach ($items as $item)
            <li><a class="header-practice-item" href="#">{{ $item }}</a></li>
          @endforeach
        </ul>
      </section>
    @endforeach
  </div>
</div>
