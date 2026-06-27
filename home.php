<?php
/**
 * Listado de posts del blog (página /blog/ asignada como page_for_posts).
 * Mismo layout que archive.php.
 */
get_header(); ?>
<main id="content" class="bg-white">
    <section class="bg-ink-dark text-white">
        <div class="container mx-auto px-4 py-16 md:py-20 text-center">
            <span class="pre-title text-ryt-mint">Blog de Salsa y Bachata</span>
            <h1 class="text-white uppercase mt-3">Ritmo y Tumbao</h1>
            <p class="text-paper-alt mt-6 max-w-2xl mx-auto">
                Noticias, consejos y curiosidades sobre el mundo del baile.
            </p>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <?php if (have_posts()): ?>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php while (have_posts()): the_post(); ?>
                <article class="card group">
                    <a href="<?php the_permalink(); ?>" class="block">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="aspect-[16/10] overflow-hidden bg-paper-alt">
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300', 'loading' => 'lazy']); ?>
                            </div>
                        <?php else: ?>
                            <div class="aspect-[16/10] bg-ryt-mint/15 flex items-center justify-center">
                                <span class="font-display text-6xl text-ryt-mint/80"><?php echo esc_html(mb_substr(get_the_title(), 0, 1)); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="p-5">
                            <h3 class="text-ink-heading text-lg leading-snug mb-2 group-hover:text-ryt-mint transition-colors">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-xs text-ink-soft"><?php echo esc_html(get_the_date()); ?></p>
                            <span class="inline-block mt-3 text-xs uppercase tracking-widest font-bold text-ryt-mint">Leer más »</span>
                        </div>
                    </a>
                </article>
                <?php endwhile; ?>
            </div>

            <div class="text-center mt-12">
                <?php the_posts_pagination([
                    'mid_size'  => 1,
                    'prev_text' => '← Anterior',
                    'next_text' => 'Siguiente →',
                ]); ?>
            </div>
            <?php else: ?>
            <p class="text-center text-ink-soft py-12">Aún no hay artículos publicados.</p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer();
