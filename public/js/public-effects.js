(() => {
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const coarsePointer = window.matchMedia('(pointer: coarse)').matches;

  if (!prefersReduced && !coarsePointer) {
    const hero = document.querySelector('[data-mouse-parallax]');
    if (hero) {
      const orbs = hero.querySelectorAll('.hero-orb');
      let raf = null;

      hero.addEventListener('mousemove', (event) => {
        const rect = hero.getBoundingClientRect();
        const x = (event.clientX - rect.left) / rect.width - 0.5;
        const y = (event.clientY - rect.top) / rect.height - 0.5;

        if (raf) return;
        raf = requestAnimationFrame(() => {
          orbs.forEach((orb, index) => {
            const depth = index === 0 ? 18 : 12;
            orb.style.transform = `translate3d(${x * depth}px, ${y * depth}px, 0)`;
          });
          raf = null;
        });
      });

      hero.addEventListener('mouseleave', () => orbs.forEach((orb) => (orb.style.transform = 'translate3d(0,0,0)')));
    }
  }

  document.querySelectorAll('.copy-text-trigger').forEach((button) => {
    button.addEventListener('click', async () => {
      const text = button.dataset.copyText || '';
      if (!text.trim()) return;
      await navigator.clipboard.writeText(text);
    });
  });
})();
