<?php
/**
 * Post individual del blog.
 */
get_header(); ?>
<main id="content" class="bg-white">

<?php while (have_posts()) : the_post(); ?>

<article class="ryt-post">
    <!-- Hero del post -->
    <header class="bg-ink-dark text-white">
        <div class="container mx-auto px-4 py-16 md:py-20 max-w-4xl text-center">
            <span class="pre-title text-ryt-mint">
                <?php
                $cats = get_the_category();
                echo $cats ? esc_html($cats[0]->name) : 'Blog';
                ?>
            </span>
            <h1 class="text-white mt-3"><?php the_title(); ?></h1>
            <p class="text-sm text-paper-alt/80 mt-4">
                <?php echo esc_html(get_the_date()); ?> ·
                <?php echo esc_html(get_the_author()); ?>
            </p>
        </div>
    </header>

    <?php if (has_post_thumbnail()): ?>
    <div class="bg-paper-alt">
        <div class="container mx-auto px-4 max-w-4xl py-8">
            <?php the_post_thumbnail('large', ['class' => 'w-full h-auto rounded-2xl shadow-card', 'loading' => 'eager']); ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- Contenido -->
    <div class="section bg-white">
        <div class="container mx-auto px-4 max-w-3xl prose-ryt">
            <?php the_content(); ?>
        </div>
    </div>

    <!-- Volver al blog -->
    <div class="container mx-auto px-4 max-w-3xl text-center pb-16">
        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-outline">
            ← Volver al blog
        </a>
    </div>
</article>

<?php endwhile; ?>

<?php get_template_part('template-parts/home/cta'); ?>

</main>
<?php get_footer();
