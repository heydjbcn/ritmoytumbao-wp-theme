<?php
/**
 * Página /baile-nupcial/ — v9 (Cloud Design v2).
 *
 * Bloques:
 *   1. Hero foto cover full-bleed (cambre.webp).
 *   2. Intro emocional grid 2-col con foto humo (primer-baile.webp).
 *   3. Cómo trabajamos — 3 pasos.
 *   4. Paquetes (Pack Básico 170€ + Pack Premium 260€).
 *   5. Galería decorativa con detalle vestido.
 *   6. FAQ.
 *   7. CTA grande.
 */
$faqs = [
    ['q' => __('¿Cuánto tiempo antes de la boda deberíamos empezar?', 'ryt'),     'a' => __('Lo ideal es 2-3 meses antes para tener margen. Si nunca habéis bailado, mejor empezar 4 meses antes.', 'ryt')],
    ['q' => __('¿Qué diferencia hay entre el Pack Básico y el Premium?', 'ryt'),  'a' => __('El Básico son 3h (para pulir una coreografía concreta) y el Premium 5h (para aprender desde cero). El Premium incluye 2 canciones editadas en vez de 1.', 'ryt')],
    ['q' => __('¿Qué pasa si necesitamos más clases?', 'ryt'),                    'a' => __('Puedes ampliar a 40 €/hora extra cuando haga falta.', 'ryt')],
    ['q' => __('¿Nos ayudáis a elegir la canción?', 'ryt'),                       'a' => __('Sí. Proponemos canciones que se adapten al tipo de baile que queréis y al ritmo que mejor os va.', 'ryt')],
    ['q' => __('¿Y si nunca hemos bailado antes?', 'ryt'),                        'a' => __('Sin problema. Empezamos desde el primer paso y avanzamos a vuestro ritmo.', 'ryt')],
];

$pasos = [
    [
        'n'    => '01',
        'h'    => __('Hablamos por WhatsApp', 'ryt'),
        'desc' => __('Nos cuentas la fecha, qué buscáis, vuestro nivel y si tenéis canción elegida.', 'ryt'),
    ],
    [
        'n'    => '02',
        'h'    => __('Diseñamos la coreografía', 'ryt'),
        'desc' => __('Adaptamos los pasos al tipo de baile que queréis (salsa, bachata, vals, fusión) y al espacio donde vais a bailar.', 'ryt'),
    ],
    [
        'n'    => '03',
        'h'    => __('Practicamos hasta el día', 'ryt'),
        'desc' => __('Clases personalizadas en la escuela. Os dejamos audio editado y vídeo de referencia para ensayar.', 'ryt'),
    ],
];
?>

<!-- Hero foto cover -->
<section class="relative overflow-hidden text-white" style="min-height: 560px;">
    <img src="<?php echo esc_url(RYT_URI . '/assets/img/nupcial/novios-baile.webp'); ?>"
         alt="<?php echo esc_attr__('Novios bailando — Ritmo y Tumbao baile nupcial Mataró', 'ryt'); ?>"
         class="absolute inset-0 w-full h-full object-cover"
         style="object-position: 50% 35%;" loading="eager">
    <div aria-hidden="true" class="absolute inset-0"
         style="background: linear-gradient(100deg, rgba(20,19,18,0.92) 0%, rgba(20,19,18,0.65) 45%, rgba(20,19,18,0.15) 100%);"></div>

    <div class="relative z-10 max-w-[1220px] mx-auto px-6 py-[120px] grid gap-10 lg:grid-cols-[1.3fr_1fr] items-center min-h-[560px]">
        <div>
            <?php ryt_eyebrow('', __('Vuestro gran día', 'ryt')); ?>
            <h1 class="text-white mb-5" style="font-size: 60px; line-height: 1.03; letter-spacing: -0.01em;">
                <?php esc_html_e('Vuestro', 'ryt'); ?>
                <span class="italic font-display text-ryt-mint"><?php esc_html_e('primer baile', 'ryt'); ?></span><br>
                <?php esc_html_e('empieza aquí', 'ryt'); ?>
            </h1>
            <p class="text-[17px] text-[#EBE7E2] leading-[1.7] mb-8 max-w-[520px]">
                <?php esc_html_e('Preparamos vuestra primera baile como pareja casada, con clases personalizadas, edición musical y la coreografía pensada para vuestra canción.', 'ryt'); ?>
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="#paquetes" class="btn btn-primary"><?php esc_html_e('Ver paquetes', 'ryt'); ?></a>
                <a href="<?php echo esc_url(ryt_whatsapp_url(__('Hola! Queremos preparar nuestra primera baile de boda', 'ryt'))); ?>" target="_blank" rel="noopener"
                   class="btn btn-outline-white"><?php esc_html_e('Pregúntanos por WhatsApp', 'ryt'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Intro emocional con foto humo -->
<section class="bg-paper py-[104px] px-6">
    <div class="max-w-[1180px] mx-auto grid gap-[56px] lg:grid-cols-2 items-center">
        <div>
            <?php ryt_eyebrow('01', __('Vuestro primer baile como pareja', 'ryt')); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 42px; line-height: 1.1;">
                <?php esc_html_e('Un momento que', 'ryt'); ?><br><?php esc_html_e('no se olvida', 'ryt'); ?>
            </h2>
            <p class="text-[16.5px] text-ink-soft leading-[1.8] mb-4">
                <?php esc_html_e('Es la primera baile como recién casados. La canción que habéis elegido. Los ojos puestos en vosotros, las cámaras, los nervios. Lo último que queréis es ir mirando los pies.', 'ryt'); ?>
            </p>
            <p class="text-[16.5px] text-ink-soft leading-[1.8]">
                <?php esc_html_e('Os preparamos para que disfrutéis ese momento, no para que sufráis. Diseñamos la coreografía a vuestra medida, según vuestro nivel, vuestra canción y el espacio donde vais a bailar.', 'ryt'); ?>
            </p>
        </div>
        <div>
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/nupcial/primer-baile.webp'); ?>"
                 alt="<?php echo esc_attr__('Primer baile de novios con humo en una boda', 'ryt'); ?>"
                 class="rounded-[24px] shadow-[0_24px_60px_rgba(38,37,36,0.18)] w-full h-auto"
                 loading="lazy">
        </div>
    </div>
</section>

<!-- Cómo trabajamos: 3 pasos -->
<section class="bg-white py-[100px] px-6">
    <div class="max-w-[1220px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[48px]">
            <div>
                <?php ryt_eyebrow('02', __('Cómo trabajamos', 'ryt')); ?>
                <h2 class="text-ink-heading" style="font-size: 42px; line-height: 1.08;">
                    <?php esc_html_e('De WhatsApp', 'ryt'); ?><br><?php esc_html_e('al baile final', 'ryt'); ?>
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    <?php esc_html_e('Un proceso sencillo y a vuestro ritmo. Sin clases en grupo: solo vosotros dos y el profesor.', 'ryt'); ?>
                </p>
            </div>
        </div>

        <div class="grid gap-px bg-[#ECE7E1] border border-[#ECE7E1] rounded-3xl overflow-hidden md:grid-cols-3">
            <?php foreach ($pasos as $p): ?>
            <article class="bg-white p-[36px]">
                <span class="font-display text-[42px] block leading-none mb-4" style="color: #D7DED9;"><?php echo esc_html($p['n']); ?></span>
                <h3 class="font-serif text-[22px] text-ink-heading mb-3"><?php echo esc_html($p['h']); ?></h3>
                <p class="text-[15px] text-ink-soft leading-[1.7]"><?php echo esc_html($p['desc']); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Paquetes -->
<section class="bg-paper py-[104px] px-6" id="paquetes">
    <div class="max-w-[1220px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[56px]">
            <div>
                <?php ryt_eyebrow('03', __('Dos paquetes', 'ryt')); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    <?php esc_html_e('Elige el que', 'ryt'); ?><br><?php esc_html_e('mejor os va', 'ryt'); ?>
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    <?php esc_html_e('El Básico para parejas con algo de base que quieren pulir una coreografía. El Premium para empezar desde cero con tranquilidad.', 'ryt'); ?>
                </p>
            </div>
        </div>

        <div class="grid gap-7 md:grid-cols-2 max-w-[1020px] mx-auto">
            <!-- Pack Básico -->
            <article class="bg-white rounded-[24px] border border-[#EFEBE6] shadow-[0_18px_50px_rgba(38,37,36,0.07)] overflow-hidden flex flex-col">
                <div class="h-[6px] bg-ryt-mint"></div>
                <div class="p-[34px] flex-1 flex flex-col">
                    <p class="text-[11px] uppercase tracking-[0.16em] font-bold text-ryt-mint mb-3"><?php esc_html_e('Pack Básico', 'ryt'); ?></p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="font-display text-[60px] text-ink-heading leading-none">170€</span>
                    </div>
                    <p class="text-[15px] text-ink-soft leading-[1.7] mb-5">
                        <?php esc_html_e('Ideal para parejas con experiencia previa que necesitan pulir una coreografía concreta.', 'ryt'); ?>
                    </p>
                    <ul class="flex flex-col gap-2.5 mb-7">
                        <?php foreach ([
                            __('3 horas de clase personalizada', 'ryt'),
                            __('Edición musical de 1 canción', 'ryt'),
                            __('20% descuento en clases de la escuela', 'ryt'),
                        ] as $f): ?>
                        <li class="flex items-start gap-2.5 text-[14.5px] text-ink-heading">
                            <span class="flex-shrink-0 mt-0.5 w-5 h-5 rounded-full inline-flex items-center justify-center bg-ryt-mint-soft text-ryt-mint-dark">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <?php echo esc_html($f); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo esc_url(ryt_whatsapp_url(__('Hola! Quiero reservar el Pack Básico de baile nupcial', 'ryt'))); ?>"
                       target="_blank" rel="noopener" class="btn btn-outline mt-auto">
                        <?php esc_html_e('Reservar Pack Básico', 'ryt'); ?>
                    </a>
                </div>
            </article>

            <!-- Pack Premium -->
            <article class="relative bg-white rounded-[24px] border-2 border-ryt-mint shadow-[0_28px_70px_rgba(98,216,172,0.18)] overflow-hidden flex flex-col">
                <div class="h-[6px] bg-ryt-deep"></div>
                <span class="absolute top-5 right-5 bg-ryt-deep text-white text-[10px] uppercase tracking-[0.14em] font-bold px-3 py-1.5 rounded-pill"><?php esc_html_e('Recomendado', 'ryt'); ?></span>
                <div class="p-[34px] flex-1 flex flex-col">
                    <p class="text-[11px] uppercase tracking-[0.16em] font-bold text-ryt-mint-dark mb-3"><?php esc_html_e('Pack Premium', 'ryt'); ?></p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="font-display text-[60px] text-ink-heading leading-none">260€</span>
                    </div>
                    <p class="text-[15px] text-ink-soft leading-[1.7] mb-5">
                        <?php esc_html_e('Si nunca habéis bailado o queréis aprender desde cero con calma. Ideal para preparar entrada y baile final.', 'ryt'); ?>
                    </p>
                    <ul class="flex flex-col gap-2.5 mb-7">
                        <?php foreach ([
                            __('5 horas de clase personalizada', 'ryt'),
                            __('Edición musical de 2 canciones', 'ryt'),
                            __('20% descuento en clases de la escuela', 'ryt'),
                            __('Clases extras a 40 €/hora', 'ryt'),
                        ] as $f): ?>
                        <li class="flex items-start gap-2.5 text-[14.5px] text-ink-heading">
                            <span class="flex-shrink-0 mt-0.5 w-5 h-5 rounded-full inline-flex items-center justify-center bg-ryt-mint-soft text-ryt-mint-dark">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <?php echo esc_html($f); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo esc_url(ryt_whatsapp_url(__('Hola! Quiero reservar el Pack Premium de baile nupcial', 'ryt'))); ?>"
                       target="_blank" rel="noopener" class="btn btn-primary mt-auto">
                        <?php esc_html_e('Reservar Pack Premium', 'ryt'); ?>
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Detalle vestido + FAQ -->
<section class="bg-white py-[100px] px-6">
    <div class="max-w-[1220px] mx-auto grid gap-[56px] lg:grid-cols-[1fr_1.4fr] items-start">
        <!-- Foto detalle vestido (vertical lateral) -->
        <div class="hidden lg:block lg:sticky lg:top-[130px]">
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/nupcial/vestido-boda.webp'); ?>"
                 alt="<?php echo esc_attr__('Detalle de vestido de novia con encaje', 'ryt'); ?>"
                 class="rounded-[24px] shadow-[0_24px_60px_rgba(38,37,36,0.16)] w-full h-auto"
                 loading="lazy">
            <p class="mt-4 text-[12px] uppercase tracking-[0.16em] font-bold text-ryt-mint"><?php esc_html_e('Vuestro gran día · Vuestro baile', 'ryt'); ?></p>
        </div>

        <!-- FAQ -->
        <div>
            <?php ryt_eyebrow('04', __('Preguntas frecuentes', 'ryt')); ?>
            <h2 class="text-ink-heading mb-[28px]" style="font-size: 38px; line-height: 1.1;">
                <?php esc_html_e('¿Tenéis dudas? Las resolvemos', 'ryt'); ?>
            </h2>

            <div class="flex flex-col gap-3">
                <?php foreach ($faqs as $i => $f): ?>
                <details class="ryt-faq-item bg-paper rounded-[16px] border border-[#EFEBE6]" <?php echo $i === 0 ? 'open' : ''; ?>>
                    <summary class="font-sans font-semibold text-ink-heading cursor-pointer list-none flex items-center justify-between gap-4 p-[20px_24px] text-[15.5px]">
                        <span><?php echo esc_html($f['q']); ?></span>
                        <span class="ryt-faq-plus" aria-hidden="true">+</span>
                    </summary>
                    <p class="px-[24px] pb-[22px] -mt-1 text-[14.5px] text-ink-soft leading-[1.7]"><?php echo esc_html($f['a']); ?></p>
                </details>
                <?php endforeach; ?>
            </div>

            <p class="mt-8">
                <a href="<?php echo esc_url(ryt_whatsapp_url(__('Hola! Tengo una duda sobre el baile nupcial', 'ryt'))); ?>"
                   target="_blank" rel="noopener" class="btn btn-primary">
                    <?php esc_html_e('Escríbenos por WhatsApp', 'ryt'); ?>
                </a>
            </p>
        </div>
    </div>
</section>

<!-- CTA grande compartido -->
<?php get_template_part('template-parts/home/cta'); ?>
