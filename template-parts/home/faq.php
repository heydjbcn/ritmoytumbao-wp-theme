<?php
/**
 * FAQ + form v9 (Cloud Design v2).
 *
 * Cambios:
 *   - Grid 3:2 (FAQ izquierda más ancho, form derecha más estrecho).
 *   - Form lateral con `sticky top-[130px]`.
 *   - Accordion con `+` mint en lugar de chevron.
 *   - Header con eyebrow "07 — Preguntas frecuentes" + h2 46px.
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
<section class="bg-white py-[104px] px-6" id="faq">
    <div class="max-w-[1220px] mx-auto grid gap-[56px] lg:grid-cols-[3fr_2fr] items-start">

        <!-- Accordion -->
        <div>
            <header class="mb-[40px]">
                <?php ryt_eyebrow('07', 'Preguntas frecuentes'); ?>
                <h2 class="text-ink-heading" style="font-size: 46px; line-height: 1.08;">
                    Te <span class="italic font-display">irá bien</span> saberlo
                </h2>
            </header>

            <div class="flex flex-col gap-3">
                <?php foreach ($faqs as $i => $f): ?>
                <details class="ryt-faq-item bg-paper rounded-[16px] border border-[#EFEBE6]" <?php echo $i === 0 ? 'open' : ''; ?>>
                    <summary class="font-sans font-semibold text-ink-heading cursor-pointer list-none flex items-center justify-between gap-4 p-[20px_24px] text-[15.5px]">
                        <span><?php echo esc_html($f['q']); ?></span>
                        <span class="ryt-faq-plus" aria-hidden="true">+</span>
                    </summary>
                    <p class="px-[24px] pb-[22px] -mt-1 text-[14.5px] text-ink-soft leading-[1.7]"><?php echo esc_html($f['a']); ?></p>
                </details>
                <?php endforeach; ?>
            </div>

            <p class="mt-[34px] text-sm text-ink-soft">
                <span class="uppercase font-bold tracking-[0.12em] text-ryt-mint block mb-3 text-[11.5px]">¿Alguna duda más?</span>
                <a href="<?php echo esc_url(ryt_whatsapp_url()); ?>" target="_blank" rel="noopener" class="btn btn-primary">
                    Escríbenos por WhatsApp
                </a>
            </p>
        </div>

        <!-- Form sticky -->
        <div>
            <div class="bg-paper rounded-[22px] p-[28px] md:p-[34px] border border-[#EFEBE6] lg:sticky lg:top-[130px]">
                <h3 class="font-serif italic text-[26px] text-ink-heading mb-2 leading-[1.2]">¿Tienes una duda más concreta?</h3>
                <p class="text-sm text-ink-soft mb-6">Escríbenos y te respondemos en menos de 24h.</p>

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
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft">Nombre</span>
                        <input name="nombre" type="text" required class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                    <label class="block">
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft">Email</span>
                        <input name="email" type="email" required class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                    <label class="block">
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft">Teléfono (opcional)</span>
                        <input name="tel" type="tel" class="mt-1 w-full rounded-pill border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint">
                    </label>
                    <label class="block">
                        <span class="text-[11px] uppercase tracking-[0.12em] font-bold text-ink-soft">Tu mensaje</span>
                        <textarea name="mensaje" rows="4" required class="mt-1 w-full rounded-2xl border border-[#EFEBE6] bg-white px-4 py-3 text-sm focus:outline-none focus:border-ryt-mint"></textarea>
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
