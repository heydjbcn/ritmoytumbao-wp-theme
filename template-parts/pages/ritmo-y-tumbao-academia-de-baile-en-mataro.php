<?php
/**
 * Página /ritmo-y-tumbao-academia-de-baile-en-mataro/
 * Equipo completo (extraído de prod).
 */
$profes = [
    [ 'name' => 'Miguel García',  'role' => __('CEO fundador', 'ryt'),           'desc' => __('Fundador y alma de Ritmo y Tumbao. Más de 20 años enseñando salsa.', 'ryt'), 'img' => '/assets/img/profes/miguel.png' ],
    [ 'name' => 'Jeni',           'role' => __('Instructora y directora', 'ryt'),'desc' => __('Co-dirige la escuela e imparte salsa y lady style.', 'ryt'),                  'img' => '/assets/img/profes/jeni.webp' ],
    [ 'name' => 'Michael e Ivet', 'role' => __('Profesores de Bachata', 'ryt'),  'desc' => __('Pareja con energía contagiosa y técnica depurada.', 'ryt'),                  'img' => '/assets/img/profes/michaelivet.webp' ],
    [ 'name' => 'Mario y Nia',    'role' => __('Bachata Sensual', 'ryt'),        'desc' => __('Especialistas en bachata sensual moderna.', 'ryt'),                          'img' => '/assets/img/profes/marionia.webp' ],
    [ 'name' => 'Gio y Judit',    'role' => __('Bachata Fusión', 'ryt'),         'desc' => __('Profesores creativos que fusionan estilos.', 'ryt'),                         'img' => '/assets/img/profes/giojudit.webp' ],
    [ 'name' => 'Aleix y Belén',  'role' => __('Bachata Fusión', 'ryt'),         'desc' => __('Pareja joven con un estilo fresco y muy musical.', 'ryt'),                   'img' => '/assets/img/profes/aleixybelen.png' ],
    [ 'name' => 'Sandra',         'role' => __('Salsa', 'ryt'),                  'desc' => __('Co-profesora de salsa con foco en musicalidad.', 'ryt'),                     'img' => '/assets/img/profes/sandra.webp' ],
    [ 'name' => 'Thais',          'role' => __('Salsa', 'ryt'),                  'desc' => __('Profesora de salsa y de casino con timba.', 'ryt'),                          'img' => null ],
];
?>
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent text-[14vw] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.18);">
            <?php esc_html_e('Nuestro equipo', 'ryt'); ?>
        </span>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-24 text-center relative z-10">
        <span class="pre-title text-ryt-mint"><?php esc_html_e('Academia de baile en Mataró', 'ryt'); ?></span>
        <h1 class="text-white uppercase mt-3"><?php esc_html_e('Aprende a bailar en Mataró', 'ryt'); ?></h1>
        <p class="text-paper-alt mt-6 max-w-2xl mx-auto">
            <?php esc_html_e('Conoce al equipo que imparte cada estilo. Experiencia certificada y mucho ritmo.', 'ryt'); ?>
        </p>
    </div>
</section>

<section class="section bg-white">
    <div class="container mx-auto px-4 max-w-6xl">
        <header class="text-center max-w-3xl mx-auto mb-12">
            <span class="pre-title"><?php esc_html_e('Nuestro equipo', 'ryt'); ?></span>
            <h2 class="text-ink-heading uppercase"><?php esc_html_e('Profesionales del baile', 'ryt'); ?></h2>
            <p class="text-base text-ink-soft mt-4">
                <?php esc_html_e('Cada estilo, su especialista. Cada grupo, su pareja docente.', 'ryt'); ?>
            </p>
        </header>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($profes as $p): ?>
            <article class="bg-paper-soft rounded-2xl shadow-card overflow-hidden flex flex-col">
                <div class="relative aspect-square bg-mint-grad flex items-center justify-center overflow-hidden">
                    <?php if ($p['img']): ?>
                        <img src="<?php echo esc_url(RYT_URI . $p['img']); ?>"
                             alt="<?php echo esc_attr($p['name']); ?>"
                             class="w-full h-full object-cover" loading="lazy">
                    <?php else: ?>
                        <span class="font-display text-7xl text-white/90 leading-none select-none">
                            <?php echo esc_html(mb_substr($p['name'], 0, 1)); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="p-5 text-center flex-1 flex flex-col">
                    <h3 class="font-serif text-lg text-ink-heading mb-1 leading-snug"><?php echo esc_html($p['name']); ?></h3>
                    <p class="text-xs uppercase tracking-widest font-bold text-ryt-mint mb-3"><?php echo esc_html($p['role']); ?></p>
                    <p class="text-xs text-ink-soft leading-relaxed"><?php echo esc_html($p['desc']); ?></p>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section bg-paper-alt">
    <div class="container mx-auto px-4 max-w-4xl grid gap-6 md:grid-cols-3 text-center">
        <div class="bg-white rounded-2xl p-6 shadow-card">
            <h3 class="font-serif text-lg text-ink-heading mb-2"><?php esc_html_e('Experiencia certificada', 'ryt'); ?></h3>
            <p class="text-sm text-ink-soft"><?php esc_html_e('Equipo titulado y formado en escuelas internacionales.', 'ryt'); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-card">
            <h3 class="font-serif text-lg text-ink-heading mb-2"><?php esc_html_e('Toda una vida enseñando', 'ryt'); ?></h3>
            <p class="text-sm text-ink-soft"><?php esc_html_e('Más de 20 años de trayectoria al frente de Ritmo y Tumbao.', 'ryt'); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-card">
            <h3 class="font-serif text-lg text-ink-heading mb-2"><?php esc_html_e('Apreciación de clientes', 'ryt'); ?></h3>
            <p class="text-sm text-ink-soft"><?php esc_html_e('Más de 13 reseñas con 5★ en Google. La opinión de los alumnos cuenta.', 'ryt'); ?></p>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/home/cta'); ?>
