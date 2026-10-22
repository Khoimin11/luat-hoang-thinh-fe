@props(['variant' => 'dark'])

{{-- Section: ConsultationForm — cùng trường dữ liệu và validation cho hai giao diện. --}}
<form {{ $attributes->class(['about-consultation-form', 'consultation-form--light' => $variant === 'light']) }} action="{{ route('consultations.store') }}" method="post" novalidate aria-label="Form tư vấn" data-consultation-form data-turbo="false">
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
  <button type="submit"><span data-submit-label>Gửi lời nhắn</span> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 12h18m-6-6 6 6-6 6"/></svg></button>
</form>
