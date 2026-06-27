<?php
/**
 * Hero — fondo casi negro + texto decorativo gigante outline + logo sello redondo.
 *
 * Estructura real (medido en prod):
 *   - Fondo bg-ink-dark (#373636)
 *   - Capa de texto fantasma "Salsa y Bachata" en outline mint, gigante
 *   - Izquierda: logo redondo "Dance School" (Lofo-Ritmo-y-Tumbao)
 *   - Derecha: H1 "Clases de Salsa y Bachata en Mataró" + intro + CTA "VER HORARIOS"
 */
?>
<section class="relative overflow-hidden bg-ink-dark text-white">
    <!-- Texto decorativo de fondo (outline mint, opacidad baja) -->
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex flex-col justify-center z-0">
        <span class="block whitespace-nowrap font-serif italic font-bold leading-none uppercase
                     text-[12vw] tracking-tight text-transparent"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.22); transform: translateX(-3%);">
            Salsa y Bachata
        </span>
        <span class="block whitespace-nowrap font-serif italic font-bold leading-none uppercase
                     text-[12vw] tracking-tight text-transparent -mt-4 md:-mt-6"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.16); transform: translateX(8%);">
            Aprende Salsa y Bachata
        </span>
    </div>

    <div class="container mx-auto px-4 py-16 md:py-24 relative z-10">
        <div class="grid gap-10 md:grid-cols-2 items-center">
            <!-- Logo sello redondo -->
            <div class="flex justify-center md:justify-start">
                <img src="<?php echo esc_url(RYT_URI . '/assets/img/logo-sello.webp'); ?>"
                     alt="<?php esc_attr_e('Logo Ritmo y Tumbao Dance School', 'ryt'); ?>"
                     class="w-64 md:w-80 lg:w-[22rem] h-auto drop-shadow-2xl"
                     loading="eager" fetchpriority="high">
            </div>

            <!-- Texto -->
            <div>
                <span class="inline-block text-xs font-bold uppercase tracking-[0.22em] text-ryt-mint mb-5">
                    Escuela de baile en Mataró · desde 2010
                </span>
                <h1 class="text-white leading-[1.08] mb-6 text-4xl md:text-5xl lg:text-[54px]">
                    <?php esc_html_e('Clases de', 'ryt'); ?>
                    <span class="text-ryt-mint"><?php esc_html_e('Salsa y Bachata', 'ryt'); ?></span>
                    <?php esc_html_e('en Mataró', 'ryt'); ?>
                </h1>
                <p class="text-base md:text-[17px] text-[#D9D4CF] leading-[1.7] mb-[34px] max-w-[520px]">
                    <?php esc_html_e('En Ritmo y Tumbao llevamos más de 15 años impartiendo clases. Hemos abierto nuestras nuevas', 'ryt'); ?>
                    <strong class="text-white font-semibold"><?php esc_html_e('clases de salsa y bachata en Mataró', 'ryt'); ?></strong>.
                    <?php esc_html_e('También Rueda de Casino, Reggaetón, Zumba Kids y otras disciplinas.', 'ryt'); ?>
                </p>
                <div class="flex flex-wrap gap-3.5">
                    <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">
                        <?php esc_html_e('Ver horarios', 'ryt'); ?>
                    </a>
                    <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero reservar mi primera clase GRATIS')); ?>"
                       target="_blank" rel="noopener" class="btn btn-outline-white">
                        <?php esc_html_e('Reservar clase gratis', 'ryt'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
