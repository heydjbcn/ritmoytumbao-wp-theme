<?php
/**
 * Página /clases-de-salsa/ — v9 (Cloud Design v2).
 *
 * Hero con foto cover full-bleed + gradient overlay y H1 58px con "Salsa" italic mint.
 */
$hero_img = RYT_URI . '/assets/img/instalaciones/sala-1.webp';
?>
<!-- Hero foto cover -->
<section class="relative overflow-hidden text-white" style="min-height: 520px;">
    <img src="<?php echo esc_url($hero_img); ?>"
         alt="Clases de salsa en Ritmo y Tumbao Mataró"
         class="absolute inset-0 w-full h-full object-cover" loading="eager">
    <div aria-hidden="true" class="absolute inset-0"
         style="background: linear-gradient(100deg, rgba(20,19,18,0.93) 0%, rgba(20,19,18,0.72) 45%, rgba(20,19,18,0.25) 100%);"></div>

    <div class="relative z-10 max-w-[1220px] mx-auto px-6 py-[110px] grid gap-10 lg:grid-cols-[1.4fr_1fr] items-center min-h-[520px]">
        <div>
            <?php ryt_eyebrow('', 'Clases de salsa en Mataró'); ?>
            <h1 class="text-white mb-5" style="font-size: 58px; line-height: 1.05;">
                Aprende a bailar
                <span class="italic font-display text-ryt-mint">Salsa</span><br>
                en Ritmo y Tumbao
            </h1>
            <p class="text-[17px] text-[#E6E1DB] leading-[1.7] mb-8 max-w-[520px]">
                Iniciación, Intermedio y Avanzado. Profesores con más de 15 años enseñando, sin matrícula ni permanencia. Tu primera clase es gratis.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">Ver horarios</a>
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero probar las clases de Salsa')); ?>" target="_blank" rel="noopener"
                   class="btn btn-outline-white">Reservar clase gratis</a>
            </div>
        </div>
    </div>
</section>

<!-- Sobre la escuela + por qué nosotros (grid 2-col v9) -->
<section class="bg-white py-[104px] px-6">
    <div class="max-w-[1180px] mx-auto grid gap-[60px] lg:grid-cols-2">
        <div>
            <?php ryt_eyebrow('01', 'La escuela'); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 38px; line-height: 1.14;">
                Sobre Ritmo y Tumbao Dance School
            </h2>
            <p class="text-[16px] text-ink-soft leading-[1.8]">
                Ritmo y Tumbao Dance School es mucho más que una escuela de baile. Con un gran equipo de profesores,
                ofrecemos un espacio donde cada alumno puede disfrutar de <strong>clases de salsa dinámicas</strong>,
                aprender desde cero o perfeccionar su estilo en un ambiente amigable y divertido.
            </p>
        </div>
        <div>
            <?php ryt_eyebrow('02', 'Por qué nosotros'); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 38px; line-height: 1.14;">
                ¿Por qué elegir nuestras clases de salsa?
            </h2>
            <p class="text-[16px] text-ink-soft leading-[1.8]">
                Desde los pasos básicos hasta movimientos avanzados, nuestras clases de salsa se adaptan a cada nivel.
                Te enseñaremos figuras, musicalidad y cómo expresar tu estilo en cada paso. No importa si es tu primera vez o quieres llevar tu baile al siguiente nivel.
            </p>
        </div>
    </div>
</section>

<!-- Niveles (3 cards con números ADLaM grises) -->
<section class="bg-paper py-[104px] px-6">
    <div class="max-w-[1180px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[48px]">
            <div>
                <?php ryt_eyebrow('03', 'Para todos los niveles'); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    Variedad<br>de niveles
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    Iniciación, Inicio, Básico, Intermedio y Avanzado. Hay un grupo para ti.
                </p>
            </div>
        </div>
        <div class="grid gap-px bg-[#ECE7E1] border border-[#ECE7E1] rounded-3xl overflow-hidden md:grid-cols-3">
            <?php
            $niveles = [
                ['n' => '01', 'name' => 'Iniciación', 'desc' => 'Tu primer contacto con la salsa. Pasos básicos y postura. Sin experiencia previa.'],
                ['n' => '02', 'name' => 'Intermedio', 'desc' => 'Figuras, vueltas y musicalidad. Ganarás soltura y conexión con tu pareja de baile.'],
                ['n' => '03', 'name' => 'Avanzado',   'desc' => 'Estilo propio, técnica refinada y combinaciones complejas. Para apasionados.'],
            ];
            foreach ($niveles as $n): ?>
            <article class="bg-white p-[36px]">
                <span class="font-display text-[40px] block leading-none mb-4" style="color: #D7DED9;">
                    <?php echo esc_html($n['n']); ?>
                </span>
                <h3 class="font-serif text-[22px] text-ink-heading mb-2"><?php echo esc_html($n['name']); ?></h3>
                <p class="text-[15px] text-ink-soft leading-[1.7]"><?php echo esc_html($n['desc']); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-12">
            <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">
                Ver horarios y tarifas
            </a>
        </div>
    </div>
</section>

<!-- Reseñas -->
<?php get_template_part('template-parts/home/resenas'); ?>

<!-- CTA -->
<?php get_template_part('template-parts/home/cta'); ?>
