<?php
/**
 * Página /instalaciones/
 *
 * Réplica del contenido real de prod (https://ritmoytumbao-ds.es/instalaciones/):
 *   - 2 salas con metros cuadrados exactos (Sala 1: 100 m², Sala 2: 45 m²)
 *   - Recepción, Vestuarios, Baños como items separados
 *   - Copy textual de prod
 */
$espacios_principales = [
    [
        'name'    => 'Sala 1',
        'meta'    => '100 m²',
        'img'     => 'sala-1.webp',
        'desc'    => 'Amplia y diáfana, insonorizada, climatizada, con parquet y equipo de sonido.',
    ],
    [
        'name'    => 'Sala 2',
        'meta'    => '45 m²',
        'img'     => 'sala-2.webp',
        'desc'    => 'Espaciosa y diáfana, insonorizada, climatizada y con equipo de sonido.',
    ],
];

$espacios_extra = [
    [
        'name' => 'Recepción',
        'desc' => 'Área de atención a alumnos, información y reservas.',
        'icon' => '<path d="M3 21V10l9-7 9 7v11h-6v-7h-6v7H3z"/>',
    ],
    [
        'name' => 'Vestuarios',
        'desc' => 'Espacio cómodo y equipado para cambiarse antes y después de las clases.',
        'icon' => '<path d="M16 11V7a4 4 0 0 0-8 0v4M5 11h14v10H5z"/>',
    ],
    [
        'name' => 'Baños',
        'desc' => 'Modernos y accesibles para mayor comodidad.',
        'icon' => '<path d="M6 2v8m12-8v8M3 10h18v3a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4v-3zM8 17v4M16 17v4"/>',
    ],
];
?>
<!-- Hero -->
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent text-[14vw] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.20);">
            Instalaciones
        </span>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-24 text-center relative z-10">
        <span class="pre-title">Nuestra escuela</span>
        <h1 class="text-white uppercase mt-3 text-4xl md:text-5xl lg:text-[54px]">Instalaciones</h1>
        <p class="text-[#D9D4CF] mt-6 max-w-2xl mx-auto text-base md:text-[17px] leading-[1.7]">
            Un espacio moderno y completamente acondicionado para el aprendizaje y la práctica de salsa y bachata.
        </p>
    </div>
</section>

<!-- Intro -->
<section class="section bg-paper">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid gap-12 lg:grid-cols-2 items-center">
            <div>
                <span class="pre-title">Un espacio diseñado para el baile</span>
                <h2 class="text-ink-heading text-[38px] leading-[1.15] mb-5">
                    Nuestras instalaciones
                </h2>
                <p class="text-base text-ink-soft leading-[1.75] mb-5">
                    En Ritmo y Tumbao Dance School ofrecemos un espacio moderno y completamente acondicionado
                    para el aprendizaje y la práctica de <strong>salsa y bachata</strong>. Contamos con dos
                    amplias salas, vestuarios, recepción y baños, creando un entorno cómodo y profesional
                    para nuestros alumnos.
                </p>
                <p class="text-base text-ink-soft leading-[1.75]">
                    Llevamos más de dos décadas enseñando salsa y bachata, formando bailarines de todos los
                    niveles y compartiendo nuestra pasión por el baile. Nuestra escuela es un punto de
                    encuentro para quienes quieren aprender, mejorar su técnica y disfrutar del baile en un
                    ambiente cálido y profesional.
                </p>
            </div>
            <div>
                <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/escuela.webp'); ?>"
                     alt="Escuela Ritmo y Tumbao en Mataró"
                     class="rounded-[22px] shadow-card-lg w-full h-auto" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Galería: 2 salas grandes -->
<section class="section bg-paper-alt">
    <div class="container mx-auto px-4">
        <header class="text-center max-w-3xl mx-auto mb-12">
            <span class="pre-title">Dos salas equipadas</span>
            <h2 class="text-ink-heading text-[38px] leading-[1.15]">
                Un espacio diseñado para el baile y la diversión
            </h2>
        </header>

        <div class="grid gap-7 md:grid-cols-2 max-w-5xl mx-auto">
            <?php foreach ($espacios_principales as $e): ?>
            <article class="bg-white rounded-[22px] border border-[#EFEBE6] shadow-card overflow-hidden">
                <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/' . $e['img']); ?>"
                     alt="<?php echo esc_attr($e['name']); ?> — Ritmo y Tumbao"
                     class="w-full aspect-video object-cover" loading="lazy">
                <div class="p-7">
                    <div class="flex items-baseline justify-between mb-3 gap-3">
                        <h3 class="font-serif font-extrabold text-[24px] text-ink-heading leading-[1.2]">
                            <?php echo esc_html($e['name']); ?>
                        </h3>
                        <span class="text-[12px] font-bold uppercase tracking-[0.18em] text-ryt-mint whitespace-nowrap">
                            <?php echo esc_html($e['meta']); ?>
                        </span>
                    </div>
                    <p class="text-[14.5px] text-ink-soft leading-[1.7]">
                        <?php echo esc_html($e['desc']); ?>
                    </p>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- 3 espacios complementarios -->
        <div class="grid gap-5 md:grid-cols-3 max-w-5xl mx-auto mt-7">
            <?php foreach ($espacios_extra as $e): ?>
            <article class="bg-white rounded-[22px] border border-[#EFEBE6] shadow-card p-7 flex items-start gap-4">
                <span class="flex-shrink-0 w-12 h-12 rounded-full bg-ryt-mint-soft text-ryt-forest inline-flex items-center justify-center">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <?php echo $e['icon']; ?>
                    </svg>
                </span>
                <div>
                    <h3 class="font-serif font-extrabold text-[20px] text-ink-heading leading-[1.2] mb-2">
                        <?php echo esc_html($e['name']); ?>
                    </h3>
                    <p class="text-[14px] text-ink-soft leading-[1.6]">
                        <?php echo esc_html($e['desc']); ?>
                    </p>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA reservar visita -->
<section class="bg-ryt-mint relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-white/10 text-[18vw] leading-none whitespace-nowrap">
            Visita
        </span>
    </div>
    <div class="container mx-auto px-4 py-16 md:py-20 text-center relative z-10 max-w-3xl">
        <h2 class="text-white font-serif italic mb-4 leading-[1.15] text-3xl md:text-4xl">
            ¿Quieres conocer nuestras <span class="not-italic font-extrabold uppercase">instalaciones</span>?
        </h2>
        <p class="text-white/90 text-base md:text-lg mb-8">
            Ven a probar una clase gratis y aprovecha para ver el espacio.
        </p>
        <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Me gustaría visitar las instalaciones de la escuela.')); ?>"
           target="_blank" rel="noopener"
           class="inline-flex items-center justify-center px-8 py-4 rounded-pill bg-white text-ryt-mint font-sans font-bold uppercase tracking-wide hover:bg-paper-alt transition-colors">
            Reservar visita
        </a>
    </div>
</section>
