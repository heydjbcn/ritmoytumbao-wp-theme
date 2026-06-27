<?php
/**
 * Helper render de landing de ciudad (SEO local).
 * Uso: ryt_render_ciudad(['ciudad' => 'Granollers', 'distancia' => '20 km', ...]);
 */
if (!defined('ABSPATH')) exit;

function ryt_render_ciudad(array $args): void {
    $ciudad   = $args['ciudad'];
    $articulo = $args['articulo'] ?? 'de';   // "de Granollers" / "del Vilassar"
    $distancia= $args['distancia'] ?? '';    // "20 km de Mataró"
    $ciudades_cercanas = $args['cercanas'] ?? [];
    ?>
    <section class="bg-ink-dark text-white relative overflow-hidden">
        <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
            <span class="font-serif italic font-bold uppercase text-transparent text-[14vw] leading-none whitespace-nowrap"
                  style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.18);">
                <?php echo esc_html($ciudad); ?>
            </span>
        </div>
        <div class="container mx-auto px-4 py-20 md:py-24 text-center relative z-10">
            <span class="pre-title text-ryt-mint">Para alumnos <?php echo esc_html($articulo . ' ' . $ciudad); ?></span>
            <h1 class="text-white uppercase mt-3">
                Clases de Salsa y Bachata <?php echo esc_html($articulo . ' ' . $ciudad); ?>
            </h1>
            <p class="text-paper-alt mt-6 max-w-2xl mx-auto">
                A solo <?php echo esc_html($distancia); ?>: Ritmo y Tumbao en Mataró es tu escuela de referencia.
            </p>
            <div class="mt-8">
                <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">
                    Ver horarios y tarifas
                </a>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container mx-auto px-4 max-w-4xl">
            <span class="pre-title">Por qué venir a Mataró</span>
            <h2 class="text-ink-heading uppercase">
                La mejor escuela de baile cerca <?php echo esc_html($articulo . ' ' . $ciudad); ?>
            </h2>
            <p class="text-base text-ink-soft mt-4 leading-relaxed">
                Muchos alumnos vienen desde <strong><?php echo esc_html($ciudad); ?></strong> a nuestra escuela en
                Mataró porque saben que aquí encuentran lo que buscan: <strong>profesores especializados</strong>,
                <strong>grupos por nivel</strong> y un <strong>ambiente único</strong> en el que disfrutar de la
                salsa y la bachata.
            </p>
            <p class="text-base text-ink-soft mt-4 leading-relaxed">
                Estamos a <?php echo esc_html($distancia); ?>, con párking en la zona y muy bien comunicados.
                Si tienes dudas sobre cómo llegar, escríbenos por WhatsApp y te orientamos.
            </p>
        </div>
    </section>

    <?php get_template_part('template-parts/home/pricing'); ?>
    <?php get_template_part('template-parts/home/resenas'); ?>

    <?php if ($ciudades_cercanas): ?>
    <section class="section bg-paper-soft">
        <div class="container mx-auto px-4 max-w-4xl text-center">
            <span class="pre-title">Cerca tuyo</span>
            <h2 class="text-ink-heading uppercase">Otras zonas a las que llegamos</h2>
            <ul class="mt-6 flex flex-wrap justify-center gap-3">
                <?php foreach ($ciudades_cercanas as $c): ?>
                <li>
                    <a href="<?php echo esc_url(home_url('/clases-de-salsa-y-bachata-en-' . sanitize_title($c) . '/')); ?>"
                       class="inline-flex items-center justify-center px-5 py-2 rounded-pill bg-white border border-paper-alt text-sm text-ink-soft hover:border-ryt-mint hover:text-ryt-mint">
                        <?php echo esc_html($c); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <?php endif; ?>

    <?php get_template_part('template-parts/home/cta'); ?>
    <?php
}
