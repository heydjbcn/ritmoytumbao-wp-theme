<?php
/**
 * Página /clases-de-salsa/
 * Estructura real extraída de prod.
 */
?>
<!-- Hero -->
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent text-[16vw] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.18);">
            Salsa
        </span>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-24 grid gap-10 md:grid-cols-2 items-center relative z-10">
        <div>
            <span class="pre-title text-ryt-mint">Clases de Salsa en Mataró</span>
            <h1 class="text-white uppercase mt-3">Clases de Salsa en Ritmo y Tumbao</h1>
            <p class="text-paper-alt mt-6">
                Aprende a bailar salsa desde cero o perfecciona tu estilo. Iniciación, Intermedio y Avanzado.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">Ver horarios</a>
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero probar las clases de Salsa')); ?>" target="_blank" rel="noopener"
                   class="btn btn-outline-white">Reservar clase gratis</a>
            </div>
        </div>
        <div class="hidden md:block">
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/Clases-de-salsa-Ritmo-y-tumbao.png'); ?>"
                 alt="Clases de Salsa en Ritmo y Tumbao"
                 class="w-full max-w-md mx-auto h-auto" loading="eager">
        </div>
    </div>
</section>

<!-- Sobre la escuela -->
<section class="section bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <span class="pre-title">La escuela</span>
        <h2 class="text-ink-heading uppercase">Sobre Ritmo y Tumbao Dance School</h2>
        <p class="text-base text-ink-soft mt-4 leading-relaxed">
            Ritmo y Tumbao Dance School es mucho más que una escuela de baile. Con un gran equipo de profesores,
            ofrecemos un espacio donde cada alumno puede disfrutar de <strong>clases de salsa dinámicas</strong>,
            aprender desde cero o perfeccionar su estilo en un ambiente amigable y divertido.
        </p>
    </div>
</section>

<!-- Por qué elegir -->
<section class="section bg-paper-alt">
    <div class="container mx-auto px-4 max-w-4xl">
        <span class="pre-title">Por qué nosotros</span>
        <h2 class="text-ink-heading uppercase">¿Por qué elegir nuestras clases de salsa?</h2>
        <p class="text-base text-ink-soft mt-4 leading-relaxed">
            Desde los pasos básicos hasta movimientos avanzados, nuestras clases de salsa se adaptan a cada nivel.
            Te enseñaremos figuras, musicalidad y cómo expresar tu estilo en cada paso. ¡No importa si es tu
            primera vez o quieres llevar tu baile al siguiente nivel!
        </p>
    </div>
</section>

<!-- Variedad de niveles -->
<section class="section bg-white">
    <div class="container mx-auto px-4 max-w-5xl">
        <header class="text-center max-w-3xl mx-auto mb-10">
            <span class="pre-title">Para todos los niveles</span>
            <h2 class="text-ink-heading uppercase">Variedad de niveles</h2>
            <p class="text-base text-ink-soft mt-4">
                Iniciación, Inicio, Básico, Intermedio y Avanzado. Hay un grupo para ti.
            </p>
        </header>
        <div class="grid gap-6 md:grid-cols-3">
            <?php
            $niveles = [
                [ 'name' => 'Iniciación', 'desc' => 'Tu primer contacto con la salsa. Pasos básicos y postura. Sin experiencia previa.' ],
                [ 'name' => 'Intermedio', 'desc' => 'Figuras, vueltas y musicalidad. Ganarás soltura y conexión con tu pareja de baile.' ],
                [ 'name' => 'Avanzado',   'desc' => 'Estilo propio, técnica refinada y combinaciones complejas. Para apasionados.' ],
            ];
            foreach ($niveles as $n): ?>
            <article class="bg-paper-soft rounded-2xl p-6 text-center shadow-card">
                <span class="font-display text-5xl text-ryt-mint block leading-none mb-2">
                    <?php echo esc_html(substr($n['name'], 0, 1)); ?>
                </span>
                <h3 class="font-serif text-xl text-ink-heading mb-2"><?php echo esc_html($n['name']); ?></h3>
                <p class="text-sm text-ink-soft"><?php echo esc_html($n['desc']); ?></p>
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
