<?php
/**
 * Header — replica el del prod ritmoytumbao-ds.es.
 *
 * Layout real (medido en vivo):
 *   - Topbar BLANCA con texto oscuro: dirección + tel + horario + 4 redes (WA, IG, FB, YT) + logo a la derecha
 *   - Main bar BLANCA con menú 5 items en mayúsculas: LA ESCUELA · HORARIOS Y TARIFAS · SERVICIOS · CONTACTO · PREINSCRIPCIÓN (verde)
 *   - Botón PREINSCRIPCIÓN va al sistema externo (playoffinformatica.com)
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class('bg-paper text-ink antialiased font-sans'); ?>>
<?php wp_body_open(); ?>

<header class="w-full bg-white">
    <!-- Topbar info: dirección · tel · horario · 4 redes -->
    <div class="border-b border-paper-alt">
        <div class="container mx-auto px-4 py-2.5 flex flex-wrap items-center gap-x-6 gap-y-2 text-xs text-ink">
            <a href="<?php echo esc_url(RYT_ADDRESS_MAPS); ?>" target="_blank" rel="noopener" class="flex items-center gap-1.5 hover:text-ryt-mint">
                <?php ryt_icon('pin', 'w-4 h-4 text-ryt-mint'); ?>
                <span><?php echo esc_html(RYT_ADDRESS); ?></span>
            </a>
            <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_1)); ?>" class="flex items-center gap-1.5 hover:text-ryt-mint">
                <?php ryt_icon('phone', 'w-4 h-4 text-ryt-mint'); ?>
                <span><?php echo esc_html(RYT_PHONE_1 . ' - ' . RYT_PHONE_2); ?></span>
            </a>
            <span class="flex items-center gap-1.5 text-ink-soft">
                <?php ryt_icon('clock', 'w-4 h-4 text-ryt-mint'); ?>
                <span><?php echo esc_html(RYT_OFFICE_HOURS); ?></span>
            </span>

            <!-- Redes alineadas a la derecha -->
            <div class="ml-auto flex items-center gap-3">
                <a href="<?php echo esc_url(ryt_whatsapp_url()); ?>" target="_blank" rel="noopener" aria-label="WhatsApp" class="hover:text-ryt-mint">
                    <?php ryt_icon('whatsapp', 'w-4 h-4'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_INSTAGRAM); ?>" target="_blank" rel="noopener" aria-label="Instagram" class="hover:text-ryt-mint">
                    <?php ryt_icon('instagram', 'w-4 h-4'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_FACEBOOK); ?>" target="_blank" rel="noopener" aria-label="Facebook" class="hover:text-ryt-mint">
                    <?php ryt_icon('facebook', 'w-4 h-4'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_YOUTUBE); ?>" target="_blank" rel="noopener" aria-label="YouTube" class="hover:text-ryt-mint">
                    <?php ryt_icon('youtube', 'w-4 h-4'); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Main bar: logo izquierda · menú · botón PREINSCRIPCIÓN -->
    <div class="container mx-auto px-4 py-4 flex items-center justify-between gap-4">
        <div class="flex-shrink-0">
            <?php ryt_the_logo('h-11 md:h-14 w-auto'); ?>
        </div>

        <nav class="hidden lg:block" aria-label="<?php esc_attr_e('Menú principal', 'ryt'); ?>">
            <?php ryt_nav_menu('primary', 'flex items-center gap-8'); ?>
        </nav>

        <div class="flex items-center gap-3">
            <a href="<?php echo esc_url(RYT_PREINSCRIPCION_URL); ?>" target="_blank" rel="noopener" class="btn btn-primary hidden sm:inline-flex">
                <?php esc_html_e('Preinscripción', 'ryt'); ?>
            </a>
            <button type="button" id="ryt-menu-toggle"
                    class="lg:hidden inline-flex items-center justify-center h-10 w-10 rounded-md border border-paper-alt"
                    aria-controls="ryt-mobile-nav" aria-expanded="false"
                    aria-label="<?php esc_attr_e('Abrir menú', 'ryt'); ?>">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
            </button>
        </div>
    </div>

    <!-- Menú mobile -->
    <nav id="ryt-mobile-nav" class="lg:hidden hidden border-t border-paper-alt bg-white" aria-label="<?php esc_attr_e('Menú móvil', 'ryt'); ?>">
        <div class="container mx-auto px-4 py-4">
            <?php ryt_nav_menu('primary', 'flex flex-col gap-3 text-base'); ?>
            <a href="<?php echo esc_url(RYT_PREINSCRIPCION_URL); ?>" target="_blank" rel="noopener" class="btn btn-primary w-full mt-4">
                <?php esc_html_e('Preinscripción', 'ryt'); ?>
            </a>
        </div>
    </nav>
</header>
