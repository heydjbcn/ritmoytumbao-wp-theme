<?php
/**
 * Página /ritmo-y-tumbao-tu-escuela-de-baile-en-mataro/ (Contacto) — v9 (Cloud Design v2).
 *
 * Hero oscuro + grid 2-col con:
 *   - Card NAP (dirección, teléfonos, email, horario, redes)
 *   - Formulario de contacto (mismo endpoint admin-post.php?action=ryt_contact)
 * + Mapa de Google embed + CTA.
 */
$status = $_GET['contact'] ?? '';
$map_q  = rawurlencode(RYT_ADDRESS_STREET . ', ' . RYT_ADDRESS_CP . ' ' . RYT_ADDRESS_CITY);
?>

<!-- Hero oscuro con texto fantasma -->
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98,216,172,0.18); font-size: 16vw;">
            <?php esc_html_e('Contacto', 'ryt'); ?>
        </span>
    </div>
    <div class="relative z-10 max-w-[1220px] mx-auto px-6 py-[100px] text-center">
        <?php ryt_eyebrow('', __('Estamos aquí para ti', 'ryt')); ?>
        <h1 class="text-white" style="font-size: 58px; line-height: 1.05;">
            <?php esc_html_e('Hablemos de', 'ryt'); ?>
            <span class="italic font-display text-ryt-mint"><?php esc_html_e('baile', 'ryt'); ?></span>
        </h1>
        <p class="text-[17px] text-[#E6E1DB] leading-[1.7] mt-6 max-w-[640px] mx-auto">
            <?php esc_html_e('Resolvemos tus dudas en menos de 24h. Por WhatsApp, por email o pasándote por la escuela.', 'ryt'); ?>
        </p>
    </div>
</section>

<!-- NAP card + formulario -->
<section class="bg-paper py-[100px] px-6">
    <div class="max-w-[1180px] mx-auto grid gap-[48px] lg:grid-cols-[1fr_1.1fr]">

        <!-- Card NAP -->
        <div class="bg-white rounded-[22px] border border-[#EFEBE6] p-[34px] shadow-[0_10px_30px_rgba(38,37,36,0.05)]">
            <?php ryt_eyebrow('01', __('Escuela Ritmo y Tumbao', 'ryt')); ?>
            <h2 class="text-ink-heading mb-[28px]" style="font-size: 32px; line-height: 1.14;">
                <?php esc_html_e('Tu escuela de baile', 'ryt'); ?><br><?php esc_html_e('en Mataró', 'ryt'); ?>
            </h2>

            <div class="flex flex-col gap-[22px]">
                <!-- Dirección -->
                <a href="<?php echo esc_url(RYT_ADDRESS_MAPS); ?>" target="_blank" rel="noopener" class="flex gap-3 group">
                    <span class="flex-shrink-0 w-10 h-10 rounded-full inline-flex items-center justify-center bg-ryt-mint-soft text-ryt-mint-dark group-hover:bg-ryt-mint group-hover:text-white transition-colors">
                        <?php ryt_icon('pin', 'w-[18px] h-[18px]'); ?>
                    </span>
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-ryt-mint mb-0.5"><?php esc_html_e('Dirección', 'ryt'); ?></p>
                        <p class="text-[15px] text-ink-heading leading-[1.45]">
                            <?php echo esc_html(RYT_ADDRESS_STREET); ?><br>
                            <?php echo esc_html(RYT_ADDRESS_CP . ' ' . RYT_ADDRESS_CITY . ' (' . RYT_ADDRESS_REGION . ')'); ?>
                        </p>
                    </div>
                </a>

                <!-- Teléfonos -->
                <div class="flex gap-3">
                    <span class="flex-shrink-0 w-10 h-10 rounded-full inline-flex items-center justify-center bg-ryt-mint-soft text-ryt-mint-dark">
                        <?php ryt_icon('phone', 'w-[18px] h-[18px]'); ?>
                    </span>
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-ryt-mint mb-0.5"><?php esc_html_e('Teléfono', 'ryt'); ?></p>
                        <p class="text-[15px] text-ink-heading leading-[1.5]">
                            <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_1)); ?>" class="hover:text-ryt-mint-dark"><?php echo esc_html(RYT_PHONE_1); ?></a><br>
                            <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_2)); ?>" class="hover:text-ryt-mint-dark"><?php echo esc_html(RYT_PHONE_2); ?></a>
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex gap-3">
                    <span class="flex-shrink-0 w-10 h-10 rounded-full inline-flex items-center justify-center bg-ryt-mint-soft text-ryt-mint-dark">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-[18px] h-[18px]"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </span>
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-ryt-mint mb-0.5"><?php esc_html_e('Email', 'ryt'); ?></p>
                        <a href="mailto:<?php echo esc_attr(RYT_EMAIL); ?>" class="text-[15px] text-ink-heading hover:text-ryt-mint-dark"><?php echo esc_html(RYT_EMAIL); ?></a>
                    </div>
                </div>

                <!-- Horario -->
                <div class="flex gap-3">
                    <span class="flex-shrink-0 w-10 h-10 rounded-full inline-flex items-center justify-center bg-ryt-mint-soft text-ryt-mint-dark">
                        <?php ryt_icon('clock', 'w-[18px] h-[18px]'); ?>
                    </span>
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-ryt-mint mb-0.5"><?php esc_html_e('Horario oficina', 'ryt'); ?></p>
                        <p class="text-[15px] text-ink-heading leading-[1.45]"><?php echo esc_html(RYT_OFFICE_HOURS); ?></p>
                    </div>
                </div>

                <!-- WhatsApp directo -->
                <a href="<?php echo esc_url(ryt_whatsapp_url(__('Hola! Tengo una duda', 'ryt'))); ?>" target="_blank" rel="noopener"
                   class="inline-flex items-center justify-center gap-2 px-6 py-[14px] rounded-pill text-white font-bold uppercase tracking-[0.06em] text-[13px] mt-2 transition-colors"
                   style="background: #25D366;"
                   onmouseover="this.style.background='#1FB957'"
                   onmouseout="this.style.background='#25D366'">
                    <?php ryt_icon('whatsapp', 'w-5 h-5'); ?>
                    <?php esc_html_e('Escríbenos por WhatsApp', 'ryt'); ?>
                </a>

                <!-- Redes sociales -->
                <div class="pt-3 mt-1 border-t border-[#EFEBE6]">
                    <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-ink-soft mb-3"><?php esc_html_e('Síguenos', 'ryt'); ?></p>
                    <div class="flex items-center gap-2.5">
                        <a href="<?php echo esc_url(RYT_INSTAGRAM); ?>" target="_blank" rel="noopener" aria-label="Instagram"
                           class="w-10 h-10 rounded-full inline-flex items-center justify-center bg-paper text-ink-heading hover:bg-ryt-mint hover:text-white transition-colors">
                            <?php ryt_icon('instagram', 'w-[18px] h-[18px]'); ?>
                        </a>
                        <a href="<?php echo esc_url(RYT_FACEBOOK); ?>" target="_blank" rel="noopener" aria-label="Facebook"
                           class="w-10 h-10 rounded-full inline-flex items-center justify-center bg-paper text-ink-heading hover:bg-ryt-mint hover:text-white transition-colors">
                            <?php ryt_icon('facebook', 'w-[18px] h-[18px]'); ?>
                        </a>
                        <a href="<?php echo esc_url(RYT_YOUTUBE); ?>" target="_blank" rel="noopener" aria-label="YouTube"
                           class="w-10 h-10 rounded-full inline-flex items-center justify-center bg-paper text-ink-heading hover:bg-ryt-mint hover:text-white transition-colors">
                            <?php ryt_icon('youtube', 'w-[18px] h-[18px]'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario -->
        <div>
            <?php ryt_eyebrow('02', __('Cuéntanos', 'ryt')); ?>
            <h2 class="text-ink-heading mb-[24px]" style="font-size: 32px; line-height: 1.14;">
                <?php esc_html_e('Escríbenos', 'ryt'); ?>
            </h2>

            <?php if ($status === 'sent'): ?>
                <div class="bg-ryt-mint/15 border border-ryt-mint text-ink-heading rounded-xl p-4 text-sm mb-4">
                    <?php esc_html_e('¡Gracias! Hemos recibido tu mensaje. Te respondemos en breve.', 'ryt'); ?>
                </div>
            <?php elseif ($status === 'error'): ?>
                <div class="bg-rose-50 border border-rose-200 text-rose-700 rounded-xl p-4 text-sm mb-4">
                    <?php esc_html_e('Algo no ha funcionado. Vuelve a intentarlo o escríbenos por WhatsApp.', 'ryt'); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="space-y-3">
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
                <label class="block">
                    <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft"><?php esc_html_e('Teléfono (opcional)', 'ryt'); ?></span>
                    <input name="tel" type="tel" class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                </label>
                <label class="block">
                    <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft"><?php esc_html_e('Tu mensaje', 'ryt'); ?></span>
                    <textarea name="mensaje" rows="5" required class="mt-1 w-full rounded-2xl border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint" placeholder="<?php echo esc_attr__('¿En qué te ayudamos?', 'ryt'); ?>"></textarea>
                </label>
                <button type="submit" class="btn btn-primary w-full"><?php esc_html_e('Enviar mensaje', 'ryt'); ?></button>
                <p class="text-[11px] text-ink-mute leading-relaxed">
                    <?php
                    printf(
                        /* translators: %s: enlace a la política de privacidad */
                        esc_html__('Al enviar aceptas nuestra %s. Nunca cederemos tus datos a terceros.', 'ryt'),
                        '<a href="' . esc_url(home_url('/politica-de-privacidad/')) . '" class="underline">' . esc_html__('política de privacidad', 'ryt') . '</a>'
                    );
                    ?>
                </p>
            </form>
        </div>
    </div>
</section>

<!-- Mapa Google -->
<section class="bg-white">
    <div class="max-w-[1320px] mx-auto px-6 py-[80px]">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[32px]">
            <div>
                <?php ryt_eyebrow('03', __('Cómo llegar', 'ryt')); ?>
                <h2 class="text-ink-heading" style="font-size: 38px; line-height: 1.1;">
                    <?php esc_html_e('Estamos a 5 min', 'ryt'); ?><br><?php esc_html_e('del centro de Mataró', 'ryt'); ?>
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    <?php
                    printf(
                        /* translators: %s: dirección completa de la escuela */
                        esc_html__('%s. Aparcamiento sencillo en la zona y a pocos pasos del transporte público.', 'ryt'),
                        esc_html(RYT_ADDRESS)
                    );
                    ?>
                </p>
            </div>
        </div>

        <div class="rounded-[22px] overflow-hidden border border-[#EFEBE6] aspect-[16/8] bg-paper">
            <iframe
                src="https://maps.google.com/maps?q=<?php echo $map_q; ?>&t=m&z=16&output=embed"
                title="<?php echo esc_attr(RYT_ADDRESS); ?>"
                class="w-full h-full block"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- CTA grande compartido -->
<?php get_template_part('template-parts/home/cta'); ?>
