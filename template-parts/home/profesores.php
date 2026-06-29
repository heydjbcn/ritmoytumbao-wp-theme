<?php
/**
 * Profesores — grid 4 cards con el equipo real de Ritmo y Tumbao.
 *
 * Equipo extraído de /ritmo-y-tumbao-academia-de-baile-en-mataro.html:
 *   - Miguel García         — CEO fundador
 *   - Jeni                  — Instructora y directora
 *   - Mario y Nia           — Bachata Sensual
 *   - Aleix y Belén         — Bachata Fusión
 *   (más en la página completa: Michael e Ivet, Gio y Judit, Sandra…)
 */
$profes = [
    [
        'name'  => 'Miguel García',
        'role'  => __('CEO fundador', 'ryt'),
        'img'   => RYT_URI . '/assets/img/profes/miguel.png',
        'alt'   => __('Miguel García — director y fundador de Ritmo y Tumbao', 'ryt'),
    ],
    [
        'name'  => 'Jeni',
        'role'  => __('Instructora y directora', 'ryt'),
        'img'   => RYT_URI . '/assets/img/profes/jeni.webp',
        'alt'   => __('Jeni — instructora y directora', 'ryt'),
    ],
    [
        'name'  => 'Mario y Nia',
        'role'  => __('Bachata Sensual', 'ryt'),
        'img'   => RYT_URI . '/assets/img/profes/marionia.webp',
        'alt'   => __('Mario y Nia — instructores de Bachata Sensual', 'ryt'),
    ],
    [
        'name'  => 'Aleix y Belén',
        'role'  => __('Bachata Fusión', 'ryt'),
        'img'   => RYT_URI . '/assets/img/profes/aleixybelen.png',
        'alt'   => __('Aleix y Belén — instructores de Bachata Fusión', 'ryt'),
    ],
];
?>
<section class="bg-white py-[104px] px-6" id="profesores">
    <div class="max-w-[1220px] mx-auto">
        <!-- Header grid 2-col (v9) -->
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[56px]">
            <div>
                <?php ryt_eyebrow('04', __('El equipo', 'ryt')); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    <?php esc_html_e('Profesionales', 'ryt'); ?><br><?php esc_html_e('del baile', 'ryt'); ?>
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft mb-[22px]">
                    <?php esc_html_e('Nuestros profesores llevan años impartiendo clases de salsa y bachata en Mataró. Experiencia certificada y mucho ritmo.', 'ryt'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/ritmo-y-tumbao-academia-de-baile-en-mataro/')); ?>"
                   class="inline-flex items-center gap-[9px] text-[13px] font-bold uppercase tracking-[0.1em] text-ink-heading hover:text-ryt-mint transition-colors">
                    <?php esc_html_e('Ver todo el equipo →', 'ryt'); ?>
                </a>
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($profes as $p): ?>
            <article class="bg-white rounded-2xl shadow-card overflow-hidden flex flex-col">
                <div class="relative aspect-square bg-mint-grad flex items-center justify-center overflow-hidden">
                    <?php if (!empty($p['img'])): ?>
                        <img src="<?php echo esc_url($p['img']); ?>"
                             alt="<?php echo esc_attr($p['alt']); ?>"
                             class="w-full h-full object-cover"
                             loading="lazy">
                    <?php else: ?>
                        <!-- Placeholder verde con iniciales (foto pendiente) -->
                        <span class="font-display text-7xl text-white/90 leading-none select-none">
                            <?php echo esc_html(mb_substr($p['name'], 0, 1)); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="p-5 text-center flex-1 flex flex-col">
                    <h3 class="font-serif text-lg text-ink-heading mb-1 leading-snug">
                        <?php echo esc_html($p['name']); ?>
                    </h3>
                    <p class="text-xs uppercase tracking-widest font-bold text-ryt-mint">
                        <?php echo esc_html($p['role']); ?>
                    </p>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo esc_url(home_url('/ritmo-y-tumbao-academia-de-baile-en-mataro/')); ?>" class="btn btn-primary">
                <?php esc_html_e('Ver todo el equipo', 'ryt'); ?>
            </a>
        </div>
    </div>
</section>
