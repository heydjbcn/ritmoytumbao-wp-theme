<?php
/**
 * Helpers de template.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Logo. Si hay custom-logo en wp-admin, lo usa. Si no, el WEBP del theme.
 */
function ryt_the_logo(string $extra_class = ''): void {
    if (has_custom_logo()) {
        the_custom_logo();
        return;
    }
    ?>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="block">
        <img
            src="<?php echo esc_url(RYT_URI . '/assets/img/logo-recto.webp'); ?>"
            alt="Ritmo y Tumbao Dance School"
            class="<?php echo esc_attr($extra_class ?: 'h-11 w-auto'); ?>"
            width="106" height="45"
        />
    </a>
    <?php
}

/** Tel sanitizado para href. */
function ryt_tel_link(string $phone): string {
    return 'tel:' . preg_replace('/[^\d+]/', '', $phone);
}

/**
 * Menú principal con fallback hardcoded.
 * Estructura REAL del prod: LA ESCUELA · HORARIOS Y TARIFAS · SERVICIOS · CONTACTO · PREINSCRIPCIÓN
 * (LA ESCUELA y SERVICIOS son mega-menús en prod; aquí los dejamos como links sueltos por ahora).
 */
function ryt_nav_menu(string $location, string $class_root = 'flex items-center gap-6'): void {
    if (!has_nav_menu($location)) {
        $links = [
            'LA ESCUELA'         => home_url('/'),
            'HORARIOS Y TARIFAS' => home_url('/horarios-y-tarifas/'),
            'SERVICIOS'          => home_url('/baile-nupcial/'),
            'CONTACTO'           => home_url('/ritmo-y-tumbao-tu-escuela-de-baile-en-mataro/'),
        ];
        echo '<ul class="' . esc_attr($class_root) . '">';
        foreach ($links as $label => $url) {
            echo '<li><a href="' . esc_url($url) . '" class="font-sans font-semibold text-sm uppercase tracking-wide hover:text-ryt-mint">' . esc_html($label) . '</a></li>';
        }
        echo '</ul>';
        return;
    }
    wp_nav_menu([
        'theme_location' => $location,
        'container'      => false,
        'menu_class'     => $class_root,
        'fallback_cb'    => false,
    ]);
}

/**
 * Eyebrow numerado v9 (Cloud Design): pequeño número ADLaM mint + línea + texto uppercase.
 * Uso: ryt_eyebrow('01', 'Nuestras disciplinas');
 */
function ryt_eyebrow(string $num, string $text, string $extra_class = ''): void {
    ?>
    <span class="ryt-eyebrow <?php echo esc_attr($extra_class); ?>">
        <?php if ($num !== ''): ?>
            <span class="ryt-eyebrow-num"><?php echo esc_html($num); ?></span>
        <?php endif; ?>
        <span class="ryt-eyebrow-line ryt-eyebrow-line-mint"></span>
        <?php echo esc_html($text); ?>
    </span>
    <?php
}

/** Iconos SVG inline (sin dependencias). */
function ryt_icon(string $name, string $class = 'h-5 w-5'): void {
    $icons = [
        'phone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
        'pin'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        'clock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        'whatsapp' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.501-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0 0 20.464 3.488"/></svg>',
        'instagram' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2.5" y="2.5" width="19" height="19" rx="5"/><path d="M16 11.37a4 4 0 1 1-4.74-4.74A4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
        'facebook' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99h-2.54V12h2.54V9.8c0-2.51 1.5-3.9 3.78-3.9 1.1 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.45 2.89h-2.34v6.99A10 10 0 0 0 22 12z"/></svg>',
        'youtube' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.4.6A3 3 0 0 0 .5 6.2C0 8 0 12 0 12s0 4 .5 5.8a3 3 0 0 0 2.1 2.1c1.9.6 9.4.6 9.4.6s7.5 0 9.4-.6a3 3 0 0 0 2.1-2.1C24 16 24 12 24 12s0-4-.5-5.8zM9.6 15.6V8.4l6.3 3.6-6.3 3.6z"/></svg>',
        'apple' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>',
        'googleplay' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M3.609 1.814L13.792 12 3.61 22.186c-.46-.27-.792-.81-.792-1.436V3.25c0-.626.332-1.166.792-1.436zm10.89 10.893l2.405 2.405-10.06 5.768 7.655-8.173zm3.499-3.5l-2.405 2.405-7.655-8.173 10.06 5.768zm.795.792l3.018 1.73c.866.5.866 1.752 0 2.252l-3.018 1.73-2.628-2.608 2.628-2.608z"/></svg>',
        'user'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
        'chevron-down' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>',
    ];
    if (!isset($icons[$name])) return;
    echo '<span class="' . esc_attr($class) . ' inline-flex items-center justify-center [&>svg]:w-full [&>svg]:h-full">' . $icons[$name] . '</span>';
}
