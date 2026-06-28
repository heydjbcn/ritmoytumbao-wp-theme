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

<header class="ryt-header-sticky w-full">
    <!-- Topbar info OSCURO (v9): visible solo en md+ (oculto en móvil) -->
    <div class="hidden md:block bg-ink-dark text-[#CFCAC5]">
        <div class="max-w-[1320px] mx-auto px-6 py-2 flex flex-wrap items-center gap-x-6 gap-y-2 text-[12.5px]">
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

            <!-- Selector idioma + Soy alumno + redes -->
            <div class="ml-auto flex items-center gap-4">
                <?php if (function_exists('pll_the_languages')): ?>
                    <ul class="ryt-lang-switch flex items-center gap-1 text-[11px] font-bold uppercase tracking-[0.1em]">
                        <?php
                        $langs = pll_the_languages(['raw' => 1, 'hide_if_empty' => 0, 'hide_current' => 0]);
                        foreach ($langs as $lang):
                        ?>
                            <li>
                                <a href="<?php echo esc_url($lang['url']); ?>"
                                   class="px-1.5 py-0.5 transition-colors <?php echo $lang['current_lang'] ? 'text-ryt-mint' : 'text-ink-soft hover:text-ryt-mint'; ?>">
                                    <?php echo esc_html($lang['slug']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <span class="text-ink-mute">·</span>
                <?php endif; ?>
                <!-- Soy alumno con dropdown stores -->
                <div class="ryt-app-dropdown relative">
                    <button type="button" class="ryt-app-trigger inline-flex items-center gap-1.5 text-[12px] font-bold uppercase tracking-[0.06em] text-ink-soft hover:text-ryt-mint transition-colors">
                        <?php ryt_icon('user', 'w-3.5 h-3.5'); ?>
                        Soy alumno
                        <?php ryt_icon('chevron-down', 'w-3 h-3'); ?>
                    </button>
                    <div class="ryt-app-menu absolute right-0 top-full mt-2 min-w-[220px] bg-white rounded-2xl border border-[#EFEBE6] shadow-card-lg p-3 z-50 opacity-0 invisible translate-y-1 transition-all duration-200">
                        <p class="text-[10px] uppercase tracking-[0.16em] font-bold text-ink-mute mb-2 px-1">Descarga la app</p>
                        <a href="<?php echo esc_url(RYT_APP_IOS_URL); ?>" target="_blank" rel="noopener" class="flex items-center gap-2.5 px-2 py-2 rounded-lg hover:bg-paper-alt transition-colors">
                            <?php ryt_icon('apple', 'w-5 h-5 text-ink-heading'); ?>
                            <span class="text-[13px] font-semibold text-ink-heading">App Store</span>
                        </a>
                        <a href="<?php echo esc_url(RYT_APP_ANDROID_URL); ?>" target="_blank" rel="noopener" class="flex items-center gap-2.5 px-2 py-2 rounded-lg hover:bg-paper-alt transition-colors">
                            <?php ryt_icon('googleplay', 'w-5 h-5 text-ryt-mint'); ?>
                            <span class="text-[13px] font-semibold text-ink-heading">Google Play</span>
                        </a>
                    </div>
                </div>

                <!-- Redes sociales -->
                <div class="flex items-center gap-1">
                    <a href="<?php echo esc_url(ryt_whatsapp_url()); ?>" target="_blank" rel="noopener" aria-label="WhatsApp" class="ryt-social-icon">
                        <?php ryt_icon('whatsapp', 'w-4 h-4'); ?>
                    </a>
                    <a href="<?php echo esc_url(RYT_INSTAGRAM); ?>" target="_blank" rel="noopener" aria-label="Instagram" class="ryt-social-icon">
                        <?php ryt_icon('instagram', 'w-4 h-4'); ?>
                    </a>
                    <a href="<?php echo esc_url(RYT_FACEBOOK); ?>" target="_blank" rel="noopener" aria-label="Facebook" class="ryt-social-icon">
                        <?php ryt_icon('facebook', 'w-4 h-4'); ?>
                    </a>
                    <a href="<?php echo esc_url(RYT_YOUTUBE); ?>" target="_blank" rel="noopener" aria-label="YouTube" class="ryt-social-icon">
                        <?php ryt_icon('youtube', 'w-4 h-4'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Topbar móvil compacto: solo botón Llamar + redes -->
    <div class="md:hidden border-b border-paper-alt bg-ink-dark">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between text-xs">
            <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_1)); ?>" class="inline-flex items-center gap-1.5 text-white">
                <?php ryt_icon('phone', 'w-3.5 h-3.5 text-ryt-mint'); ?>
                <span class="text-[12px] font-medium"><?php echo esc_html(RYT_PHONE_1); ?></span>
            </a>
            <div class="flex items-center gap-2">
                <a href="<?php echo esc_url(ryt_whatsapp_url()); ?>" target="_blank" rel="noopener" aria-label="WhatsApp" class="text-white/80 hover:text-ryt-mint transition-colors">
                    <?php ryt_icon('whatsapp', 'w-4 h-4'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_INSTAGRAM); ?>" target="_blank" rel="noopener" aria-label="Instagram" class="text-white/80 hover:text-ryt-mint transition-colors">
                    <?php ryt_icon('instagram', 'w-4 h-4'); ?>
                </a>
                <a href="<?php echo esc_url(RYT_FACEBOOK); ?>" target="_blank" rel="noopener" aria-label="Facebook" class="text-white/80 hover:text-ryt-mint transition-colors">
                    <?php ryt_icon('facebook', 'w-4 h-4'); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Main bar: logo izquierda · menú · botón PREINSCRIPCIÓN -->
    <div class="container mx-auto px-4 py-4 flex items-center justify-between gap-4">
        <div class="flex-shrink-0 ryt-logo-wrap">
            <?php ryt_the_logo('h-11 md:h-14 w-auto'); ?>
        </div>

        <nav class="hidden lg:block" aria-label="<?php esc_attr_e('Menú principal', 'ryt'); ?>">
            <?php ryt_nav_menu('primary', 'ryt-nav'); ?>
        </nav>

        <div class="flex items-center gap-3">
            <a href="<?php echo esc_url(RYT_PREINSCRIPCION_URL); ?>" target="_blank" rel="noopener" class="btn btn-primary btn-preinscripcion hidden sm:inline-flex">
                <span class="relative z-10"><?php esc_html_e('Preinscripción', 'ryt'); ?></span>
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

            <!-- Soy alumno: descarga de apps -->
            <div class="mt-6 pt-5 border-t border-paper-alt">
                <p class="text-[10px] uppercase tracking-[0.16em] font-bold text-ink-mute mb-3">Soy alumno · Descarga la app</p>
                <div class="flex gap-2">
                    <a href="<?php echo esc_url(RYT_APP_IOS_URL); ?>" target="_blank" rel="noopener" class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2.5 rounded-pill bg-ink-dark text-white text-[12px] font-semibold hover:bg-ink transition-colors">
                        <?php ryt_icon('apple', 'w-4 h-4'); ?>
                        App Store
                    </a>
                    <a href="<?php echo esc_url(RYT_APP_ANDROID_URL); ?>" target="_blank" rel="noopener" class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2.5 rounded-pill bg-ink-dark text-white text-[12px] font-semibold hover:bg-ink transition-colors">
                        <?php ryt_icon('googleplay', 'w-4 h-4 text-ryt-mint'); ?>
                        Google Play
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
