export function initLanguageSwitcher(switcher) {
  const buttons = [...switcher.querySelectorAll('.language-option')];
  const trigger = switcher.querySelector('.language-trigger');
  const mobile = window.matchMedia('(max-width: 767px)');
  const header = switcher.closest('.site-header');

  const close = () => {
    switcher.classList.remove('is-open');
    trigger.setAttribute('aria-expanded', 'false');
  };

  trigger.addEventListener('click', () => {
    const open = !switcher.classList.contains('is-open');
    if (open) header.dispatchEvent(new CustomEvent('header:panel-open', { detail: 'language' }));
    switcher.classList.toggle('is-open', open);
    trigger.setAttribute('aria-expanded', String(open));
  });
  header.addEventListener('header:panel-open', (event) => {
    if (event.detail !== 'language') close();
  });

  switcher.addEventListener('click', (event) => {
    const selected = event.target.closest('.language-option');
    if (!selected) return;

    switcher.dataset.language = selected.dataset.language;
    buttons.forEach((button) => {
      button.setAttribute('aria-pressed', String(button === selected));
    });
    trigger.replaceChildren(...[...selected.children].map((child) => child.cloneNode(true)));
    close();
    if (mobile.matches) trigger.focus({ preventScroll: true });
  });

  document.addEventListener('click', (event) => {
    if (!switcher.contains(event.target)) close();
  });
  switcher.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      close();
      trigger.focus({ preventScroll: true });
    }
  });
  switcher.addEventListener('focusout', (event) => {
    if (!switcher.contains(event.relatedTarget)) close();
  });
  mobile.addEventListener('change', close);
  document.addEventListener('turbo:before-visit', close);
}
