@extends('layouts.app')

@section('title', 'Liên hệ')

@section('content')
  {{-- Header và footer dùng chung từ layouts.app. --}}

  {{-- Section: Hero --}}
  <x-heroes.hero-page-1
    title="Liên hệ"
    heading-id="contact-title"
    :image="asset('assets/images/hero-img-contact.png')"
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
            <p>Hotline/Zalo: <span class="contact-info-value">0913.849.072</span></p>
            <p>Email: <span class="contact-info-value">hoangthinhluat.lawfirm@gmail.com</span></p>
          </div>
        </address>

        <div class="contact-info-hours">
          <h3>Giờ làm việc</h3>
          <p>Thứ 2 - Thứ 7: <span>8:00 - 17:30</span></p>
          <p class="contact-info-hours-note">(Hỗ trợ ngoài giờ theo hẹn trước)</p>
        </div>

        {{-- Section: ContactSocials — bổ sung liên kết khi có URL chính thức. --}}
        <div class="contact-info-socials" role="group" aria-label="Mạng xã hội">
          @foreach ([['fb-icon.svg', 'Facebook'], ['linked-icon.svg', 'LinkedIn'], ['zalo-icon.svg', 'Zalo'], ['ytb-icon.svg', 'YouTube']] as [$icon, $label])
            <button type="button" disabled aria-label="{{ $label }}"><img src="{{ asset('assets/icons/'.$icon) }}" alt="" width="24" height="24" loading="lazy"></button>
          @endforeach
        </div>
      </div>

      {{-- Section: ContactMap --}}
      <div class="contact-info-map">
        <iframe
          src="https://www.google.com/maps?q={{ rawurlencode('1124 Lạc Long Quân, TP.HCM, Việt Nam') }}&amp;hl=vi&amp;z=16&amp;output=embed"
          title="Google Maps: Văn phòng Hoàng Thịnh Luật tại 1124 Lạc Long Quân, TP.HCM"
          width="674"
          height="564"
          loading="lazy"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen
        ></iframe>
      </div>
    </div>
  </section>

  {{-- Section: ContactForm --}}
  <section class="contact-message-section" aria-labelledby="contact-message-title">
    <div class="contact-message-intro">
      <div class="contact-message-copy">
        <h2 id="contact-message-title">Gửi yêu cầu tư vấn</h2>
        <p>Vui lòng điền đầy đủ thông tin bên phải, chúng tôi sẽ liên hệ lại trong thời gian sớm nhất.</p>
      </div>
      <img class="contact-message-portrait" src="{{ asset('assets/images/94dd2de76160785f126a286fb2f1b3a3b1a1b5bb.png') }}" alt="Đội ngũ luật sư Hoàng Thịnh Luật" width="1181" height="1332" loading="lazy">
    </div>

    <x-forms.consultation-form variant="light" />
  </section>
@endsection
