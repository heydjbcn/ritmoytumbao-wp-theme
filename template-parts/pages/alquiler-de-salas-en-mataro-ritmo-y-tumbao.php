<?php
/**
 * Página /alquiler-de-salas-en-mataro-ritmo-y-tumbao/
 */
?>
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent text-[14vw] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.18);">
            Alquiler
        </span>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-24 text-center relative z-10">
        <span class="pre-title text-ryt-mint">Espacio profesional en Mataró</span>
        <h1 class="text-white uppercase mt-3">Alquiler de salas</h1>
        <p class="text-paper-alt mt-6 max-w-2xl mx-auto">
            Dos salas equipadas para ensayos, talleres, eventos privados o grabaciones.
        </p>
    </div>
</section>

<section class="section bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <span class="pre-title">Para profesionales</span>
        <h2 class="text-ink-heading uppercase">Alquila nuestra sala por horas</h2>
        <p class="text-base text-ink-soft mt-4 leading-relaxed">
            Si necesitas un espacio en Mataró para tu academia, taller o ensayo, ponemos a tu disposición
            nuestras dos salas: <strong>amplias, con espejos, suelo techado, equipo de sonido y vestuarios</strong>.
        </p>
        <p class="text-base text-ink-soft mt-4 leading-relaxed">
            Tarifas por horas, medio día o jornada completa. Consúltanos disponibilidad y descuentos por
            uso recurrente.
        </p>
    </div>
</section>

<section class="section bg-paper-alt">
    <div class="container mx-auto px-4 grid gap-6 md:grid-cols-2 max-w-5xl mx-auto">
        <article class="bg-white rounded-2xl shadow-card overflow-hidden">
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/sala-1.jpg'); ?>"
                 alt="Sala 1" class="w-full aspect-video object-cover" loading="lazy">
            <div class="p-6">
                <h3 class="font-serif text-xl text-ink-heading mb-2">Sala 1</h3>
                <p class="text-sm text-ink-soft">Sala íntima para grupos reducidos y clases particulares.</p>
            </div>
        </article>
        <article class="bg-white rounded-2xl shadow-card overflow-hidden">
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/instalaciones/sala-2.jpg'); ?>"
                 alt="Sala 2" class="w-full aspect-video object-cover" loading="lazy">
            <div class="p-6">
                <h3 class="font-serif text-xl text-ink-heading mb-2">Sala 2</h3>
                <p class="text-sm text-ink-soft">Sala amplia para grupos grandes y eventos sociales.</p>
            </div>
        </article>
    </div>
    <div class="text-center mt-12">
        <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero info sobre alquilar una sala')); ?>"
           target="_blank" rel="noopener" class="btn btn-primary">Consultar disponibilidad</a>
    </div>
</section>
