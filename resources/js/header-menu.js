export function initHeaderMenu(header) {
  const navigation = header.querySelector('.header-navigation');
  const menuToggle = header.querySelector('[data-menu-toggle]');
  const dropdown = header.querySelector('[data-practice-dropdown]');
  const trigger = header.querySelector('[data-practice-trigger]');
  const panel = header.querySelector('[data-practice-panel]');
  const desktop = window.matchMedia('(min-width: 1536px)');

  const setDropdown = (open) => {
    trigger.setAttribute('aria-expanded', String(open));
    panel.hidden = !open;
  };

  const setNavigation = (open) => {
    navigation.classList.toggle('is-open', open);
    menuToggle.setAttribute('aria-expanded', String(open));
    if (!open) setDropdown(false);
  };

  trigger.addEventListener('click', () => {
    setDropdown(panel.hidden);
  });
  dropdown.addEventListener('focusout', (event) => {
    if (!dropdown.contains(event.relatedTarget)) setDropdown(false);
  });
  trigger.addEventListener('keydown', (event) => {
    if (event.key !== 'ArrowDown') return;
    event.preventDefault();
    setDropdown(true);
    panel.querySelector('button')?.focus();
  });
  menuToggle.addEventListener('click', () => {
    setNavigation(menuToggle.getAttribute('aria-expanded') !== 'true');
  });
  document.addEventListener('pointerdown', (event) => {
    if (!dropdown.contains(event.target)) setDropdown(false);
    if (!header.contains(event.target)) setNavigation(false);
  });
  header.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') return;
    if (!panel.hidden) {
      setDropdown(false);
      trigger.focus();
    } else if (navigation.classList.contains('is-open')) {
      setNavigation(false);
      menuToggle.focus();
    }
  });
  desktop.addEventListener('change', () => setNavigation(false));
}
