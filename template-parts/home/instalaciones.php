<?php
/**
 * Instalaciones — "Espacios totalmente equipados para bailar"
 */
?>
<section class="section bg-paper-alt">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid gap-12 lg:grid-cols-2 items-center">
            <div>
                <img src="<?php echo esc_url(RYT_URI . '/assets/img/aula-de-salsa-y-bachata.png'); ?>"
                     alt="<?php esc_attr_e('Aula de Salsa y Bachata en Ritmo y Tumbao', 'ryt'); ?>"
                     class="w-full h-auto rounded-[22px] shadow-card-lg"
                     loading="lazy">
            </div>
            <div>
                <span class="pre-title">Nuestra escuela</span>
                <h2 class="text-ink-heading mb-[22px] text-[38px] leading-[1.15]">
                    Espacios totalmente equipados para bailar
                </h2>
                <p class="text-base text-ink-soft leading-[1.7] mb-5">
                    En nuestra escuela nos enfocamos en las <strong>clases de salsa y bachata en Mataró</strong>,
                    pero también trabajamos con grupos coreográficos y niños haciendo clases de Reggaetón y Zumba.
                </p>
                <p class="text-base text-ink-soft leading-[1.7] mb-8">
                    Estos 2 amplios espacios están perfectamente climatizados e insonorizados, creando una
                    experiencia única para los que amamos el baile.
                </p>
                <a href="<?php echo esc_url(home_url('/instalaciones/')); ?>" class="btn btn-primary">
                    Ver instalaciones
                </a>
            </div>
        </div>
    </div>
</section>
