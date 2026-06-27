<?php
/**
 * Template genérico de páginas internas.
 *
 * Si existe template-parts/pages/{slug}.php se carga ese (para páginas con layout custom).
 * Si no, se renderiza el contenido WP normal con un hero genérico.
 */
get_header();

$slug = get_post_field('post_name', get_post());
$custom = locate_template('template-parts/pages/' . $slug . '.php');
?>
<main id="content" class="bg-white">

<?php if ($custom): ?>
    <?php get_template_part('template-parts/pages/' . $slug); ?>
<?php else: ?>

    <!-- Hero genérico -->
    <section class="bg-ink-dark text-white">
        <div class="container mx-auto px-4 py-16 md:py-20 text-center">
            <span class="pre-title text-ryt-mint">Clases de Salsa y Bachata en Mataró</span>
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
