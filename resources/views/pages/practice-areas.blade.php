@extends('layouts.app')

@section('title', 'Lĩnh vực hoạt động')

@section('content')
  {{-- Section: PageHero --}}
  <x-heroes.hero-page-1
    class="practice-areas-hero"
    title="Lĩnh vực hoạt động"
    :image="asset('assets/images/hero-img-practice-areas.png')"
  />

  {{-- Section: PracticeAreas --}}
  <section class="practice-areas-section" aria-label="Các lĩnh vực tư vấn và dịch vụ pháp lý">
    <p class="practice-areas-intro">Khám phá 12 lĩnh vực tư vấn và dịch vụ pháp lý của Hoàng Thịnh Luật dành cho cá nhân và doanh nghiệp.</p>
    <div class="practice-areas-grid">
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
  </section>

  {{-- Section: Contact --}}
  @include('partials.contact-section')
@endsection
