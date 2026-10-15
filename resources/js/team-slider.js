export function initTeamSlider(carousel) {
  const controller = new AbortController();
  const { signal } = controller;
  const track = carousel.querySelector('.about-team-grid');
  const viewport = carousel.querySelector('.about-team-viewport');
  const previous = carousel.querySelector('[data-team-prev]');
  const next = carousel.querySelector('[data-team-next]');
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  let timer;
  let finishAnimation;

  if (!track || track.children.length < 2) return;

  previous.disabled = false;
  next.disabled = false;

  const move = (direction) => {
    if (finishAnimation) return;

    const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
    const step = track.firstElementChild.getBoundingClientRect().width + gap;
    const clone = (direction > 0 ? track.firstElementChild : track.lastElementChild).cloneNode(true);
    clone.setAttribute('aria-hidden', 'true');
    clone.querySelectorAll('img').forEach((image) => { image.loading = 'eager'; });

    track.style.transition = 'none';
    if (direction > 0) {
      track.append(clone);
    } else {
      track.prepend(clone);
      track.style.transform = `translateX(-${step}px)`;
    }

    let fallback;
    const finish = () => {
      clearTimeout(fallback);
      track.removeEventListener('transitionend', onTransitionEnd);
      track.style.transition = 'none';
      if (direction > 0) track.firstElementChild.remove();
      else track.lastElementChild.remove();
      clone.removeAttribute('aria-hidden');
      track.style.transform = '';
      finishAnimation = undefined;
    };
    const onTransitionEnd = (event) => {
      if (event.target === track && event.propertyName === 'transform') finish();
    };
    finishAnimation = finish;

    if (reducedMotion.matches) {
      finish();
      return;
    }

    void track.offsetWidth;
    track.addEventListener('transitionend', onTransitionEnd);
    track.style.transition = 'transform 300ms ease';
    track.style.transform = direction > 0 ? `translateX(-${step}px)` : 'translateX(0)';
    fallback = setTimeout(finish, 450);
  };

  const updateAutoplay = () => {
    clearInterval(timer);
    if (!document.hidden) {
      timer = setInterval(() => move(1), 4000);
    }
  };

  previous.addEventListener('click', () => { move(-1); updateAutoplay(); });
  next.addEventListener('click', () => { move(1); updateAutoplay(); });
  viewport.addEventListener('keydown', (event) => {
    if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') return;
    event.preventDefault();
    move(event.key === 'ArrowRight' ? 1 : -1);
    updateAutoplay();
  });
  document.addEventListener('visibilitychange', updateAutoplay, { signal });
  reducedMotion.addEventListener('change', updateAutoplay, { signal });
  window.addEventListener('resize', () => finishAnimation?.(), { signal });
  updateAutoplay();

  return () => {
    clearInterval(timer);
    finishAnimation?.();
    controller.abort();
  };
}
