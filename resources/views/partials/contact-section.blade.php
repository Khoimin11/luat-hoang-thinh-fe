<section id="tu-van" class="about-contact about-section" aria-labelledby="consultation-title" style="--about-background: url('{{ asset('assets/images/1ca7412d0c1d388b0022a8bfb47061a5fa88178b.png') }}')">
  <div class="about-contact-grid">
    <div class="about-contact-company">
      <img class="about-contact-logo" src="{{ asset('assets/images/8e9a8484357d66f0745965a71f43232ac28d7a89.png') }}" alt="" width="120" height="120" loading="lazy">
      <h2 id="consultation-title" class="about-heading">Công ty Luật TNHH MTV<br>Hoàng Thịnh Luật</h2>
      <address class="about-contact-details">
        <p><strong>Trụ sở chính:</strong><br><span class="about-contact-address">40/9/8 Trần Văn Quang, P. Bảy Hiền, TP.HCM</span></p>
        <p><strong>Văn phòng:</strong><br><span class="about-contact-address">1124 Lạc Long Quân, P. Tân Hòa, TP.HCM</span></p>
        <p class="about-contact-phone">SĐT: <a href="tel:0913849072">0913.849.072</a> | Zalo: <a href="" target="_blank" rel="noopener noreferrer">0913.849.072</a></p>
        <p><strong>Email:</strong> <a href="mailto:hoangthinhluat.lawfirm@gmail.com">hoangthinhluat.lawfirm@gmail.com</a></p>
      </address>
    </div>
    <form class="about-consultation-form" method="post" novalidate aria-label="Form tư vấn" data-consultation-form>
      <h3 class="sr-only">Trao đổi nhu cầu tư vấn</h3>
      <div class="about-form-row">
        <div>
          <label for="consultation-name">Họ và tên</label>
          <input id="consultation-name" name="name" autocomplete="name" required minlength="2" maxlength="100" aria-describedby="consultation-name-error" placeholder="Họ và tên">
          <p id="consultation-name-error" class="about-form-error" aria-live="polite" hidden></p>
        </div>
        <div>
          <label for="consultation-email">Email</label>
          <input id="consultation-email" name="email" type="email" autocomplete="email" required maxlength="255" aria-describedby="consultation-email-error" placeholder="Email">
          <p id="consultation-email-error" class="about-form-error" aria-live="polite" hidden></p>
        </div>
      </div>
      <div>
        <label for="consultation-service">Dịch vụ cần tư vấn</label>
        <input id="consultation-service" name="service" required maxlength="150" aria-describedby="consultation-service-error" placeholder="Dịch vụ cần tư vấn">
        <p id="consultation-service-error" class="about-form-error" aria-live="polite" hidden></p>
      </div>
      <div>
        <label for="consultation-message">Lời nhắn</label>
        <textarea id="consultation-message" name="message" rows="6" required minlength="10" maxlength="2000" aria-describedby="consultation-message-error" placeholder="Lời nhắn của bạn"></textarea>
        <p id="consultation-message-error" class="about-form-error" aria-live="polite" hidden></p>
      </div>
      <button type="submit">Gửi lời nhắn <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 12h18m-6-6 6 6-6 6"/></svg></button>
    </form>
  </div>
</section>
