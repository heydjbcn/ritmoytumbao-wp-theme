<?php
/**
 * Reseñas — 4 cards reales extraídas del widget Google de prod + rating agregado.
 */
$reviews = [
    [ 'name' => 'Monica Soria',         'when' => __('hace 4 años', 'ryt'), 'text' => __('Buena escuela de baile con profesores muy cualificados.', 'ryt'), 'initial' => 'M', 'color' => 'bg-rose-400' ],
    [ 'name' => 'Agencia Kreatib',      'when' => __('hace 4 años', 'ryt'), 'text' => __('Escuela muy recomendable y grupos del mismo nivel!', 'ryt'),     'initial' => 'A', 'color' => 'bg-sky-400'   ],
    [ 'name' => 'Natalia Montesinos',   'when' => __('hace 5 años', 'ryt'), 'text' => __('Increíble ambiente, escuela inmejorable!', 'ryt'),                'initial' => 'N', 'color' => 'bg-amber-400' ],
    [ 'name' => 'Jose Posilio',         'when' => __('hace 5 años', 'ryt'), 'text' => __('Si quieres disfrutar y aprender haciendo clases de salsa/bachata este es tu sitio.', 'ryt'), 'initial' => 'J', 'color' => 'bg-emerald-400' ],
];
?>
<section class="section bg-paper-soft">
    <div class="container mx-auto px-4">
        <header class="text-center max-w-3xl mx-auto mb-10">
            <span class="pre-title"><?php esc_html_e('Clases de Salsa y Bachata en Mataró', 'ryt'); ?></span>
            <h2 class="text-ink-heading uppercase"><?php esc_html_e('Nuestros alumnos dicen', 'ryt'); ?></h2>
        </header>

        <!-- Rating agregado -->
        <div class="flex items-center justify-center gap-4 mb-10">
            <span class="font-display text-4xl text-ink-heading leading-none">5.0</span>
            <div class="flex gap-0.5 text-ryt-mint">
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                <?php endfor; ?>
            </div>
            <span class="text-sm text-ink-soft"><?php esc_html_e('Basado en 13+ reseñas en Google', 'ryt'); ?></span>
        </div>

        <!-- 4 cards -->
        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($reviews as $r): ?>
            <article class="bg-white rounded-2xl shadow-card p-6 flex flex-col">
                <div class="flex items-center gap-3 mb-3">
                    <span class="<?php echo esc_attr($r['color']); ?> w-10 h-10 rounded-full text-white font-bold uppercase flex items-center justify-center text-lg">
                        <?php echo esc_html($r['initial']); ?>
                    </span>
                    <div>
                        <p class="font-sans font-semibold text-sm text-ink-heading leading-tight"><?php echo esc_html($r['name']); ?></p>
                        <p class="text-xs text-ink-mute"><?php echo esc_html($r['when']); ?></p>
                    </div>
                </div>
                <div class="flex gap-0.5 text-ryt-mint mb-3">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <?php endfor; ?>
                </div>
                <p class="text-sm leading-relaxed text-ink-soft flex-1"><?php echo esc_html($r['text']); ?></p>
                <p class="mt-3 text-[10px] uppercase tracking-widest text-ink-mute">Google</p>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-10">
            <a href="https://www.google.com/maps/place/Ritmo+y+Tumbao" target="_blank" rel="noopener" class="btn btn-primary">
                <?php esc_html_e('Ver todas las reseñas', 'ryt'); ?>
            </a>
        </div>
    </div>
</section>
