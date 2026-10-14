import { validateLienHe } from './lienhe-validation';
import { initTeamSlider } from './team-slider';
import { initHeaderMenu } from './header-menu';
import { initHomeSlider } from './home-slider';

document.querySelectorAll('[data-home-slider]').forEach(initHomeSlider);
document.querySelectorAll('.site-header').forEach(initHeaderMenu);
document.querySelectorAll('[data-team-carousel]').forEach(initTeamSlider);

document.querySelectorAll('[data-consultation-form]').forEach((form) => {
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
});
