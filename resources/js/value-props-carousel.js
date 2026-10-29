// Cuộn ngang vòng lặp trên mobile; desktop giữ nguyên ba ảnh.
export function initValuePropsCarousel(track) {
  const mobile = window.matchMedia('(max-width: 767px)');
  const images = [...track.children];
  if (images.length < 2) return;

  const controller = new AbortController();
  const { signal } = controller;
  let clones = [];
  let timer;
  let touching = false;
  let cycleWidth = 0;

  const normalize = () => {
    if (!cycleWidth || touching) return;
    const offset = track.scrollLeft;
    if (offset < cycleWidth || offset >= cycleWidth * 2) {
      track.scrollLeft = cycleWidth + ((offset % cycleWidth) + cycleWidth) % cycleWidth;
    }
  };

  const scheduleNormalize = () => {
    clearTimeout(timer);
    timer = setTimeout(normalize, 180);
  };

  const measure = () => {
    if (!clones.length) return;
    cycleWidth = images[0].getBoundingClientRect().left - clones[0].getBoundingClientRect().left;
    track.scrollLeft = cycleWidth;
  };

  const update = () => {
    clearTimeout(timer);
    clones.forEach((clone) => clone.remove());
    clones = [];
    cycleWidth = 0;
    if (!mobile.matches) {
      track.scrollLeft = 0;
      return;
    }

    const copyImages = () => images.map((image) => {
      const clone = image.cloneNode(true);
      clone.alt = '';
      clone.setAttribute('aria-hidden', 'true');
      clone.loading = 'eager';
      return clone;
    });
    const before = copyImages();
    const after = copyImages();
    track.prepend(...before);
    track.append(...after);
    clones = [...before, ...after];
    measure();
  };

  track.addEventListener('scroll', scheduleNormalize, { passive: true, signal });
  track.addEventListener('scrollend', normalize, { signal });
  track.addEventListener('touchstart', () => { touching = true; }, { passive: true, signal });
  const finishTouch = () => { touching = false; scheduleNormalize(); };
  track.addEventListener('touchend', finishTouch, { passive: true, signal });
  track.addEventListener('touchcancel', finishTouch, { passive: true, signal });
  mobile.addEventListener('change', update, { signal });
  const observer = new ResizeObserver(measure);
  update();
  observer.observe(track);

  return () => {
    controller.abort();
    observer.disconnect();
    clearTimeout(timer);
    clones.forEach((clone) => clone.remove());
    track.scrollLeft = 0;
  };
}
