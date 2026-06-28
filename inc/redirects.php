<?php
/**
 * Redirects 301 portátiles (funcionan en nginx + Apache).
 *
 * Para Apache (IONOS) también se replican en .htaccess para que la regla
 * trabaje antes de cargar WordPress.
 */
if (!defined('ABSPATH')) exit;

/**
 * Mapa de slugs/URLs viejas → nuevas.
 * Una entrada por línea. Sólo paths absolutos sin host.
 */
function ryt_redirects_map(): array {
    return [
        '/bono-regalo-2/' => '/bono-regalo/',
        // Añadir aquí futuros renombrados.
    ];
}

add_action('template_redirect', function () {
    $req = isset($_SERVER['REQUEST_URI']) ? wp_parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '';
    if (!$req) return;
    $req = '/' . trim($req, '/') . '/';

    $map = ryt_redirects_map();
    if (isset($map[$req])) {
        wp_redirect(home_url($map[$req]), 301);
        exit;
    }
}, 5);
