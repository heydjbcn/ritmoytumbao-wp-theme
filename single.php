<?php
/**
 * Post individual del blog — v9 (Cloud Design v2) con aside sticky.
 *
 * Layout:
 *   1. Hero foto cover full-bleed (featured image) + gradient overlay + título + meta.
 *   2. Grid 2-col 1180px: contenido prose + aside 320px.
 *   3. Aside con 6 cards: TOC (autogen JS), CTA "primera clase gratis", servicios,
 *      contacto compacto, compartir y mini related.
 *   4. Related posts grandes (3 cards con foto) abajo.
 *   5. CTA grande compartido.
 */
get_header(); ?>

<main id="content" class="bg-white">

<?php while (have_posts()) : the_post();
    $post_tags     = get_the_tags();
    $main_tag      = $post_tags ? $post_tags[0] : null;
    $eyebrow_label = $main_tag ? $main_tag->name : 'Blog';
    $eyebrow_link  = $main_tag ? get_tag_link($main_tag->term_id) : home_url('/blog/');
    $hero_img      = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : null;
    $tag_ids       = $post_tags ? wp_list_pluck($post_tags, 'term_id') : [];

    // Reading time (220 palabras/min)
    $word_count = str_word_count(wp_strip_all_tags(get_the_content()));
    $read_min   = max(1, (int) round($word_count / 220));

    // Mini related (3 títulos) y related grande (3 cards) usan la misma query
    $related_args = [
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post__not_in'   => [get_the_ID()],
        'orderby'        => 'rand',
        'no_found_rows'  => true,
    ];
    if ($tag_ids) $related_args['tag__in'] = $tag_ids;
    $related = new WP_Query($related_args);
    $related_aside_args = $related_args;
    $related_aside_args['posts_per_page'] = 4;
    $related_aside = new WP_Query($related_aside_args);

    // Servicios del aside
    $aside_services = [
        ['url' => home_url('/clases-de-salsa/'),                          'label' => 'Clases de salsa'],
        ['url' => home_url('/clases-de-bachata/'),                        'label' => 'Clases de bachata'],
        ['url' => home_url('/baile-nupcial/'),                            'label' => 'Baile nupcial'],
        ['url' => home_url('/clases-particulares/'),                      'label' => 'Clases particulares'],
        ['url' => home_url('/alquiler-de-salas-en-mataro-ritmo-y-tumbao/'),'label' => 'Alquiler de salas'],
        ['url' => home_url('/horarios-y-tarifas/'),                       'label' => 'Horarios y tarifas'],
    ];

    $current_url      = get_permalink();
    $current_title    = get_the_title();
    $share_wa_url     = 'https://api.whatsapp.com/send?text=' . rawurlencode($current_title . ' - ' . $current_url);
    $share_fb_url     = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($current_url);
?>

<article class="ryt-post">

    <!-- Hero foto cover full-bleed -->
    <header class="relative overflow-hidden text-white" style="min-height: 560px;">
        <?php if ($hero_img): ?>
            <img src="<?php echo esc_url($hero_img); ?>"
                 alt="<?php echo esc_attr(get_the_title()); ?>"
                 class="absolute inset-0 w-full h-full object-cover"
                 style="object-position: 50% 40%;" loading="eager" fetchpriority="high">
        <?php else: ?>
            <div class="absolute inset-0 bg-ink-dark"></div>
        <?php endif; ?>

        <div aria-hidden="true" class="absolute inset-0"
             style="background: linear-gradient(180deg, rgba(20,19,18,0.55) 0%, rgba(20,19,18,0.75) 60%, rgba(20,19,18,0.92) 100%);"></div>

        <div class="relative z-10 max-w-[920px] mx-auto px-6 py-[110px] flex flex-col justify-end min-h-[560px]">
            <nav class="text-[12px] uppercase tracking-[0.12em] font-bold text-[#E6E1DB]/80 mb-5" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-ryt-mint">Inicio</a>
                <span class="mx-2">/</span>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="hover:text-ryt-mint">Blog</a>
                <?php if ($main_tag): ?>
                    <span class="mx-2">/</span>
                    <a href="<?php echo esc_url($eyebrow_link); ?>" class="hover:text-ryt-mint"><?php echo esc_html($eyebrow_label); ?></a>
                <?php endif; ?>
            </nav>

            <span class="ryt-eyebrow mb-[14px]">
                <span class="ryt-eyebrow-line ryt-eyebrow-line-mint"></span>
                <?php echo esc_html($eyebrow_label); ?>
            </span>

            <h1 class="text-white mb-6" style="font-size: 50px; line-height: 1.08; letter-spacing: -0.01em;">
                <?php the_title(); ?>
            </h1>

            <div class="flex items-center gap-4 text-[13px] uppercase tracking-[0.1em] font-bold text-[#E6E1DB]/85">
                <span class="inline-flex items-center gap-2">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <?php echo esc_html(get_the_date('j M Y')); ?>
                </span>
                <span class="text-white/30">·</span>
                <span><?php echo esc_html(get_the_author()); ?></span>
                <span class="text-white/30">·</span>
                <span class="inline-flex items-center gap-2">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <?php echo (int) $read_min; ?> min
                </span>
            </div>
        </div>
    </header>

    <!-- Contenido + aside (grid 2-col) -->
    <div class="bg-white py-[80px] px-6">
        <div class="max-w-[1180px] mx-auto grid gap-[64px] lg:grid-cols-[1fr_320px] items-start">

            <!-- Contenido -->
            <div class="prose-ryt ryt-post-content min-w-0">
                <?php the_content(); ?>

                <!-- Tags + share + back -->
                <div class="not-prose border-t border-[#EFEBE6] mt-12 pt-8 flex flex-col sm:flex-row gap-6 items-start sm:items-center justify-between">
                    <div class="flex flex-wrap gap-2">
                        <?php if ($post_tags): foreach ($post_tags as $t): ?>
                            <a href="<?php echo esc_url(get_tag_link($t->term_id)); ?>"
                               class="inline-flex items-center text-[11px] uppercase font-bold tracking-[0.1em] text-ink-soft bg-paper border border-[#EFEBE6] rounded-pill px-3 py-1.5 hover:bg-ryt-mint-soft hover:text-ryt-mint-dark transition-colors no-underline">
                                <?php echo esc_html($t->name); ?>
                            </a>
                        <?php endforeach; endif; ?>
                    </div>
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-outline no-underline">← Volver al blog</a>
                </div>
            </div>

            <!-- ASIDE -->
            <aside class="ryt-post-aside">

                <!-- TOC + reading time -->
                <div class="ryt-post-aside-card ryt-toc-card">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="aside-title m-0">Índice de contenidos</h3>
                        <span class="text-[10.5px] uppercase font-bold tracking-[0.1em] text-ink-mute"><?php echo (int) $read_min; ?> min</span>
                    </div>
                    <nav class="ryt-toc" aria-label="Índice de contenidos">
                        <ul><!-- autogenerado por JS --></ul>
                    </nav>
                </div>

                <!-- CTA primera clase gratis -->
                <div class="ryt-post-aside-card is-cta">
                    <span class="block font-display text-[36px] leading-none mb-2 text-ryt-deep">1ª</span>
                    <p class="font-serif text-[20px] leading-[1.18] mb-2 text-ryt-deep">Tu primera clase es <em class="italic">gratis</em>.</p>
                    <p class="text-[13px] leading-[1.55] text-ryt-deep/85 mb-4">Sin matrícula. Sin permanencia. Sin necesidad de pareja.</p>
                    <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! He visto el blog de Ritmo y Tumbao y me gustaría reservar mi primera clase gratis.')); ?>"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center justify-center w-full px-5 py-3 rounded-pill bg-white text-ryt-deep font-bold text-[12.5px] uppercase tracking-[0.08em] hover:bg-paper transition-colors">
                        Reservar mi clase
                    </a>
                </div>

                <!-- Servicios -->
                <div class="ryt-post-aside-card">
                    <h3 class="aside-title">Servicios</h3>
                    <div class="flex flex-col">
                        <?php foreach ($aside_services as $s): ?>
                            <a href="<?php echo esc_url($s['url']); ?>" class="ryt-aside-link no-underline">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                                <span class="flex-1"><?php echo esc_html($s['label']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Contacto compacto -->
                <div class="ryt-post-aside-card">
                    <h3 class="aside-title">¿Hablamos?</h3>
                    <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Tengo una duda')); ?>" target="_blank" rel="noopener"
                       class="inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 rounded-pill text-white font-bold text-[12.5px] uppercase tracking-[0.08em] transition-colors mb-2 no-underline"
                       style="background:#25D366;"
                       onmouseover="this.style.background='#1FB957'" onmouseout="this.style.background='#25D366'">
                        <?php ryt_icon('whatsapp', 'w-4 h-4'); ?>
                        WhatsApp
                    </a>
                    <a href="<?php echo esc_attr(ryt_tel_link(RYT_PHONE_1)); ?>"
                       class="inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 rounded-pill bg-white border-2 border-ryt-mint text-ryt-deep font-bold text-[12.5px] uppercase tracking-[0.06em] hover:bg-ryt-mint hover:text-white transition-colors no-underline">
                        <?php ryt_icon('phone', 'w-4 h-4'); ?>
                        Llamar
                    </a>
                    <p class="text-[11.5px] text-ink-mute mt-3 leading-[1.4]"><?php echo esc_html(RYT_OFFICE_HOURS); ?></p>
                </div>

                <!-- Compartir -->
                <div class="ryt-post-aside-card">
                    <h3 class="aside-title">Compartir</h3>
                    <div class="flex items-center gap-2">
                        <a href="<?php echo esc_url($share_wa_url); ?>" target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-full inline-flex items-center justify-center text-white hover:opacity-85 transition-opacity no-underline"
                           style="background:#25D366;" aria-label="Compartir por WhatsApp">
                            <?php ryt_icon('whatsapp', 'w-4 h-4'); ?>
                        </a>
                        <a href="<?php echo esc_url($share_fb_url); ?>" target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-full inline-flex items-center justify-center text-white hover:opacity-85 transition-opacity no-underline"
                           style="background:#1877F2;" aria-label="Compartir en Facebook">
                            <?php ryt_icon('facebook', 'w-4 h-4'); ?>
                        </a>
                        <button type="button" class="ryt-share-copy w-10 h-10 rounded-full inline-flex items-center justify-center bg-paper border border-[#EFEBE6] text-ink-heading hover:bg-ryt-mint-soft transition-colors"
                                aria-label="Copiar enlace" data-url="<?php echo esc_attr($current_url); ?>">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Mini related -->
                <?php if ($related_aside->have_posts()): ?>
                <div class="ryt-post-aside-card">
                    <h3 class="aside-title">Sigue leyendo</h3>
                    <div class="flex flex-col gap-3">
                        <?php while ($related_aside->have_posts()): $related_aside->the_post(); ?>
                        <a href="<?php the_permalink(); ?>"
                           class="block group no-underline border-b border-[#EFEBE6] last:border-b-0 pb-3 last:pb-0">
                            <p class="text-[10.5px] uppercase font-bold tracking-[0.1em] text-ryt-mint mb-1.5"><?php echo esc_html(get_the_date('j M Y')); ?></p>
                            <p class="text-[13.5px] leading-[1.35] text-ink-heading group-hover:text-ryt-mint-dark transition-colors"><?php the_title(); ?></p>
                        </a>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php endif; ?>

            </aside>

        </div>
    </div>

    <!-- Related posts grandes (3 cards con foto) -->
    <?php if ($related->have_posts()): ?>
    <section class="bg-paper py-[80px] px-6">
        <div class="max-w-[1180px] mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[40px]">
                <div>
                    <?php ryt_eyebrow('', 'Sigue leyendo'); ?>
                    <h2 class="text-ink-heading" style="font-size: 38px; line-height: 1.08;">
                        Otros artículos<br>del blog
                    </h2>
                </div>
                <div>
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>"
                       class="inline-flex items-center gap-[9px] text-[13px] font-bold uppercase tracking-[0.1em] text-ink-heading hover:text-ryt-mint transition-colors">
                        Ver todo el blog →
                    </a>
                </div>
            </div>

            <div class="grid gap-[24px] sm:grid-cols-2 lg:grid-cols-3">
                <?php while ($related->have_posts()): $related->the_post(); ?>
                <article class="bg-white rounded-[20px] border border-[#EFEBE6] overflow-hidden shadow-[0_10px_30px_rgba(38,37,36,0.05)] group flex flex-col">
                    <a href="<?php the_permalink(); ?>" class="flex-1 flex flex-col no-underline">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="aspect-[16/10] overflow-hidden bg-paper-alt">
                                <?php the_post_thumbnail('ryt-card', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300', 'loading' => 'lazy']); ?>
                            </div>
                        <?php endif; ?>
                        <div class="p-[20px] flex-1 flex flex-col">
                            <p class="text-[11px] uppercase tracking-[0.12em] font-bold text-ryt-mint mb-2"><?php echo esc_html(get_the_date('j M Y')); ?></p>
                            <h3 class="text-ink-heading text-[17px] leading-[1.3] mb-2 group-hover:text-ryt-mint-dark transition-colors flex-1">
                                <?php the_title(); ?>
                            </h3>
                            <span class="text-[11.5px] uppercase font-bold text-ink-heading mt-2">Leer →</span>
                        </div>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

</article>

<?php endwhile; ?>

<?php get_template_part('template-parts/home/cta'); ?>

<!-- Toast para "Enlace copiado" -->
<div id="ryt-toast" class="fixed bottom-[100px] right-[26px] bg-ink-dark text-white text-[13px] px-4 py-2.5 rounded-pill shadow-lg z-[90] opacity-0 invisible transition-all duration-300 pointer-events-none">
    Enlace copiado
</div>

</main>
<?php get_footer();
