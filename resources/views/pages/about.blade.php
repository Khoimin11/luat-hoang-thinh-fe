@extends('layouts.app')

@section('title', 'Giới thiệu')

@section('content')
  <x-hero-page-1 title="Giới thiệu" heading-id="about-title" />

  <section class="about-intro-section" aria-labelledby="intro-title">
    <div class="about-intro">
      <div class="about-intro-copy">
        <p class="about-eyebrow">Giới thiệu</p>
        <h2 id="intro-title" class="about-heading">Về Hoàng Thịnh Luật <img class="about-intro-icon" src="{{ asset('assets/icons/2970777 1.svg') }}" alt="" width="32" height="32"></h2>
        <div class="about-prose">
          <p>Được sáng lập và điều hành bởi Luật sư Phan Minh Hoàng, Hoàng Thịnh Luật hoạt động hợp pháp tại Việt Nam từ năm 2016, cung cấp các dịch vụ tư vấn và hỗ trợ pháp lý chuyên nghiệp cho cá nhân, doanh nghiệp.</p>
          <p>Với <strong>hơn 15 năm kinh nghiệm</strong>, đội ngũ luật sư đã xây dựng uy tín trong nhiều lĩnh vực như dân sự, doanh nghiệp, đất đai, bất động sản, xây dựng, hôn nhân gia đình, lao động, hành chính và hình sự.</p>
          <p>Hoàng Thịnh Luật đồng hành cùng khách hàng để bảo vệ quyền lợi hợp pháp, kiểm soát rủi ro và tìm kiếm giải pháp phù hợp trong từng vụ việc.</p>
        </div>
        <div class="about-gallery">
          <img src="{{ asset('assets/images/bf15882e7c8fc4f93b1e2405a79f6ce300e132e1.png') }}" alt="Buổi làm việc và trao đổi hồ sơ pháp lý" loading="lazy" width="1280" height="720">
          <img src="{{ asset('assets/images/eca8835b5e7f02268b4d8071dc0076c6884f5d26.png') }}" alt="Luật sư làm việc tại văn phòng" loading="lazy" width="1280" height="720">
          <img src="{{ asset('assets/images/079bef4d8dea30a5cf94cefa02655ea0b58df258.png') }}" alt="Trao đổi và tư vấn tại văn phòng Hoàng Thịnh Luật" loading="lazy" width="1536" height="1024">
        </div>
      </div>
      <figure class="about-director">
        <img src="{{ asset('assets/images/73508e5cb8f084868252a4c447e44321946ab5dc.png') }}" alt="Luật sư Phan Minh Hoàng tại văn phòng" width="580" height="540" loading="lazy">
        <figcaption class="sr-only">Luật sư Phan Minh Hoàng, Giám đốc Hoàng Thịnh Luật</figcaption>
      </figure>
    </div>
  </section>

  <section id="gia-tri" class="about-values" aria-labelledby="values-title">
    <div class="about-values-background" aria-hidden="true">
      <img src="{{ asset('assets/images/c1b1d3e538ec3a68a416d6eaeae27607f5003156.png') }}" alt="" loading="lazy" width="1920" height="499">
    </div>
    <div class="about-container">
      <div class="about-mission">
        <div class="about-mission-portrait"><img src="{{ asset('assets/images/image 809.png') }}" alt="" loading="lazy" width="277" height="309"></div>
        <div class="about-mission-content">
          <div class="about-mission-title">
            <p class="about-eyebrow">Định hướng phát triển</p>
            <h2 id="values-title" class="about-heading">Tầm nhìn & sứ mệnh</h2>
          </div>
          <div class="about-mission-description">
            <p class="about-motto">Vững pháp lý - Trọn niềm tin - Đồng hành bền vững</p>
            <p class="about-mission-copy">Hoàng Thịnh Luật hướng đến xây dựng một thương hiệu pháp lý chuyên nghiệp, uy tín và tận tâm. Chúng tôi không chỉ cung cấp giải pháp pháp lý phù hợp mà còn đồng hành cùng khách hàng trong việc bảo vệ quyền lợi, kiểm soát rủi ro và tạo nền tảng phát triển bền vững.</p>
          </div>
        </div>
      </div>
      <div class="about-value-grid">
        @foreach ([['96e7ca763f531ff08fdcbd200aee17ec4947a023.png', 'Tầm nhìn', 'Trở thành đơn vị pháp lý uy tín, chuyên nghiệp và đáng tin cậy, đồng hành lâu dài cùng cá nhân và doanh nghiệp.'], ['2e9995587392e7c528a4aed51e58846b9d51d785.png', 'Sứ mệnh', 'Cung cấp giải pháp pháp lý hiệu quả, minh bạch và phù hợp, góp phần bảo vệ tối đa quyền và lợi ích hợp pháp của khách hàng.'], ['9bd1e8d5d72f2d664274e8093cfe27a57fc5faa4.png', 'Giá trị cốt lõi', 'Lấy Chuyên nghiệp – Tận tâm – Hiệu quả – Bảo mật làm nền tảng trong mọi hoạt động và mối quan hệ với khách hàng.']] as [$icon, $title, $description])
          <article class="about-value-card"><img src="{{ asset('assets/images/'.$icon) }}" alt="" loading="lazy" width="1024" height="1024"><h3>{{ $title }}</h3><p>{{ $description }}</p></article>
        @endforeach
      </div>
    </div>
  </section>

  <section class="about-statistics" aria-label="Hoàng Thịnh Luật qua những con số">
    <div class="about-statistics-grid" style="--about-background: url('{{ asset('assets/images/39437635f1daec47983a81bfb09828b281b59497.png') }}')">
      @foreach ([['500', 'Vụ việc đã tư vấn'], ['200', 'Khách hàng tin tưởng'], ['10', 'Luật sư & chuyên gia'], ['15', 'Năm kinh nghiệm']] as [$number, $label])
        <div><p class="about-statistic-number">{{ $number }}<span>+</span></p><p class="about-statistic-label">{{ $label }}</p></div>
      @endforeach
    </div>
  </section>

  <section class="about-commitments-section" aria-labelledby="commitment-title">
    <div class="about-commitments">
      <div>
        <p class="about-eyebrow">Tại sao chọn chúng tôi</p>
        <h2 id="commitment-title" class="about-heading">Cam kết của Hoàng Thịnh Luật</h2>
        <div class="about-commitment-grid">
          @foreach ([['Tư vấn đúng trọng tâm', 'Mỗi vụ việc được tiếp cận kỹ lưỡng, xác định rõ vấn đề pháp lý và đưa ra phương án phù hợp với nhu cầu thực tế của từng khách hàng.'], ['Đồng hành tận tâm', 'Luôn lắng nghe, trao đổi rõ ràng và theo sát khách hàng trong suốt quá trình tư vấn, giải quyết hồ sơ và xử lý các vấn đề phát sinh.'], ['Bảo vệ quyền lợi tối đa', 'Mọi giải pháp đều hướng đến bảo vệ quyền và lợi ích hợp pháp của khách hàng, đồng thời hạn chế tối đa các rủi ro pháp lý phát sinh.'], ['Bảo mật và minh bạch', 'Cam kết bảo mật thông tin khách hàng, minh bạch về quy trình và phương án xử lý để khách hàng luôn chủ động trong mọi quyết định.']] as [$title, $description])
            <article class="about-commitment-card"><span aria-hidden="true"><img src="{{ asset('assets/icons/'.['5403496 1.svg', '1322236 (1) 1.svg', 'SVG.svg', '15189475 1.svg'][$loop->index]) }}" alt="" width="32" height="32" loading="lazy"></span><div><h3>{{ $title }}</h3><p>{{ $description }}</p></div></article>
          @endforeach
        </div>
      </div>
      <div class="about-commitment-image"><img src="{{ asset('assets/images/dbd489a228abca26bbe14e84780504a830e29b14.png') }}" alt="Đội ngũ chuyên viên pháp lý" loading="lazy" width="1122" height="1402"></div>
    </div>
  </section>

  <section id="doi-ngu" class="about-team about-section" aria-labelledby="team-title">
    <div class="about-team-container" data-team-carousel>
      <div class="about-team-header">
        <div>
          <p class="about-eyebrow">Nhân sự</p>
          <h2 id="team-title" class="about-heading">Đội ngũ chủ chốt <img src="{{ asset('assets/icons/2970777 1.svg') }}" alt="" width="32" height="32"></h2>
        </div>
        <x-view-more :href="route('team')" />
      </div>
      <div class="about-team-slider">
        <div class="about-team-viewport" tabindex="0" role="region" aria-label="Slider đội ngũ chủ chốt">
          <div id="about-team-cards" class="about-team-grid">
            {{-- Kinh nghiệm và chuyên môn bên dưới là dữ liệu mẫu để xem trước giao diện hover. --}}
            @foreach ([
              ['about-luat-su-1.png', 'Giám đốc', 'Ông Phan Minh Hoàng', '15 năm kinh nghiệm', 'Đất đai, BĐS, Xây dựng'],
              ['about-luat-su-2.png', 'Luật sư cộng sự', 'Bà Lê Thị Hồng', '12 năm kinh nghiệm', 'Dân sự, Hôn nhân gia đình'],
              ['about-luat-su-3.png', 'Luật sư cộng sự', 'Ông Phạm Văn Dũng', '10 năm kinh nghiệm', 'Doanh nghiệp, Hợp đồng'],
              ['about-luat-su-4.png', 'Luật sư cộng sự', 'Ông Hoàng Trung Nam', '8 năm kinh nghiệm', 'Hình sự, Lao động'],
            ] as [$photo, $role, $name, $experience, $specialties])
              @include('partials.profile', [
                'photo' => asset('assets/images/'.$photo),
                'role' => $role,
                'name' => $name,
                'experience' => $experience,
                'specialties' => $specialties,
                'class' => 'about-team-card',
              ])
            @endforeach
          </div>
        </div>
        <button class="about-team-arrow about-team-prev" type="button" aria-label="Xem nhân sự trước" aria-controls="about-team-cards" data-team-prev><img src="{{ asset('assets/icons/Frame 2147238982.svg') }}" alt="" width="64" height="64"></button>
        <button class="about-team-arrow about-team-next" type="button" aria-label="Xem nhân sự tiếp theo" aria-controls="about-team-cards" data-team-next><img src="{{ asset('assets/icons/Frame 2147238981.svg') }}" alt="" width="64" height="64"></button>
      </div>
    </div>
  </section>

  @include('partials.contact-section')
@endsection
