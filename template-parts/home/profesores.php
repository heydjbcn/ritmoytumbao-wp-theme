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
        'img'   => null,
        'alt'   => 'Jeni — instructora y directora',
    ],
    [
        'name'  => 'Mario y Nia',
        'role'  => 'Bachata Sensual',
        'img'   => null,
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
<section class="section bg-paper-soft" id="profesores">
    <div class="container mx-auto px-4">
        <header class="text-center max-w-3xl mx-auto mb-12">
            <span class="pre-title">Clases de Salsa y Bachata en Mataró</span>
            <h2 class="text-ink-heading uppercase">Conoce a nuestros profesionales del baile</h2>
            <p class="text-base md:text-lg text-ink-soft mt-4">
                Nuestros profesores llevan años impartiendo
                <strong>clases de salsa y bachata en Mataró.</strong>
            </p>
        </header>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($profes as $p): ?>
            <article class="bg-white rounded-2xl shadow-card overflow-hidden flex flex-col">
                <div class="relative aspect-square bg-ryt-mint flex items-center justify-center overflow-hidden">
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
