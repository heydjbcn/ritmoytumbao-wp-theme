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
        'label' => __('Prueba', 'ryt'),
        'title' => __('¡Tu Primera Clase GRATIS!', 'ryt'),
        'text'  => __('Si quieres aprender a bailar, ven a probar clases de Salsa y Bachata en Mataró GRATIS y evaluaremos el nivel para ti.', 'ryt'),
        'cta'   => __('¡Quiero probar!', 'ryt'),
        'wa'    => __('Hola! Quiero probar mi primera clase GRATIS', 'ryt'),
        'topBar'    => '#62D8AC',
        'cardBg'    => '#FFFFFF',
        'cardBorder'=> '#EFEBE6',
        'popular'   => false,
    ],
    [
        'price' => '12€',
        'label' => __('Clase suelta', 'ryt'),
        'title' => __('¿No Siempre Puedes Venir?', 'ryt'),
        'text'  => __('Si no tienes disponibilidad para venir a las clases por horario de trabajo te ofrecemos una solución, puedes hacer clases sueltas.', 'ryt'),
        'cta'   => __('Me va bien', 'ryt'),
        'wa'    => __('Hola! Me gustaría info sobre las clases sueltas (12€)', 'ryt'),
        'topBar'    => '#3FB389',
        'cardBg'    => '#FBFAF8',
        'cardBorder'=> '#EFEBE6',
        'popular'   => false,
    ],
    [
        'price' => '36,90€',
        'label' => __('Mensual', 'ryt'),
        'title' => __('¡Aprende a bailar en mataró!', 'ryt'),
        'text'  => __('Cursos de salsa, cursos de bachata, reggaetón, Zumba Kids, Coreográfico y otros podrás disfrutar en Ritmo y Tumbao.', 'ryt'),
        'cta'   => __('¡Quiero empezar!', 'ryt'),
        'wa'    => __('Hola! Me gustaría apuntarme a las clases (36,90€/mes)', 'ryt'),
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
                <?php ryt_eyebrow('02', __('Tarifas sin permanencia', 'ryt')); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    <?php esc_html_e('Empieza a bailar', 'ryt'); ?><br><?php esc_html_e('hoy mismo', 'ryt'); ?>
                </h2>
            </div>
            <p class="text-[16px] leading-[1.7] text-ink-soft">
                <?php esc_html_e('Tu primera clase es gratis y evaluamos tu nivel sin compromiso. Sin matrícula. Sin permanencia.', 'ryt'); ?>
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
                        <span class="badge-popular"><?php esc_html_e('Más popular', 'ryt'); ?></span>
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
