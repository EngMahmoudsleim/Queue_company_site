(() => {
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const coarsePointer = window.matchMedia('(pointer: coarse)').matches;
  if (prefersReduced || coarsePointer) return;

  const hero = document.querySelector('[data-mouse-parallax]');
  if (!hero) return;

  const orbs = hero.querySelectorAll('.hero-orb');
  let raf = null;
  let targetX = 0;
  let targetY = 0;

  hero.addEventListener('mousemove', (event) => {
    const rect = hero.getBoundingClientRect();
    const x = (event.clientX - rect.left) / rect.width - 0.5;
    const y = (event.clientY - rect.top) / rect.height - 0.5;

    targetX = x;
    targetY = y;

    if (raf) return;
    raf = requestAnimationFrame(() => {
      orbs.forEach((orb, index) => {
        const depth = index === 0 ? 18 : 12;
        const tx = targetX * depth;
        const ty = targetY * depth;
        orb.style.transform = `translate3d(${tx}px, ${ty}px, 0)`;
      });
      raf = null;
    });
  });

  hero.addEventListener('mouseleave', () => {
    orbs.forEach((orb) => {
      orb.style.transform = 'translate3d(0,0,0)';
    });
  });
})();
