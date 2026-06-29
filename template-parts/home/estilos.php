<?php
/**
 * Estilos v9 (Cloud Design v2): cards minimalistas con número grande, sin imagen.
 *
 * Cambios vs v8:
 *   - Header en grid 2-col (eyebrow + h2 izquierda, texto descriptivo derecha).
 *   - 4 cards con bordes compartidos (gap 1px sobre fondo #ECE7E1).
 *   - Sin imagen. Número grande ADLaM color mint-mute.
 *   - "Ver clases →" con flecha animada.
 */
$estilos = [
    ['t' => __('Clases de Bachata', 'ryt'), 'd' => __('Fusionamos bachata sensual y bachata dominicana en una experiencia única.', 'ryt'),  'url' => home_url('/clases-de-bachata/')],
    ['t' => __('Clases de Salsa', 'ryt'),   'd' => __('Salsa Cubana, rueda casino, figuras, tiempo musical y mucha diversión.', 'ryt'),     'url' => home_url('/clases-de-salsa/')],
    ['t' => __('Formación', 'ryt'),         'd' => __('Si quieres profundizar en tu manera de bailar estas son las clases que buscas.', 'ryt'), 'url' => home_url('/horarios-y-tarifas/')],
    ['t' => __('Coreográfico', 'ryt'),      'd' => __('Formación de ritmos latinos, perfeccionamiento y técnica de giro.', 'ryt'),           'url' => home_url('/baile-nupcial/')],
];
?>
<section class="bg-white py-[104px] px-6">
    <div class="max-w-[1220px] mx-auto">

        <!-- Header grid 2-col -->
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[60px]">
            <div>
                <?php ryt_eyebrow('01', __('Nuestras disciplinas', 'ryt')); ?>
                <h2 class="text-ink-heading"
                    style="font-size: 46px; line-height: 1.08;">
                    <?php esc_html_e('Encuentra tu estilo', 'ryt'); ?><br><?php esc_html_e('en la pista', 'ryt'); ?>
                </h2>
            </div>
            <p class="text-[16px] leading-[1.7] text-ink-soft">
                <?php esc_html_e('Desde clases de salsa y bachata hasta rueda de casino, formación y grupos coreográficos. Cada estilo, su especialista.', 'ryt'); ?>
            </p>
        </div>

        <!-- 4 cards con bordes compartidos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px rounded-[24px] overflow-hidden border border-[#ECE7E1]"
             style="background:#ECE7E1;">
            <?php foreach ($estilos as $i => $e):
                $num = str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT);
            ?>
                <a href="<?php echo esc_url($e['url']); ?>"
                   class="group flex flex-col bg-white p-[38px_30px_32px] min-h-[280px] hover:bg-paper-soft transition-colors cursor-pointer">
                    <span class="font-display text-[40px] leading-none text-ryt-mint-mute mb-auto select-none">
                        <?php echo $num; ?>
                    </span>
                    <h3 class="text-[21px] text-ink-heading my-[28px_0_12px] leading-[1.25] font-serif font-extrabold">
                        <?php echo esc_html($e['t']); ?>
                    </h3>
                    <p class="text-[13.5px] text-ink-soft leading-[1.65]">
                        <?php echo esc_html($e['d']); ?>
                    </p>
                    <span class="mt-[22px] inline-flex items-center gap-[9px] text-[11px] font-bold uppercase tracking-[0.12em] text-ryt-mint">
                        <?php esc_html_e('Ver clases', 'ryt'); ?>
                        <span class="inline-block transition-transform duration-200 group-hover:translate-x-1">→</span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
