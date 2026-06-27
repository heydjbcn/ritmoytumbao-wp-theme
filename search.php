<?php
/**
 * Resultados de búsqueda.
 */
get_header(); ?>
<main id="content" class="bg-white">
    <section class="bg-ink-dark text-white">
        <div class="container mx-auto px-4 py-16 md:py-20 text-center">
            <span class="pre-title text-ryt-mint">Búsqueda</span>
            <h1 class="text-white uppercase mt-3">
                Resultados para "<?php echo esc_html(get_search_query()); ?>"
            </h1>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container mx-auto px-4 max-w-4xl">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex gap-3 mb-10 max-w-xl mx-auto">
                <input type="search" name="s" required value="<?php echo esc_attr(get_search_query()); ?>"
                       class="flex-1 px-5 py-3 rounded-pill bg-paper-soft border border-paper-alt focus:outline-none focus:border-ryt-mint">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>

            <?php if (have_posts()): ?>
                <ul class="space-y-6">
                    <?php while (have_posts()): the_post(); ?>
                    <li class="border-b border-paper-alt pb-6">
                        <a href="<?php the_permalink(); ?>" class="block group">
                            <p class="text-xs uppercase tracking-widest font-bold text-ryt-mint mb-1">
                                <?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?>
                            </p>
                            <h3 class="text-ink-heading group-hover:text-ryt-mint transition-colors">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-sm text-ink-soft mt-2"><?php echo esc_html(wp_trim_words(get_the_excerpt() ?: get_the_content(), 25)); ?></p>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <div class="text-center mt-10">
                    <?php the_posts_pagination(['mid_size' => 1]); ?>
                </div>
            <?php else: ?>
                <p class="text-center text-ink-soft py-12">
                    No hemos encontrado resultados.
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-ryt-mint hover:underline">Volver al inicio</a>.
                </p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer();
