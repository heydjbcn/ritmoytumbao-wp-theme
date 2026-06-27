<?php
/**
 * Página /instalaciones/
 */
?>
<!-- Hero -->
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent text-[16vw] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.18);">
            Instalaciones
        </span>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-24 text-center relative z-10">
        <span class="pre-title text-ryt-mint">Nuestra escuela</span>
        <h1 class="text-white uppercase mt-3">Instalaciones</h1>
        <p class="text-paper-alt mt-6 max-w-2xl mx-auto">
            Dos amplias salas, vestuarios, recepción y un ambiente pensado para que disfrutes bailando.
        </p>
    </div>
</section>

<!-- Intro -->
<section class="section bg-white">
    <div class="container mx-auto px-4 grid gap-10 md:grid-cols-2 items-center">
        <div>
            <span class="pre-title">Un espacio para el baile</span>
            <h2 class="text-ink-heading uppercase">Nuestras instalaciones</h2>
            <p class="text-base text-ink-soft mt-4 leading-relaxed">
                En Ritmo y Tumbao Dance School ofrecemos un espacio moderno y completamente acondicionado
                para el aprendizaje y la práctica de <strong>salsa y bachata</strong>. Contamos con dos amplias
                salas, vestuarios, recepción y todo lo necesario para que vivas el baile sin barreras.
            </p>
            <p class="text-base text-ink-soft mt-4 leading-relaxed">
                Llevamos más de dos décadas enseñando salsa y bachata, formando bailarines de todos los niveles
                y compartiendo nuestra pasión por el baile. Nuestra escuela es un punto de encuentro para quienes
                quieren disfrutar de la música y el movimiento.
            </p>
        </div>
        <div>
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/escuela.webp'); ?>"
                 alt="Escuela Ritmo y Tumbao en Mataró"
                 class="rounded-2xl shadow-card w-full h-auto" loading="lazy">
        </div>
    </div>
</section>

<!-- Galería salas -->
<section class="section bg-paper-alt">
    <div class="container mx-auto px-4">
        <header class="text-center max-w-3xl mx-auto mb-10">
            <span class="pre-title">Dos salas equipadas</span>
            <h2 class="text-ink-heading uppercase">Un espacio diseñado para el baile</h2>
        </header>

        <div class="grid gap-6 md:grid-cols-2">
            <article class="bg-white rounded-2xl shadow-card overflow-hidden">
                <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/sala-1.webp'); ?>"
                     alt="Sala 1 — Ritmo y Tumbao"
                     class="w-full aspect-video object-cover" loading="lazy">
                <div class="p-6">
                    <h3 class="font-serif text-xl text-ink-heading mb-2">Sala 1</h3>
                    <p class="text-sm text-ink-soft">
                        Ambiente íntimo y acogedor. Perfecta para grupos pequeños, clases particulares y prácticas dirigidas.
                    </p>
                </div>
            </article>
            <article class="bg-white rounded-2xl shadow-card overflow-hidden">
                <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/sala-2.webp'); ?>"
                     alt="Sala 2 — Ritmo y Tumbao"
                     class="w-full aspect-video object-cover" loading="lazy">
                <div class="p-6">
                    <h3 class="font-serif text-xl text-ink-heading mb-2">Sala 2</h3>
                    <p class="text-sm text-ink-soft">
                        Sala amplia con espejos y pista techada. Ideal para clases grupales y eventos sociales.
                    </p>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- CTA -->
<?php get_template_part('template-parts/home/cta'); ?>
