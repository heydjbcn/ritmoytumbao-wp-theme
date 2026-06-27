<?php
/**
 * "NUESTRAS CLASES DE BAILE EN MATARÓ"
 *
 * Como en el mockup Cloud Design: cards limpias (sin ilustraciones)
 *  - Número grande mint-glow arriba a la izquierda
 *  - H3 título
 *  - Descripción
 *  - "Ver más" + barrita mint
 */
$estilos = [
    ['t' => 'Clases de Bachata', 'd' => 'Fusionamos bachata sensual y bachata dominicana en una experiencia única.',  'url' => home_url('/clases-de-bachata/')],
    ['t' => 'Clases de Salsa',   'd' => 'Salsa Cubana, rueda casino, figuras, tiempo musical y mucha diversión.',     'url' => home_url('/clases-de-salsa/')],
    ['t' => 'Formación',         'd' => 'Si quieres profundizar en tu manera de bailar estas son las clases que buscas.', 'url' => home_url('/horarios-y-tarifas/')],
    ['t' => 'Coreográfico',      'd' => 'Formación de ritmos latinos, perfeccionamiento y técnica de giro.',           'url' => home_url('/baile-nupcial/')],
];
?>
<section class="section bg-paper">
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

        <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($estilos as $i => $e): ?>
            <a href="<?php echo esc_url($e['url']); ?>"
               class="group relative bg-white border border-[#EFEBE6] rounded-[22px] px-[30px] pt-9 pb-[30px] flex flex-col shadow-card cursor-pointer overflow-hidden hover:-translate-y-1 transition-all duration-200 hover:shadow-card-lg">
                <!-- Número grande mint-glow arriba a la izquierda -->
                <span class="font-display text-[42px] leading-none text-ryt-mint-glow mb-[22px] select-none">
                    <?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?>
                </span>

                <h3 class="text-[21px] text-ink-heading leading-[1.25] mb-[14px] font-serif font-extrabold">
                    <?php echo esc_html($e['t']); ?>
                </h3>

                <p class="text-[13.5px] text-ink-soft leading-[1.65] flex-1">
                    <?php echo esc_html($e['d']); ?>
                </p>

                <span class="mt-6 inline-flex items-center gap-2 text-[11.5px] font-bold uppercase tracking-[0.12em] text-ryt-mint">
                    Ver más
                    <span class="w-[22px] h-[1.5px] bg-ryt-mint inline-block transition-[width] duration-200 group-hover:w-[32px]"></span>
                </span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
