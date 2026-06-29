<?php
/**
 * Setup: theme supports, menús, image sizes.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', function () {
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 280,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary' => __('Menú principal', 'ryt'),
        'footer'  => __('Footer — enlaces', 'ryt'),
    ]);

    add_image_size('ryt-hero', 1920, 1080, true);
    add_image_size('ryt-card', 720,  480, true);
    add_image_size('ryt-thumb', 320, 200, true);
});

/**
 * Cargar el textdomain del theme con el locale actual.
 *
 * Polylang aplica su filtro `locale` DESPUÉS de `after_setup_theme`, así que
 * load_theme_textdomain() en ese hook lee el locale de WP (es_ES) en vez del
 * de Polylang (ca) y carga el .mo incorrecto.
 *
 * Solución: hookar a `wp` y usar `load_textdomain` low-level con el path
 * explícito al .mo correspondiente al locale ya resuelto por Polylang.
 */
add_action('wp', function () {
    if (is_admin()) return;
    $locale = get_locale();
    $mo     = RYT_DIR . '/languages/ryt-' . $locale . '.mo';
    if (file_exists($mo)) {
        if (is_textdomain_loaded('ryt')) unload_textdomain('ryt');
        load_textdomain('ryt', $mo);
    }
});

/**
 * Polylang gestiona `nav_menu_locations` por idioma a través de su propia opción.
 * Si esa opción está vacía, `has_nav_menu()` devuelve false en frontend HTTP aunque
 * el menú esté asignado en wp-admin → el theme cae al fallback hardcoded.
 *
 * Este filtro garantiza que, mientras no se configure manualmente en wp-admin →
 * Apariencia → Menús (por idioma), el menú con el primer término del location
 * `primary` se utilice para todos los idiomas registrados en Polylang.
 *
 * Sin coste si Polylang no está activo o si ya hay configuración propia.
 */
add_filter('pre_option_polylang', function ($value) {
    if (!is_array($value)) return $value;
    if (!empty($value['nav_menus'])) return $value;

    $locations = get_nav_menu_locations();
    if (empty($locations['primary'])) return $value;

    $menu_id = (int) $locations['primary'];
    $langs   = function_exists('pll_languages_list') ? pll_languages_list(['fields' => 'slug']) : ['es'];
    if (empty($langs)) $langs = ['es'];

    $stylesheet = get_stylesheet();
    $value['nav_menus'] ??= [];
    foreach (['primary', 'footer'] as $loc) {
        foreach ($langs as $lang) {
            $value['nav_menus'][$stylesheet][$loc][$lang] = ($loc === 'primary')
                ? $menu_id
                : (int) ($locations['footer'] ?? 0);
        }
    }
    return $value;
}, 10, 1);
