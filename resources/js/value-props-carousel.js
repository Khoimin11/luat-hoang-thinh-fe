// Slider vòng lặp trên mobile; tùy chọn tự chạy, desktop giữ bố cục tĩnh.
export function initValuePropsCarousel(track, { autoplay = 0 } = {}) {
  const mobile = window.matchMedia('(max-width: 767px)');
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const items = [...track.children];
  if (items.length < 2) return;

  const controller = new AbortController();
  const { signal } = controller;
  let clones = [];
  let timer;
  let touching = false;
  let cycleWidth = 0;
  let cycleStart = 0;
  let autoTimer;
  let visible = false;
  let hovering = false;
  let activeFrame = 0;
  const highlightActive = track.hasAttribute('data-highlight-active');

  const updateActive = () => {
    if (!highlightActive || !mobile.matches) return;
    const slides = [...track.children];
    const bounds = track.getBoundingClientRect();
    const center = bounds.left + track.clientWidth / 2;
    let nearest = 0;
    let distance = Infinity;
    slides.forEach((slide, index) => {
      const rect = slide.getBoundingClientRect();
      const nextDistance = Math.abs(rect.left + rect.width / 2 - center);
      if (nextDistance < distance) {
        distance = nextDistance;
        nearest = index;
      }
    });
    // Cùng trạng thái cho các bản sao để khi nối vòng không bị nháy hiệu ứng.
    slides.forEach((slide, index) => {
      slide.classList.toggle('is-active', index % items.length === nearest % items.length);
    });
  };

  const scheduleActive = () => {
    if (!highlightActive || activeFrame) return;
    activeFrame = requestAnimationFrame(() => {
      activeFrame = 0;
      updateActive();
    });
  };

  const scheduleAutoplay = () => {
    clearTimeout(autoTimer);
    if (!autoplay || !mobile.matches || !visible || touching || hovering
      || document.hidden || reducedMotion.matches || track.contains(document.activeElement)) return;
    autoTimer = setTimeout(() => {
      track.scrollBy({ left: cycleWidth / items.length, behavior: 'smooth' });
      scheduleAutoplay();
    }, autoplay);
  };

  const normalize = () => {
    if (!cycleWidth || touching) return;
    const offset = track.scrollLeft - cycleStart;
    if (offset < -1 || offset >= cycleWidth - 1) {
      track.scrollLeft = cycleStart + ((offset % cycleWidth) + cycleWidth) % cycleWidth;
    }
  };

  const scheduleNormalize = () => {
    scheduleActive();
    clearTimeout(timer);
    timer = setTimeout(normalize, 180);
    scheduleAutoplay();
  };

  const measure = () => {
    if (!clones.length) return;
    cycleWidth = items[0].offsetLeft - clones[0].offsetLeft;
    const centered = getComputedStyle(items[0]).scrollSnapAlign.includes('center');
    cycleStart = cycleWidth - (centered ? (track.clientWidth - items[0].offsetWidth) / 2 : 0);
    track.scrollLeft = cycleStart;
    updateActive();
    scheduleAutoplay();
  };

  const update = () => {
    clearTimeout(timer);
    clearTimeout(autoTimer);
    clones.forEach((clone) => clone.remove());
    clones = [];
    cycleWidth = 0;
    cycleStart = 0;
    track.classList.remove('is-carousel-ready');
    items.forEach((item) => item.classList.remove('is-active'));
    if (!mobile.matches) {
      track.scrollLeft = 0;
      return;
    }

    const copyItems = () => items.map((item) => {
      const clone = item.cloneNode(true);
      clone.setAttribute('aria-hidden', 'true');
      clone.inert = true;
      const images = clone.matches('img') ? [clone] : [...clone.querySelectorAll('img')];
      images.forEach((image) => { image.alt = ''; image.loading = 'eager'; });
      return clone;
    });
    const before = copyItems();
    const after = copyItems();
    track.prepend(...before);
    track.append(...after);
    clones = [...before, ...after];
    measure();
    if (highlightActive) track.classList.add('is-carousel-ready');
  };

  track.addEventListener('scroll', scheduleNormalize, { passive: true, signal });
  track.addEventListener('scrollend', normalize, { signal });
  track.addEventListener('touchstart', () => {
    touching = true;
    clearTimeout(autoTimer);
  }, { passive: true, signal });
  const finishTouch = () => { touching = false; scheduleNormalize(); };
  track.addEventListener('touchend', finishTouch, { passive: true, signal });
  track.addEventListener('touchcancel', finishTouch, { passive: true, signal });
  mobile.addEventListener('change', update, { signal });
  reducedMotion.addEventListener('change', scheduleAutoplay, { signal });
  document.addEventListener('visibilitychange', scheduleAutoplay, { signal });
  track.addEventListener('pointerenter', (event) => {
    if (event.pointerType !== 'mouse') return;
    hovering = true;
    scheduleAutoplay();
  }, { signal });
  track.addEventListener('pointerleave', () => {
    hovering = false;
    scheduleAutoplay();
  }, { signal });
  track.addEventListener('focusin', () => clearTimeout(autoTimer), { signal });
  track.addEventListener('focusout', () => queueMicrotask(scheduleAutoplay), { signal });
  const visibilityObserver = new IntersectionObserver(([entry]) => {
    visible = entry.isIntersecting;
    scheduleAutoplay();
  }, { threshold: 0.2 });
  let trackWidth = track.clientWidth;
  const observer = new ResizeObserver(() => {
    const nextWidth = track.clientWidth;
    if (nextWidth === trackWidth) return;
    trackWidth = nextWidth;
    measure();
  });
  update();
  observer.observe(track);
  visibilityObserver.observe(track);

  return () => {
    controller.abort();
    observer.disconnect();
    visibilityObserver.disconnect();
    clearTimeout(timer);
    clearTimeout(autoTimer);
    cancelAnimationFrame(activeFrame);
    clones.forEach((clone) => clone.remove());
    track.classList.remove('is-carousel-ready');
    items.forEach((item) => item.classList.remove('is-active'));
    track.scrollLeft = 0;
  };
}
