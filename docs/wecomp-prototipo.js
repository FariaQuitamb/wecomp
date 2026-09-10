(function () {
  'use strict';

  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Navegação mobile ---------- */
  const toggle = document.getElementById('navToggle');
  const links = document.getElementById('navLinks');
  if (toggle && links) {
    toggle.addEventListener('click', () => {
      const open = links.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open);
    });
    links.querySelectorAll('a').forEach((a) =>
      a.addEventListener('click', () => {
        links.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
      })
    );
  }

  /* ---------- Formulário do protótipo ---------- */
  document.querySelectorAll('form[data-prototype]').forEach((form) => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const ok = form.parentElement.querySelector('.form-ok');
      form.style.display = 'none';
      if (ok) ok.style.display = 'block';
    });
  });

  /* ---------- Filtro de cobertura ---------- */
  (function coverageFilter() {
    const buttons = document.querySelectorAll('[data-filter]');
    const points = document.querySelectorAll('[data-point]');
    const count = document.getElementById('filterCount');
    if (!buttons.length) return;

    function apply(filter) {
      buttons.forEach((b) =>
        b.setAttribute('aria-pressed', String(b.dataset.filter === filter))
      );
      let visible = 0;
      points.forEach((el) => {
        const match = filter === 'todos' || el.dataset.setor === filter;
        el.classList.toggle('hidden', !match);
        if (match) visible += 1;
      });
      if (count) count.textContent = visible;
    }

    buttons.forEach((b) => b.addEventListener('click', () => apply(b.dataset.filter)));
    apply('todos');
  })();

  /* ---------- Revelação progressiva ao scroll ----------
     A lista de seletores espelha a do CSS (secção "REVELAÇÃO PROGRESSIVA").
     Alterar num sítio obriga a alterar no outro.                          */
  const REVEAL = [
    '.section-head',
    '.card',
    '.risk',
    '.comp',
    '.step',
    '.value',
    '.diff-row',
    '.media-figure',
    '.media-split .prose',
    '.band-stat',
    '.point',
    '.case',
    '.next-step',
    '.quote',
    '.legal-box',
    '.faq details',
    '.final-cta-inner > *',
  ].join(',');

  const targets = Array.from(document.querySelectorAll(REVEAL));

  if (reduced || !('IntersectionObserver' in window)) {
    targets.forEach((el) => el.classList.add('is-in'));
  } else {
    // Escalonamento: elementos irmãos entram em cascata, no máximo 5 passos.
    const seen = new Map();
    targets.forEach((el) => {
      const parent = el.parentElement;
      const i = seen.get(parent) || 0;
      seen.set(parent, i + 1);
      if (i > 0) el.style.transitionDelay = Math.min(i, 5) * 70 + 'ms';
    });

    // O que já está visível entra sem esperar pelo observador: evita o
    // pisca-pisca no primeiro ecrã e garante conteúdo visível se o
    // IntersectionObserver não chegar a disparar.
    const pending = targets.filter((el) => {
      if (el.getBoundingClientRect().top >= window.innerHeight) return true;
      el.style.transitionDelay = '';
      el.classList.add('is-in');
      return false;
    });

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add('is-in');
          io.unobserve(entry.target);
        });
      },
      { rootMargin: '0px 0px -12% 0px', threshold: 0.08 }
    );
    pending.forEach((el) => io.observe(el));
  }

  /* ---------- Contadores animados ---------- */
  (function counters() {
    if (reduced || !('IntersectionObserver' in window)) return;
    const nums = Array.from(
      document.querySelectorAll('.stat-num, .coverage-stat .n, .band-stat .n, .hero-stat-num')
    ).filter((el) => /^\d/.test(el.textContent.trim()));
    if (!nums.length) return;

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const el = entry.target;
          io.unobserve(el);
          const raw = el.textContent.trim();
          const target = parseInt(raw, 10);
          const suffix = raw.replace(/^\d+/, '');
          const duration = 1100;
          const start = performance.now();
          el.textContent = '0' + suffix;
          (function tick(now) {
            const p = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.round(target * eased) + suffix;
            if (p < 1) requestAnimationFrame(tick);
          })(start);
        });
      },
      { threshold: 0.5 }
    );
    nums.forEach((el) => io.observe(el));
  })();

  /* ---------- Vídeo de fundo do CTA ----------
     Só descarrega em ecrã largo e ligação boa. Se não carregar, ficam as
     imagens em crossfade, que já são a base visual da secção.            */
  (function ctaVideo() {
    const medias = document.querySelectorAll('.cta-media');
    if (!medias.length || reduced || !('IntersectionObserver' in window)) return;

    const conn = navigator.connection || {};
    if (conn.saveData) return;
    if (/(^|\b)(slow-2g|2g|3g)($|\b)/.test(conn.effectiveType || '')) return;
    if (window.innerWidth < 900) return;

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          const video = entry.target.querySelector('.cta-video');
          if (!video) return;

          if (!entry.isIntersecting) {
            video.pause();
            return;
          }

          if (!video.dataset.loaded) {
            video.dataset.loaded = '1';
            [['webm', 'video/webm'], ['mp4', 'video/mp4']].forEach(([key, type]) => {
              const src = video.dataset[key];
              if (!src) return;
              const source = document.createElement('source');
              source.src = src;
              source.type = type;
              video.appendChild(source);
            });
            video.addEventListener(
              'playing',
              () => entry.target.classList.add('has-video'),
              { once: true }
            );
            video.load();
          }

          const played = video.play();
          if (played && played.catch) played.catch(() => {});
        });
      },
      { rootMargin: '200px 0px', threshold: 0.01 }
    );

    medias.forEach((m) => io.observe(m));
  })();

  /* ---------- Header + barra de progresso + paralaxe ---------- */
  (function scrollEffects() {
    const header = document.querySelector('header');
    const bar = document.querySelector('.scroll-progress span');
    const layers = reduced ? [] : Array.from(document.querySelectorAll('.hero-bg, .band-bg'));
    let ticking = false;

    function frame() {
      ticking = false;
      const y = window.scrollY || window.pageYOffset;

      if (header) header.classList.toggle('scrolled', y > 60);

      if (bar) {
        const max = document.documentElement.scrollHeight - window.innerHeight;
        bar.style.width = (max > 0 ? Math.min(y / max, 1) * 100 : 0) + '%';
      }

      const vh = window.innerHeight;
      layers.forEach((el) => {
        const rect = el.parentElement.getBoundingClientRect();
        if (rect.bottom < -200 || rect.top > vh + 200) return;
        // -1 (abaixo do ecrã) → 1 (acima do ecrã)
        const progress = (vh / 2 - (rect.top + rect.height / 2)) / (vh / 2 + rect.height / 2);
        el.style.transform = 'translate3d(0,' + (progress * 42).toFixed(2) + 'px,0)';
      });
    }

    function onScroll() {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(frame);
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    frame();
  })();
})();
