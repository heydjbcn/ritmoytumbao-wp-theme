<?php
/**
 * Página /horarios-y-tarifas/
 * Reusa los widgets del home: horarios + pricing.
 */
?>
<!-- Hero -->
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent text-[16vw] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.18);">
            Horarios
        </span>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-24 text-center relative z-10">
        <span class="pre-title text-ryt-mint">Clases de Salsa y Bachata en Mataró</span>
        <h1 class="text-white uppercase mt-3">Horarios y Tarifas</h1>
        <p class="text-paper-alt mt-6 max-w-2xl mx-auto">
            Mira el calendario completo de clases y elige el grupo que mejor te encaje.
        </p>
    </div>
</section>

<!-- Widget horarios completo -->
<?php get_template_part('template-parts/home/horarios'); ?>

<!-- CTA reserva -->
<section class="bg-ryt-mint text-white">
    <div class="container mx-auto px-4 py-16 md:py-20 text-center max-w-3xl">
        <h2 class="text-white font-serif italic mb-4">
            Reserva tu <span class="not-italic font-bold uppercase">clase de prueba</span> con nosotros
        </h2>
        <p class="text-white/90 mb-8">
            Gratis. Sin matrícula. Sin permanencia. Te orientamos en función de tu experiencia.
        </p>
        <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero reservar mi primera clase GRATIS')); ?>"
           target="_blank" rel="noopener"
           class="inline-flex items-center justify-center px-8 py-4 rounded-pill bg-white text-ryt-mint font-sans font-bold uppercase tracking-wide hover:bg-paper-alt transition-colors">
            Reservar clase de prueba
        </a>
    </div>
</section>

<!-- Tarifas -->
<section class="section bg-paper-alt">
    <div class="container mx-auto px-4">
        <header class="text-center max-w-3xl mx-auto mb-12">
            <span class="pre-title">Tarifas</span>
            <h2 class="text-ink-heading uppercase">Elige tu plan</h2>
        </header>
    </div>
</section>
<?php get_template_part('template-parts/home/pricing'); ?>
