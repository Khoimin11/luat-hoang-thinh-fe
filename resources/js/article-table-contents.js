export function initArticleToc(toc) {
  const button = toc.querySelector('.article-toc-toggle');
  const content = toc.querySelector('.article-toc-content');
  const list = content.querySelector('ol');
  const controller = new AbortController();
  const { signal } = controller;

  const update = () => {
    const previewHeight = parseFloat(getComputedStyle(content).getPropertyValue('--toc-preview-height'));
    const overflows = list.scrollHeight > previewHeight;
    button.hidden = !overflows;
    toc.classList.toggle('is-clipped', overflows && toc.classList.contains('is-collapsed'));
  };

  const setExpanded = (expanded) => {
    toc.classList.toggle('is-collapsed', !expanded);
    button.setAttribute('aria-expanded', String(expanded));
    button.setAttribute('aria-label', expanded ? 'Thu gọn mục lục' : 'Mở rộng mục lục');
    update();
  };

  button.addEventListener('click', () => {
    setExpanded(button.getAttribute('aria-expanded') !== 'true');
  }, { signal });

  content.addEventListener('focusin', () => setExpanded(true), { signal });

  const observer = new ResizeObserver(update);
  observer.observe(list);
  setExpanded(false);

  return () => {
    controller.abort();
    observer.disconnect();
  };
}
