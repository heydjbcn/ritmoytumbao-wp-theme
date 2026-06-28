<?php
/**
 * Página /clases-de-bachata/ — v9 (Cloud Design v2).
 *
 * Hero foto cover + 3 estilos de bachata (Tradicional, Sensual, Fusión).
 */
$hero_img = RYT_URI . '/assets/img/instalaciones/sala-2.jpg';
?>
<!-- Hero foto cover -->
<section class="relative overflow-hidden text-white" style="min-height: 520px;">
    <img src="<?php echo esc_url($hero_img); ?>"
         alt="Clases de bachata en Ritmo y Tumbao Mataró"
         class="absolute inset-0 w-full h-full object-cover" loading="eager">
    <div aria-hidden="true" class="absolute inset-0"
         style="background: linear-gradient(100deg, rgba(20,19,18,0.93) 0%, rgba(20,19,18,0.72) 45%, rgba(20,19,18,0.25) 100%);"></div>

    <div class="relative z-10 max-w-[1220px] mx-auto px-6 py-[110px] grid gap-10 lg:grid-cols-[1.4fr_1fr] items-center min-h-[520px]">
        <div>
            <?php ryt_eyebrow('', 'Clases de bachata en Mataró'); ?>
            <h1 class="text-white mb-5" style="font-size: 58px; line-height: 1.05;">
                Aprende a bailar
                <span class="italic font-display text-ryt-mint">Bachata</span><br>
                en Ritmo y Tumbao
            </h1>
            <p class="text-[17px] text-[#E6E1DB] leading-[1.7] mb-8 max-w-[520px]">
                Bachata tradicional, sensual y fusión. Para todos los niveles, sin necesidad de pareja y con profesores especializados.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">Ver horarios</a>
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero probar las clases de Bachata')); ?>" target="_blank" rel="noopener"
                   class="btn btn-outline-white">Reservar clase gratis</a>
            </div>
        </div>
    </div>
</section>

<!-- Intro + 3 estilos en grid 2-col -->
<section class="bg-white py-[104px] px-6">
    <div class="max-w-[1180px] mx-auto grid gap-[60px] lg:grid-cols-2 items-start">
        <div>
            <?php ryt_eyebrow('01', 'La escuela'); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 38px; line-height: 1.14;">
                Bachata para todos en Mataró
            </h2>
            <p class="text-[16px] text-ink-soft leading-[1.8]">
                En Ritmo y Tumbao impartimos <strong>bachata tradicional</strong> (la dominicana de toda la vida),
                <strong>bachata sensual</strong> y <strong>bachata fusión</strong>. Cada estilo con su propio profesorado
                especializado y grupos por nivel para que avances a tu ritmo.
            </p>
        </div>
        <div>
            <?php ryt_eyebrow('02', 'Por qué nosotros'); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 38px; line-height: 1.14;">
                Profesores especializados por estilo
            </h2>
            <p class="text-[16px] text-ink-soft leading-[1.8]">
                Aleix y Belén imparten Bachata Fusión, Mario y Nia llevan la Bachata Sensual, y nuestro equipo cubre la tradicional. Cada uno con años de tarima y festivales.
            </p>
        </div>
    </div>
</section>

<!-- 3 estilos cards -->
<section class="bg-paper py-[104px] px-6">
    <div class="max-w-[1180px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[48px]">
            <div>
                <?php ryt_eyebrow('03', '3 estilos · 1 escuela'); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    Tradicional,<br>sensual y fusión
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    Elige el estilo que más te guste o pruébalos todos. Hay grupos de todos los niveles cada semana.
                </p>
            </div>
        </div>
        <div class="grid gap-px bg-[#ECE7E1] border border-[#ECE7E1] rounded-3xl overflow-hidden md:grid-cols-3">
            <?php
            $estilos = [
                ['n' => '01', 'name' => 'Tradicional', 'desc' => 'La bachata dominicana, con pasos clásicos y mucho ritmo. Ideal para empezar.'],
                ['n' => '02', 'name' => 'Sensual',     'desc' => 'Movimientos fluidos, ondas y conexión. La bachata más bonita de bailar en pareja.'],
                ['n' => '03', 'name' => 'Fusión',      'desc' => 'Mezcla de bachata con figuras de salsa, kizomba y zouk. Para los más creativos.'],
            ];
            foreach ($estilos as $e): ?>
            <article class="bg-white p-[36px]">
                <span class="font-display text-[40px] block leading-none mb-4" style="color: #D7DED9;">
                    <?php echo esc_html($e['n']); ?>
                </span>
                <h3 class="font-serif text-[22px] text-ink-heading mb-2"><?php echo esc_html($e['name']); ?></h3>
                <p class="text-[15px] text-ink-soft leading-[1.7]"><?php echo esc_html($e['desc']); ?></p>
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
