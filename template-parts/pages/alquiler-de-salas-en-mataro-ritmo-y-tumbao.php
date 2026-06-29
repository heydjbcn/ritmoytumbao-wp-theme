<?php
/**
 * Página /alquiler-de-salas-en-mataro-ritmo-y-tumbao/ — v9 (Cloud Design v2).
 *
 * Datos reales (prod):
 *   - Sala 1: 100 m² · parquet · insonorizada · climatizada · sonido · 45€/h
 *   - Sala 2:  45 m² · insonorizada · climatizada · sonido         · 30€/h
 *   - Oferta cumpleaños: 100€ por 3 horas
 *   - 3 usos típicos: ensayos/coreografías, cumpleaños, eventos (formaciones, reuniones, fotografía)
 *   - Aviso: la disposición está sujeta a los horarios de la escuela
 *   - Form de alquiler propio
 */
$usos = [
    [
        'h'    => __('Ensayos y coreografías', 'ryt'),
        'desc' => __('Tienes un grupo y necesitas un espacio para ensayar. Hay que terminar esa coreografía y no tienes sala. Aquí te esperan.', 'ryt'),
        'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>',
    ],
    [
        'h'    => __('Cumpleaños', 'ryt'),
        'tag'  => __('100€ por 3h', 'ryt'),
        'desc' => sprintf(
            /* translators: %s: "100€ por 3 horas" en negrita */
            __('Llega tu día y quieres compartirlo con familiares y amigos. Te hacemos un precio especial: %s.', 'ryt'),
            '<strong>' . __('100€ por 3 horas', 'ryt') . '</strong>'
        ),
        'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21V9a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12"/><path d="M4 16h16"/><path d="M8 7V4a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v3"/><path d="M12 13v-2"/><path d="M8 13v-2"/><path d="M16 13v-2"/></svg>',
    ],
    [
        'h'    => __('Eventos', 'ryt'),
        'desc' => __('Formaciones, conferencias, reuniones o sesiones de fotografía. Cuéntanos cómo es tu evento y ven a visitar las salas.', 'ryt'),
        'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4"/><path d="m4.93 4.93 2.83 2.83"/><path d="M2 12h4"/><path d="m4.93 19.07 2.83-2.83"/><path d="M12 18v4"/><path d="m19.07 19.07-2.83-2.83"/><path d="M22 12h-4"/><path d="m19.07 4.93-2.83 2.83"/><circle cx="12" cy="12" r="3"/></svg>',
    ],
];

$salas = [
    [
        'num'   => '01',
        'name'  => __('Sala 1', 'ryt'),
        'm2'    => '100',
        'price' => '45',
        'img'   => 'sala-1.jpg',
        'desc'  => __('Espaciosa y bastante diáfana. La sala grande de la escuela. Perfecta para grupos de ensayo, cumpleaños y eventos con público.', 'ryt'),
        'specs' => [__('Parquet flotante', 'ryt'), __('Insonorizada', 'ryt'), __('Climatizada (frío/calor)', 'ryt'), __('Equipo de sonido profesional', 'ryt'), __('Espejo gran formato', 'ryt')],
    ],
    [
        'num'   => '02',
        'name'  => __('Sala 2', 'ryt'),
        'm2'    => '45',
        'price' => '30',
        'img'   => 'sala-2.jpg',
        'desc'  => __('Espaciosa y completamente diáfana. Ideal para grupos reducidos, particulares y sesiones de fotografía con luz controlada.', 'ryt'),
        'specs' => [__('Insonorizada', 'ryt'), __('Climatizada (frío/calor)', 'ryt'), __('Equipo de sonido', 'ryt'), __('Espejo', 'ryt')],
    ],
];

$status = $_GET['contact'] ?? '';
?>

<!-- Hero foto cover -->
<section class="relative overflow-hidden text-white" style="min-height: 520px;">
    <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/sala-1.jpg'); ?>"
         alt="<?php echo esc_attr__('Alquiler de salas en Mataró — Ritmo y Tumbao', 'ryt'); ?>"
         class="absolute inset-0 w-full h-full object-cover" loading="eager">
    <div aria-hidden="true" class="absolute inset-0"
         style="background: linear-gradient(100deg, rgba(20,19,18,0.92) 0%, rgba(20,19,18,0.68) 45%, rgba(20,19,18,0.18) 100%);"></div>

    <div class="relative z-10 max-w-[1220px] mx-auto px-6 py-[110px] grid gap-10 lg:grid-cols-[1.4fr_1fr] items-center min-h-[520px]">
        <div>
            <?php ryt_eyebrow('', __('Espacio profesional en Mataró', 'ryt')); ?>
            <h1 class="text-white mb-5" style="font-size: 58px; line-height: 1.05;">
                <?php esc_html_e('Alquiler de', 'ryt'); ?>
                <span class="italic font-display text-ryt-mint"><?php esc_html_e('salas', 'ryt'); ?></span><br>
                <?php esc_html_e('por horas en Mataró', 'ryt'); ?>
            </h1>
            <p class="text-[17px] text-[#E6E1DB] leading-[1.7] mb-8 max-w-[540px]">
                <?php esc_html_e('Dos salas amplias con espejos, parquet, equipo de sonido y vestuarios. Para ensayos, cumpleaños, eventos privados, formaciones o sesiones de fotografía.', 'ryt'); ?>
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="#salas" class="btn btn-primary"><?php esc_html_e('Ver salas y tarifas', 'ryt'); ?></a>
                <a href="<?php echo esc_url(ryt_whatsapp_url(__('Hola! Quiero info sobre alquilar una sala', 'ryt'))); ?>" target="_blank" rel="noopener"
                   class="btn btn-outline-white"><?php esc_html_e('Consultar disponibilidad', 'ryt'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Stats band: precios y datos -->
<section class="bg-ryt-mint">
    <div class="max-w-[1220px] mx-auto px-6 py-[34px] grid grid-cols-2 md:grid-cols-4 gap-px"
         style="background: rgba(23,60,48,0.10);">
        <div class="bg-ryt-mint px-5 py-4 text-center md:text-left">
            <p class="font-display text-[42px] text-ryt-deep leading-none">45€</p>
            <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-ryt-deep/70 mt-2"><?php esc_html_e('Sala 1 · por hora', 'ryt'); ?></p>
        </div>
        <div class="bg-ryt-mint px-5 py-4 text-center md:text-left">
            <p class="font-display text-[42px] text-ryt-deep leading-none">30€</p>
            <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-ryt-deep/70 mt-2"><?php esc_html_e('Sala 2 · por hora', 'ryt'); ?></p>
        </div>
        <div class="bg-ryt-mint px-5 py-4 text-center md:text-left">
            <p class="font-display text-[42px] text-ryt-deep leading-none">100€</p>
            <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-ryt-deep/70 mt-2"><?php esc_html_e('Cumpleaños · 3h', 'ryt'); ?></p>
        </div>
        <div class="bg-ryt-mint px-5 py-4 text-center md:text-left">
            <p class="font-display text-[42px] text-ryt-deep leading-none">145</p>
            <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-ryt-deep/70 mt-2"><?php esc_html_e('m² totales', 'ryt'); ?></p>
        </div>
    </div>
</section>

<!-- Intro 2-col -->
<section class="bg-white py-[100px] px-6">
    <div class="max-w-[1180px] mx-auto grid gap-[56px] lg:grid-cols-2 items-start">
        <div>
            <?php ryt_eyebrow('01', __('Las salas más completas para tus eventos', 'ryt')); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 42px; line-height: 1.08;">
                <?php esc_html_e('Un espacio', 'ryt'); ?><br><?php esc_html_e('profesional', 'ryt'); ?><br><?php esc_html_e('cuando lo necesitas', 'ryt'); ?>
            </h2>
        </div>
        <div>
            <p class="text-[16.5px] text-ink-soft leading-[1.8] mb-4">
                <?php
                printf(
                    /* translators: %s: "alquilar una sala en Mataró" en negrita */
                    esc_html__('En Ritmo y Tumbao tenemos lo que buscas. Si necesitas %s te ofrecemos dos espacios diáfanos, equipados con sonido, climatizados e insonorizados.', 'ryt'),
                    '<strong>' . esc_html__('alquilar una sala en Mataró', 'ryt') . '</strong>'
                );
                ?>
            </p>
            <p class="text-[16.5px] text-ink-soft leading-[1.8] mb-4">
                <?php esc_html_e('Prepara un evento, ensaya con tu compañía, celebra un cumpleaños o, si eres fotógrafo, encuentra una sala con luz controlada para tus sesiones.', 'ryt'); ?>
            </p>
            <p class="text-[13px] text-ryt-mint-dark uppercase font-bold tracking-[0.1em] mt-6">
                <?php esc_html_e('ⓘ La disponibilidad de las salas está sujeta a los horarios de la escuela de baile.', 'ryt'); ?>
            </p>
        </div>
    </div>
</section>

<!-- 3 casos de uso -->
<section class="bg-paper py-[100px] px-6">
    <div class="max-w-[1220px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[48px]">
            <div>
                <?php ryt_eyebrow('02', __('Para qué se usa', 'ryt')); ?>
                <h2 class="text-ink-heading" style="font-size: 42px; line-height: 1.08;">
                    <?php esc_html_e('Tres usos', 'ryt'); ?><br><?php esc_html_e('habituales', 'ryt'); ?>
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    <?php esc_html_e('Cada semana acogemos compañías de baile, particulares celebrando su día y eventos profesionales. Cualquier otro uso, pregúntanos.', 'ryt'); ?>
                </p>
            </div>
        </div>

        <div class="grid gap-px bg-[#ECE7E1] border border-[#ECE7E1] rounded-3xl overflow-hidden md:grid-cols-3">
            <?php foreach ($usos as $u): ?>
            <article class="bg-white p-[32px]">
                <span class="flex w-12 h-12 rounded-full bg-ryt-mint-soft text-ryt-deep items-center justify-center mb-4 [&>svg]:w-6 [&>svg]:h-6">
                    <?php echo $u['icon']; ?>
                </span>
                <h3 class="font-serif text-[22px] text-ink-heading mb-2"><?php echo esc_html($u['h']); ?></h3>
                <?php if (!empty($u['tag'])): ?>
                    <p class="text-[11px] uppercase font-bold tracking-[0.12em] text-ryt-mint-dark mb-2"><?php echo esc_html($u['tag']); ?></p>
                <?php endif; ?>
                <p class="text-[14.5px] text-ink-soft leading-[1.7]"><?php echo wp_kses($u['desc'], ['strong' => []]); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Las 2 salas con precio €/hora ADLaM gigante -->
<section class="bg-white py-[100px] px-6" id="salas">
    <div class="max-w-[1220px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[56px]">
            <div>
                <?php ryt_eyebrow('03', __('Dos salas disponibles', 'ryt')); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    <?php esc_html_e('Elige la que', 'ryt'); ?><br><?php esc_html_e('te encaja', 'ryt'); ?>
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    <?php esc_html_e('Tarifa por hora con descuentos por uso recurrente. Consulta disponibilidad y nos adaptamos a lo que necesites.', 'ryt'); ?>
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-[36px]">
            <?php foreach ($salas as $i => $sala):
                $reverse = $i % 2 === 1; ?>
            <article class="grid gap-0 lg:grid-cols-2 bg-paper rounded-[24px] overflow-hidden border border-[#EFEBE6] shadow-[0_18px_50px_rgba(38,37,36,0.07)]">
                <div class="<?php echo $reverse ? 'lg:order-2' : ''; ?> aspect-[4/3] lg:aspect-auto overflow-hidden">
                    <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/' . $sala['img']); ?>"
                         alt="<?php echo esc_attr(sprintf(__('%s — Alquiler en Mataró', 'ryt'), $sala['name'])); ?>"
                         class="w-full h-full object-cover" loading="lazy">
                </div>
                <div class="<?php echo $reverse ? 'lg:order-1' : ''; ?> p-[36px] lg:p-[44px] flex flex-col bg-white">
                    <div class="flex items-baseline gap-4 mb-3">
                        <span class="font-display text-[34px] leading-none" style="color: #D7DED9;">
                            <?php echo esc_html($sala['num']); ?>
                        </span>
                        <h3 class="font-serif text-[30px] text-ink-heading"><?php echo esc_html($sala['name']); ?></h3>
                    </div>

                    <!-- m² + tarifa -->
                    <div class="flex flex-wrap items-end gap-6 mb-5">
                        <div>
                            <p class="text-[11px] uppercase font-bold tracking-[0.12em] text-ink-mute mb-1"><?php esc_html_e('Superficie', 'ryt'); ?></p>
                            <p class="font-display text-[44px] text-ink-heading leading-none"><?php echo esc_html($sala['m2']); ?><span class="text-[20px] ml-1 align-baseline">m²</span></p>
                        </div>
                        <div class="pl-6 border-l-2 border-ryt-mint">
                            <p class="text-[11px] uppercase font-bold tracking-[0.12em] text-ryt-mint mb-1"><?php esc_html_e('Tarifa', 'ryt'); ?></p>
                            <p class="font-display text-[44px] text-ryt-mint-dark leading-none"><?php echo esc_html($sala['price']); ?>€<span class="text-[14px] ml-1 align-baseline font-sans font-bold uppercase tracking-[0.08em]">/h</span></p>
                        </div>
                    </div>

                    <p class="text-[15px] text-ink-soft leading-[1.75] mb-6">
                        <?php echo esc_html($sala['desc']); ?>
                    </p>

                    <ul class="flex flex-col gap-2.5 mt-auto mb-6">
                        <?php foreach ($sala['specs'] as $spec): ?>
                        <li class="flex items-center gap-2.5 text-[14.5px] text-ink-heading">
                            <span class="flex-shrink-0 w-5 h-5 rounded-full inline-flex items-center justify-center bg-ryt-mint-soft text-ryt-mint-dark">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <?php echo esc_html($spec); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo esc_url(ryt_whatsapp_url(sprintf(__('Hola! Quiero alquilar la %1$s (%2$s m²)', 'ryt'), $sala['name'], $sala['m2']))); ?>"
                       target="_blank" rel="noopener" class="btn btn-primary self-start">
                        <?php
                        /* translators: %s: nombre de la sala */
                        printf(esc_html__('Reservar %s', 'ryt'), esc_html($sala['name']));
                        ?>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Form alquiler -->
<section class="bg-paper py-[100px] px-6" id="contacto">
    <div class="max-w-[1180px] mx-auto grid gap-[56px] lg:grid-cols-[1fr_1.1fr] items-start">
        <div>
            <?php ryt_eyebrow('04', __('Formulario de alquiler', 'ryt')); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 38px; line-height: 1.1;">
                <?php esc_html_e('Pídenos', 'ryt'); ?><br><?php esc_html_e('disponibilidad', 'ryt'); ?>
            </h2>
            <p class="text-[16px] text-ink-soft leading-[1.8] mb-6">
                <?php esc_html_e('Si buscas alquilar un espacio contacta con nosotros y te daremos el mejor precio para tu evento, ensayo o sesión.', 'ryt'); ?>
            </p>
            <div class="bg-white border border-[#EFEBE6] rounded-[18px] p-[22px]">
                <p class="text-[11px] uppercase font-bold tracking-[0.12em] text-ryt-mint mb-2"><?php esc_html_e('Contacto directo', 'ryt'); ?></p>
                <p class="text-[15px] text-ink-heading leading-[1.7]">
                    <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_1)); ?>" class="hover:text-ryt-mint-dark"><?php echo esc_html(RYT_PHONE_1); ?></a><br>
                    <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_2)); ?>" class="hover:text-ryt-mint-dark"><?php echo esc_html(RYT_PHONE_2); ?></a><br>
                    <a href="mailto:<?php echo esc_attr(RYT_EMAIL); ?>" class="text-ryt-mint-dark hover:underline"><?php echo esc_html(RYT_EMAIL); ?></a>
                </p>
            </div>
        </div>

        <div>
            <?php if ($status === 'sent'): ?>
                <div class="bg-ryt-mint/15 border border-ryt-mint text-ink-heading rounded-xl p-4 text-sm mb-4">
                    <?php esc_html_e('¡Gracias! Hemos recibido tu solicitud. Te respondemos en breve con disponibilidad.', 'ryt'); ?>
                </div>
            <?php elseif ($status === 'error'): ?>
                <div class="bg-rose-50 border border-rose-200 text-rose-700 rounded-xl p-4 text-sm mb-4">
                    <?php esc_html_e('Algo no ha funcionado. Vuelve a intentarlo o escríbenos por WhatsApp.', 'ryt'); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post"
                  class="bg-white border border-[#EFEBE6] rounded-[22px] p-[28px] md:p-[34px] space-y-3">
                <input type="hidden" name="action" value="ryt_contact">
                <?php wp_nonce_field('ryt_contact', 'ryt_nonce'); ?>
                <!-- Honeypot -->
                <input type="text" name="web" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true">

                <div class="grid gap-3 sm:grid-cols-2">
                    <label class="block">
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft"><?php esc_html_e('Nombre', 'ryt'); ?></span>
                        <input name="nombre" type="text" required class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                    <label class="block">
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft"><?php esc_html_e('Email', 'ryt'); ?></span>
                        <input name="email" type="email" required class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                </div>
                <div class="grid gap-3 sm:grid-cols-2">
                    <label class="block">
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft"><?php esc_html_e('Teléfono', 'ryt'); ?></span>
                        <input name="tel" type="tel" class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                    <label class="block">
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft"><?php esc_html_e('Tipo de uso', 'ryt'); ?></span>
                        <select name="tipo" class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                            <option value="ensayo"><?php esc_html_e('Ensayo / coreografía', 'ryt'); ?></option>
                            <option value="cumpleanos"><?php esc_html_e('Cumpleaños', 'ryt'); ?></option>
                            <option value="evento"><?php esc_html_e('Evento / formación', 'ryt'); ?></option>
                            <option value="fotografia"><?php esc_html_e('Sesión de fotografía', 'ryt'); ?></option>
                            <option value="otro"><?php esc_html_e('Otro', 'ryt'); ?></option>
                        </select>
                    </label>
                </div>
                <label class="block">
                    <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft"><?php esc_html_e('Cuéntanos tu evento', 'ryt'); ?></span>
                    <textarea name="mensaje" rows="4" required class="mt-1 w-full rounded-2xl border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint" placeholder="<?php echo esc_attr__('Fecha aproximada, número de personas, sala que te interesa…', 'ryt'); ?>"></textarea>
                </label>

                <button type="submit" class="btn btn-primary w-full"><?php esc_html_e('Solicitar disponibilidad', 'ryt'); ?></button>

                <p class="text-[10px] text-ink-mute leading-relaxed">
                    <?php
                    printf(
                        /* translators: %s: enlace a la política de privacidad */
                        esc_html__('Al enviar aceptas nuestra %s.', 'ryt'),
                        '<a href="' . esc_url(home_url('/politica-de-privacidad/')) . '" class="underline">' . esc_html__('política de privacidad', 'ryt') . '</a>'
                    );
                    ?>
                </p>
            </form>
        </div>
    </div>
</section>

<!-- CTA grande compartido -->
<?php get_template_part('template-parts/home/cta'); ?>
