<?php
/**
 * Página /instalaciones/ — v9 (Cloud Design v2).
 *
 * Datos reales (prod):
 *   - Sala 1: 100 m² · parquet · insonorizada · climatizada · equipo sonido · espejo gran formato
 *   - Sala 2: 45 m²  · insonorizada · climatizada · equipo sonido · espejo
 *   - Espacios extra: recepción, vestuarios, baños
 *   - Total ~145 m² útiles, 5 espacios.
 */
$salas = [
    [
        'num'   => '01',
        'name'  => 'Sala 1',
        'm2'    => '100',
        'img'   => 'sala-1.webp',
        'desc'  => 'Amplia, diáfana y luminosa. La sala principal de la escuela, donde se imparten la mayoría de grupos de salsa y bachata y se montan los workshops.',
        'specs' => ['Parquet flotante', 'Insonorizada', 'Climatizada (frío/calor)', 'Equipo de sonido profesional', 'Espejo gran formato'],
    ],
    [
        'num'   => '02',
        'name'  => 'Sala 2',
        'm2'    => '45',
        'img'   => 'sala-2.webp',
        'desc'  => 'Espaciosa y polivalente. Pensada para grupos reducidos, niveles avanzados, particulares y ensayos de coreográfico.',
        'specs' => ['Insonorizada', 'Climatizada (frío/calor)', 'Equipo de sonido', 'Espejo'],
    ],
];

$extras = [
    [
        'name' => 'Recepción',
        'desc' => 'Área de atención a alumnos, información y reservas.',
        'icon' => '<path d="M3 21V10l9-7 9 7v11h-6v-7h-6v7H3z"/>',
    ],
    [
        'name' => 'Vestuarios',
        'desc' => 'Cómodos y equipados para cambiarse antes y después de las clases.',
        'icon' => '<path d="M16 11V7a4 4 0 0 0-8 0v4M5 11h14v10H5z"/>',
    ],
    [
        'name' => 'Baños',
        'desc' => 'Modernos y accesibles para mayor comodidad de los alumnos.',
        'icon' => '<path d="M6 2v8m12-8v8M3 10h18v3a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4v-3zM8 17v4M16 17v4"/>',
    ],
];

$stats = [
    ['n' => '145', 'l' => 'm² útiles'],
    ['n' => '2',   'l' => 'salas de baile'],
    ['n' => '5',   'l' => 'espacios'],
    ['n' => '15+', 'l' => 'años abierta'],
];
?>

<!-- Hero foto cover -->
<section class="relative overflow-hidden text-white" style="min-height: 480px;">
    <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/escuela.webp'); ?>"
         alt="Instalaciones de Ritmo y Tumbao en Mataró"
         class="absolute inset-0 w-full h-full object-cover" loading="eager">
    <div aria-hidden="true" class="absolute inset-0"
         style="background: linear-gradient(100deg, rgba(20,19,18,0.94) 0%, rgba(20,19,18,0.72) 45%, rgba(20,19,18,0.25) 100%);"></div>

    <div class="relative z-10 max-w-[1220px] mx-auto px-6 py-[110px] grid gap-10 lg:grid-cols-[1.4fr_1fr] items-center min-h-[480px]">
        <div>
            <?php ryt_eyebrow('', 'Nuestra escuela'); ?>
            <h1 class="text-white mb-5" style="font-size: 58px; line-height: 1.05;">
                Espacios totalmente
                <span class="italic font-display text-ryt-mint">equipados</span>
            </h1>
            <p class="text-[17px] text-[#E6E1DB] leading-[1.7] max-w-[540px]">
                Dos amplias salas, parquet, insonorización, climatización y equipo de sonido profesional. Más de 145 m² útiles dedicados al baile en pleno centro de Mataró.
            </p>
        </div>
    </div>
</section>

<!-- Stats band sobre fondo mint -->
<section class="bg-ryt-mint">
    <div class="max-w-[1220px] mx-auto px-6 py-[34px] grid grid-cols-2 md:grid-cols-4 gap-px"
         style="background: rgba(23,60,48,0.10);">
        <?php foreach ($stats as $s): ?>
        <div class="bg-ryt-mint px-5 py-4 text-center md:text-left">
            <p class="font-display text-[42px] text-ryt-deep leading-none"><?php echo esc_html($s['n']); ?></p>
            <p class="text-[12px] uppercase font-bold tracking-[0.12em] text-ryt-deep/70 mt-2"><?php echo esc_html($s['l']); ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Intro grid 2-col -->
<section class="bg-white py-[100px] px-6">
    <div class="max-w-[1180px] mx-auto grid gap-[60px] lg:grid-cols-2 items-start">
        <div>
            <?php ryt_eyebrow('01', 'Un espacio diseñado para el baile'); ?>
            <h2 class="text-ink-heading mb-5" style="font-size: 42px; line-height: 1.1;">
                Más de 20 años bailando<br>en este local
            </h2>
            <p class="text-[16px] text-ink-soft leading-[1.8] mb-4">
                En Ritmo y Tumbao ofrecemos un espacio moderno y totalmente acondicionado para el aprendizaje y la práctica de <strong>salsa y bachata</strong>. Dos salas, vestuarios, recepción y baños, en un entorno cómodo y profesional.
            </p>
            <p class="text-[16px] text-ink-soft leading-[1.8]">
                Llevamos más de dos décadas enseñando, formando bailarines de todos los niveles y compartiendo nuestra pasión por el baile. Un punto de encuentro para los que aman la pista.
            </p>
        </div>
        <div>
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/escuela.webp'); ?>"
                 alt="Vista de las instalaciones de Ritmo y Tumbao"
                 class="rounded-[22px] shadow-[0_24px_60px_rgba(38,37,36,0.16)] w-full h-auto" loading="lazy">
        </div>
    </div>
</section>

<!-- Las 2 salas: foto grande + m² ADLaM + specs -->
<section class="bg-paper py-[100px] px-6">
    <div class="max-w-[1220px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[56px]">
            <div>
                <?php ryt_eyebrow('02', 'Dos salas equipadas'); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    El espacio<br>donde se baila
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    Dos salas pensadas para grupos de todos los niveles, con todas las garantías técnicas para que el baile sea cómodo y sin interrupciones.
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-[36px]">
            <?php foreach ($salas as $i => $sala):
                $reverse = $i % 2 === 1; ?>
            <article class="grid gap-0 lg:grid-cols-2 bg-white rounded-[24px] overflow-hidden border border-[#EFEBE6] shadow-[0_18px_50px_rgba(38,37,36,0.07)]">
                <div class="<?php echo $reverse ? 'lg:order-2' : ''; ?> aspect-[4/3] lg:aspect-auto overflow-hidden">
                    <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/' . $sala['img']); ?>"
                         alt="<?php echo esc_attr($sala['name'] . ' — Ritmo y Tumbao Mataró'); ?>"
                         class="w-full h-full object-cover" loading="lazy">
                </div>
                <div class="<?php echo $reverse ? 'lg:order-1' : ''; ?> p-[36px] lg:p-[44px] flex flex-col">
                    <div class="flex items-baseline gap-4 mb-3">
                        <span class="font-display text-[34px] leading-none" style="color: #D7DED9;">
                            <?php echo esc_html($sala['num']); ?>
                        </span>
                        <h3 class="font-serif text-[30px] text-ink-heading"><?php echo esc_html($sala['name']); ?></h3>
                    </div>

                    <!-- m² gigante -->
                    <div class="flex items-baseline gap-2 mb-5">
                        <span class="font-display text-[70px] text-ryt-mint-dark leading-none"><?php echo esc_html($sala['m2']); ?></span>
                        <span class="text-[15px] font-bold uppercase tracking-[0.12em] text-ryt-mint">m² útiles</span>
                    </div>

                    <p class="text-[15.5px] text-ink-soft leading-[1.75] mb-6">
                        <?php echo esc_html($sala['desc']); ?>
                    </p>

                    <!-- Specs -->
                    <ul class="flex flex-col gap-2.5 mt-auto">
                        <?php foreach ($sala['specs'] as $spec): ?>
                        <li class="flex items-center gap-2.5 text-[14.5px] text-ink-heading">
                            <span class="flex-shrink-0 w-5 h-5 rounded-full inline-flex items-center justify-center bg-ryt-mint-soft text-ryt-mint-dark">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <?php echo esc_html($spec); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Espacios extra -->
<section class="bg-white py-[100px] px-6">
    <div class="max-w-[1220px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[48px]">
            <div>
                <?php ryt_eyebrow('03', '+3 espacios complementarios'); ?>
                <h2 class="text-ink-heading" style="font-size: 38px; line-height: 1.1;">
                    Todo lo que necesitas<br>para una buena clase
                </h2>
            </div>
            <div>
                <p class="text-[16px] leading-[1.7] text-ink-soft">
                    Más allá de las salas: vestuarios para cambiarse, recepción para resolver tus dudas y baños accesibles.
                </p>
            </div>
        </div>
        <div class="grid gap-px bg-[#ECE7E1] border border-[#ECE7E1] rounded-3xl overflow-hidden md:grid-cols-3">
            <?php foreach ($extras as $e): ?>
            <article class="bg-white p-[32px]">
                <span class="flex w-12 h-12 rounded-full bg-ryt-mint-soft text-ryt-deep items-center justify-center mb-4">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <?php echo $e['icon']; ?>
                    </svg>
                </span>
                <h3 class="font-serif text-[22px] text-ink-heading mb-2"><?php echo esc_html($e['name']); ?></h3>
                <p class="text-[14.5px] text-ink-soft leading-[1.7]"><?php echo esc_html($e['desc']); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA grande compartido -->
<?php get_template_part('template-parts/home/cta'); ?>
