<?php
/**
 * CTA full-width VERDE MINT — "Aprende a bailar SALSA Y BACHATA en Ritmo y Tumbao".
 *
 * Prod: banner verde mint a toda anchura con título serif blanco grande y botón blanco redondeado.
 */
?>
<section class="relative bg-ryt-mint overflow-hidden">
    <!-- Texto decorativo sutil de fondo -->
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-white/10 text-[20vw] leading-none whitespace-nowrap">
            Tumbao
        </span>
    </div>

    <div class="container mx-auto px-4 py-20 md:py-28 text-center relative z-10 max-w-4xl">
        <h2 class="text-white font-serif italic leading-tight mb-8">
            Aprende a bailar
            <span class="not-italic font-bold uppercase">Salsa y Bachata</span>
            en Ritmo y Tumbao
        </h2>
        <p class="text-white/90 text-base md:text-lg mb-10">
            Tu primera clase es gratis. Sin matrícula. Sin permanencia.
        </p>
        <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero apuntarme a las clases')); ?>"
           target="_blank" rel="noopener"
           class="inline-flex items-center justify-center px-8 py-4 rounded-pill bg-white text-ryt-mint font-sans font-bold uppercase tracking-wide hover:bg-paper-alt transition-colors">
            ¡Apúntate ya!
        </a>
    </div>
</section>
