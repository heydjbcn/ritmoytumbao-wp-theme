<?php
/**
 * Enqueue CSS y JS.
 *  - Tailwind compilado → assets/css/main.css
 *  - Google Fonts: Libre Baskerville + ADLaM Display + Source Sans Pro (los 3 reales de prod)
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', function () {
    $css_path = RYT_DIR . '/assets/css/main.css';
    $css_uri  = RYT_URI . '/assets/css/main.css';
    $css_ver  = file_exists($css_path) ? filemtime($css_path) : RYT_VERSION;

    if (file_exists($css_path)) {
        wp_enqueue_style('ryt-main', $css_uri, [], $css_ver);
    }
    wp_enqueue_style('ryt-theme', get_stylesheet_uri(), [], RYT_VERSION);

    $js_path = RYT_DIR . '/assets/js/main.js';
    if (file_exists($js_path)) {
        wp_enqueue_script('ryt-main', RYT_URI . '/assets/js/main.js', [], filemtime($js_path), true);
    }
});

// Google Fonts: combinar en una sola request (las 3 que usa prod)
add_action('wp_head', function () {
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Libre+Baskerville:wght@400;700&family=Source+Sans+3:wght@400;600;700;800&display=swap">
    <?php
}, 1);
