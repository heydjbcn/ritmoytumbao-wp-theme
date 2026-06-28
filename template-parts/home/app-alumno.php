<?php
/**
 * App del Alumno v9 (NUEVA, Cloud Design v2).
 *
 * Sección sobre fondo oscuro con grid 2-col:
 *   - Izquierda: eyebrow + h2 + features + badges App Store/Google Play.
 *   - Derecha: mockup iPhone CSS-only con captura simulada de la app.
 */
$app_features = [
    'Reserva y anula clases en un toque',
    'Consulta horarios y tu nivel',
    'Recibe avisos de eventos y quedadas',
];
?>
<section class="bg-ink-dark text-white overflow-hidden" id="app">
    <div class="max-w-[1220px] mx-auto px-6 py-[100px] grid gap-[56px] lg:grid-cols-[1.1fr_0.9fr] items-center">

        <!-- Texto + features + badges -->
        <div>
            <?php ryt_eyebrow('06', 'App del alumno'); ?>
            <h2 class="text-white leading-[1.12] mb-5"
                style="font-size: 42px;">
                Tu escuela, también
                <span class="text-ryt-mint italic">en el móvil</span>
            </h2>
            <p class="text-[16.5px] text-[#C5BFB9] leading-[1.8] mb-7 max-w-[460px]">
                Reserva clases, consulta tus horarios, sigue tu progreso y recibe los avisos de la escuela. Todo desde la app de Ritmo y Tumbao.
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
                        <span class="block text-[9.5px] tracking-[0.04em] text-[#5C5C5C]">Descárgalo en la</span>
                        <span class="text-[17px] font-semibold tracking-[0.01em]">App Store</span>
                    </span>
                </a>
                <a href="<?php echo esc_url(RYT_APP_ANDROID_URL); ?>" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-[11px] bg-white text-[#1A1918] px-5 py-[11px] rounded-[13px] hover:bg-paper transition-colors">
                    <?php ryt_icon('googleplay', 'w-6 h-6 text-ryt-mint'); ?>
                    <span class="text-left leading-[1.05]">
                        <span class="block text-[9.5px] tracking-[0.04em] text-[#5C5C5C]">Disponible en</span>
                        <span class="text-[17px] font-semibold tracking-[0.01em]">Google Play</span>
                    </span>
                </a>
            </div>
        </div>

        <!-- Mockup iPhone CSS-only -->
        <div class="flex justify-center relative">
            <div aria-hidden="true" class="absolute w-[320px] h-[320px] rounded-full"
                 style="background: radial-gradient(circle, rgba(98,216,172,0.28), transparent 68%);"></div>
            <div class="relative w-[248px] h-[506px] rounded-[42px] p-[11px] border border-[#333]"
                 style="background: #0E0D0D; box-shadow: 0 34px 70px rgba(0,0,0,0.5);">
                <!-- Notch -->
                <div class="absolute top-[22px] left-1/2 -translate-x-1/2 w-[84px] h-[22px] rounded-full bg-[#0E0D0D] z-[2]"></div>
                <!-- Screen -->
                <div class="h-full rounded-[32px] overflow-hidden bg-[#FBFAF8] flex flex-col">
                    <!-- Header con próxima clase -->
                    <div class="bg-ryt-mint px-[22px] pt-[38px] pb-[22px] text-ryt-deep">
                        <p class="text-[12px] font-bold uppercase tracking-[0.14em] opacity-80">Hola, Marta</p>
                        <p class="font-serif text-[22px] mt-1.5 leading-[1.2]">Tu próxima clase</p>
                        <div class="mt-[14px] bg-white/[.92] rounded-[14px] p-[13px_15px]">
                            <p class="text-[10px] font-bold uppercase tracking-[0.1em] text-ryt-mint-dark">Hoy · 20:00</p>
                            <p class="text-[14px] font-bold text-ink-heading mt-1">Bachata · Inicio 3</p>
                            <p class="text-[12px] text-ink-soft mt-0.5">Aleix &amp; Belén · Sala 2</p>
                        </div>
                    </div>
                    <!-- Lista semana -->
                    <div class="p-[18px] flex flex-col gap-[11px]">
                        <p class="text-[11px] font-bold uppercase tracking-[0.1em] text-ink-mute">Esta semana</p>
                        <div class="flex items-center justify-between bg-white border border-[#EFEBE6] rounded-[12px] p-[11px_13px]">
                            <div>
                                <p class="text-[13px] font-semibold text-ink-heading">Salsa · Intermedio</p>
                                <p class="text-[11px] text-ink-soft">Vie · 19:50</p>
                            </div>
                            <span class="text-[10px] font-bold uppercase text-ryt-mint-dark bg-ryt-mint-soft px-[9px] py-[5px] rounded-pill">Reservada</span>
                        </div>
                        <div class="flex items-center justify-between bg-white border border-[#EFEBE6] rounded-[12px] p-[11px_13px]">
                            <div>
                                <p class="text-[13px] font-semibold text-ink-heading">Lady Style</p>
                                <p class="text-[11px] text-ink-soft">Vie · 20:00</p>
                            </div>
                            <span class="text-[10px] font-bold uppercase text-ink-soft bg-paper px-[9px] py-[5px] rounded-pill">Reservar</span>
                        </div>
                        <div class="flex items-center justify-between bg-white border border-[#EFEBE6] rounded-[12px] p-[11px_13px]">
                            <div>
                                <p class="text-[13px] font-semibold text-ink-heading">Casino con Timba</p>
                                <p class="text-[11px] text-ink-soft">Sáb · 21:00</p>
                            </div>
                            <span class="text-[10px] font-bold uppercase text-ink-soft bg-paper px-[9px] py-[5px] rounded-pill">Reservar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
