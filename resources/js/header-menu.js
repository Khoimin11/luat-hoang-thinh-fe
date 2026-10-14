export function initHeaderMenu(header) {
  const navigation = header.querySelector('.header-navigation');
  const menuToggle = header.querySelector('[data-menu-toggle]');
  const dropdown = header.querySelector('[data-practice-dropdown]');
  const trigger = header.querySelector('[data-practice-trigger]');
  const panel = header.querySelector('[data-practice-panel]');
  const desktop = window.matchMedia('(min-width: 1536px)');
  const hover = window.matchMedia('(hover: hover)');
  let closeTimer;
  let openedByHover = false;

  const setDropdown = (open, fromHover = false) => {
    clearTimeout(closeTimer);
    openedByHover = open && fromHover;
    trigger.setAttribute('aria-expanded', String(open));
    panel.hidden = !open;
  };

  const setNavigation = (open) => {
    navigation.classList.toggle('is-open', open);
    menuToggle.setAttribute('aria-expanded', String(open));
    if (!open) setDropdown(false);
  };

  trigger.addEventListener('click', () => {
    setDropdown(panel.hidden || openedByHover);
  });
  const scheduleClose = () => {
    if (!desktop.matches || !hover.matches) return;
    clearTimeout(closeTimer);
    closeTimer = setTimeout(() => setDropdown(false), 200);
  };
  trigger.addEventListener('mouseenter', () => {
    clearTimeout(closeTimer);
    if (desktop.matches && hover.matches && panel.hidden) setDropdown(true, true);
  });
  trigger.addEventListener('mouseleave', scheduleClose);
  panel.addEventListener('mouseenter', () => clearTimeout(closeTimer));
  panel.addEventListener('mouseleave', scheduleClose);
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
