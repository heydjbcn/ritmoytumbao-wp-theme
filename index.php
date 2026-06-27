<?php
/**
 * Fallback genérico (cualquier vista sin template específico cae aquí).
 */
get_header();
?>
<main id="content" class="container mx-auto px-4 py-16">
    <?php if (have_posts()): ?>
        <div class="max-w-3xl mx-auto space-y-12">
            <?php while (have_posts()): the_post(); ?>
                <article>
                    <header class="mb-4">
                        <h1 class="font-display text-3xl md:text-4xl text-ink mb-2"><?php the_title(); ?></h1>
                        <p class="text-sm text-ink-muted"><?php echo esc_html(get_the_date()); ?></p>
                    </header>
                    <div class="prose prose-lg max-w-none">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p class="text-center text-ink-muted"><?php esc_html_e('No hay contenido todavía.', 'ryt'); ?></p>
    <?php endif; ?>
</main>
<?php get_footer();
