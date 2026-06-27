<?php
/**
 * Banner mid-page VERDE — "Aprende Salsa y Bachata".
 * Aparece entre horarios y estilos en prod.
 */
?>
<section class="relative bg-ryt-mint overflow-hidden">
    <!-- Texto fantasma decorativo -->
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-white/10 leading-none whitespace-nowrap text-[18vw]">
            Salsa
        </span>
    </div>

    <div class="container mx-auto px-4 py-16 md:py-20 text-center relative z-10 max-w-3xl">
        <h2 class="text-white font-serif italic mb-4">
            Aprende <span class="not-italic font-bold uppercase">Salsa y Bachata</span>
        </h2>
        <p class="text-white/90 text-base md:text-lg mb-8">
            Las mejores <strong>clases de Salsa y Bachata en Mataró</strong> de la mano de Ritmo y Tumbao.
        </p>
        <a href="<?php echo esc_url(ryt_whatsapp_url('Quiero probar mi primera clase GRATIS')); ?>"
           target="_blank" rel="noopener"
           class="inline-flex items-center justify-center px-7 py-3 rounded-pill bg-white text-ryt-mint font-sans font-bold uppercase tracking-wide hover:bg-paper-alt transition-colors">
            ¡Quiero probar!
        </a>
    </div>
</section>
