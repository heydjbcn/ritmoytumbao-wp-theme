<?php
/**
 * Blog index (page id 19, asignada como page_for_posts) — v9 (Cloud Design v2).
 *
 * Bloques:
 *   1. Hero oscuro con texto fantasma "BLOG" + h1 italic + descripción + stats.
 *   2. Featured post (el más reciente) en card horizontal grande.
 *   3. Filtros por tag (chips de los 8 tags más populares).
 *   4. Grid 3-col del resto de posts.
 *   5. Paginación v9 (numerada con flechas SVG).
 *   6. CTA grande compartido.
 */
get_header();

// Total posts publicados (sin paginación)
$total_posts = (int) wp_count_posts('post')->publish;

// Tags más populares (top 8) para filtros
$popular_tags = get_terms([
    'taxonomy'   => 'post_tag',
    'orderby'    => 'count',
    'order'      => 'DESC',
    'number'     => 8,
    'hide_empty' => true,
]);
$current_tag_slug = is_tag() ? (get_queried_object()->slug ?? '') : '';

// Featured post = primer post de la primera página
$is_first_page = (get_query_var('paged') === 0);
$featured_post = null;
if ($is_first_page) {
    $featured_q = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'no_found_rows'  => true,
    ]);
    if ($featured_q->have_posts()) {
        $featured_q->the_post();
        $featured_post = get_post();
        wp_reset_postdata();
    }
}
$featured_id = $featured_post ? $featured_post->ID : 0;
?>

<main id="content" class="bg-white">

    <!-- Hero -->
    <section class="relative overflow-hidden bg-ink-dark text-white">
        <!-- Texto fantasma de fondo -->
        <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
            <span class="font-serif italic font-bold uppercase whitespace-nowrap leading-none"
                  style="-webkit-text-stroke: 1px rgba(98,216,172,0.18); color: transparent; font-size: 22vw;">
                Blog
            </span>
        </div>

        <div class="relative z-10 max-w-[1180px] mx-auto px-6 py-[110px] grid gap-[48px] lg:grid-cols-[1.3fr_1fr] items-end">
            <div>
                <?php ryt_eyebrow('', __('Blog de Ritmo y Tumbao', 'ryt')); ?>
                <h1 class="text-white" style="font-size: 58px; line-height: 1.04; letter-spacing: -0.01em;">
                    <?php esc_html_e('Bailamos, también', 'ryt'); ?>
                    <span class="italic font-display text-ryt-mint"><?php esc_html_e('con palabras', 'ryt'); ?></span>
                </h1>
                <p class="text-[17px] text-[#E6E1DB] leading-[1.7] mt-6 max-w-[540px]">
                    <?php esc_html_e('Trucos, eventos, novedades y todo lo que pasa en la escuela. Para alumnos y curiosos del baile.', 'ryt'); ?>
                </p>
            </div>
            <div class="flex flex-wrap gap-x-10 gap-y-6">
                <div>
                    <p class="font-display text-[42px] text-ryt-mint leading-none"><?php echo (int) $total_posts; ?></p>
                    <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-[#A39D98] mt-2"><?php esc_html_e('artículos', 'ryt'); ?></p>
                </div>
                <div>
                    <p class="font-display text-[42px] text-ryt-mint leading-none">15+</p>
                    <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-[#A39D98] mt-2"><?php esc_html_e('años bailando', 'ryt'); ?></p>
                </div>
                <div>
                    <p class="font-display text-[42px] text-ryt-mint leading-none">8</p>
                    <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-[#A39D98] mt-2"><?php esc_html_e('profes opinan', 'ryt'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Filtros por tag -->
    <?php if ($popular_tags && !is_wp_error($popular_tags)): ?>
    <section class="bg-paper border-y border-[#EFEBE6]">
        <div class="max-w-[1220px] mx-auto px-6 py-5">
            <div class="flex items-center gap-3 overflow-x-auto pb-1 -mb-1">
                <span class="flex-shrink-0 text-[11px] uppercase font-bold tracking-[0.14em] text-ink-mute pr-2"><?php esc_html_e('Filtrar', 'ryt'); ?></span>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>"
                   class="ryt-tag-chip <?php echo ($current_tag_slug === '') ? 'is-active' : ''; ?>">
                    <?php esc_html_e('Todos', 'ryt'); ?>
                </a>
                <?php foreach ($popular_tags as $t): ?>
                    <a href="<?php echo esc_url(get_tag_link($t->term_id)); ?>"
                       class="ryt-tag-chip <?php echo ($current_tag_slug === $t->slug) ? 'is-active' : ''; ?>">
                        <?php echo esc_html($t->name); ?>
                        <span class="ryt-tag-chip-count"><?php echo (int) $t->count; ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Featured post (primera página) -->
    <?php if ($featured_post): ?>
    <section class="bg-white py-[64px] px-6">
        <div class="max-w-[1220px] mx-auto">
            <?php
            $f_tags = wp_get_post_tags($featured_id);
            $f_tag  = $f_tags ? $f_tags[0] : null;
            ?>
            <a href="<?php echo esc_url(get_permalink($featured_id)); ?>"
               class="group block bg-paper rounded-[24px] overflow-hidden border border-[#EFEBE6] shadow-[0_18px_50px_rgba(38,37,36,0.07)] hover:shadow-[0_24px_60px_rgba(38,37,36,0.12)] transition-shadow no-underline">
                <div class="grid lg:grid-cols-[1.1fr_1fr]">
                    <div class="aspect-[5/4] lg:aspect-auto overflow-hidden bg-paper-alt">
                        <?php if (has_post_thumbnail($featured_id)): ?>
                            <?php echo get_the_post_thumbnail($featured_id, 'large', ['class' => 'w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-500', 'loading' => 'eager', 'fetchpriority' => 'high']); ?>
                        <?php else: ?>
                            <div class="w-full h-full bg-mint-grad flex items-center justify-center">
                                <span class="font-display text-7xl text-white/85"><?php echo esc_html(mb_substr(get_the_title($featured_id), 0, 1)); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-[40px] lg:p-[56px] flex flex-col justify-center">
                        <p class="text-[11px] uppercase font-bold tracking-[0.14em] text-ryt-mint mb-3">
                            <?php esc_html_e('Destacado', 'ryt'); ?>
                            <?php if ($f_tag): ?>
                                <span class="text-ink-mute mx-2">·</span>
                                <span class="text-ink-soft"><?php echo esc_html($f_tag->name); ?></span>
                            <?php endif; ?>
                        </p>
                        <h2 class="font-serif text-ink-heading mb-4" style="font-size: 32px; line-height: 1.18;">
                            <?php echo esc_html(get_the_title($featured_id)); ?>
                        </h2>
                        <p class="text-[15.5px] text-ink-soft leading-[1.65] mb-6">
                            <?php
                            $excerpt = wp_trim_words(wp_strip_all_tags(get_post_field('post_content', $featured_id)), 32, '…');
                            echo esc_html($excerpt);
                            ?>
                        </p>
                        <div class="flex items-center gap-4 text-[12px] uppercase tracking-[0.1em] font-bold text-ink-soft">
                            <span><?php echo esc_html(get_the_date('j M Y', $featured_id)); ?></span>
                            <?php
                            $words = str_word_count(wp_strip_all_tags(get_post_field('post_content', $featured_id)));
                            $mins  = max(1, (int) round($words / 220));
                            ?>
                            <span class="text-ink-mute">·</span>
                            <span><?php echo (int) $mins; ?> min</span>
                        </div>
                        <span class="inline-flex items-center gap-2 mt-7 text-[13px] uppercase font-bold tracking-[0.1em] text-ink-heading group-hover:text-ryt-mint-dark transition-colors">
                            <?php esc_html_e('Leer artículo', 'ryt'); ?>
                            <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </section>
    <?php endif; ?>

    <!-- Grid posts -->
    <section class="bg-paper py-[80px] px-6">
        <div class="max-w-[1220px] mx-auto">
            <?php if (have_posts()): ?>
                <div class="grid gap-[28px] sm:grid-cols-2 lg:grid-cols-3">
                    <?php
                    $idx = 0;
                    while (have_posts()): the_post();
                        // Saltar el post destacado si estamos en la primera página
                        if ($featured_id && get_the_ID() === $featured_id) {
                            $idx++;
                            continue;
                        }
                    ?>
                    <article class="bg-white rounded-[22px] border border-[#EFEBE6] overflow-hidden flex flex-col shadow-[0_10px_30px_rgba(38,37,36,0.05)] hover:shadow-[0_18px_50px_rgba(38,37,36,0.10)] transition-shadow group">
                        <a href="<?php the_permalink(); ?>" class="block flex-1 flex flex-col no-underline">
                            <div class="aspect-[16/10] overflow-hidden bg-paper-alt">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('ryt-card', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300', 'loading' => 'lazy']); ?>
                                <?php else: ?>
                                    <div class="w-full h-full bg-mint-grad flex items-center justify-center">
                                        <span class="font-display text-5xl text-white/85"><?php echo esc_html(mb_substr(get_the_title(), 0, 1)); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="p-[22px] flex-1 flex flex-col">
                                <?php
                                $post_tag_objs = get_the_tags();
                                $first_tag     = $post_tag_objs ? $post_tag_objs[0]->name : '';
                                ?>
                                <p class="text-[11px] uppercase tracking-[0.12em] font-bold text-ryt-mint mb-2">
                                    <?php echo esc_html(get_the_date('j M Y')); ?>
                                    <?php if ($first_tag): ?>
                                        <span class="text-ink-mute mx-1.5">·</span>
                                        <span class="text-ink-soft normal-case tracking-normal"><?php echo esc_html($first_tag); ?></span>
                                    <?php endif; ?>
                                </p>
                                <h3 class="text-ink-heading text-[18px] leading-[1.3] mb-3 group-hover:text-ryt-mint-dark transition-colors flex-1">
                                    <?php the_title(); ?>
                                </h3>
                                <span class="inline-flex items-center gap-[6px] mt-3 text-[12px] uppercase tracking-[0.1em] font-bold text-ink-heading">
                                    <?php esc_html_e('Leer', 'ryt'); ?>
                                    <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
                                </span>
                            </div>
                        </a>
                    </article>
                    <?php endwhile; ?>
                </div>

                <!-- Paginación -->
                <div class="ryt-pagination mt-[60px]">
                    <?php
                    echo paginate_links([
                        'mid_size'  => 1,
                        'prev_text' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><polyline points="15 18 9 12 15 6"/></svg>',
                        'next_text' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><polyline points="9 18 15 12 9 6"/></svg>',
                        'type'      => 'list',
                    ]);
                    ?>
                </div>
            <?php else: ?>
                <p class="text-center text-ink-soft py-12">
                    <?php esc_html_e('Aún no hay artículos publicados.', 'ryt'); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part('template-parts/home/cta'); ?>

</main>
<?php get_footer();
