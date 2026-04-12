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

  document.querySelectorAll('.demo-modal-trigger').forEach((button) => {
    button.addEventListener('click', () => {
      const url = button.dataset.demoUrl || '-';
      const username = button.dataset.demoUsername || '-';
      const password = button.dataset.demoPassword || '-';

      const urlEl = document.getElementById('demo-url');
      const userEl = document.getElementById('demo-username');
      const passEl = document.getElementById('demo-password');
      const openLink = document.getElementById('open-demo-link');

      if (urlEl) urlEl.textContent = url;
      if (userEl) userEl.textContent = username;
      if (passEl) passEl.textContent = password;
      if (openLink) {
        openLink.href = url;
        openLink.classList.toggle('disabled', url === '-');
      }
    });
  });

  document.querySelectorAll('.copy-trigger').forEach((button) => {
    button.addEventListener('click', async () => {
      const target = document.getElementById(button.dataset.target);
      if (!target) return;
      await navigator.clipboard.writeText(target.textContent || '');
    });
  });
})();
