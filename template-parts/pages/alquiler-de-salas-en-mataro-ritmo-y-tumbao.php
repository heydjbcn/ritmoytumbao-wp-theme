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
        'h'    => 'Ensayos y coreografías',
        'desc' => 'Tienes un grupo y necesitas un espacio para ensayar. Hay que terminar esa coreografía y no tienes sala. Aquí te esperan.',
        'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>',
    ],
    [
        'h'    => 'Cumpleaños',
        'tag'  => '100€ por 3h',
        'desc' => 'Llega tu día y quieres compartirlo con familiares y amigos. Te hacemos un precio especial: <strong>100€ por 3 horas</strong>.',
        'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21V9a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12"/><path d="M4 16h16"/><path d="M8 7V4a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v3"/><path d="M12 13v-2"/><path d="M8 13v-2"/><path d="M16 13v-2"/></svg>',
    ],
    [
        'h'    => 'Eventos',
        'desc' => 'Formaciones, conferencias, reuniones o sesiones de fotografía. Cuéntanos cómo es tu evento y ven a visitar las salas.',
        'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4"/><path d="m4.93 4.93 2.83 2.83"/><path d="M2 12h4"/><path d="m4.93 19.07 2.83-2.83"/><path d="M12 18v4"/><path d="m19.07 19.07-2.83-2.83"/><path d="M22 12h-4"/><path d="m19.07 4.93-2.83 2.83"/><circle cx="12" cy="12" r="3"/></svg>',
    ],
];

$salas = [
    [
        'num'   => '01',
        'name'  => 'Sala 1',
        'm2'    => '100',
        'price' => '45',
        'img'   => 'sala-1.jpg',
        'desc'  => 'Espaciosa y bastante diáfana. La sala grande de la escuela. Perfecta para grupos de ensayo, cumpleaños y eventos con público.',
        'specs' => ['Parquet flotante', 'Insonorizada', 'Climatizada (frío/calor)', 'Equipo de sonido profesional', 'Espejo gran formato'],
    ],
    [
        'num'   => '02',
        'name'  => 'Sala 2',
        'm2'    => '45',
        'price' => '30',
        'img'   => 'sala-2.jpg',
        'desc'  => 'Espaciosa y completamente diáfana. Ideal para grupos reducidos, particulares y sesiones de fotografía con luz controlada.',
        'specs' => ['Insonorizada', 'Climatizada (frío/calor)', 'Equipo de sonido', 'Espejo'],
    ],
];

$status = $_GET['contact'] ?? '';
?>

<!-- Hero foto cover -->
<section class="relative overflow-hidden text-white" style="min-height: 520px;">
    <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/sala-1.jpg'); ?>"
         alt="Alquiler de salas en Mataró — Ritmo y Tumbao"
         class="absolute inset-0 w-full h-full object-cover" loading="eager">
    <div aria-hidden="true" class="absolute inset-0"
         style="background: linear-gradient(100deg, rgba(20,19,18,0.92) 0%, rgba(20,19,18,0.68) 45%, rgba(20,19,18,0.18) 100%);"></div>

    <div class="relative z-10 max-w-[1220px] mx-auto px-6 py-[110px] grid gap-10 lg:grid-cols-[1.4fr_1fr] items-center min-h-[520px]">
        <div>
            <?php ryt_eyebrow('', 'Espacio profesional en Mataró'); ?>
            <h1 class="text-white mb-5" style="font-size: 58px; line-height: 1.05;">
                Alquiler de
                <span class="italic font-display text-ryt-mint">salas</span><br>
                por horas en Mataró
            </h1>
            <p class="text-[17px] text-[#E6E1DB] leading-[1.7] mb-8 max-w-[540px]">
                Dos salas amplias con espejos, parquet, equipo de sonido y vestuarios. Para ensayos, cumpleaños, eventos privados, formaciones o sesiones de fotografía.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="#salas" class="btn btn-primary">Ver salas y tarifas</a>
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero info sobre alquilar una sala')); ?>" target="_blank" rel="noopener"
                   class="btn btn-outline-white">Consultar disponibilidad</a>
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
            <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-ryt-deep/70 mt-2">Sala 1 · por hora</p>
        </div>
        <div class="bg-ryt-mint px-5 py-4 text-center md:text-left">
            <p class="font-display text-[42px] text-ryt-deep leading-none">30€</p>
            <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-ryt-deep/70 mt-2">Sala 2 · por hora</p>
        </div>
        <div class="bg-ryt-mint px-5 py-4 text-center md:text-left">
            <p class="font-display text-[42px] text-ryt-deep leading-none">100€</p>
            <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-ryt-deep/70 mt-2">Cumpleaños · 3h</p>
        </div>
        <div class="bg-ryt-mint px-5 py-4 text-center md:text-left">
            <p class="font-display text-[42px] text-ryt-deep leading-none">145</p>
            <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-ryt-deep/70 mt-2">m² totales</p>
        </div>
    </div>
</section>

<!-- Intro 2-col -->
<section class="bg-white py-[100px] px-6">
    <div class="max-w-[1180px] mx-auto grid gap-[56px] lg:grid-cols-2 items-start">
        <div>
            <?php ryt_eyebrow('01', 'Las salas más completas para tus eventos'); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 42px; line-height: 1.08;">
                Un espacio<br>profesional<br>cuando lo necesitas
            </h2>
        </div>
        <div>
            <p class="text-[16.5px] text-ink-soft leading-[1.8] mb-4">
                En Ritmo y Tumbao tenemos lo que buscas. Si necesitas <strong>alquilar una sala en Mataró</strong> te ofrecemos dos espacios diáfanos, equipados con sonido, climatizados e insonorizados.
            </p>
            <p class="text-[16.5px] text-ink-soft leading-[1.8] mb-4">
                Prepara un evento, ensaya con tu compañía, celebra un cumpleaños o, si eres fotógrafo, encuentra una sala con luz controlada para tus sesiones.
            </p>
            <p class="text-[13px] text-ryt-mint-dark uppercase font-bold tracking-[0.1em] mt-6">
                ⓘ La disponibilidad de las salas está sujeta a los horarios de la escuela de baile.
            </p>
        </div>
    </div>
</section>

<!-- 3 casos de uso -->
<section class="bg-paper py-[100px] px-6">
    <div class="max-w-[1220px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[48px]">
            <div>
                <?php ryt_eyebrow('02', 'Para qué se usa'); ?>
                <h2 class="text-ink-heading" style="font-size: 42px; line-height: 1.08;">
                    Tres usos<br>habituales
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    Cada semana acogemos compañías de baile, particulares celebrando su día y eventos profesionales. Cualquier otro uso, pregúntanos.
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
                <?php ryt_eyebrow('03', 'Dos salas disponibles'); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    Elige la que<br>te encaja
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    Tarifa por hora con descuentos por uso recurrente. Consulta disponibilidad y nos adaptamos a lo que necesites.
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-[36px]">
            <?php foreach ($salas as $i => $sala):
                $reverse = $i % 2 === 1; ?>
            <article class="grid gap-0 lg:grid-cols-2 bg-paper rounded-[24px] overflow-hidden border border-[#EFEBE6] shadow-[0_18px_50px_rgba(38,37,36,0.07)]">
                <div class="<?php echo $reverse ? 'lg:order-2' : ''; ?> aspect-[4/3] lg:aspect-auto overflow-hidden">
                    <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/' . $sala['img']); ?>"
                         alt="<?php echo esc_attr($sala['name'] . ' — Alquiler en Mataró'); ?>"
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
                            <p class="text-[11px] uppercase font-bold tracking-[0.12em] text-ink-mute mb-1">Superficie</p>
                            <p class="font-display text-[44px] text-ink-heading leading-none"><?php echo esc_html($sala['m2']); ?><span class="text-[20px] ml-1 align-baseline">m²</span></p>
                        </div>
                        <div class="pl-6 border-l-2 border-ryt-mint">
                            <p class="text-[11px] uppercase font-bold tracking-[0.12em] text-ryt-mint mb-1">Tarifa</p>
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

                    <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero alquilar la ' . $sala['name'] . ' (' . $sala['m2'] . ' m²)')); ?>"
                       target="_blank" rel="noopener" class="btn btn-primary self-start">
                        Reservar <?php echo esc_html($sala['name']); ?>
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
            <?php ryt_eyebrow('04', 'Formulario de alquiler'); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 38px; line-height: 1.1;">
                Pídenos<br>disponibilidad
            </h2>
            <p class="text-[16px] text-ink-soft leading-[1.8] mb-6">
                Si buscas alquilar un espacio contacta con nosotros y te daremos el mejor precio para tu evento, ensayo o sesión.
            </p>
            <div class="bg-white border border-[#EFEBE6] rounded-[18px] p-[22px]">
                <p class="text-[11px] uppercase font-bold tracking-[0.12em] text-ryt-mint mb-2">Contacto directo</p>
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
                    ¡Gracias! Hemos recibido tu solicitud. Te respondemos en breve con disponibilidad.
                </div>
            <?php elseif ($status === 'error'): ?>
                <div class="bg-rose-50 border border-rose-200 text-rose-700 rounded-xl p-4 text-sm mb-4">
                    Algo no ha funcionado. Vuelve a intentarlo o escríbenos por WhatsApp.
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
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft">Nombre</span>
                        <input name="nombre" type="text" required class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                    <label class="block">
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft">Email</span>
                        <input name="email" type="email" required class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                </div>
                <div class="grid gap-3 sm:grid-cols-2">
                    <label class="block">
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft">Teléfono</span>
                        <input name="tel" type="tel" class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                    <label class="block">
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft">Tipo de uso</span>
                        <select name="tipo" class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                            <option value="ensayo">Ensayo / coreografía</option>
                            <option value="cumpleanos">Cumpleaños</option>
                            <option value="evento">Evento / formación</option>
                            <option value="fotografia">Sesión de fotografía</option>
                            <option value="otro">Otro</option>
                        </select>
                    </label>
                </div>
                <label class="block">
                    <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft">Cuéntanos tu evento</span>
                    <textarea name="mensaje" rows="4" required class="mt-1 w-full rounded-2xl border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint" placeholder="Fecha aproximada, número de personas, sala que te interesa…"></textarea>
                </label>

                <button type="submit" class="btn btn-primary w-full">Solicitar disponibilidad</button>

                <p class="text-[10px] text-ink-mute leading-relaxed">
                    Al enviar aceptas nuestra
                    <a href="<?php echo esc_url(home_url('/politica-de-privacidad/')); ?>" class="underline">política de privacidad</a>.
                </p>
            </form>
        </div>
    </div>
</section>

<!-- CTA grande compartido -->
<?php get_template_part('template-parts/home/cta'); ?>
