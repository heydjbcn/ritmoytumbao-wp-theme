<?php
/**
 * FAQ — accordion + formulario de contacto al lado (replica el layout de prod).
 *
 * Form: action admin-post.php?action=ryt_contact, nonce + honeypot.
 * Notas: WP_Mail está bien para volúmenes bajos; si llega spam pasamos a CF7 + Turnstile.
 */
$faqs = [
    [ 'q' => '¿Necesito traer pareja para unirme a las clases?',                          'a' => 'No es necesario. En clase rotamos para que practiques con distintos compañeros, hayas venido solo o acompañado.' ],
    [ 'q' => '¿Qué nivel de experiencia se requiere para unirse a las clases de salsa y bachata?', 'a' => 'Ninguno. Tenemos grupos desde nivel "Iniciación" para personas que nunca han bailado, hasta niveles avanzados.' ],
    [ 'q' => '¿Qué tipo de vestuario tengo que llevar para bailar?',                      'a' => 'Ropa cómoda y zapatos limpios (no de calle). Si tienes zapatos de baile o de tacón medio, ¡mejor! Pero no es imprescindible.' ],
    [ 'q' => '¿Cuánto cuestan las clases?',                                               'a' => 'Desde 0€ la primera clase (gratis para probar), 12€ la clase suelta o desde 36,90€/mes una clase a la semana.' ],
    [ 'q' => '¿Ofrecen clases privadas además de las clases grupales?',                   'a' => 'Sí. Tenemos clases particulares para parejas y para preparación de bailes nupciales. Consúltanos por WhatsApp.' ],
    [ 'q' => '¿Tienen eventos sociales o prácticas de baile fuera de las clases regulares?', 'a' => 'Sí. Organizamos quedadas mensuales, prácticas y eventos especiales. Te avisamos a través de la app y las redes.' ],
];

$status = $_GET['contact'] ?? '';
?>
<section class="section bg-white" id="faq">
    <div class="container mx-auto px-4 grid gap-12 lg:grid-cols-5">

        <!-- Accordion -->
        <div class="lg:col-span-3">
            <header class="mb-8">
                <span class="pre-title">Clases de Salsa y Bachata en Mataró</span>
                <h2 class="text-ink-heading uppercase">Preguntas frecuentes</h2>
                <p class="text-base text-ink-soft mt-3">Te irá bien saber</p>
            </header>

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

            <p class="mt-8 text-sm text-ink-soft">
                <span class="uppercase font-bold tracking-widest text-ryt-mint block mb-2">¿Alguna duda más?</span>
                <a href="<?php echo esc_url(ryt_whatsapp_url()); ?>" target="_blank" rel="noopener" class="btn btn-primary mt-2">
                    Escríbenos por WhatsApp
                </a>
            </p>
        </div>

        <!-- Form -->
        <div class="lg:col-span-2">
            <div class="bg-paper-soft rounded-2xl p-6 md:p-8 sticky top-24">
                <h3 class="font-serif text-2xl text-ink-heading mb-2">¿Tienes una duda más concreta?</h3>
                <p class="text-sm text-ink-soft mb-5">Escríbenos y te respondemos en menos de 24h.</p>

                <?php if ($status === 'sent'): ?>
                    <div class="bg-ryt-mint/15 border border-ryt-mint text-ink-heading rounded-xl p-3 text-sm mb-4">
                        ¡Gracias! Hemos recibido tu mensaje. Te respondemos en breve.
                    </div>
                <?php elseif ($status === 'error'): ?>
                    <div class="bg-rose-50 border border-rose-200 text-rose-700 rounded-xl p-3 text-sm mb-4">
                        Algo no ha funcionado. Vuelve a intentarlo o escríbenos por WhatsApp.
                    </div>
                <?php endif; ?>

                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="space-y-3">
                    <input type="hidden" name="action" value="ryt_contact">
                    <?php wp_nonce_field('ryt_contact', 'ryt_nonce'); ?>

                    <!-- Honeypot -->
                    <input type="text" name="web" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true">

                    <label class="block">
                        <span class="text-xs uppercase tracking-widest font-bold text-ink-soft">Nombre</span>
                        <input name="nombre" type="text" required class="mt-1 w-full rounded-pill border border-paper-alt bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                    <label class="block">
                        <span class="text-xs uppercase tracking-widest font-bold text-ink-soft">Email</span>
                        <input name="email" type="email" required class="mt-1 w-full rounded-pill border border-paper-alt bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                    <label class="block">
                        <span class="text-xs uppercase tracking-widest font-bold text-ink-soft">Teléfono (opcional)</span>
                        <input name="tel" type="tel" class="mt-1 w-full rounded-pill border border-paper-alt bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                    <label class="block">
                        <span class="text-xs uppercase tracking-widest font-bold text-ink-soft">Tu mensaje</span>
                        <textarea name="mensaje" rows="4" required class="mt-1 w-full rounded-2xl border border-paper-alt bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint"></textarea>
                    </label>

                    <button type="submit" class="btn btn-primary w-full">Enviar mensaje</button>

                    <p class="text-[10px] text-ink-mute leading-relaxed">
                        Al enviar aceptas nuestra
                        <a href="<?php echo esc_url(home_url('/politica-de-privacidad/')); ?>" class="underline">política de privacidad</a>.
                        Nunca cederemos tus datos a terceros.
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
