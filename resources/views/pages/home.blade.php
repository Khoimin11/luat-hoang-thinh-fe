@extends('layouts.app')

@section('title', 'Hoàng Thịnh Luật')

@section('content')
  {{-- Section: HomeHero --}}
  @php
    $slides = [
      'assets/images/home-hero-slider-1.png',
      'assets/images/home-hero-slider-2.png',
      'assets/images/home-hero-slider-3.png',
    ];
  @endphp
  
  <section class="home-hero" aria-labelledby="home-hero-title" data-home-slider>
    <div class="home-hero-viewport" role="region" aria-label="Ảnh giới thiệu Hoàng Thịnh Luật" aria-roledescription="carousel">
      <div class="home-hero-track" data-home-track>
        @foreach ($slides as $image)
          <div class="home-hero-slide" data-home-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
            <img src="{{ asset($image) }}" alt="" width="1832" height="859" loading="{{ $loop->first ? 'eager' : 'lazy' }}" @if ($loop->first) fetchpriority="high" @endif>
          </div>
        @endforeach
      </div>
    </div>
    <div class="home-hero-shade" aria-hidden="true"></div>
    <div class="home-hero-container">
      <div class="home-hero-copy">
        <p class="home-hero-eyebrow">Công ty Luật Hoàng Thịnh Luật</p>
        <h1 id="home-hero-title">Vững pháp lý, vững niềm tin<br>Pháp lý chuyên sâu<br>Bảo vệ quyền lợi vững chắc</h1>
        <p class="home-hero-description">Với đội ngũ luật sư giàu kinh nghiệm, tận tâm và chuyên nghiệp, Hoàng Thịnh Luật cam kết mang đến giải pháp pháp lý tối ưu, đồng hành cùng Quý khách hàng trên mọi hành trình.</p>
        <div class="home-hero-actions">
          <a class="home-hero-about" href="{{ route('about') }}">Về chúng tôi</a>
          <a class="home-hero-contact" href="{{ route('about') }}#tu-van">Nhận tư vấn pháp lý</a>
        </div>
      </div>
    </div>
  </section>

  {{-- Section: ValuePropsBar --}}
  <section class="home-value-props" aria-label="Lợi ích khi đồng hành cùng Hoàng Thịnh Luật">
    <ul class="home-value-props-list">
      @foreach ([
        ['check-circle.svg', 'Tư vấn chính xác', 'Dựa trên quy định pháp luật mới nhất'],
        ['users.svg', 'Đội ngũ luật sư giỏi', 'Giàu kinh nghiệm, thực chiến'],
        ['clock.svg', 'Phản hồi nhanh chóng', 'Tận tâm, trách nhiệm, hiệu quả'],
        ['shield.svg', 'Đồng hành lâu dài', 'Vì lợi ích bền vững của khách hàng'],
      ] as [$icon, $title, $description])
        <li class="home-value-prop">
          <span class="home-value-prop-icon {{ $loop->last ? 'home-value-prop-icon-navy' : '' }}" aria-hidden="true">
            <img src="{{ asset('assets/icons/'.$icon) }}" alt="" width="24" height="24" loading="lazy">
          </span>
          <div class="home-value-prop-copy">
            <h2>{{ $title }}</h2>
            <p>{{ $description }}</p>
          </div>
        </li>
      @endforeach
    </ul>
  </section>
  {{-- Section: PracticeAreas --}}
  <section class="home-practice" aria-labelledby="home-practice-title">
    <div class="home-practice-container">
      <div class="home-practice-header">
        <div>
          <p class="home-practice-eyebrow">Dịch Vụ Pháp Lý</p>
          <h2 id="home-practice-title">Lĩnh vực hoạt động nổi bật <img src="{{ asset('assets/icons/2970777 1.svg') }}" alt="" width="32" height="32" loading="lazy"></h2>
        </div>
        <x-buttons.view-more-button :href="route('practice-areas')" />
      </div>
      <div class="home-practice-layout">
        <div class="home-practice-grid">
          @foreach ([
            ['Ảnh lĩnh vực-9.png', 'Biểu tượng lĩnh vực-7.svg', 'Luật sư Đất đai - Bất động sản', 'Giao dịch - Tranh chấp bất động sản'],
            ['Ảnh lĩnh vực-8.png', 'Biểu tượng lĩnh vực-6.svg', 'Luật sư Thừa kế - Di chúc', 'Lập di chúc - Phân chia di sản'],
            ['Ảnh lĩnh vực-7.png', 'Biểu tượng lĩnh vực-5.svg', 'Luật sư Dân sự - Hợp đồng - Tài sản', 'Hợp đồng - Tranh chấp tài sản'],
            ['Ảnh lĩnh vực-6.png', 'Biểu tượng lĩnh vực-4.svg', 'Luật sư Doanh nghiệp - Đầu tư - Thương mại', 'Doanh nghiệp - Đầu tư - Thương mại'],
            ['Ảnh lĩnh vực-5.png', 'Biểu tượng lĩnh vực-3.svg', 'Luật sư Hôn nhân Gia đình', 'Ly hôn - Tài sản - Quyền nuôi con'],
            ['Ảnh lĩnh vực-4.png', 'Biểu tượng lĩnh vực-2.svg', 'Luật sư Hình sự', 'Bào chữa - Bảo vệ quyền lợi'],
            ['Ảnh lĩnh vực-3.png', 'Biểu tượng lĩnh vực-1.svg', 'Luật sư Hành chính', 'Khiếu nại - Khởi kiện hành chính'],
            ['Ảnh lĩnh vực-2.png', 'Biểu tượng lĩnh vực.svg', 'Luật sư Lao động', 'Hợp đồng - Tranh chấp lao động'],
            ['Ảnh lĩnh vực-1.png', 'Biểu tượng lĩnh vực.svg', 'Luật sư Thuế', 'Tư vấn thuế - Giải quyết tranh chấp'],
            ['Ảnh lĩnh vực.png', 'Biểu tượng lĩnh vực.svg', 'Luật sư Sở hữu trí tuệ', 'Nhãn hiệu - Bản quyền - Sáng chế'],
          ] as [$image, $icon, $title, $description])
            <x-cards.practice-area-card
              :href="route('practice-areas.land')"
              :image="asset('assets/images/'.$image)"
              :icon="asset('assets/icons/'.$icon)"
              :title="$title"
              :description="$description"
            />
          @endforeach
        </div>
        <aside class="home-practice-reasons" aria-labelledby="home-practice-reasons-title" style="--practice-background: url('{{ asset('assets/images/home-practice-reason-bg-img.png') }}')">
          <p class="home-practice-reasons-eyebrow">Vì sao chọn</p>
          <h3 id="home-practice-reasons-title">Hoàng Thịnh Luật?</h3>
          <ul>
            @foreach ([
              'Đội ngũ luật sư, chuyên viên pháp lý giàu kinh nghiệm thực chiến.',
              'Tư vấn chiến lược, giải pháp pháp lý tối ưu diện rộng.',
              'Bảo mật thông tin khách hàng tuyệt đối.',
              'Chi phí hợp lý, minh bạch, không phát sinh bất ngờ.',
              'Luôn đặt lợi ích hợp pháp của khách hàng lên hàng đầu.',
            ] as $reason)
              <li><span aria-hidden="true"><img src="{{ asset('assets/icons/check.svg') }}" alt="" width="12" height="12" loading="lazy"></span>{{ $reason }}</li>
            @endforeach
          </ul>
          <a class="home-practice-contact" href="{{ route('about') }}#tu-van">Liên hệ ngay <img src="{{ asset('assets/icons/arrow-right.svg') }}" alt="" width="16" height="16" loading="lazy"></a>
        </aside>
      </div>
    </div>
  </section>
  {{-- Section: NewsArticles --}}
  <section class="home-news" aria-labelledby="home-news-title">
    <div class="home-news-container">
      <div class="home-news-header">
        <div>
          <p class="home-news-eyebrow">Tin tức & Bài viết</p>
          <h2 id="home-news-title">Cập nhật pháp luật, đồng hành cùng bạn <img src="{{ asset('assets/icons/2970777 1.svg') }}" alt="" width="32" height="32" loading="lazy"></h2>
        </div>
        <x-buttons.view-more-button :href="route('news')" />
      </div>
      <div class="home-news-grid">
        @foreach ([
          ['Image-3.png', 'Những điểm mới của Luật Đất đai 2024 có hiệu lực từ 01/08/2024', 'Tổng hợp các quy định mới quan trọng doanh nghiệp và người dân cần lưu ý.'],
          ['Image.png', 'Thủ tục thành lập doanh nghiệp mới nhất năm 2024', 'Hướng dẫn chi tiết hồ sơ, quy trình và những lưu ý quan trọng để tránh sai sót.'],
          ['Image-1.png', 'Tư vấn ly hôn đơn phương: Quy trình, hồ sơ và chi phí chi tiết', 'Cập nhật quy định mới nhất giúp bạn giải quyết nhanh chóng, tối ưu hóa quyền lợi.'],
          ['Image-2.png', 'Doanh nghiệp cần lưu ý gì khi thay đổi người đại diện pháp luật?', 'Những quy định quan trọng về thủ tục cần thực hiện đúng theo quy định hiện hành.'],
        ] as [$image, $title, $description])
          <x-cards.blog-card
            :image="asset('assets/images/'.$image)"
            :title="$title"
            :description="$description"
            date="2026-07-26"
          />
        @endforeach
      </div>
    </div>
  </section>
@endsection
