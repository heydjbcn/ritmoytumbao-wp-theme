/* Ritmo y Tumbao 2026 — JS mínimo (sin frameworks) */

(function () {
  'use strict';

  /* ─────────────────────────────────────────────────────────────
     Menú móvil — toggle hamburguesa
     ───────────────────────────────────────────────────────────── */
  const toggle = document.getElementById('ryt-menu-toggle');
  const nav    = document.getElementById('ryt-mobile-nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      const isOpen = nav.classList.toggle('hidden') === false;
      toggle.setAttribute('aria-expanded', String(isOpen));
    });
  }

  /* ─────────────────────────────────────────────────────────────
     TOC del post — autogen + IntersectionObserver + smooth scroll
     ───────────────────────────────────────────────────────────── */
  function slugify(str) {
    return String(str)
      .toLowerCase()
      .normalize('NFD').replace(/[̀-ͯ]/g, '')
      .replace(/[^a-z0-9\s-]/g, '')
      .trim()
      .replace(/\s+/g, '-')
      .replace(/-+/g, '-')
      .slice(0, 60);
  }

  function initTOC() {
    const tocCard = document.querySelector('.ryt-toc-card');
    const tocList = document.querySelector('.ryt-toc ul');
    const content = document.querySelector('.ryt-post-content');
    if (!tocCard || !tocList || !content) return;

    const headings = Array.from(content.querySelectorAll('h2, h3'));
    // Ocultar TOC si hay menos de 2 H2
    const h2Count = headings.filter(h => h.tagName === 'H2').length;
    if (h2Count < 2) {
      tocCard.style.display = 'none';
      return;
    }

    const usedIds = new Set();
    headings.forEach((h, idx) => {
      if (!h.id) {
        let base = slugify(h.textContent || ('seccion-' + idx));
        if (!base) base = 'seccion-' + idx;
        let id = base;
        let n = 2;
        while (usedIds.has(id) || document.getElementById(id)) {
          id = base + '-' + n; n++;
        }
        h.id = id;
        usedIds.add(id);
      }
      // Scroll-margin para que el heading no quede bajo el header sticky
      h.style.scrollMarginTop = '120px';

      const li = document.createElement('li');
      li.className = h.tagName === 'H3' ? 'level-3' : 'level-2';
      const a = document.createElement('a');
      a.href = '#' + h.id;
      a.textContent = h.textContent.trim();
      a.dataset.targetId = h.id;
      li.appendChild(a);
      tocList.appendChild(li);
    });

    // Highlight activo con IntersectionObserver
    const tocLinks = Array.from(tocList.querySelectorAll('a'));
    const linkById = {};
    tocLinks.forEach(a => { linkById[a.dataset.targetId] = a; });

    let currentActive = null;
    const setActive = (a) => {
      if (currentActive === a) return;
      if (currentActive) currentActive.classList.remove('is-active');
      if (a) a.classList.add('is-active');
      currentActive = a;
    };

    const visible = new Map(); // id -> entry
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) visible.set(e.target.id, e);
        else visible.delete(e.target.id);
      });
      // Tomar el más arriba visible
      const ids = Array.from(visible.keys());
      if (ids.length) {
        // ordenar por posición DOM (orden de headings)
        ids.sort((a, b) => {
          const ai = headings.findIndex(h => h.id === a);
          const bi = headings.findIndex(h => h.id === b);
          return ai - bi;
        });
        setActive(linkById[ids[0]] || null);
      }
    }, {
      rootMargin: '-120px 0px -65% 0px',
      threshold: 0,
    });

    headings.forEach(h => observer.observe(h));

    // Smooth scroll (con offset para header sticky)
    tocList.addEventListener('click', (ev) => {
      const a = ev.target.closest('a[href^="#"]');
      if (!a) return;
      const id = a.getAttribute('href').slice(1);
      const tgt = document.getElementById(id);
      if (!tgt) return;
      ev.preventDefault();
      const y = tgt.getBoundingClientRect().top + window.pageYOffset - 100;
      window.scrollTo({ top: y, behavior: 'smooth' });
      history.pushState(null, '', '#' + id);
    });
  }

  /* ─────────────────────────────────────────────────────────────
     Compartir — copiar enlace
     ───────────────────────────────────────────────────────────── */
  function initCopyLink() {
    const btn   = document.querySelector('.ryt-share-copy');
    const toast = document.getElementById('ryt-toast');
    if (!btn) return;
    btn.addEventListener('click', async () => {
      const url = btn.dataset.url || location.href;
      try {
        await navigator.clipboard.writeText(url);
        if (toast) {
          toast.textContent = 'Enlace copiado';
          toast.classList.add('is-visible');
          setTimeout(() => toast.classList.remove('is-visible'), 2200);
        }
      } catch {
        // Fallback
        const ta = document.createElement('textarea');
        ta.value = url;
        document.body.appendChild(ta);
        ta.select();
        try { document.execCommand('copy'); } catch {}
        document.body.removeChild(ta);
        if (toast) {
          toast.textContent = 'Enlace copiado';
          toast.classList.add('is-visible');
          setTimeout(() => toast.classList.remove('is-visible'), 2200);
        }
      }
    });
  }

  // Boot
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => { initTOC(); initCopyLink(); });
  } else {
    initTOC();
    initCopyLink();
  }
})();
