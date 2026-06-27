<?php
/**
 * Página /clases-de-bachata/
 * Estructura paralela a /clases-de-salsa/.
 */
?>
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent text-[16vw] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.18);">
            Bachata
        </span>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-24 grid gap-10 md:grid-cols-2 items-center relative z-10">
        <div>
            <span class="pre-title text-ryt-mint">Clases de Bachata en Mataró</span>
            <h1 class="text-white uppercase mt-3">Clases de Bachata en Ritmo y Tumbao</h1>
            <p class="text-paper-alt mt-6">
                Aprende bachata tradicional, sensual y fusión. Para todos los niveles, sin necesidad de pareja.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">Ver horarios</a>
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero probar las clases de Bachata')); ?>" target="_blank" rel="noopener"
                   class="btn btn-outline-white">Reservar clase gratis</a>
            </div>
        </div>
        <div class="hidden md:block">
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/Clases-de-Bachata-Ritmo-y-tumbao.png'); ?>"
                 alt="Clases de Bachata en Ritmo y Tumbao"
                 class="w-full max-w-md mx-auto h-auto" loading="eager">
        </div>
    </div>
</section>

<section class="section bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <span class="pre-title">La escuela</span>
        <h2 class="text-ink-heading uppercase">Bachata para todos en Mataró</h2>
        <p class="text-base text-ink-soft mt-4 leading-relaxed">
            En Ritmo y Tumbao impartimos <strong>bachata tradicional</strong> (la dominicana de toda la vida),
            <strong>bachata sensual</strong> y <strong>bachata fusión</strong>. Cada estilo con su propio profesorado
            especializado y grupos por nivel para que avances a tu ritmo.
        </p>
    </div>
</section>

<section class="section bg-paper-alt">
    <div class="container mx-auto px-4 max-w-5xl">
        <header class="text-center max-w-3xl mx-auto mb-10">
            <span class="pre-title">3 estilos · 1 escuela</span>
            <h2 class="text-ink-heading uppercase">Bachata tradicional, sensual y fusión</h2>
        </header>
        <div class="grid gap-6 md:grid-cols-3">
            <?php
            $estilos = [
                [ 'name' => 'Tradicional', 'desc' => 'La bachata dominicana, con pasos clásicos y mucho ritmo. Ideal para empezar.' ],
                [ 'name' => 'Sensual',     'desc' => 'Movimientos fluidos, ondas y conexión. La bachata más bonita de bailar en pareja.' ],
                [ 'name' => 'Fusión',      'desc' => 'Mezcla de bachata con figuras de salsa, kizomba y zouk. Para los más creativos.' ],
            ];
            foreach ($estilos as $e): ?>
            <article class="bg-white rounded-2xl p-6 text-center shadow-card">
                <span class="font-display text-5xl text-ryt-mint block leading-none mb-2">
                    <?php echo esc_html(substr($e['name'], 0, 1)); ?>
                </span>
                <h3 class="font-serif text-xl text-ink-heading mb-2"><?php echo esc_html($e['name']); ?></h3>
                <p class="text-sm text-ink-soft"><?php echo esc_html($e['desc']); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-12">
            <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">Ver horarios y tarifas</a>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/home/resenas'); ?>
<?php get_template_part('template-parts/home/cta'); ?>
