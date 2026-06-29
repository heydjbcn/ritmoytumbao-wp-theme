<?php
/**
 * Instalaciones split v9 (Cloud Design v2).
 *
 * Cambios:
 *   - Grid 1:1 con foto izquierda + texto derecha.
 *   - Sobre la foto, badge ADLaM "2" + "SALAS EQUIPADAS" flotando bottom-right.
 *   - Eyebrow "05 — Nuestra escuela".
 */
?>
<section class="bg-paper py-[104px] px-6">
    <div class="max-w-[1220px] mx-auto grid gap-[60px] lg:grid-cols-2 items-center">
        <!-- Foto + badge -->
        <div class="relative">
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/aula-de-salsa-y-bachata.png'); ?>"
                 alt="<?php esc_attr_e('Aula de Salsa y Bachata en Ritmo y Tumbao', 'ryt'); ?>"
                 class="w-full h-auto rounded-[24px] shadow-[0_24px_60px_rgba(38,37,36,0.16)]"
                 loading="lazy">
            <!-- Badge flotando bottom-right -->
            <div class="absolute -bottom-[22px] -right-[12px] bg-ink-dark text-white px-[26px] py-[18px] rounded-[18px] shadow-[0_18px_40px_rgba(0,0,0,0.22)]">
                <span class="font-display text-[30px] text-ryt-mint leading-none">2</span>
                <span class="block text-[11px] uppercase tracking-[0.12em] text-[#C5BFB9] mt-[2px]"><?php esc_html_e('salas equipadas', 'ryt'); ?></span>
            </div>
        </div>

        <!-- Texto -->
        <div>
            <?php ryt_eyebrow('05', __('Nuestra escuela', 'ryt')); ?>
            <h2 class="text-ink-heading mb-[22px]" style="font-size: 38px; line-height: 1.14;">
                <?php esc_html_e('Espacios totalmente equipados para bailar', 'ryt'); ?>
            </h2>
            <p class="text-[16px] text-ink-soft leading-[1.8] mb-4">
                <?php
                printf(
                    /* translators: %s: enlace destacado a clases de salsa y bachata en Mataró */
                    esc_html__('Nos enfocamos en las %s, pero también trabajamos con grupos coreográficos y niños con clases de Reggaetón y Zumba.', 'ryt'),
                    '<strong>' . esc_html__('clases de salsa y bachata en Mataró', 'ryt') . '</strong>'
                );
                ?>
            </p>
            <p class="text-[16px] text-ink-soft leading-[1.8] mb-[30px]">
                <?php esc_html_e('Dos amplios espacios perfectamente climatizados e insonorizados, creando una experiencia única para los que amamos el baile.', 'ryt'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/instalaciones/')); ?>" class="btn btn-primary">
                <?php esc_html_e('Ver instalaciones', 'ryt'); ?>
            </a>
        </div>
    </div>
</section>
