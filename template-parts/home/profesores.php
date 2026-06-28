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
        'role'  => 'CEO fundador',
        'img'   => RYT_URI . '/assets/img/profes/miguel.png',
        'alt'   => 'Miguel García — director y fundador de Ritmo y Tumbao',
    ],
    [
        'name'  => 'Jeni',
        'role'  => 'Instructora y directora',
        'img'   => RYT_URI . '/assets/img/profes/jeni.webp',
        'alt'   => 'Jeni — instructora y directora',
    ],
    [
        'name'  => 'Mario y Nia',
        'role'  => 'Bachata Sensual',
        'img'   => RYT_URI . '/assets/img/profes/marionia.webp',
        'alt'   => 'Mario y Nia — instructores de Bachata Sensual',
    ],
    [
        'name'  => 'Aleix y Belén',
        'role'  => 'Bachata Fusión',
        'img'   => RYT_URI . '/assets/img/profes/aleixybelen.png',
        'alt'   => 'Aleix y Belén — instructores de Bachata Fusión',
    ],
];
?>
<section class="bg-white py-[104px] px-6" id="profesores">
    <div class="max-w-[1220px] mx-auto">
        <!-- Header grid 2-col (v9) -->
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[56px]">
            <div>
                <?php ryt_eyebrow('04', 'El equipo'); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    Profesionales<br>del baile
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft mb-[22px]">
                    Nuestros profesores llevan años impartiendo clases de salsa y bachata en Mataró. Experiencia certificada y mucho ritmo.
                </p>
                <a href="<?php echo esc_url(home_url('/ritmo-y-tumbao-academia-de-baile-en-mataro/')); ?>"
                   class="inline-flex items-center gap-[9px] text-[13px] font-bold uppercase tracking-[0.1em] text-ink-heading hover:text-ryt-mint transition-colors">
                    Ver todo el equipo →
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
                Ver todo el equipo
            </a>
        </div>
    </div>
</section>
