<?php
/**
 * Página /clases-de-bachata/ — v9 (Cloud Design v2).
 *
 * Hero foto cover + 3 estilos de bachata (Tradicional, Sensual, Fusión).
 */
$hero_img = RYT_URI . '/assets/img/instalaciones/sala-2.jpg';
?>
<!-- Hero foto cover -->
<section class="relative overflow-hidden text-white" style="min-height: 520px;">
    <img src="<?php echo esc_url($hero_img); ?>"
         alt="<?php echo esc_attr__('Clases de bachata en Ritmo y Tumbao Mataró', 'ryt'); ?>"
         class="absolute inset-0 w-full h-full object-cover" loading="eager">
    <div aria-hidden="true" class="absolute inset-0"
         style="background: linear-gradient(100deg, rgba(20,19,18,0.93) 0%, rgba(20,19,18,0.72) 45%, rgba(20,19,18,0.25) 100%);"></div>

    <div class="relative z-10 max-w-[1220px] mx-auto px-6 py-[110px] grid gap-10 lg:grid-cols-[1.4fr_1fr] items-center min-h-[520px]">
        <div>
            <?php ryt_eyebrow('', __('Clases de bachata en Mataró', 'ryt')); ?>
            <h1 class="text-white mb-5" style="font-size: 58px; line-height: 1.05;">
                <?php esc_html_e('Aprende a bailar', 'ryt'); ?>
                <span class="italic font-display text-ryt-mint"><?php esc_html_e('Bachata', 'ryt'); ?></span><br>
                <?php esc_html_e('en Ritmo y Tumbao', 'ryt'); ?>
            </h1>
            <p class="text-[17px] text-[#E6E1DB] leading-[1.7] mb-8 max-w-[520px]">
                <?php esc_html_e('Bachata tradicional, sensual y fusión. Para todos los niveles, sin necesidad de pareja y con profesores especializados.', 'ryt'); ?>
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary"><?php esc_html_e('Ver horarios', 'ryt'); ?></a>
                <a href="<?php echo esc_url(ryt_whatsapp_url(__('Hola! Quiero probar las clases de Bachata', 'ryt'))); ?>" target="_blank" rel="noopener"
                   class="btn btn-outline-white"><?php esc_html_e('Reservar clase gratis', 'ryt'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Intro + 3 estilos en grid 2-col -->
<section class="bg-white py-[104px] px-6">
    <div class="max-w-[1180px] mx-auto grid gap-[60px] lg:grid-cols-2 items-start">
        <div>
            <?php ryt_eyebrow('01', __('La escuela', 'ryt')); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 38px; line-height: 1.14;">
                <?php esc_html_e('Bachata para todos en Mataró', 'ryt'); ?>
            </h2>
            <p class="text-[16px] text-ink-soft leading-[1.8]">
                <?php
                printf(
                    /* translators: 1: bachata tradicional (negrita), 2: bachata sensual (negrita), 3: bachata fusión (negrita) */
                    esc_html__('En Ritmo y Tumbao impartimos %1$s (la dominicana de toda la vida), %2$s y %3$s. Cada estilo con su propio profesorado especializado y grupos por nivel para que avances a tu ritmo.', 'ryt'),
                    '<strong>' . esc_html__('bachata tradicional', 'ryt') . '</strong>',
                    '<strong>' . esc_html__('bachata sensual', 'ryt') . '</strong>',
                    '<strong>' . esc_html__('bachata fusión', 'ryt') . '</strong>'
                );
                ?>
            </p>
        </div>
        <div>
            <?php ryt_eyebrow('02', __('Por qué nosotros', 'ryt')); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 38px; line-height: 1.14;">
                <?php esc_html_e('Profesores especializados por estilo', 'ryt'); ?>
            </h2>
            <p class="text-[16px] text-ink-soft leading-[1.8]">
                <?php esc_html_e('Aleix y Belén imparten Bachata Fusión, Mario y Nia llevan la Bachata Sensual, y nuestro equipo cubre la tradicional. Cada uno con años de tarima y festivales.', 'ryt'); ?>
            </p>
        </div>
    </div>
</section>

<!-- 3 estilos cards -->
<section class="bg-paper py-[104px] px-6">
    <div class="max-w-[1180px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[48px]">
            <div>
                <?php ryt_eyebrow('03', __('3 estilos · 1 escuela', 'ryt')); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    <?php esc_html_e('Tradicional,', 'ryt'); ?><br><?php esc_html_e('sensual y fusión', 'ryt'); ?>
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    <?php esc_html_e('Elige el estilo que más te guste o pruébalos todos. Hay grupos de todos los niveles cada semana.', 'ryt'); ?>
                </p>
            </div>
        </div>
        <div class="grid gap-px bg-[#ECE7E1] border border-[#ECE7E1] rounded-3xl overflow-hidden md:grid-cols-3">
            <?php
            $estilos = [
                ['n' => '01', 'name' => __('Tradicional', 'ryt'), 'desc' => __('La bachata dominicana, con pasos clásicos y mucho ritmo. Ideal para empezar.', 'ryt')],
                ['n' => '02', 'name' => __('Sensual', 'ryt'),     'desc' => __('Movimientos fluidos, ondas y conexión. La bachata más bonita de bailar en pareja.', 'ryt')],
                ['n' => '03', 'name' => __('Fusión', 'ryt'),      'desc' => __('Mezcla de bachata con figuras de salsa, kizomba y zouk. Para los más creativos.', 'ryt')],
            ];
            foreach ($estilos as $e): ?>
            <article class="bg-white p-[36px]">
                <span class="font-display text-[40px] block leading-none mb-4" style="color: #D7DED9;">
                    <?php echo esc_html($e['n']); ?>
                </span>
                <h3 class="font-serif text-[22px] text-ink-heading mb-2"><?php echo esc_html($e['name']); ?></h3>
                <p class="text-[15px] text-ink-soft leading-[1.7]"><?php echo esc_html($e['desc']); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-12">
            <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary"><?php esc_html_e('Ver horarios y tarifas', 'ryt'); ?></a>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/home/resenas'); ?>
<?php get_template_part('template-parts/home/cta'); ?>
