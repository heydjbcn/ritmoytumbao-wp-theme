<?php
/**
 * Página /baile-nupcial/ — Paquetes para baile nupcial.
 */
?>
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent text-[14vw] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.18);">
            Baile Nupcial
        </span>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-24 text-center relative z-10">
        <span class="pre-title text-ryt-mint">Vuestro gran día</span>
        <h1 class="text-white uppercase mt-3">Paquetes para baile nupcial</h1>
        <p class="text-paper-alt mt-6 max-w-2xl mx-auto">
            Preparamos vuestra primera baile como pareja casada, con clases personalizadas y edición musical.
        </p>
    </div>
</section>

<!-- Paquetes -->
<section class="section bg-paper-alt">
    <div class="container mx-auto px-4">
        <div class="grid gap-10 md:grid-cols-2 max-w-5xl mx-auto pt-16">
            <!-- Pack Básico -->
            <article class="relative bg-white rounded-3xl shadow-card text-center flex flex-col pt-20 pb-8 px-6">
                <div class="absolute -top-12 left-1/2 -translate-x-1/2 w-32 h-32 rounded-full bg-ryt-mint shadow-lg flex items-center justify-center ring-8 ring-paper-alt">
                    <span class="font-display text-3xl text-white leading-none">170€</span>
                </div>
                <h3 class="font-serif text-2xl text-ink-heading mb-2">Pack Básico</h3>
                <p class="text-sm text-ryt-mint uppercase tracking-widest font-bold mb-5">Qué incluye</p>
                <ul class="text-sm text-ink-soft space-y-2 mb-6 text-left mx-auto max-w-sm">
                    <li class="flex gap-2"><span class="text-ryt-mint">✓</span> 3 horas de clase personalizada.</li>
                    <li class="flex gap-2"><span class="text-ryt-mint">✓</span> Edición musical de 1 canción.</li>
                    <li class="flex gap-2"><span class="text-ryt-mint">✓</span> 20% descuento en clases de la escuela.</li>
                </ul>
                <p class="text-xs text-ink-soft mb-6 leading-relaxed flex-1">
                    Ideal para parejas con experiencia previa que necesitan pulir una coreografía concreta.
                </p>
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero reservar el Pack Básico de baile nupcial')); ?>"
                   target="_blank" rel="noopener" class="btn btn-primary self-center">Reservar</a>
            </article>

            <!-- Pack Premium -->
            <article class="relative bg-white rounded-3xl shadow-card text-center flex flex-col pt-20 pb-8 px-6 border-2 border-ryt-mint">
                <div class="absolute -top-12 left-1/2 -translate-x-1/2 w-32 h-32 rounded-full bg-ryt-mint shadow-lg flex items-center justify-center ring-8 ring-paper-alt">
                    <span class="font-display text-3xl text-white leading-none">260€</span>
                </div>
                <span class="absolute top-4 right-4 badge-popular">Recomendado</span>
                <h3 class="font-serif text-2xl text-ink-heading mb-2">Pack Premium</h3>
                <p class="text-sm text-ryt-mint uppercase tracking-widest font-bold mb-5">Qué incluye</p>
                <ul class="text-sm text-ink-soft space-y-2 mb-6 text-left mx-auto max-w-sm">
                    <li class="flex gap-2"><span class="text-ryt-mint">✓</span> 5 horas de clase personalizada.</li>
                    <li class="flex gap-2"><span class="text-ryt-mint">✓</span> Edición musical de 2 canciones.</li>
                    <li class="flex gap-2"><span class="text-ryt-mint">✓</span> 20% descuento en clases de la escuela.</li>
                    <li class="flex gap-2"><span class="text-ryt-mint">✓</span> Clases extras a 40€.</li>
                </ul>
                <p class="text-xs text-ink-soft mb-6 leading-relaxed flex-1">
                    Si nunca has bailado o quieres aprender desde cero con calma. Ideal para preparar entrada y final.
                </p>
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero reservar el Pack Premium de baile nupcial')); ?>"
                   target="_blank" rel="noopener" class="btn btn-primary self-center">Reservar</a>
            </article>
        </div>
    </div>
</section>

<!-- FAQ específico -->
<section class="section bg-white">
    <div class="container mx-auto px-4 max-w-3xl">
        <header class="text-center mb-10">
            <span class="pre-title">Preguntas frecuentes</span>
            <h2 class="text-ink-heading uppercase">¿Tienes dudas?</h2>
        </header>
        <?php
        $faqs = [
            [ 'q' => '¿Cuánto tiempo antes de la boda deberíamos empezar?', 'a' => 'Lo ideal es 2-3 meses antes para tener margen. Si nunca habéis bailado, mejor 4 meses.' ],
            [ 'q' => '¿Qué diferencia hay entre el Pack Básico y el Premium?', 'a' => 'El Básico son 3h (para pulir coreografía) y el Premium 5h (para aprender desde cero). El Premium incluye 2 canciones editadas en vez de 1.' ],
            [ 'q' => '¿Qué pasa si necesitamos más clases?', 'a' => 'Puedes ampliar a 40€/hora extra cuando hagas falta.' ],
            [ 'q' => '¿Nos ayudáis a elegir la canción?', 'a' => 'Sí. Tenemos experiencia y proponemos canciones que se adapten al tipo de baile que queréis hacer.' ],
            [ 'q' => '¿Y si nunca hemos bailado antes?', 'a' => 'Sin problema. Empezamos desde el primer paso y a vuestro ritmo.' ],
        ];
        ?>
        <div class="space-y-3">
            <?php foreach ($faqs as $i => $f): ?>
            <details class="bg-paper-soft rounded-xl p-5 group" <?php echo $i === 0 ? 'open' : ''; ?>>
                <summary class="font-sans font-semibold text-ink cursor-pointer list-none flex items-center justify-between gap-4">
                    <span><?php echo esc_html($f['q']); ?></span>
                    <svg class="h-5 w-5 text-ryt-mint shrink-0 transition-transform group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </summary>
                <p class="mt-3 text-sm text-ink-soft leading-relaxed"><?php echo esc_html($f['a']); ?></p>
            </details>
            <?php endforeach; ?>
        </div>
        <p class="text-center mt-8">
            <a href="<?php echo esc_url(ryt_whatsapp_url()); ?>" target="_blank" rel="noopener" class="btn btn-primary">
                ¿Alguna duda más? Escríbenos
            </a>
        </p>
    </div>
</section>
