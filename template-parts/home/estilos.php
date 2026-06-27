<?php
/**
 * "NUESTRAS CLASES DE BAILE EN MATARÓ — Descubre nuestros estilos y nuestros profesores"
 *  4 cards reales del home: Bachata · Salsa · Formación · Coreográfico
 */
$estilos = [
    ['t' => 'Clases de Bachata', 'd' => 'Fusionamos bachata sensual y bachata dominicana en una experiencia única.',  'img' => 'Clases-de-Bachata-Ritmo-y-tumbao.png',  'url' => home_url('/clases-de-bachata/')],
    ['t' => 'Clases de Salsa',   'd' => 'Salsa Cubana, rueda casino, figuras, tiempo musical y mucha diversión.',     'img' => 'Clases-de-salsa-Ritmo-y-tumbao.png',    'url' => home_url('/clases-de-salsa/')],
    ['t' => 'Formación',         'd' => 'Si quieres profundizar en tu manera de bailar estas son las clases que buscas.', 'img' => 'Grupo-Formacion-Ritmo-y-tumbao.png', 'url' => home_url('/horarios-y-tarifas/')],
    ['t' => 'Coreográfico',      'd' => 'Formación de ritmos latinos, perfeccionamiento y técnica de giro.',           'img' => 'Coreografico-Ritmo-y-tumbao.png',       'url' => home_url('/baile-nupcial/')],
];
?>
<section class="section bg-white">
    <div class="container mx-auto px-4">
        <header class="text-center max-w-3xl mx-auto mb-12">
            <span class="pre-title">Clases de Salsa y Bachata en Mataró</span>
            <h2 class="text-ink-heading uppercase">Nuestras clases de baile en Mataró</h2>
            <p class="text-base md:text-lg text-ink-soft mt-4 max-w-2xl mx-auto">
                Descubre nuestros estilos y nuestros profesores
            </p>
            <p class="text-sm text-ink-soft mt-3 max-w-2xl mx-auto leading-relaxed">
                Desde <strong>clases de salsa y bachata en Mataró</strong> hasta clases de rueda de casino o
                grupos de formación y coreográficos.
            </p>
        </header>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($estilos as $e): ?>
            <a href="<?php echo esc_url($e['url']); ?>" class="card group block hover:-translate-y-1 transition-transform">
                <div class="aspect-square bg-paper-soft flex items-center justify-center p-6">
                    <img src="<?php echo esc_url(RYT_URI . '/assets/img/' . $e['img']); ?>"
                         alt="<?php echo esc_attr($e['t']); ?>"
                         class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300"
                         loading="lazy">
                </div>
                <div class="p-5 text-center">
                    <h3 class="text-ink-heading mb-2 text-xl"><?php echo esc_html($e['t']); ?></h3>
                    <p class="text-sm text-ink-soft leading-relaxed"><?php echo esc_html($e['d']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
