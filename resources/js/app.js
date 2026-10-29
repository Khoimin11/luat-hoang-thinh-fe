import '@hotwired/turbo';
import { validateLienHe } from './lienhe-validation';
import { initTeamSlider } from './team-slider';
import { initHeaderMenu } from './header-menu';
import { initHomeSlider } from './home-slider';
import { initValuePropsCarousel } from './value-props-carousel';

document.querySelectorAll('.site-header').forEach(initHeaderMenu);

function initConsultationForm(form) {
  const fields = ['name', 'phone', 'email', 'service', 'message'];
  const button = form.querySelector('button[type="submit"]');
  const buttonLabel = button.querySelector('[data-submit-label]');
  const idleLabel = buttonLabel.textContent;
  const getPayload = () => Object.fromEntries(
    fields.map((name) => [name, form.elements.namedItem(name).value.trim()]),
  );

  const showError = (name, message = '') => {
    const field = form.elements.namedItem(name);
    const error = form.querySelector(`#${field.id}-error`);
    error.textContent = message;
    error.hidden = !message;

    if (message) {
      field.setAttribute('aria-invalid', 'true');
    } else {
      field.removeAttribute('aria-invalid');
    }
  };

  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    if (button.disabled) return;

    const payload = getPayload();
    const errors = validateLienHe(payload);
    fields.forEach((name) => showError(name, errors[name]));

    const firstInvalid = fields.find((name) => errors[name]);
    if (firstInvalid) {
      form.elements.namedItem(firstInvalid).focus();
      return;
    }

    button.disabled = true;
    buttonLabel.textContent = 'Đang gửi…';
    form.setAttribute('aria-busy', 'true');

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(payload),
      });
      const result = await response.json();

      if (response.status === 422) {
        fields.forEach((name) => showError(name, result.errors?.[name]?.[0] ?? ''));
        const invalidField = fields.find((name) => result.errors?.[name]?.length);
        showToast('Vui lòng kiểm tra lại thông tin đã nhập.', 'error');
        if (invalidField) form.elements.namedItem(invalidField).focus();
        return;
      }

      if (!response.ok) {
        showToast('Chưa gửi được lời nhắn. Vui lòng thử lại.', 'error');
        return;
      }

      form.reset();
      showToast('Gửi lời nhắn thành công.', 'success');
    } catch {
      showToast('Không thể gửi lời nhắn. Vui lòng thử lại.', 'error');
    } finally {
      button.disabled = false;
      buttonLabel.textContent = idleLabel;
      form.removeAttribute('aria-busy');
    }
  });
}

let currentMain;
let sliderCleanups = [];

function initPage() {
  const main = document.querySelector('main');
  if (!main || main === currentMain) return;
  currentMain = main;

  main.querySelectorAll('[data-home-slider]').forEach((slider) => {
    const cleanup = initHomeSlider(slider);
    if (cleanup) sliderCleanups.push(cleanup);
  });
  main.querySelectorAll('[data-team-carousel]').forEach((slider) => {
    const cleanup = initTeamSlider(slider);
    if (cleanup) sliderCleanups.push(cleanup);
  });
  main.querySelectorAll('[data-value-props-carousel]').forEach((track) => {
    const cleanup = initValuePropsCarousel(track);
    if (cleanup) sliderCleanups.push(cleanup);
  });
  main.querySelectorAll('[data-consultation-form]').forEach(initConsultationForm);

  document.querySelectorAll('.header-navigation a.header-link').forEach((link) => {
    const destination = new URL(link.href);
    const active = !destination.hash && (destination.pathname === location.pathname
      || (destination.pathname !== '/' && location.pathname.startsWith(`${destination.pathname}/`)));
    link.classList.toggle('is-active', active);
    if (active) link.setAttribute('aria-current', 'page');
    else link.removeAttribute('aria-current');
  });
}

document.addEventListener('turbo:before-render', async (event) => {
  // Keep the current page visible while the next hero image is decoded.
  event.preventDefault();
  const hero = event.detail.newBody.querySelector('.hero-page-1-image, .home-hero-slide img');
  if (hero) {
    const image = new Image();
    image.src = hero.src;
    let timeout;
    await Promise.race([
      image.decode().catch(() => {}),
      new Promise((resolve) => { timeout = setTimeout(resolve, 2000); }),
    ]);
    clearTimeout(timeout);
  }
  sliderCleanups.forEach((cleanup) => cleanup());
  sliderCleanups = [];
  currentMain = null;
  event.detail.resume();
});

document.addEventListener('turbo:load', initPage);
initPage();

// Thông báo góc phải: tự ẩn sau 3 giây.
function showToast(message, type = 'success') {
  const region = document.querySelector('[data-toast-region]');
  if (!region) return;

  const toast = document.createElement('div');
  toast.className = 'site-toast';
  toast.dataset.type = type;
  toast.setAttribute('role', type === 'error' ? 'alert' : 'status');

  const icon = document.createElement('span');
  icon.className = 'site-toast-icon';
  icon.setAttribute('aria-hidden', 'true');
  icon.textContent = type === 'success' ? '✓' : '!';

  const text = document.createElement('span');
  text.className = 'site-toast-message';
  text.textContent = message;

  toast.append(icon, text);
  region.append(toast);

  setTimeout(() => {
    toast.classList.add('is-closing');
    setTimeout(() => toast.remove(), 200);
  }, 3000);
}
