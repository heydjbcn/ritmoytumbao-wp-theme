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

/** Iconos SVG inline (sin dependencias). */
function ryt_icon(string $name, string $class = 'h-5 w-5'): void {
    $icons = [
        'phone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
        'pin'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        'clock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        'whatsapp' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.501-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0 0 20.464 3.488"/></svg>',
        'instagram' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.2c3.2 0 3.6 0 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s0 3.6-.07 4.85c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.6 0-4.85-.07c-1.17-.05-1.8-.25-2.23-.41a3.7 3.7 0 0 1-1.38-.9 3.7 3.7 0 0 1-.9-1.38c-.16-.42-.36-1.06-.41-2.23C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41C8.4 2.21 8.8 2.2 12 2.2zm0 4.86A4.94 4.94 0 1 1 7.06 12 4.94 4.94 0 0 1 12 7.06zm0 1.8a3.14 3.14 0 1 0 3.14 3.14A3.14 3.14 0 0 0 12 8.86zm5.16-2.05a1.15 1.15 0 1 1-1.15 1.15 1.15 1.15 0 0 1 1.15-1.15z"/></svg>',
        'facebook' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99h-2.54V12h2.54V9.8c0-2.51 1.5-3.9 3.78-3.9 1.1 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.45 2.89h-2.34v6.99A10 10 0 0 0 22 12z"/></svg>',
        'youtube' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.4.6A3 3 0 0 0 .5 6.2C0 8 0 12 0 12s0 4 .5 5.8a3 3 0 0 0 2.1 2.1c1.9.6 9.4.6 9.4.6s7.5 0 9.4-.6a3 3 0 0 0 2.1-2.1C24 16 24 12 24 12s0-4-.5-5.8zM9.6 15.6V8.4l6.3 3.6-6.3 3.6z"/></svg>',
    ];
    if (!isset($icons[$name])) return;
    echo '<span class="' . esc_attr($class) . ' inline-flex items-center justify-center [&>svg]:w-full [&>svg]:h-full">' . $icons[$name] . '</span>';
}
