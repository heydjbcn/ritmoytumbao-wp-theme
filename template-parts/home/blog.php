<?php
/**
 * Blog — "BLOG RITMO Y TUMBAO — Noticias y artículos relacionados con el baile"
 * 6 posts (como en prod) con paginación al final.
 */
$recent = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'no_found_rows'  => true,
]);
?>
<section class="section bg-paper-soft">
    <div class="container mx-auto px-4">
        <header class="text-center max-w-3xl mx-auto mb-10">
            <span class="pre-title">Blog de Salsa y Bachata</span>
            <h2 class="text-ink-heading uppercase">Blog Ritmo y Tumbao</h2>
            <p class="text-base md:text-lg text-ink-soft mt-4">
                Noticias y artículos relacionados con el baile
            </p>
        </header>

        <?php if ($recent->have_posts()): ?>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php while ($recent->have_posts()): $recent->the_post(); ?>
                <article class="card group">
                    <a href="<?php the_permalink(); ?>" class="block">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="aspect-[16/10] overflow-hidden bg-paper-alt">
                                <?php the_post_thumbnail('ryt-card', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300', 'loading' => 'lazy']); ?>
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
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <div class="text-center mt-10">
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-primary">Ver todo el blog</a>
            </div>
        <?php else: wp_reset_postdata(); ?>
            <p class="text-center text-ink-soft">Pronto publicaremos los primeros artículos.</p>
        <?php endif; ?>
    </div>
</section>
