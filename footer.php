<?php
/**
 * Footer v7 — réplica del mockup Cloud Design.
 *
 * Estructura:
 *   - Banda newsletter (sobre fondo oscuro #262524): pre-title mint + cita serif XL + input + botón
 *   - Grid 4 columnas: Brand + Explora + Contacto + QR
 *   - Bottom bar más oscuro (#1F1E1D): legales + copyright
 */
?>
<footer class="bg-ink-dark text-[#C5BFB9] mt-0">
    <!-- Banda newsletter -->
    <div class="border-b border-white/10">
        <div class="max-w-[760px] mx-auto px-6 py-[72px] text-center">
            <span class="inline-block text-xs font-bold uppercase tracking-[0.24em] text-ryt-mint mb-5">Ritmo y Tumbao</span>
            <p class="font-serif italic text-2xl md:text-[27px] leading-[1.5] text-[#F4F1EC] mb-[34px]">
                "El trabajo de los pies es caminar, pero su afición es bailar."
            </p>
            <form class="flex flex-col sm:flex-row gap-3 max-w-[460px] mx-auto"
                  action="#" onsubmit="event.preventDefault(); alert('Suscripción pendiente de integración');">
                <label for="ryt-newsletter" class="sr-only">Email</label>
                <input id="ryt-newsletter" type="email" required placeholder="Tu email"
                       class="flex-1 px-[22px] py-[14px] rounded-pill border border-white/15 bg-white/5 text-[#F4F1EC] placeholder-white/40 text-sm focus:outline-none focus:border-ryt-mint">
                <button type="submit"
                        class="px-[26px] py-[14px] rounded-pill bg-ryt-mint text-ryt-forest text-[13px] font-bold uppercase tracking-[0.05em] hover:bg-ryt-mint-dark transition-colors whitespace-nowrap"
                        style="box-shadow: 0 10px 24px rgba(98,216,172,0.22);">
                    Subscríbete
                </button>
            </form>
            <p class="text-xs text-[#8E8884] mt-3.5">
                Recibe ofertas, eventos e información sobre nuevos cursos.
            </p>
        </div>
    </div>

    <!-- Grid principal -->
    <div class="max-w-[1280px] mx-auto px-6 py-16 grid gap-12 md:grid-cols-2 lg:grid-cols-[1.5fr_1fr_1.2fr_1fr] items-start">

        <!-- Brand + redes -->
        <div>
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/logo-sello.webp'); ?>"
                 alt="Ritmo y Tumbao Dance School"
                 class="w-24 h-auto mb-5"
                 loading="lazy">
            <p class="text-sm leading-[1.7] text-[#A39D98] mb-[22px] max-w-[280px]">
                Escuela de salsa y bachata en Mataró. Más de 15 años enseñando a bailar con ritmo y tumbao.
            </p>
            <div class="flex items-center gap-[11px]">
                <a href="<?php echo esc_url(ryt_whatsapp_url()); ?>" target="_blank" rel="noopener"
                   aria-label="WhatsApp" class="ryt-foot-social">
                    <?php ryt_icon('whatsapp', 'w-[18px] h-[18px]'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_INSTAGRAM); ?>" target="_blank" rel="noopener"
                   aria-label="Instagram" class="ryt-foot-social">
                    <?php ryt_icon('instagram', 'w-[18px] h-[18px]'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_FACEBOOK); ?>" target="_blank" rel="noopener"
                   aria-label="Facebook" class="ryt-foot-social">
                    <?php ryt_icon('facebook', 'w-[18px] h-[18px]'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_YOUTUBE); ?>" target="_blank" rel="noopener"
                   aria-label="YouTube" class="ryt-foot-social">
                    <?php ryt_icon('youtube', 'w-[18px] h-[18px]'); ?>
                </a>
            </div>
        </div>

        <!-- Explora -->
        <div>
            <h3 class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#F4F1EC] mb-5 font-sans">
                Explora
            </h3>
            <ul class="flex flex-col gap-[13px]">
                <li><a href="<?php echo esc_url(home_url('/')); ?>" class="ryt-foot-link">Inicio</a></li>
                <li><a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="ryt-foot-link">Horarios y tarifas</a></li>
                <li><a href="<?php echo esc_url(home_url('/clases-de-salsa/')); ?>" class="ryt-foot-link">Clases de salsa</a></li>
                <li><a href="<?php echo esc_url(home_url('/clases-de-bachata/')); ?>" class="ryt-foot-link">Clases de bachata</a></li>
                <li><a href="<?php echo esc_url(home_url('/baile-nupcial/')); ?>" class="ryt-foot-link">Baile nupcial</a></li>
                <li><a href="<?php echo esc_url(home_url('/instalaciones/')); ?>" class="ryt-foot-link">Instalaciones</a></li>
                <li><a href="<?php echo esc_url(home_url('/blog/')); ?>" class="ryt-foot-link">Blog</a></li>
            </ul>
        </div>

        <!-- Contacto -->
        <div>
            <h3 class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#F4F1EC] mb-5 font-sans">
                Contacto
            </h3>
            <p class="text-sm text-[#A39D98] leading-[1.7] mb-[14px]">
                <?php echo esc_html(RYT_ADDRESS_STREET); ?>,<br>
                <?php echo esc_html(RYT_ADDRESS_CP . ' ' . RYT_ADDRESS_CITY . ' (' . RYT_ADDRESS_REGION . ')'); ?>
            </p>
            <p class="text-sm text-[#A39D98] leading-[1.8] mb-1">
                <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_1)); ?>" class="hover:text-ryt-mint transition-colors">
                    <?php echo esc_html(RYT_PHONE_1); ?>
                </a>
            </p>
            <p class="text-sm text-[#A39D98] leading-[1.8] mb-[14px]">
                <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_2)); ?>" class="hover:text-ryt-mint transition-colors">
                    <?php echo esc_html(RYT_PHONE_2); ?>
                </a>
            </p>
            <p class="text-sm text-ryt-mint mb-[14px]">
                <a href="mailto:<?php echo esc_attr(RYT_EMAIL); ?>" class="hover:underline">
                    <?php echo esc_html(RYT_EMAIL); ?>
                </a>
            </p>
            <p class="text-[13px] text-[#7C7672]">Lun–Vie · 18h–23h</p>
        </div>

        <!-- Descarga la app + QR -->
        <div class="flex flex-col items-start">
            <h3 class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#F4F1EC] mb-5 font-sans">
                Descarga la app
            </h3>
            <div class="flex flex-col gap-2.5 mb-5">
                <a href="<?php echo esc_url(RYT_APP_IOS_URL); ?>" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded-pill bg-white/10 hover:bg-ryt-mint hover:text-ryt-forest text-white text-[12.5px] font-semibold transition-colors">
                    <?php ryt_icon('apple', 'w-4 h-4'); ?>
                    App Store
                </a>
                <a href="<?php echo esc_url(RYT_APP_ANDROID_URL); ?>" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded-pill bg-white/10 hover:bg-ryt-mint hover:text-ryt-forest text-white text-[12.5px] font-semibold transition-colors">
                    <?php ryt_icon('googleplay', 'w-4 h-4 text-ryt-mint'); ?>
                    Google Play
                </a>
            </div>
            <?php $qr = RYT_DIR . '/assets/img/qrcode-1.png'; if (file_exists($qr)): ?>
                <img src="<?php echo esc_url(RYT_URI . '/assets/img/qrcode-1.png'); ?>"
                     alt="QR contacto Ritmo y Tumbao"
                     class="w-[80px] h-[80px] bg-white p-[6px] rounded-[10px]"
                     loading="lazy">
                <p class="text-xs text-[#7C7672] mt-2 max-w-[140px] leading-[1.5]">
                    O escanea para guardar nuestro contacto.
                </p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bottom bar -->
    <div class="border-t border-white/10 bg-[#1F1E1D]">
        <div class="max-w-[1280px] mx-auto px-6 py-[22px] flex flex-wrap items-center justify-between gap-[14px] text-xs text-[#8E8884]">
            <ul class="flex flex-wrap gap-x-[22px] gap-y-2 m-0 p-0 list-none">
                <li><a href="<?php echo esc_url(home_url('/politica-de-privacidad/')); ?>" class="ryt-foot-link">Política de privacidad</a></li>
                <li><a href="<?php echo esc_url(home_url('/aviso-legal/')); ?>" class="ryt-foot-link">Aviso legal</a></li>
                <li><a href="<?php echo esc_url(home_url('/politica-de-cookies/')); ?>" class="ryt-foot-link">Política de cookies</a></li>
                <li><a href="<?php echo esc_url(home_url('/politica-de-devoluciones/')); ?>" class="ryt-foot-link">Política de devoluciones</a></li>
            </ul>
            <span class="text-[#6E6864]">®<?php echo esc_html(date('Y')); ?> Ritmo y Tumbao · Dance School</span>
        </div>
    </div>
</footer>

<!-- WhatsApp float button v9 (Cloud Design v2) — visible en todas las páginas -->
<a href="<?php echo esc_url(ryt_whatsapp_url()); ?>"
   target="_blank" rel="noopener"
   class="ryt-wa-float"
   aria-label="Escríbenos por WhatsApp">
    <?php ryt_icon('whatsapp', 'w-7 h-7'); ?>
</a>

<?php wp_footer(); ?>
</body>
</html>
