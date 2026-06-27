<?php
/**
 * Página /bono-regalo-2/ — Bonos de regalo (1 clase, 5 clases, 10 clases).
 */
?>
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent text-[14vw] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.18);">
            Regalo
        </span>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-24 text-center relative z-10">
        <span class="pre-title text-ryt-mint">Regala bachata y salsa</span>
        <h1 class="text-white uppercase mt-3">Bonos de regalo</h1>
        <p class="text-paper-alt mt-6 max-w-2xl mx-auto">
            Una experiencia diferente y mucho más útil que otro perfume.
        </p>
    </div>
</section>

<section class="section bg-paper-alt">
    <div class="container mx-auto px-4">
        <div class="grid gap-8 md:grid-cols-3 pt-16 max-w-6xl mx-auto">
            <?php
            $bonos = [
                [ 'precio' => '12€', 'titulo' => 'Bono 1 clase',  'incluye' => 'Una clase grupal de cualquier estilo y nivel.', 'cta' => 'Regalar 1 clase' ],
                [ 'precio' => '50€', 'titulo' => 'Bono 5 clases', 'incluye' => '5 clases sueltas a usar en 2 meses. Mejor relación calidad-precio.', 'cta' => 'Regalar 5 clases' ],
                [ 'precio' => '95€', 'titulo' => 'Bono 10 clases','incluye' => '10 clases sueltas a usar en 4 meses. Para los más constantes.', 'cta' => 'Regalar 10 clases' ],
            ];
            foreach ($bonos as $b): ?>
            <article class="relative bg-white rounded-3xl shadow-card text-center flex flex-col pt-20 pb-8 px-6">
                <div class="absolute -top-12 left-1/2 -translate-x-1/2 w-28 h-28 md:w-32 md:h-32 rounded-full bg-ryt-mint shadow-lg flex items-center justify-center ring-8 ring-paper-alt">
                    <span class="font-display text-3xl md:text-4xl text-white leading-none"><?php echo esc_html($b['precio']); ?></span>
                </div>
                <h3 class="font-serif text-xl text-ink-heading mb-3 leading-snug"><?php echo esc_html($b['titulo']); ?></h3>
                <p class="text-sm text-ink-soft mb-6 flex-1"><?php echo esc_html($b['incluye']); ?></p>
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero ' . $b['cta'])); ?>"
                   target="_blank" rel="noopener" class="btn btn-primary self-center">
                    <?php echo esc_html($b['cta']); ?>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
        <p class="text-center text-sm text-ink-soft mt-12 max-w-2xl mx-auto">
            Te enviamos el bono en PDF personalizado con el nombre del afortunado. Pago por transferencia o
            Bizum.
        </p>
    </div>
</section>

<?php get_template_part('template-parts/home/cta'); ?>
