export function initHeaderSearch(header) {
  const button = header.querySelector('[data-search-toggle]');
  const form = header.querySelector('.header-search-form');
  const root = document.documentElement;
  const mobile = window.matchMedia('(max-width: 767px)');
  let savedScrollY = null;
  const alignForm = () => {
    const right = header.getBoundingClientRect().right - button.getBoundingClientRect().right;
    form.style.setProperty('--search-right', `${right}px`);
    form.style.setProperty('--search-top', `${header.getBoundingClientRect().bottom + 12}px`);
  };

  const setOpen = (open) => {
    if (open === form.classList.contains('is-open')) return;

    if (open) {
      header.dispatchEvent(new CustomEvent('header:panel-open', { detail: 'search' }));
      if (mobile.matches) {
        savedScrollY = window.scrollY;
        root.style.setProperty('--search-scroll-y', `${-savedScrollY}px`);
        root.style.setProperty('--search-header-height', `${header.offsetHeight}px`);
        root.classList.add('has-header-search');
      }
    } else {
      form.elements.q.blur();
      if (savedScrollY !== null) {
        root.classList.remove('has-header-search');
        window.scrollTo({ top: savedScrollY, behavior: 'instant' });
        root.style.removeProperty('--search-scroll-y');
        root.style.removeProperty('--search-header-height');
        savedScrollY = null;
      }
    }
    button.setAttribute('aria-expanded', String(open));
    button.setAttribute('aria-label', open ? 'Đóng tìm kiếm' : 'Mở tìm kiếm');
    form.classList.toggle('is-open', open);
    form.inert = !open;
    if (open) {
      alignForm();
      form.elements.q.focus({ preventScroll: true });
    }
  };

  button.addEventListener('click', () => setOpen(button.getAttribute('aria-expanded') !== 'true'));
  header.addEventListener('header:panel-open', (event) => {
    if (event.detail !== 'search') setOpen(false);
  });
  window.addEventListener('resize', alignForm);
  mobile.addEventListener('change', () => setOpen(false));
  document.addEventListener('click', (event) => {
    if (!button.contains(event.target) && !form.contains(event.target)) setOpen(false);
  });
  header.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && button.getAttribute('aria-expanded') === 'true') {
      setOpen(false);
      button.focus();
    }
  });
  // Chưa nối dữ liệu tìm kiếm.
  form.addEventListener('submit', (event) => event.preventDefault());
  document.addEventListener('turbo:before-visit', () => setOpen(false));
}
