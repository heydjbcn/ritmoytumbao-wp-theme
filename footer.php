<?php
/**
 * Footer — replica el de prod.
 *
 * Estructura real:
 *   - Cita "El trabajo de los pies es caminar, pero su afición es bailar."
 *   - Newsletter (EMAIL + SUBSCRÍBETE)
 *   - Dirección Josep Vicenç Foix 51, 08301 Mataró (Barcelona)
 *   - 4 redes: WhatsApp, Instagram, Facebook, YouTube
 *   - QR code de contacto
 *   - Logo recto
 *   - Legales: Política privacidad · Aviso legal · Política cookies · Política devoluciones
 *   - Créditos "®2022 Ritmo y Tumbao by Desarrollo Web Barcelona"
 */
?>
<footer class="bg-paper text-ink mt-0">
    <!-- Top: cita + newsletter (fondo blanco) -->
    <div class="border-b border-paper-alt">
        <div class="container mx-auto px-4 py-12 text-center max-w-3xl">
            <p class="font-serif italic text-xl md:text-2xl text-ink-heading leading-relaxed mb-8">
                "El trabajo de los pies es caminar, pero su afición es bailar."
            </p>

            <form class="flex flex-col sm:flex-row gap-3 max-w-xl mx-auto" action="#" onsubmit="event.preventDefault(); alert('Suscripción pendiente de integración');">
                <label for="ryt-newsletter" class="sr-only">Email</label>
                <input id="ryt-newsletter" type="email" required placeholder="Tu email"
                       class="flex-1 px-5 py-3 rounded-pill bg-paper-soft text-ink-heading placeholder-ink-mute border border-paper-alt focus:outline-none focus:border-ryt-mint">
                <button type="submit" class="btn btn-primary">Subscríbete</button>
            </form>
            <p class="text-xs text-ink-mute mt-3">
                *Suscríbete a nuestro boletín para recibir ofertas de descuentos, eventos, actualizaciones e información sobre nuevos cursos.
            </p>
        </div>
    </div>

    <!-- Middle: contacto + redes + qr + logo -->
    <div class="container mx-auto px-4 py-12 grid gap-10 md:grid-cols-4 items-start">
        <!-- Contacto -->
        <div class="md:col-span-2">
            <h3 class="font-serif text-xl mb-4 text-ink-heading">Contacto</h3>
            <p class="text-sm text-ink-soft mb-2"><?php echo esc_html(RYT_ADDRESS); ?></p>
            <p class="text-sm text-ink-soft mb-2">
                <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_1)); ?>" class="hover:text-ryt-mint"><?php echo esc_html(RYT_PHONE_1); ?></a>
                ·
                <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_2)); ?>" class="hover:text-ryt-mint"><?php echo esc_html(RYT_PHONE_2); ?></a>
            </p>
            <p class="text-sm text-ink-soft mb-5">
                <a href="mailto:<?php echo esc_attr(RYT_EMAIL); ?>" class="hover:text-ryt-mint"><?php echo esc_html(RYT_EMAIL); ?></a>
            </p>

            <!-- Redes -->
            <div class="flex items-center gap-3">
                <a href="<?php echo esc_url(ryt_whatsapp_url()); ?>" target="_blank" rel="noopener" aria-label="WhatsApp" class="h-10 w-10 inline-flex items-center justify-center rounded-full bg-ryt-mint text-white hover:bg-ryt-mint-dark transition-colors">
                    <?php ryt_icon('whatsapp', 'w-5 h-5'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_INSTAGRAM); ?>" target="_blank" rel="noopener" aria-label="Instagram" class="h-10 w-10 inline-flex items-center justify-center rounded-full bg-ryt-mint text-white hover:bg-ryt-mint-dark transition-colors">
                    <?php ryt_icon('instagram', 'w-5 h-5'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_FACEBOOK); ?>" target="_blank" rel="noopener" aria-label="Facebook" class="h-10 w-10 inline-flex items-center justify-center rounded-full bg-ryt-mint text-white hover:bg-ryt-mint-dark transition-colors">
                    <?php ryt_icon('facebook', 'w-5 h-5'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_YOUTUBE); ?>" target="_blank" rel="noopener" aria-label="YouTube" class="h-10 w-10 inline-flex items-center justify-center rounded-full bg-ryt-mint text-white hover:bg-ryt-mint-dark transition-colors">
                    <?php ryt_icon('youtube', 'w-5 h-5'); ?>
                </a>
            </div>
        </div>

        <!-- QR -->
        <div class="flex flex-col items-center md:items-start">
            <h3 class="font-serif text-xl mb-4 text-ink-heading">Escanéame</h3>
            <?php
            $qr = RYT_DIR . '/assets/img/qrcode-1.png';
            if (file_exists($qr)):
            ?>
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/qrcode-1.png'); ?>"
                 alt="QR contacto Ritmo y Tumbao"
                 class="w-28 h-28 bg-white p-2 rounded-lg ring-1 ring-paper-alt" loading="lazy">
            <?php else: ?>
            <div class="w-28 h-28 bg-paper-soft rounded-lg flex items-center justify-center text-xs text-ink-mute text-center px-3">QR pendiente</div>
            <?php endif; ?>
        </div>

        <!-- Logo -->
        <div class="flex flex-col items-center md:items-end">
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/logo-sello.webp'); ?>"
                 alt="Ritmo y Tumbao Dance School"
                 class="w-32 h-auto"
                 loading="lazy">
        </div>
    </div>

    <!-- Bottom: legales + créditos -->
    <div class="border-t border-paper-alt bg-paper-soft">
        <div class="container mx-auto px-4 py-5 flex flex-col md:flex-row md:items-center md:justify-between gap-3 text-xs text-ink-soft">
            <ul class="flex flex-wrap items-center gap-x-5 gap-y-2">
                <li><a href="<?php echo esc_url(home_url('/politica-de-privacidad/')); ?>" class="hover:text-ink-heading">Política de privacidad</a></li>
                <li><a href="<?php echo esc_url(home_url('/aviso-legal/')); ?>" class="hover:text-ink-heading">Aviso legal</a></li>
                <li><a href="<?php echo esc_url(home_url('/politica-de-cookies/')); ?>" class="hover:text-ink-heading">Política De Cookies</a></li>
                <li><a href="<?php echo esc_url(home_url('/politica-de-devoluciones/')); ?>" class="hover:text-ink-heading">Política De Devoluciones</a></li>
            </ul>
            <p>®<?php echo esc_html(date('Y')); ?> Ritmo y Tumbao</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
