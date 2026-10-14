export function initHomeSlider(slider) {
  const track = slider.querySelector('[data-home-track]');
  const slides = [...track.querySelectorAll('[data-home-slide]')];
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const total = slides.length;
  if (total < 2) return;

  const clone = slides[0].cloneNode(true);
  clone.removeAttribute('data-home-slide');
  clone.setAttribute('aria-hidden', 'true');
  clone.querySelector('img').loading = 'eager';
  track.append(clone);

  let index = 0;
  let moving = false;
  let timer;
  let fallback;

  const updateSlides = () => {
    const active = index % total;
    slides.forEach((slide, position) => slide.setAttribute('aria-hidden', String(position !== active)));
  };

  const finish = () => {
    clearTimeout(fallback);
    if (index === total) {
      index = 0;
      track.style.transition = 'none';
      track.style.transform = 'translateX(0)';
    }
    moving = false;
  };

  const goTo = (target) => {
    if (moving) return;
    moving = true;
    index = target;
    track.style.transition = reducedMotion.matches ? 'none' : 'transform 650ms ease';
    track.style.transform = `translateX(-${index * 100}%)`;
    updateSlides();
    if (reducedMotion.matches) finish();
    else fallback = setTimeout(finish, 700);
  };

  const updateAutoplay = () => {
    clearInterval(timer);
    if (!reducedMotion.matches && !document.hidden) timer = setInterval(() => goTo(index + 1), 5000);
  };

  track.addEventListener('transitionend', (event) => {
    if (event.target === track && event.propertyName === 'transform') finish();
  });
  document.addEventListener('visibilitychange', updateAutoplay);
  reducedMotion.addEventListener('change', updateAutoplay);
  updateAutoplay();
}
