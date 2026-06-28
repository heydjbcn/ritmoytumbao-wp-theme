<?php
/**
 * Pricing — 3 cards REALES del home:
 *   - 0€ — ¡Tu Primera Clase GRATIS!         → WhatsApp "¡QUIERO PROBAR!"
 *   - 12€ — ¿No Siempre Puedes Venir?         → WhatsApp "ME VA BIEN"
 *   - 36,90€ — ¡Aprende a bailar en mataró!  → WhatsApp "¡QUIERO EMPEZAR!"
 *
 * v7: cards horizontales con barra superior de color + badge "Más popular".
 */
$cards = [
    [
        'price' => '0€',
        'label' => 'Prueba',
        'title' => '¡Tu Primera Clase GRATIS!',
        'text'  => 'Si quieres aprender a bailar, ven a probar clases de Salsa y Bachata en Mataró GRATIS y evaluaremos el nivel para ti.',
        'cta'   => '¡Quiero probar!',
        'wa'    => 'Hola! Quiero probar mi primera clase GRATIS',
        'topBar'    => '#62D8AC',
        'cardBg'    => '#FFFFFF',
        'cardBorder'=> '#EFEBE6',
        'popular'   => false,
    ],
    [
        'price' => '12€',
        'label' => 'Clase suelta',
        'title' => '¿No Siempre Puedes Venir?',
        'text'  => 'Si no tienes disponibilidad para venir a las clases por horario de trabajo te ofrecemos una solución, puedes hacer clases sueltas.',
        'cta'   => 'Me va bien',
        'wa'    => 'Hola! Me gustaría info sobre las clases sueltas (12€)',
        'topBar'    => '#3FB389',
        'cardBg'    => '#FBFAF8',
        'cardBorder'=> '#EFEBE6',
        'popular'   => false,
    ],
    [
        'price' => '36,90€',
        'label' => 'Mensual',
        'title' => '¡Aprende a bailar en mataró!',
        'text'  => 'Cursos de salsa, cursos de bachata, reggaetón, Zumba Kids, Coreográfico y otros podrás disfrutar en Ritmo y Tumbao.',
        'cta'   => '¡Quiero empezar!',
        'wa'    => 'Hola! Me gustaría apuntarme a las clases (36,90€/mes)',
        'topBar'    => '#173C30',
        'cardBg'    => '#FFFFFF',
        'cardBorder'=> '#EFEBE6',
        'popular'   => true,
    ],
];
?>
<section class="bg-paper py-[104px] px-6" id="tarifas">
    <div class="max-w-[1180px] mx-auto">
        <!-- Header grid 2-col -->
        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-[48px] items-end mb-[56px]">
            <div>
                <?php ryt_eyebrow('02', 'Tarifas sin permanencia'); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    Empieza a bailar<br>hoy mismo
                </h2>
            </div>
            <p class="text-[16px] leading-[1.7] text-ink-soft">
                Tu primera clase es gratis y evaluamos tu nivel sin compromiso. Sin matrícula. Sin permanencia.
            </p>
        </div>
        <div class="grid gap-[26px] md:grid-cols-3 items-stretch">
            <?php foreach ($cards as $c): ?>
            <article class="relative rounded-[24px] border px-[34px] pt-10 pb-9 flex flex-col shadow-card-lg overflow-hidden"
                     style="background: <?php echo esc_attr($c['cardBg']); ?>; border-color: <?php echo esc_attr($c['cardBorder']); ?>;">
                <!-- Barra superior de 4px -->
                <span class="absolute top-0 left-0 right-0 h-1"
                      style="background: <?php echo esc_attr($c['topBar']); ?>"></span>

                <div class="flex items-center justify-between mb-[22px]">
                    <span class="text-[11px] font-bold uppercase tracking-[0.16em] text-ryt-mint">
                        <?php echo esc_html($c['label']); ?>
                    </span>
                    <?php if ($c['popular']): ?>
                        <span class="badge-popular">Más popular</span>
                    <?php endif; ?>
                </div>

                <div class="price mb-[18px]"><?php echo esc_html($c['price']); ?></div>

                <h3 class="text-xl text-ink-heading leading-[1.3] mb-3">
                    <?php echo esc_html($c['title']); ?>
                </h3>
                <p class="text-[14.5px] leading-[1.7] text-ink-soft flex-1 mb-6">
                    <?php echo esc_html($c['text']); ?>
                </p>

                <div class="h-px bg-[#ECE7E1] mb-6"></div>

                <a href="<?php echo esc_url(ryt_whatsapp_url($c['wa'])); ?>"
                   target="_blank" rel="noopener"
                   class="btn btn-primary w-full">
                    <?php echo esc_html($c['cta']); ?>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
