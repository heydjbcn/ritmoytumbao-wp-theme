<?php
/**
 * Instalaciones — "Espacios totalmente equipados para bailar"
 */
?>
<section class="section bg-white">
    <div class="container mx-auto px-4">
        <div class="grid gap-10 lg:grid-cols-2 items-center">
            <div>
                <img src="<?php echo esc_url(RYT_URI . '/assets/img/aula-de-salsa-y-bachata.png'); ?>"
                     alt="<?php esc_attr_e('Aula de Salsa y Bachata en Ritmo y Tumbao', 'ryt'); ?>"
                     class="w-full h-auto rounded-2xl shadow-soft"
                     loading="lazy">
            </div>
            <div>
                <span class="pre-title">Clases de Salsa y Bachata en Mataró</span>
                <p class="text-xs uppercase tracking-widest text-ink-soft mb-2 font-bold">Nuestra escuela</p>
                <h2 class="text-ink-heading mb-5">Espacios totalmente equipados para bailar</h2>
                <p class="text-base text-ink-soft leading-relaxed mb-4">
                    En nuestra escuela nos enfocamos en las <strong>clases de salsa y bachata en Mataró</strong>,
                    pero también trabajamos con grupos coreográficos y niños haciendo clases de Reggaetón y Zumba.
                </p>
                <p class="text-base text-ink-soft leading-relaxed mb-8">
                    Estos 2 amplios espacios de los que disponemos están perfectamente climatizados e insonorizados
                    creando así una experiencia única para los que amamos el baile.
                </p>
                <a href="<?php echo esc_url(home_url('/instalaciones/')); ?>" class="btn btn-primary">
                    Ver video
                </a>
            </div>
        </div>
    </div>
</section>
