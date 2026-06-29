<?php
/**
 * Blog v9 (Cloud Design v2) — header grid 2-col + 3 cards con featured images.
 */
$recent = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'no_found_rows'  => true,
]);
?>
<section class="bg-paper py-[104px] px-6">
    <div class="max-w-[1220px] mx-auto">
        <!-- Header grid 2-col v9 -->
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[48px]">
            <div>
                <?php ryt_eyebrow('08', __('Blog de salsa y bachata', 'ryt')); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    <?php esc_html_e('Lo último del', 'ryt'); ?><br><?php esc_html_e('blog', 'ryt'); ?>
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft mb-[22px]">
                    <?php esc_html_e('Trucos, eventos, novedades y todo lo que pasa en la escuela. Para alumnos y curiosos del baile.', 'ryt'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>"
                   class="inline-flex items-center gap-[9px] text-[13px] font-bold uppercase tracking-[0.1em] text-ink-heading hover:text-ryt-mint transition-colors">
                    <?php esc_html_e('Ver todo el blog →', 'ryt'); ?>
                </a>
            </div>
        </div>

        <?php if ($recent->have_posts()): ?>
            <div class="grid gap-[28px] sm:grid-cols-2 lg:grid-cols-3">
                <?php while ($recent->have_posts()): $recent->the_post(); ?>
                <article class="bg-white rounded-[22px] border border-[#EFEBE6] overflow-hidden flex flex-col shadow-[0_10px_30px_rgba(38,37,36,0.05)] group">
                    <a href="<?php the_permalink(); ?>" class="block flex-1 flex flex-col">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="aspect-[16/10] overflow-hidden bg-paper-alt">
                                <?php the_post_thumbnail('ryt-card', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300', 'loading' => 'lazy']); ?>
                            </div>
                        <?php endif; ?>
                        <div class="p-[24px] flex-1 flex flex-col">
                            <p class="text-[11px] uppercase tracking-[0.12em] font-bold text-ryt-mint mb-2"><?php echo esc_html(get_the_date('j M Y')); ?></p>
                            <h3 class="text-ink-heading text-[19px] leading-[1.3] mb-2 group-hover:text-ryt-mint-dark transition-colors flex-1">
                                <?php the_title(); ?>
                            </h3>
                            <span class="inline-flex items-center gap-[6px] mt-3 text-[12px] uppercase tracking-[0.1em] font-bold text-ink-heading"><?php esc_html_e('Leer más →', 'ryt'); ?></span>
                        </div>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else: wp_reset_postdata(); ?>
            <p class="text-center text-ink-soft"><?php esc_html_e('Pronto publicaremos los primeros artículos.', 'ryt'); ?></p>
        <?php endif; ?>
    </div>
</section>
