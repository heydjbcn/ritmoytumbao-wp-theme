<?php
/**
 * Página /clases-particulares/
 */
?>
<section class="bg-ink-dark text-white relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none flex items-center justify-center">
        <span class="font-serif italic font-bold uppercase text-transparent text-[14vw] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px rgba(98, 216, 172, 0.18);">
            Particulares
        </span>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-24 text-center relative z-10">
        <span class="pre-title text-ryt-mint">A tu ritmo</span>
        <h1 class="text-white uppercase mt-3">Clases particulares</h1>
        <p class="text-paper-alt mt-6 max-w-2xl mx-auto">
            Sesiones 1 a 1 o en pareja, adaptadas a tu nivel, objetivo y disponibilidad.
        </p>
    </div>
</section>

<section class="section bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <span class="pre-title">¿A quién va dirigido?</span>
        <h2 class="text-ink-heading uppercase">Aprende a tu ritmo, con tu pareja o solo</h2>
        <p class="text-base text-ink-soft mt-4 leading-relaxed">
            Las clases particulares son la mejor forma de avanzar rápido o de prepararte para algo concreto:
            una boda, una grabación, una competición o simplemente <strong>aprender a tu ritmo</strong> con
            atención 100% personalizada.
        </p>
        <p class="text-base text-ink-soft mt-4 leading-relaxed">
            Tú eliges el estilo (salsa, bachata, fusión, lady style…), el día y el profesor. Nosotros nos
            adaptamos.
        </p>
    </div>
</section>

<section class="section bg-paper-alt">
    <div class="container mx-auto px-4 max-w-5xl">
        <header class="text-center max-w-3xl mx-auto mb-10">
            <span class="pre-title">Cómo funciona</span>
            <h2 class="text-ink-heading uppercase">Tu sesión, a medida</h2>
        </header>
        <div class="grid gap-6 md:grid-cols-3 text-center">
            <article class="bg-white rounded-2xl p-6 shadow-card">
                <span class="font-display text-5xl text-ryt-mint block leading-none mb-3">1</span>
                <h3 class="font-serif text-xl text-ink-heading mb-2">Escríbenos</h3>
                <p class="text-sm text-ink-soft">Cuéntanos qué quieres y para cuándo. Sin compromiso.</p>
            </article>
            <article class="bg-white rounded-2xl p-6 shadow-card">
                <span class="font-display text-5xl text-ryt-mint block leading-none mb-3">2</span>
                <h3 class="font-serif text-xl text-ink-heading mb-2">Reserva</h3>
                <p class="text-sm text-ink-soft">Cuadramos día, hora, profesor y sala.</p>
            </article>
            <article class="bg-white rounded-2xl p-6 shadow-card">
                <span class="font-display text-5xl text-ryt-mint block leading-none mb-3">3</span>
                <h3 class="font-serif text-xl text-ink-heading mb-2">Disfruta</h3>
                <p class="text-sm text-ink-soft">Vienes a clase y aprendes a tu ritmo.</p>
            </article>
        </div>
        <div class="text-center mt-12">
            <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Me interesan las clases particulares')); ?>"
               target="_blank" rel="noopener" class="btn btn-primary">Reservar clase particular</a>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/home/cta'); ?>
