/* Ritmo y Tumbao 2026 — JS mínimo (sin frameworks) */

(function () {
  'use strict';

  // Toggle menú mobile
  const toggle = document.getElementById('ryt-menu-toggle');
  const nav    = document.getElementById('ryt-mobile-nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      const isOpen = nav.classList.toggle('hidden') === false;
      toggle.setAttribute('aria-expanded', String(isOpen));
    });
  }
})();
