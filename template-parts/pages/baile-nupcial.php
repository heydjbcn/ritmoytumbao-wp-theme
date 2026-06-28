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
    ['q' => '¿Cuánto tiempo antes de la boda deberíamos empezar?',     'a' => 'Lo ideal es 2-3 meses antes para tener margen. Si nunca habéis bailado, mejor empezar 4 meses antes.'],
    ['q' => '¿Qué diferencia hay entre el Pack Básico y el Premium?',  'a' => 'El Básico son 3h (para pulir una coreografía concreta) y el Premium 5h (para aprender desde cero). El Premium incluye 2 canciones editadas en vez de 1.'],
    ['q' => '¿Qué pasa si necesitamos más clases?',                    'a' => 'Puedes ampliar a 40 €/hora extra cuando haga falta.'],
    ['q' => '¿Nos ayudáis a elegir la canción?',                       'a' => 'Sí. Proponemos canciones que se adapten al tipo de baile que queréis y al ritmo que mejor os va.'],
    ['q' => '¿Y si nunca hemos bailado antes?',                        'a' => 'Sin problema. Empezamos desde el primer paso y avanzamos a vuestro ritmo.'],
];

$pasos = [
    [
        'n'    => '01',
        'h'    => 'Hablamos por WhatsApp',
        'desc' => 'Nos cuentas la fecha, qué buscáis, vuestro nivel y si tenéis canción elegida.',
    ],
    [
        'n'    => '02',
        'h'    => 'Diseñamos la coreografía',
        'desc' => 'Adaptamos los pasos al tipo de baile que queréis (salsa, bachata, vals, fusión) y al espacio donde vais a bailar.',
    ],
    [
        'n'    => '03',
        'h'    => 'Practicamos hasta el día',
        'desc' => 'Clases personalizadas en la escuela. Os dejamos audio editado y vídeo de referencia para ensayar.',
    ],
];
?>

<!-- Hero foto cover -->
<section class="relative overflow-hidden text-white" style="min-height: 560px;">
    <img src="<?php echo esc_url(RYT_URI . '/assets/img/nupcial/novios-baile.webp'); ?>"
         alt="Novios bailando — Ritmo y Tumbao baile nupcial Mataró"
         class="absolute inset-0 w-full h-full object-cover"
         style="object-position: 50% 35%;" loading="eager">
    <div aria-hidden="true" class="absolute inset-0"
         style="background: linear-gradient(100deg, rgba(20,19,18,0.92) 0%, rgba(20,19,18,0.65) 45%, rgba(20,19,18,0.15) 100%);"></div>

    <div class="relative z-10 max-w-[1220px] mx-auto px-6 py-[120px] grid gap-10 lg:grid-cols-[1.3fr_1fr] items-center min-h-[560px]">
        <div>
            <?php ryt_eyebrow('', 'Vuestro gran día'); ?>
            <h1 class="text-white mb-5" style="font-size: 60px; line-height: 1.03; letter-spacing: -0.01em;">
                Vuestro
                <span class="italic font-display text-ryt-mint">primer baile</span><br>
                empieza aquí
            </h1>
            <p class="text-[17px] text-[#EBE7E2] leading-[1.7] mb-8 max-w-[520px]">
                Preparamos vuestra primera baile como pareja casada, con clases personalizadas, edición musical y la coreografía pensada para vuestra canción.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="#paquetes" class="btn btn-primary">Ver paquetes</a>
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Queremos preparar nuestra primera baile de boda')); ?>" target="_blank" rel="noopener"
                   class="btn btn-outline-white">Pregúntanos por WhatsApp</a>
            </div>
        </div>
    </div>
</section>

<!-- Intro emocional con foto humo -->
<section class="bg-paper py-[104px] px-6">
    <div class="max-w-[1180px] mx-auto grid gap-[56px] lg:grid-cols-2 items-center">
        <div>
            <?php ryt_eyebrow('01', 'Vuestro primer baile como pareja'); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 42px; line-height: 1.1;">
                Un momento que<br>no se olvida
            </h2>
            <p class="text-[16.5px] text-ink-soft leading-[1.8] mb-4">
                Es la primera baile como recién casados. La canción que habéis elegido. Los ojos puestos en vosotros, las cámaras, los nervios. Lo último que queréis es ir mirando los pies.
            </p>
            <p class="text-[16.5px] text-ink-soft leading-[1.8]">
                Os preparamos para que disfrutéis ese momento, no para que sufráis. Diseñamos la coreografía a vuestra medida, según vuestro nivel, vuestra canción y el espacio donde vais a bailar.
            </p>
        </div>
        <div>
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/nupcial/primer-baile.webp'); ?>"
                 alt="Primer baile de novios con humo en una boda"
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
                <?php ryt_eyebrow('02', 'Cómo trabajamos'); ?>
                <h2 class="text-ink-heading" style="font-size: 42px; line-height: 1.08;">
                    De WhatsApp<br>al baile final
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    Un proceso sencillo y a vuestro ritmo. Sin clases en grupo: solo vosotros dos y el profesor.
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
                <?php ryt_eyebrow('03', 'Dos paquetes'); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    Elige el que<br>mejor os va
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    El Básico para parejas con algo de base que quieren pulir una coreografía. El Premium para empezar desde cero con tranquilidad.
                </p>
            </div>
        </div>

        <div class="grid gap-7 md:grid-cols-2 max-w-[1020px] mx-auto">
            <!-- Pack Básico -->
            <article class="bg-white rounded-[24px] border border-[#EFEBE6] shadow-[0_18px_50px_rgba(38,37,36,0.07)] overflow-hidden flex flex-col">
                <div class="h-[6px] bg-ryt-mint"></div>
                <div class="p-[34px] flex-1 flex flex-col">
                    <p class="text-[11px] uppercase tracking-[0.16em] font-bold text-ryt-mint mb-3">Pack Básico</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="font-display text-[60px] text-ink-heading leading-none">170€</span>
                    </div>
                    <p class="text-[15px] text-ink-soft leading-[1.7] mb-5">
                        Ideal para parejas con experiencia previa que necesitan pulir una coreografía concreta.
                    </p>
                    <ul class="flex flex-col gap-2.5 mb-7">
                        <?php foreach ([
                            '3 horas de clase personalizada',
                            'Edición musical de 1 canción',
                            '20% descuento en clases de la escuela',
                        ] as $f): ?>
                        <li class="flex items-start gap-2.5 text-[14.5px] text-ink-heading">
                            <span class="flex-shrink-0 mt-0.5 w-5 h-5 rounded-full inline-flex items-center justify-center bg-ryt-mint-soft text-ryt-mint-dark">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <?php echo esc_html($f); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero reservar el Pack Básico de baile nupcial')); ?>"
                       target="_blank" rel="noopener" class="btn btn-outline mt-auto">
                        Reservar Pack Básico
                    </a>
                </div>
            </article>

            <!-- Pack Premium -->
            <article class="relative bg-white rounded-[24px] border-2 border-ryt-mint shadow-[0_28px_70px_rgba(98,216,172,0.18)] overflow-hidden flex flex-col">
                <div class="h-[6px] bg-ryt-deep"></div>
                <span class="absolute top-5 right-5 bg-ryt-deep text-white text-[10px] uppercase tracking-[0.14em] font-bold px-3 py-1.5 rounded-pill">Recomendado</span>
                <div class="p-[34px] flex-1 flex flex-col">
                    <p class="text-[11px] uppercase tracking-[0.16em] font-bold text-ryt-mint-dark mb-3">Pack Premium</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="font-display text-[60px] text-ink-heading leading-none">260€</span>
                    </div>
                    <p class="text-[15px] text-ink-soft leading-[1.7] mb-5">
                        Si nunca habéis bailado o queréis aprender desde cero con calma. Ideal para preparar entrada y baile final.
                    </p>
                    <ul class="flex flex-col gap-2.5 mb-7">
                        <?php foreach ([
                            '5 horas de clase personalizada',
                            'Edición musical de 2 canciones',
                            '20% descuento en clases de la escuela',
                            'Clases extras a 40 €/hora',
                        ] as $f): ?>
                        <li class="flex items-start gap-2.5 text-[14.5px] text-ink-heading">
                            <span class="flex-shrink-0 mt-0.5 w-5 h-5 rounded-full inline-flex items-center justify-center bg-ryt-mint-soft text-ryt-mint-dark">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <?php echo esc_html($f); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero reservar el Pack Premium de baile nupcial')); ?>"
                       target="_blank" rel="noopener" class="btn btn-primary mt-auto">
                        Reservar Pack Premium
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
                 alt="Detalle de vestido de novia con encaje"
                 class="rounded-[24px] shadow-[0_24px_60px_rgba(38,37,36,0.16)] w-full h-auto"
                 loading="lazy">
            <p class="mt-4 text-[12px] uppercase tracking-[0.16em] font-bold text-ryt-mint">Vuestro gran día · Vuestro baile</p>
        </div>

        <!-- FAQ -->
        <div>
            <?php ryt_eyebrow('04', 'Preguntas frecuentes'); ?>
            <h2 class="text-ink-heading mb-[28px]" style="font-size: 38px; line-height: 1.1;">
                ¿Tenéis dudas? Las resolvemos
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
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Tengo una duda sobre el baile nupcial')); ?>"
                   target="_blank" rel="noopener" class="btn btn-primary">
                    Escríbenos por WhatsApp
                </a>
            </p>
        </div>
    </div>
</section>

<!-- CTA grande compartido -->
<?php get_template_part('template-parts/home/cta'); ?>
