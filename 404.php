<?php
/**
 * 404.
 */
get_header(); ?>
<main id="content" class="bg-white">
    <section class="bg-ink-dark text-white">
        <div class="container mx-auto px-4 py-24 md:py-32 text-center">
            <span class="pre-title text-ryt-mint">Página no encontrada</span>
            <h1 class="text-white font-display text-6xl md:text-8xl mt-3">404</h1>
            <p class="text-paper-alt mt-6 max-w-xl mx-auto">
                Esta página no existe o ya no está disponible. Pero seguro que la salsa y la bachata sí.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Ir al inicio</a>
                <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-outline-white">Ver horarios</a>
            </div>
        </div>
    </section>
</main>
<?php get_footer();
