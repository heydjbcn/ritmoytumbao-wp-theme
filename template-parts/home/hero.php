<?php
/**
 * Hero v9 — Rediseño Cloud Design v2.
 *
 * Cambios respecto v8:
 *   - Marquee animation con texto fantasma "Salsa · Bachata · " repetido.
 *   - Eyebrow con línea (sin número, es el hero).
 *   - H1 62px line-height 1.04 + Salsa y Bachata en italic mint.
 *   - 3 stats numéricos (15+ años · 8 profesores · 5.0★ Google).
 *   - Ticker bar debajo del hero con mensajes en marquee.
 *   - Logo redondo grande a la derecha con radial gradient mint.
 *   - CTAs con text-ryt-deep (verde profundo).
 */
$hero_stats = [
    ['n' => '15+', 'l' => 'Años enseñando'],
    ['n' => '8',   'l' => 'Profesores'],
    ['n' => '5.0★','l' => 'En Google'],
];

$ticker_msgs = [
    'Primera clase gratis',
    'Sin pareja',
    'Sin matrícula',
    'Sin permanencia',
    'Salsa cubana',
    'Bachata sensual',
    'Rueda de casino',
    'Lady style',
    'Reggaetón',
    'Zumba kids',
];
?>
<section class="relative overflow-hidden bg-ink-dark text-white">
    <!-- Marquee texto fantasma de fondo -->
    <div aria-hidden="true" class="absolute top-[-2%] inset-x-0 pointer-events-none z-0 opacity-55">
        <div class="ryt-marquee">
            <?php for ($i = 0; $i < 2; $i++): ?>
                <span class="whitespace-nowrap font-serif italic font-bold uppercase text-[18vw] leading-none pr-[.3em]"
                      style="color: transparent; -webkit-text-stroke: 1px rgba(98, 216, 172, 0.22);">
                    Salsa · Bachata · Salsa · Bachata ·
                </span>
            <?php endfor; ?>
        </div>
    </div>

    <div class="ryt-hero-grid max-w-[1320px] mx-auto px-6 py-[84px] pb-[76px] relative z-10 grid items-center gap-[56px]"
         style="grid-template-columns: 1.18fr 0.82fr;">

        <!-- Texto -->
        <div>
            <span class="ryt-eyebrow">
                <span class="ryt-eyebrow-line ryt-eyebrow-line-mint" style="width:30px"></span>
                Escuela de baile en Mataró · desde 2010
            </span>
            <h1 class="text-white mb-6"
                style="font-size: 62px; line-height: 1.04; letter-spacing: -0.01em;">
                <?php esc_html_e('Clases de', 'ryt'); ?>
                <span class="text-ryt-mint italic"><?php esc_html_e('Salsa y Bachata', 'ryt'); ?></span><br>
                <?php esc_html_e('en Mataró', 'ryt'); ?>
            </h1>
            <p class="text-[17px] leading-[1.75] text-[#D2CDC8] max-w-[500px] mb-[34px]">
                <?php esc_html_e('Más de 15 años enseñando a bailar. Empieza', 'ryt'); ?>
                <strong class="text-white font-semibold"><?php esc_html_e('sin pareja, sin matrícula y sin permanencia', 'ryt'); ?></strong>.
                <?php esc_html_e('También Rueda de Casino, Reggaetón y Zumba Kids.', 'ryt'); ?>
            </p>
            <div class="flex flex-wrap gap-3.5 mb-[42px]">
                <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">
                    <?php esc_html_e('Ver horarios', 'ryt'); ?>
                </a>
                <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero reservar mi primera clase GRATIS')); ?>"
                   target="_blank" rel="noopener" class="btn btn-outline-white">
                    <?php esc_html_e('Reservar clase gratis', 'ryt'); ?>
                </a>
            </div>

            <!-- 3 Stats -->
            <div class="flex flex-wrap gap-[38px]">
                <?php foreach ($hero_stats as $stat): ?>
                    <div>
                        <div class="ryt-hero-stat-n"><?php echo esc_html($stat['n']); ?></div>
                        <div class="ryt-hero-stat-l"><?php echo esc_html($stat['l']); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Logo sello redondo con radial gradient -->
        <div class="flex justify-center relative">
            <div aria-hidden="true" class="absolute w-[360px] h-[360px] rounded-full"
                 style="background: radial-gradient(circle, rgba(98,216,172,0.26), transparent 66%);"></div>
            <img src="<?php echo esc_url(RYT_URI . '/assets/img/logo-sello.webp'); ?>"
                 alt="<?php echo esc_attr(RYT_BRAND_NAME); ?>"
                 class="relative w-[330px] max-w-full h-auto"
                 style="filter: drop-shadow(0 28px 56px rgba(0,0,0,0.55));"
                 loading="eager" fetchpriority="high">
        </div>
    </div>

    <!-- Ticker bar -->
    <div class="ryt-ticker">
        <div class="ryt-marquee-30 py-[13px]">
            <?php for ($i = 0; $i < 2; $i++): ?>
                <span class="ryt-ticker-text">
                    <?php foreach ($ticker_msgs as $msg): ?>
                        <span>· <?php echo esc_html($msg); ?></span>
                    <?php endforeach; ?>
                </span>
            <?php endfor; ?>
        </div>
    </div>
</section>
