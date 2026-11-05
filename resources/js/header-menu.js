export function initHeaderMenu(header) {
  const navigation = header.querySelector('.header-navigation');
  const menuToggle = header.querySelector('[data-menu-toggle]');
  const dropdowns = [...header.querySelectorAll('[data-practice-dropdown], [data-header-dropdown]')].map((element) => ({
    element,
    trigger: element.querySelector('[data-practice-trigger], [data-header-dropdown-trigger]'),
    panel: element.querySelector('[data-practice-panel], [data-header-dropdown-panel]'),
    closeTimer: null,
    openedByHover: false,
  }));
  const backdrop = header.querySelector('[data-menu-backdrop]');
  const desktop = window.matchMedia('(min-width: 1536px)');
  const hover = window.matchMedia('(hover: hover)');

  // Panel cuộn trong phần màn hình còn lại bên dưới hàng logo.
  const updateHeaderHeight = () => {
    const height = Math.ceil(header.getBoundingClientRect().height);
    const viewportHeight = window.visualViewport?.height ?? window.innerHeight;
    header.style.setProperty('--header-height', `${height}px`);
    header.style.setProperty('--menu-max-height', `${Math.max(0, Math.floor(viewportHeight - height))}px`);
  };
  const headerObserver = new ResizeObserver(updateHeaderHeight);
  headerObserver.observe(header);
  window.addEventListener('resize', updateHeaderHeight);
  window.visualViewport?.addEventListener('resize', updateHeaderHeight);
  updateHeaderHeight();

  const setDropdown = (dropdown, open, fromHover = false) => {
    clearTimeout(dropdown.closeTimer);
    dropdown.closeTimer = null;
    dropdown.openedByHover = open && fromHover;
    dropdown.trigger.setAttribute('aria-expanded', String(open));
    dropdown.panel.hidden = !open;
    if (open) dropdowns.filter((other) => other !== dropdown).forEach((other) => setDropdown(other, false));
  };

  const setNavigation = (open) => {
    open = open && !desktop.matches;
    if (open) updateHeaderHeight();
    navigation.classList.toggle('is-open', open);
    menuToggle.setAttribute('aria-expanded', String(open));
    menuToggle.setAttribute('aria-label', open ? 'Đóng menu' : 'Mở menu');
    backdrop.hidden = !open;
    document.documentElement.classList.toggle('has-mobile-menu', open);
    if (open) navigation.scrollTop = 0;
    if (!open) {
      dropdowns.forEach((dropdown) => setDropdown(dropdown, false));
      navigation.scrollTop = 0;
    }
  };

  backdrop.addEventListener('click', () => setNavigation(false));
  document.addEventListener('turbo:before-render', () => setNavigation(false));

  dropdowns.forEach((dropdown) => {
    const { element, trigger, panel } = dropdown;
    const cancelClose = () => {
      clearTimeout(dropdown.closeTimer);
      dropdown.closeTimer = null;
    };
    trigger.addEventListener('click', () => {
      setDropdown(dropdown, panel.hidden || dropdown.openedByHover);
    });
    const scheduleClose = () => {
      if (!desktop.matches || !hover.matches) return;
      cancelClose();
      dropdown.closeTimer = setTimeout(() => setDropdown(dropdown, false), 200);
    };
    // Giữ menu mở khi chuột đi qua khoảng trống từ nhãn xuống bảng danh sách.
    document.addEventListener('pointermove', (event) => {
      if (!desktop.matches || !hover.matches || event.pointerType !== 'mouse' || panel.hidden) return;
      const menuBounds = element.getBoundingClientRect();
      const panelBounds = panel.getBoundingClientRect();
      const inside = (bounds) => event.clientX >= bounds.left && event.clientX <= bounds.right
        && event.clientY >= bounds.top && event.clientY <= bounds.bottom;
      const inBridge = event.clientX >= Math.min(menuBounds.left, panelBounds.left)
        && event.clientX <= Math.max(menuBounds.right, panelBounds.right)
        && event.clientY >= menuBounds.bottom && event.clientY <= panelBounds.top;
      if (inside(menuBounds) || inside(panelBounds) || inBridge) cancelClose();
      else if (!dropdown.closeTimer) scheduleClose();
    });
    element.addEventListener('mouseenter', () => {
      cancelClose();
      if (desktop.matches && hover.matches && panel.hidden) setDropdown(dropdown, true, true);
    });
    element.addEventListener('mouseleave', scheduleClose);
    panel.addEventListener('mouseenter', cancelClose);
    panel.addEventListener('mouseleave', scheduleClose);
    element.addEventListener('focusout', (event) => {
      if (desktop.matches && !element.contains(event.relatedTarget)) setDropdown(dropdown, false);
    });
    trigger.addEventListener('keydown', (event) => {
      if (event.key !== 'ArrowDown') return;
      event.preventDefault();
      setDropdown(dropdown, true);
      panel.querySelector('a')?.focus();
    });
  });
  menuToggle.addEventListener('click', () => {
    setNavigation(menuToggle.getAttribute('aria-expanded') !== 'true');
  });
  navigation.addEventListener('click', (event) => {
    const link = event.target.closest('a[href]');
    if (!link || event.button !== 0 || event.ctrlKey || event.metaKey || event.shiftKey || event.altKey
      || link.hasAttribute('download') || (link.target && link.target !== '_self')) return;

    const destination = new URL(link.href);
    const samePage = destination.origin === location.origin
      && destination.pathname === location.pathname && destination.search === location.search;

    // Placeholder links and the current page should not restart navigation.
    if (link.getAttribute('href') === '#' || (samePage && !destination.hash)) {
      event.preventDefault();
    }
    setNavigation(false);
  });
  document.addEventListener('pointerdown', (event) => {
    // Mobile: kéo ở vùng đệm hoặc thanh cuộn không được đóng dropdown.
    if (desktop.matches) dropdowns.forEach((dropdown) => {
      if (!dropdown.element.contains(event.target)) setDropdown(dropdown, false);
    });
    if (!header.contains(event.target)) setNavigation(false);
  });
  header.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') return;
    const openDropdown = dropdowns.find((dropdown) => !dropdown.panel.hidden);
    if (openDropdown) {
      setDropdown(openDropdown, false);
      openDropdown.trigger.focus();
    } else if (navigation.classList.contains('is-open')) {
      setNavigation(false);
      menuToggle.focus();
    }
  });
  desktop.addEventListener('change', () => setNavigation(false));
}
