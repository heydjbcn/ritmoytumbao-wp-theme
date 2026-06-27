<?php
/**
 * Archive — listados de blog (categoría, etiqueta, autor, fecha) + página /blog/.
 */
get_header(); ?>
<main id="content" class="bg-white">
    <section class="bg-ink-dark text-white">
        <div class="container mx-auto px-4 py-16 md:py-20 text-center">
            <span class="pre-title text-ryt-mint">Blog de Salsa y Bachata</span>
            <h1 class="text-white uppercase mt-3">
                <?php
                if (is_category())      single_cat_title('Categoría: ');
                elseif (is_tag())       single_tag_title('Etiqueta: ');
                elseif (is_author())    echo 'Autor: ' . esc_html(get_the_author());
                elseif (is_year())      echo esc_html(get_the_date('Y'));
                elseif (is_month())     echo esc_html(get_the_date('F Y'));
                elseif (is_search())    echo 'Búsqueda: ' . esc_html(get_search_query());
                else                    echo 'Ritmo y Tumbao';
                ?>
            </h1>
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

            <!-- Paginación -->
            <div class="text-center mt-12">
                <?php the_posts_pagination([
                    'mid_size'  => 1,
                    'prev_text' => '← Anterior',
                    'next_text' => 'Siguiente →',
                ]); ?>
            </div>
            <?php else: ?>
            <p class="text-center text-ink-soft py-12">
                Aún no hay artículos publicados.
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-ryt-mint hover:underline">Volver al inicio</a>.
            </p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer();
