<?php
/**
 * Pricing — 3 cards REALES del home:
 *   - 0€ — ¡Tu Primera Clase GRATIS!         → WhatsApp "¡QUIERO PROBAR!"
 *   - 12€ — ¿No Siempre Puedes Venir?         → WhatsApp "ME VA BIEN"
 *   - 36,90€ — ¡Aprende a bailar en mataró!  → WhatsApp "¡QUIERO EMPEZAR!"
 *
 * Estilo real:
 *   - Precios en ADLaM Display 66px sobre fondo gris #F8F8F8
 *   - h3 en Libre Baskerville
 *   - CTAs verdes pill mayúsculas
 */
$cards = [
    [
        'price' => '0€',
        'title' => '¡Tu Primera Clase GRATIS!',
        'text'  => 'Si quieres aprender a bailar, ven a probar clases de Salsa y Bachata en Mataró GRATIS y evaluaremos el nivel para ti.',
        'cta'   => '¡Quiero probar!',
        'wa'    => 'Hola! Quiero probar mi primera clase GRATIS',
    ],
    [
        'price' => '12€',
        'title' => '¿No Siempre Puedes Venir?',
        'text'  => 'Si no tienes disponibilidad para venir a las clases por horario de trabajo te ofrecemos una solución, puedes hacer clases sueltas.',
        'cta'   => 'Me va bien',
        'wa'    => 'Hola! Me gustaría info sobre las clases sueltas (12€)',
    ],
    [
        'price' => '36,90€',
        'title' => '¡Aprende a bailar en mataró!',
        'text'  => 'Cursos de salsa, cursos de bachata, reggaetón, Zumba Kids, Coreográfico y otros podrás disfrutar en Ritmo y Tumbao.',
        'cta'   => '¡Quiero empezar!',
        'wa'    => 'Hola! Me gustaría apuntarme a las clases (36,90€/mes)',
    ],
];
?>
<section class="section bg-paper-alt" id="tarifas">
    <div class="container mx-auto px-4">
        <div class="grid gap-8 md:gap-10 md:grid-cols-3 pt-12">
            <?php foreach ($cards as $c): ?>
            <article class="relative bg-white rounded-3xl shadow-card text-center flex flex-col pt-20 pb-8 px-6">
                <!-- Círculo verde con el precio (superpuesto sobre la card) -->
                <div class="absolute -top-12 left-1/2 -translate-x-1/2 w-28 h-28 md:w-32 md:h-32 rounded-full bg-ryt-mint shadow-lg flex items-center justify-center ring-8 ring-paper-alt">
                    <span class="font-display text-3xl md:text-4xl text-white leading-none whitespace-nowrap">
                        <?php echo esc_html($c['price']); ?>
                    </span>
                </div>

                <h3 class="font-serif text-xl md:text-2xl text-ink-heading mb-3 leading-snug">
                    <?php echo esc_html($c['title']); ?>
                </h3>
                <p class="text-sm leading-relaxed text-ink-soft mb-6 flex-1">
                    <?php echo esc_html($c['text']); ?>
                </p>
                <a href="<?php echo esc_url(ryt_whatsapp_url($c['wa'])); ?>"
                   target="_blank" rel="noopener"
                   class="btn btn-primary self-center">
                    <?php echo esc_html($c['cta']); ?>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
