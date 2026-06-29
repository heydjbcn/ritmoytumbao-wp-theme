<?php
/**
 * App del Alumno v9 (NUEVA, Cloud Design v2).
 *
 * Sección sobre fondo oscuro con grid 2-col:
 *   - Izquierda: eyebrow + h2 + features + badges App Store/Google Play.
 *   - Derecha: mockup iPhone CSS-only con captura simulada de la app.
 */
$app_features = [
    __('Reserva y anula clases en un toque', 'ryt'),
    __('Consulta horarios y tu nivel', 'ryt'),
    __('Recibe avisos de eventos y quedadas', 'ryt'),
];
?>
<section class="bg-ink-dark text-white overflow-hidden" id="app">
    <div class="max-w-[1220px] mx-auto px-6 py-[100px] grid gap-[56px] lg:grid-cols-[1.1fr_0.9fr] items-center">

        <!-- Texto + features + badges -->
        <div>
            <?php ryt_eyebrow('06', __('App del alumno', 'ryt')); ?>
            <h2 class="text-white leading-[1.12] mb-5"
                style="font-size: 42px;">
                <?php esc_html_e('Tu escuela, también', 'ryt'); ?>
                <span class="text-ryt-mint italic"><?php esc_html_e('en el móvil', 'ryt'); ?></span>
            </h2>
            <p class="text-[16.5px] text-[#C5BFB9] leading-[1.8] mb-7 max-w-[460px]">
                <?php esc_html_e('Reserva clases, consulta tus horarios, sigue tu progreso y recibe los avisos de la escuela. Todo desde la app de Ritmo y Tumbao.', 'ryt'); ?>
            </p>

            <!-- Features con checkmarks circulares mint -->
            <div class="flex flex-col gap-[13px] mb-[34px] max-w-[380px]">
                <?php foreach ($app_features as $feat): ?>
                    <div class="flex items-center gap-3">
                        <span class="flex-shrink-0 w-[30px] h-[30px] rounded-full inline-flex items-center justify-center text-ryt-mint"
                              style="background: rgba(98,216,172,0.16);">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><polyline points="20 6 9 17 4 12"/></svg>
                        </span>
                        <span class="text-[14.5px] text-[#E6E1DB]"><?php echo esc_html($feat); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Badges stores estilo iOS -->
            <div class="flex gap-3.5 flex-wrap">
                <a href="<?php echo esc_url(RYT_APP_IOS_URL); ?>" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-[11px] bg-white text-[#1A1918] px-5 py-[11px] rounded-[13px] hover:bg-paper transition-colors">
                    <?php ryt_icon('apple', 'w-6 h-6'); ?>
                    <span class="text-left leading-[1.05]">
                        <span class="block text-[9.5px] tracking-[0.04em] text-[#5C5C5C]"><?php esc_html_e('Descárgalo en la', 'ryt'); ?></span>
                        <span class="text-[17px] font-semibold tracking-[0.01em]">App Store</span>
                    </span>
                </a>
                <a href="<?php echo esc_url(RYT_APP_ANDROID_URL); ?>" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-[11px] bg-white text-[#1A1918] px-5 py-[11px] rounded-[13px] hover:bg-paper transition-colors">
                    <?php ryt_icon('googleplay', 'w-6 h-6 text-ryt-mint'); ?>
                    <span class="text-left leading-[1.05]">
                        <span class="block text-[9.5px] tracking-[0.04em] text-[#5C5C5C]"><?php esc_html_e('Disponible en', 'ryt'); ?></span>
                        <span class="text-[17px] font-semibold tracking-[0.01em]">Google Play</span>
                    </span>
                </a>
            </div>
        </div>

        <!-- Mockup iPhone con captura real de la app (App Store) -->
        <div class="flex justify-center relative">
            <div aria-hidden="true" class="absolute w-[320px] h-[320px] rounded-full"
                 style="background: radial-gradient(circle, rgba(98,216,172,0.28), transparent 68%);"></div>
            <div class="relative w-[248px] h-[506px] rounded-[42px] p-[11px] border border-[#333]"
                 style="background: #0E0D0D; box-shadow: 0 34px 70px rgba(0,0,0,0.5);">
                <!-- Screen con captura real Mis Clases -->
                <div class="h-full rounded-[32px] overflow-hidden bg-white">
                    <img src="<?php echo esc_url(RYT_URI . '/assets/img/app/appstore-mis-clases.png'); ?>"
                         alt="<?php echo esc_attr__('App Ritmo y Tumbao — pantalla Mis Clases', 'ryt'); ?>"
                         class="w-full h-full object-cover object-top block"
                         loading="lazy"
                         width="600" height="1300">
                </div>
            </div>
        </div>
    </div>
</section>
