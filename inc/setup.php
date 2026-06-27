<?php
/**
 * Setup: theme supports, menús, image sizes.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', function () {
    load_theme_textdomain('ryt', RYT_DIR . '/languages');

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
