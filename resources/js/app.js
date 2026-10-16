import '@hotwired/turbo';
import { validateLienHe } from './lienhe-validation';
import { initTeamSlider } from './team-slider';
import { initHeaderMenu } from './header-menu';
import { initHomeSlider } from './home-slider';

document.querySelectorAll('.site-header').forEach(initHeaderMenu);

function initConsultationForm(form) {
  const fields = ['name', 'email', 'service', 'message'];
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

  form.addEventListener('submit', (event) => {
    event.preventDefault();

    const payload = getPayload();
    const errors = validateLienHe(payload);
    fields.forEach((name) => showError(name, errors[name]));

    const firstInvalid = fields.find((name) => errors[name]);
    if (firstInvalid) {
      form.elements.namedItem(firstInvalid).focus();
      return;
    }

    // Gắn lời gọi API tại đây khi BE cung cấp endpoint.
    form.dispatchEvent(new CustomEvent('consultation:submit', {
      detail: payload,
      bubbles: true,
    }));
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
  const hero = event.detail.newBody.querySelector('.hero-slider-image, .home-hero-slide img');
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
