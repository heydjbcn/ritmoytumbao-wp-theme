<?php
/**
 * Schema JSON-LD: LocalBusiness (DanceSchool), Organization, WebSite, BreadcrumbList.
 *
 * Alineado con el consenso de marketing:
 *   - Solo schema "seguro" (no FAQ, no Course, no AggregateRating propio).
 *   - LocalBusiness/DanceSchool con NAP coherente.
 *   - Organization con sameAs a redes sociales.
 *   - BreadcrumbList por página.
 */
if (!defined('ABSPATH')) exit;

/**
 * Schema LocalBusiness (DanceSchool) — se inyecta en TODAS las páginas.
 */
function ryt_schema_localbusiness(): array {
    return [
        '@context' => 'https://schema.org',
        '@type'    => ['LocalBusiness', 'DanceSchool'],
        '@id'      => home_url('/#localbusiness'),
        'name'     => RYT_BRAND_NAME,
        'image'    => RYT_URI . '/assets/img/logo-sello.webp',
        'logo'     => RYT_URI . '/assets/img/logo-recto.webp',
        'url'      => home_url('/'),
        'telephone'=> RYT_PHONE_1,
        'email'    => RYT_EMAIL,
        'address'  => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => RYT_ADDRESS_STREET,
            'postalCode'      => RYT_ADDRESS_CP,
            'addressLocality' => RYT_ADDRESS_CITY,
            'addressRegion'   => RYT_ADDRESS_REGION,
            'addressCountry'  => RYT_ADDRESS_COUNTRY,
        ],
        'openingHoursSpecification' => [
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens'     => '18:00',
                'closes'    => '23:00',
            ],
        ],
        'priceRange' => '€€',
    ];
}

/**
 * Schema Organization — sameAs a redes sociales.
 */
function ryt_schema_organization(): array {
    return [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        '@id'      => home_url('/#organization'),
        'name'     => RYT_BRAND_NAME,
        'url'      => home_url('/'),
        'logo'     => RYT_URI . '/assets/img/logo-recto.webp',
        'sameAs'   => [
            RYT_INSTAGRAM,
            RYT_FACEBOOK,
            RYT_YOUTUBE,
        ],
    ];
}

/**
 * Schema WebSite — para la home, con potencial SearchAction.
 */
function ryt_schema_website(): array {
    return [
        '@context' => 'https://schema.org',
        '@type'    => 'WebSite',
        '@id'      => home_url('/#website'),
        'url'      => home_url('/'),
        'name'     => RYT_BRAND_NAME,
        'publisher'=> ['@id' => home_url('/#organization')],
        'inLanguage' => 'es-ES',
    ];
}

/**
 * BreadcrumbList — generado por página WP.
 */
function ryt_schema_breadcrumbs(): ?array {
    if (is_front_page()) return null;
    $items = [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Inicio', 'item' => home_url('/')],
    ];
    if (is_page() || is_single()) {
        global $post;
        $items[] = [
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => get_the_title($post),
            'item'     => get_permalink($post),
        ];
    } elseif (is_home() || is_archive() || is_category()) {
        $title = is_home() ? 'Blog' : (single_cat_title('', false) ?: 'Archivo');
        $items[] = [
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => $title,
            'item'     => is_home() ? home_url('/blog/') : get_pagenum_link(),
        ];
    }
    return [
        '@context' => 'https://schema.org',
        '@type'    => 'BreadcrumbList',
        'itemListElement' => $items,
    ];
}

/**
 * Inyectar todos los schemas en <head> vía wp_head.
 */
add_action('wp_head', function () {
    $schemas = [
        ryt_schema_localbusiness(),
        ryt_schema_organization(),
    ];
    if (is_front_page()) {
        $schemas[] = ryt_schema_website();
    }
    $crumbs = ryt_schema_breadcrumbs();
    if ($crumbs) {
        $schemas[] = $crumbs;
    }
    foreach ($schemas as $s) {
        echo "\n" . '<script type="application/ld+json">' . wp_json_encode($s, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
    }
}, 30);
