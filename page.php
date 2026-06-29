<?php
/**
 * Template genérico de páginas internas.
 *
 * Carga `template-parts/pages/{slug}.php` si existe. Para soportar
 * Polylang CA, mapea el slug CA → slug ES equivalente para reusar el
 * mismo template-part (todo el copy se localiza vía `__('...', 'ryt')`).
 *
 * Si no hay template-part custom, renderiza hero genérico + post_content WP.
 */
get_header();

$slug = get_post_field('post_name', get_post());

/**
 * Mapeo slug CA → slug ES. Reutiliza el template-part del español para
 * todos los idiomas (la traducción la sirve el .mo via __()).
 */
$ca_to_es = [
    'classes-de-salsa'                              => 'clases-de-salsa',
    'classes-de-bachata'                            => 'clases-de-bachata',
    'ball-nupcial'                                  => 'baile-nupcial',
    'classes-particulars'                           => 'clases-particulares',
    'horaris-i-tarifes'                             => 'horarios-y-tarifas',
    'instal-lacions'                                => 'instalaciones',
    'lloguer-de-sales-a-mataro-ritmo-y-tumbao'      => 'alquiler-de-salas-en-mataro-ritmo-y-tumbao',
    'bo-regal'                                      => 'bono-regalo',
    'ritmo-i-tumbao-academia-de-ball-a-mataro'      => 'ritmo-y-tumbao-academia-de-baile-en-mataro',
    'ritmo-i-tumbao-la-teva-escola-de-ball-a-mataro' => 'ritmo-y-tumbao-tu-escuela-de-baile-en-mataro',
    'classes-de-salsa-i-bachata-a-granollers'       => 'clases-de-salsa-y-bachata-en-granollers',
    'classes-de-salsa-i-bachata-a-cabrera'          => 'clases-de-salsa-y-bachata-en-cabrera',
    'classes-de-salsa-i-bachata-a-vilassar'         => 'clases-de-salsa-y-bachata-en-vilassar',
];

$template_slug = $ca_to_es[$slug] ?? $slug;
$custom = locate_template('template-parts/pages/' . $template_slug . '.php');
?>
<main id="content" class="bg-white">

<?php if ($custom): ?>
    <?php get_template_part('template-parts/pages/' . $template_slug); ?>
<?php else: ?>

    <!-- Hero genérico -->
    <section class="bg-ink-dark text-white">
        <div class="container mx-auto px-4 py-16 md:py-20 text-center">
            <span class="pre-title text-ryt-mint"><?php esc_html_e('Clases de Salsa y Bachata en Mataró', 'ryt'); ?></span>
            <h1 class="text-white uppercase mt-2"><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- Contenido WP -->
    <section class="section bg-white">
        <div class="container mx-auto px-4 max-w-3xl prose-ryt">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </section>

<?php endif; ?>

</main>
<?php get_footer();
