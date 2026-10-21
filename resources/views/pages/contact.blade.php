@extends('layouts.app')

@section('title', 'Liên hệ')

@section('content')
  {{-- Header và footer dùng chung từ layouts.app. --}}

  {{-- Section: Hero --}}
  <x-hero-page-2
    title="Liên hệ hỗ trợ"
    heading-id="contact-title"
    :breadcrumbs="[
      ['label' => 'Trang chủ', 'url' => route('home')],
      ['label' => 'Liên hệ'],
    ]"
  />

  {{-- Section: ContactInformation --}}
  <section class="contact-info-section" aria-labelledby="contact-company-title">
    <div class="contact-info-layout">
      <div class="contact-info-company">
        <img class="contact-info-logo" src="{{ asset('assets/images/logo-symbol.png') }}" alt="" width="120" height="120" loading="lazy">
        <h2 id="contact-company-title" class="contact-info-title">Công ty Luật TNHH MTV<br>Hoàng Thịnh Luật</h2>

        <address class="contact-info-details">
          <div class="contact-info-addresses">
            <p><strong>Trụ sở chính:</strong><span>40/9/8 Trần Văn Quang, P. Bảy Hiền, TP.HCM</span></p>
            <p><strong>Văn phòng:</strong><span>1124 Lạc Long Quân, P. Tân Hòa, TP.HCM</span></p>
          </div>
          <div class="contact-info-channels">
            <p>SĐT: <span class="contact-info-value">0913.849.072</span> <span class="contact-info-label">|</span> <span class="contact-info-label">Zalo:</span> <span class="contact-info-value">0913.849.072</span></p>
            <p>Email: <span class="contact-info-value">hoangthinhluat.lawfirm@gmail.com</span></p>
          </div>
        </address>

        <div class="contact-info-hours">
          <h3>Giờ làm việc</h3>
          <p>Thứ 2 - Thứ 6: <span>8:00 - 17:30</span></p>
        </div>

        {{-- Section: ContactSocials — bổ sung liên kết khi có URL chính thức. --}}
        <div class="contact-info-socials" role="group" aria-label="Mạng xã hội">
          @foreach ([['fb-icon.svg', 'Facebook'], ['linked-icon.svg', 'LinkedIn'], ['zalo-icon.svg', 'Zalo'], ['ytb-icon.svg', 'YouTube']] as [$icon, $label])
            <button type="button" disabled aria-label="{{ $label }}"><img src="{{ asset('assets/icons/'.$icon) }}" alt="" width="24" height="24" loading="lazy"></button>
          @endforeach
        </div>
      </div>

      {{-- Section: ContactMap --}}
      <a class="contact-info-map" href="https://www.google.com/maps/search/?api=1&amp;query={{ rawurlencode('1124 Lạc Long Quân, TP.HCM') }}" target="_blank" rel="noopener noreferrer" aria-label="Xem vị trí văn phòng trên Google Maps (mở tab mới)">
        <img src="{{ asset('assets/images/location-large.png') }}" alt="Bản đồ vị trí Hoàng Thịnh Luật tại khu vực Trần Văn Quang, Lạc Long Quân, TP.HCM" width="674" height="564" loading="lazy">
      </a>
    </div>
  </section>

  {{-- Section: ContactForm --}}
  <section class="contact-message-section" aria-labelledby="contact-message-title">
    <div class="contact-message-layout">
      <div class="contact-message-intro">
        <div class="contact-message-copy">
          <h2 id="contact-message-title">Để lại lời nhắn cho chúng tôi</h2>
          <p>Đăng ký nhận bản tin để cập nhật hàng tháng các kết quả, kinh nghiệm thực tiễn và hướng dẫn kỹ thuật mới nhất từ</p>
        </div>
        <img class="contact-message-portrait" src="{{ asset('assets/images/94dd2de76160785f126a286fb2f1b3a3b1a1b5bb.png') }}" alt="Đội ngũ luật sư Hoàng Thịnh Luật" width="1181" height="1332" loading="lazy">
      </div>

      <x-consultation-form variant="light" />
    </div>
  </section>
@endsection
