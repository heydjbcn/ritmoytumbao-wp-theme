<?php
/**
 * CTA full-width VERDE MINT — v9 con texto fantasma "Tumbao" gigante (Cloud Design v2).
 *
 * Cambios v9:
 *   - py-[108px] (era py-20/28).
 *   - H2 a 46px italic con "Salsa y Bachata" en uppercase no italic.
 *   - Texto fantasma "Tumbao" 21vw, opacity 0.13.
 *   - Botón blanco con text-ryt-mint-dark.
 */
?>
<section class="relative bg-ryt-mint overflow-hidden">
    <!-- Texto fantasma "Tumbao" gigante de fondo -->
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase whitespace-nowrap leading-none"
              style="color: rgba(255,255,255,0.13); font-size: 21vw;">
            Tumbao
        </span>
    </div>

    <div class="relative z-10 max-w-[860px] mx-auto px-6 py-[108px] text-center">
        <h2 class="text-white font-serif italic leading-[1.08] mb-6"
            style="font-size: 46px;">
            Aprende a bailar
            <span class="not-italic font-bold uppercase">Salsa y Bachata</span>
            en Ritmo y Tumbao
        </h2>
        <p class="text-white/90 text-[16.5px] mb-10 max-w-[600px] mx-auto">
            Tu primera clase es <strong>gratis</strong>. Sin matrícula. Sin permanencia.
        </p>
        <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero apuntarme a las clases')); ?>"
           target="_blank" rel="noopener"
           class="inline-flex items-center justify-center px-9 py-[18px] rounded-pill bg-white text-ryt-mint-dark font-sans font-bold uppercase tracking-[0.08em] hover:bg-paper transition-colors text-[14px]">
            ¡Apúntate ya!
        </a>
    </div>
</section>
