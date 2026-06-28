<?php
/**
 * Horarios — CALENDARIO SEMANAL (v7.5)
 *
 * Eje Y: franjas horarias (17h-23h aprox).
 * Eje X: días de la semana (los que tienen clases).
 * Cada clase es un bloque posicionado en absoluto a su hora exacta y con
 * altura proporcional a su duración (~55 min).
 *
 * Datos: theme/data/horarios.json (25 clases reales).
 * Filtros JS vanilla con data-* matching.
 */
$json_path = RYT_DIR . '/data/horarios.json';
$clases = file_exists($json_path) ? json_decode(file_get_contents($json_path), true) : [];

$estilos    = array_values(array_unique(array_column($clases, 'estilo')));
$niveles    = array_values(array_unique(array_column($clases, 'nivel')));
$profesores = [];
foreach ($clases as $c) {
    foreach (preg_split('/\s*&\s*/u', $c['profesores']) as $p) {
        $profesores[trim($p)] = true;
    }
}
$profesores = array_keys($profesores);
sort($estilos);
sort($niveles);
sort($profesores);

$dias_orden = ['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado', 'domingo'];
$dias_label = [
    'lunes' => 'Lunes', 'martes' => 'Martes', 'miércoles' => 'Miércoles',
    'jueves' => 'Jueves', 'viernes' => 'Viernes', 'sábado' => 'Sábado', 'domingo' => 'Domingo',
];

$por_dia = array_fill_keys($dias_orden, []);
foreach ($clases as $c) {
    $d = $c['dia'] === 'miercoles' ? 'miércoles' : ($c['dia'] === 'sabado' ? 'sábado' : $c['dia']);
    if (isset($por_dia[$d])) $por_dia[$d][] = $c;
}
$dias_activos = array_values(array_filter($dias_orden, fn($d) => !empty($por_dia[$d])));

if (!function_exists('ryt_slug')) {
    function ryt_slug($s) {
        $s = mb_strtolower($s, 'UTF-8');
        $s = preg_replace('/[áàäâ]/u', 'a', $s);
        $s = preg_replace('/[éèëê]/u', 'e', $s);
        $s = preg_replace('/[íìïî]/u', 'i', $s);
        $s = preg_replace('/[óòöô]/u', 'o', $s);
        $s = preg_replace('/[úùüû]/u', 'u', $s);
        $s = preg_replace('/[^a-z0-9]+/', '-', $s);
        return trim($s, '-');
    }
}

if (!function_exists('ryt_estilo_color')) {
    function ryt_estilo_color($estilo) {
        $map = [
            'salsa'             => '#E76F51', // coral
            'bachata'           => '#E9A23B', // naranja terracota
            'bachata fusión'    => '#9C7FCE', // lavanda
            'casino'            => '#62D8AC', // mint
            'casino con timba'  => '#3FB389', // mint oscuro
            'lady style'        => '#E5739F', // rosa
            'pasos libres'      => '#5A8FA5', // azul humo
        ];
        $k = mb_strtolower($estilo, 'UTF-8');
        return $map[$k] ?? '#62D8AC';
    }
}

/** Devuelve los minutos de una hora "HH:MM". */
function ryt_min($hhmm) {
    [$h, $m] = array_map('intval', explode(':', $hhmm));
    return $h * 60 + $m;
}

// Rango horario real del horario
$inicios = array_map(fn($c) => ryt_min($c['hora_inicio']), $clases);
$fines   = array_map(fn($c) => ryt_min($c['hora_fin']),    $clases);
$min_h   = min($inicios);
$max_h   = max($fines);
// Redondear a horas enteras
$cal_inicio = (int) (floor($min_h / 60) * 60);          // ej. 17:00 -> 17*60 = 1020
$cal_fin    = (int) (ceil($max_h / 60) * 60);           // ej. 22:30 -> ceil 23h -> 23*60 = 1380
$cal_minutos = $cal_fin - $cal_inicio;                  // ej. 360
// Factor de píxeles por minuto (1.6 px/min => ~96 px/hora)
$pxmin = 1.7;
$cal_alto = (int) round($cal_minutos * $pxmin);

$total_clases = count($clases);
?>
<section class="section bg-paper" id="horarios">
    <div class="container mx-auto px-4 max-w-[1320px]">
        <header class="text-center max-w-3xl mx-auto mb-10">
            <span class="pre-title">Horarios <?php echo esc_html(date('Y')); ?></span>
            <h2 class="text-ink-heading uppercase">Horario completo de la temporada</h2>
            <p class="text-base md:text-lg text-ink-soft mt-4">
                Filtra por estilo, día, nivel o profesor. Si tienes dudas, escríbenos por WhatsApp.
            </p>
        </header>

        <!-- Leyenda de estilos -->
        <div class="flex flex-wrap items-center justify-center gap-x-5 gap-y-2 mb-7 max-w-4xl mx-auto" id="ryt-horario-legend">
            <?php foreach ($estilos as $e):
                $color = ryt_estilo_color($e);
                $slug  = ryt_slug($e);
            ?>
                <button type="button" data-legend="<?php echo esc_attr($slug); ?>"
                        class="ryt-legend-chip inline-flex items-center gap-2 text-[12px] text-ink-soft hover:text-ink-heading transition-colors">
                    <span class="w-3 h-3 rounded-full shadow-sm" style="background: <?php echo esc_attr($color); ?>"></span>
                    <?php echo esc_html($e); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Filtros -->
        <div class="max-w-[920px] mx-auto mb-6" id="ryt-horario-filtros">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <label class="ryt-filtro-pill">
                    <span class="ryt-filtro-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v10M7 12h10"/></svg>
                    </span>
                    <select data-filter="estilo" aria-label="Filtrar por estilo">
                        <option value="">Todos los estilos</option>
                        <?php foreach ($estilos as $e): ?>
                            <option value="<?php echo esc_attr(ryt_slug($e)); ?>"><?php echo esc_html($e); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="ryt-filtro-chev" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </span>
                </label>

                <label class="ryt-filtro-pill">
                    <span class="ryt-filtro-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                    </span>
                    <select data-filter="dia" aria-label="Filtrar por día">
                        <option value="">Todos los días</option>
                        <?php foreach ($dias_activos as $d): ?>
                            <option value="<?php echo esc_attr(ryt_slug($d)); ?>"><?php echo esc_html($dias_label[$d]); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="ryt-filtro-chev" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </span>
                </label>

                <label class="ryt-filtro-pill">
                    <span class="ryt-filtro-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6M9 18V9M15 18V6M21 18v-3"/></svg>
                    </span>
                    <select data-filter="nivel" aria-label="Filtrar por nivel">
                        <option value="">Todos los niveles</option>
                        <?php foreach ($niveles as $n): ?>
                            <option value="<?php echo esc_attr(ryt_slug($n)); ?>"><?php echo esc_html($n); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="ryt-filtro-chev" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </span>
                </label>

                <label class="ryt-filtro-pill">
                    <span class="ryt-filtro-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </span>
                    <select data-filter="profesor" aria-label="Filtrar por profesor">
                        <option value="">Todos los profesores</option>
                        <?php foreach ($profesores as $p): ?>
                            <option value="<?php echo esc_attr(ryt_slug($p)); ?>"><?php echo esc_html($p); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="ryt-filtro-chev" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4 text-xs">
                <span id="ryt-horario-count" class="text-ink-soft">
                    <strong class="font-bold text-ryt-mint" data-count><?php echo (int) $total_clases; ?></strong>
                    <span class="lowercase"> clases en el horario</span>
                </span>
                <button type="button" id="ryt-horario-clear"
                        class="hidden text-ryt-mint hover:text-ryt-mint-dark font-bold uppercase tracking-widest text-[11px] inline-flex items-center gap-1.5 transition-colors">
                    <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                    Limpiar filtros
                </button>
            </div>
        </div>

        <!-- CALENDARIO -->
        <div class="ryt-cal bg-white rounded-[20px] border border-[#EFEBE6] shadow-card-lg overflow-hidden"
             id="ryt-horario-grid">

            <!-- Cabecera de días -->
            <div class="ryt-cal-header grid"
                 style="grid-template-columns: 64px repeat(<?php echo count($dias_activos); ?>, minmax(0, 1fr));">
                <div class="bg-paper-alt border-b border-[#EFEBE6]"></div>
                <?php foreach ($dias_activos as $d):
                    $count_dia = count($por_dia[$d]);
                ?>
                    <div class="ryt-cal-day-head" data-dia-head="<?php echo esc_attr(ryt_slug($d)); ?>">
                        <span class="font-serif italic text-[15px] text-ink-heading"><?php echo esc_html($dias_label[$d]); ?></span>
                        <span class="ml-1.5 font-sans not-italic text-[10.5px] font-bold text-ink-mute" data-dia-count><?php echo $count_dia; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Cuerpo del calendario: columna horas + columnas días -->
            <div class="ryt-cal-body grid"
                 style="grid-template-columns: 64px repeat(<?php echo count($dias_activos); ?>, minmax(0, 1fr));">

                <!-- Columna de horas (eje Y) -->
                <div class="ryt-cal-hours relative bg-paper-soft border-r border-[#EFEBE6]" style="height: <?php echo $cal_alto; ?>px;">
                    <?php for ($t = $cal_inicio; $t <= $cal_fin; $t += 60):
                        $top = (int) round(($t - $cal_inicio) * $pxmin);
                        $hh  = (int) floor($t / 60);
                    ?>
                        <div class="ryt-cal-hour-label" style="top: <?php echo $top; ?>px;">
                            <?php echo sprintf('%02d:00', $hh); ?>
                        </div>
                    <?php endfor; ?>
                </div>

                <!-- Columnas día -->
                <?php foreach ($dias_activos as $d): ?>
                    <div class="ryt-cal-day relative border-r border-[#EFEBE6] last:border-r-0"
                         data-dia="<?php echo esc_attr(ryt_slug($d)); ?>"
                         style="height: <?php echo $cal_alto; ?>px;">

                        <!-- Líneas horizontales cada hora -->
                        <?php for ($t = $cal_inicio + 60; $t < $cal_fin; $t += 60):
                            $top = (int) round(($t - $cal_inicio) * $pxmin);
                        ?>
                            <div class="ryt-cal-hourline" style="top: <?php echo $top; ?>px;"></div>
                        <?php endfor; ?>

                        <!-- Clases del día -->
                        <?php
                        // Ordenar por hora_inicio y resolver solapamientos en cada celda
                        $clases_dia = $por_dia[$d];
                        usort($clases_dia, fn($a, $b) => ryt_min($a['hora_inicio']) <=> ryt_min($b['hora_inicio']));

                        // Para clases que solapan en el tiempo, asignar "lane" (columna interna)
                        $lanes = []; // lanes[i] = hora_fin de la última clase en esa lane
                        $clases_con_lane = [];
                        foreach ($clases_dia as $c) {
                            $ini = ryt_min($c['hora_inicio']);
                            $fin = ryt_min($c['hora_fin']);
                            $lane_idx = 0;
                            while (isset($lanes[$lane_idx]) && $lanes[$lane_idx] > $ini) {
                                $lane_idx++;
                            }
                            $lanes[$lane_idx] = $fin;
                            $clases_con_lane[] = ['c' => $c, 'lane' => $lane_idx];
                        }
                        $total_lanes = max(1, count($lanes));

                        foreach ($clases_con_lane as $cl):
                            $c    = $cl['c'];
                            $lane = $cl['lane'];
                            $ini  = ryt_min($c['hora_inicio']);
                            $fin  = ryt_min($c['hora_fin']);
                            $top  = (int) round(($ini - $cal_inicio) * $pxmin);
                            $alto = max(40, (int) round(($fin - $ini) * $pxmin));
                            $width_pct = 100 / $total_lanes;
                            $left_pct  = $lane * $width_pct;
                            $color = ryt_estilo_color($c['estilo']);
                            $profes_slugs = array_map('ryt_slug', preg_split('/\s*&\s*/u', $c['profesores']));
                        ?>
                            <article class="ryt-cal-event"
                                     style="top: <?php echo $top; ?>px; height: <?php echo $alto; ?>px; left: calc(<?php echo $left_pct; ?>% + 3px); width: calc(<?php echo $width_pct; ?>% - 6px); background: <?php echo esc_attr($color); ?>1a; border-left: 3px solid <?php echo esc_attr($color); ?>;"
                                     data-estilo="<?php echo esc_attr(ryt_slug($c['estilo'])); ?>"
                                     data-nivel="<?php echo esc_attr(ryt_slug($c['nivel'])); ?>"
                                     data-dia="<?php echo esc_attr(ryt_slug($d)); ?>"
                                     data-profesores="<?php echo esc_attr(implode(' ', $profes_slugs)); ?>">
                                <div class="ryt-cal-event-inner">
                                    <p class="ryt-cal-time" style="color: <?php echo esc_attr($color); ?>;">
                                        <?php echo esc_html($c['hora_inicio']); ?>–<?php echo esc_html($c['hora_fin']); ?>
                                    </p>
                                    <p class="ryt-cal-title">
                                        <strong><?php echo esc_html($c['estilo']); ?></strong>
                                        <span><?php echo esc_html($c['nivel']); ?></span>
                                    </p>
                                    <p class="ryt-cal-meta">
                                        <?php echo esc_html($c['profesores']); ?>
                                    </p>
                                    <span class="ryt-cal-sala">
                                        <?php echo esc_html(str_replace('Sala ', 'Sala ', $c['sala'])); ?>
                                    </span>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Empty state -->
        <div id="ryt-horario-empty" class="hidden text-center py-16 max-w-md mx-auto">
            <svg class="w-20 h-20 mx-auto text-ryt-mint-glow mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <path d="M16 16s-1.5-2-4-2-4 2-4 2"/>
                <line x1="9" y1="9" x2="9.01" y2="9"/>
                <line x1="15" y1="9" x2="15.01" y2="9"/>
            </svg>
            <p class="text-ink-heading font-serif text-xl mb-2 italic">Vaya, nada por aquí…</p>
            <p class="text-ink-soft text-sm mb-6">
                No hay clases que coincidan con los filtros. Prueba a relajarlos o pregúntanos directamente.
            </p>
            <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero información sobre los horarios')); ?>"
               target="_blank" rel="noopener" class="btn btn-primary">
                Pregúntanos por WhatsApp
            </a>
        </div>

        <div class="text-center mt-10">
            <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">
                Ver horarios y tarifas
            </a>
        </div>
    </div>
</section>

<script>
(function () {
    const grid = document.getElementById('ryt-horario-grid');
    if (!grid) return;
    const filtros = document.querySelectorAll('#ryt-horario-filtros select');
    const empty   = document.getElementById('ryt-horario-empty');
    const clear   = document.getElementById('ryt-horario-clear');
    const countEl = document.querySelector('#ryt-horario-count [data-count]');
    const chips   = document.querySelectorAll('[data-legend]');

    function aplicar() {
        const vals = {};
        let activos = 0;
        filtros.forEach(s => {
            vals[s.dataset.filter] = s.value;
            if (s.value) activos++;
            s.parentElement.classList.toggle('is-active', !!s.value);
        });

        let total = 0;
        // Por día: contar visibles y resaltar/atenuar cabecera
        const visiblesPorDia = {};
        document.querySelectorAll('.ryt-cal-event').forEach(c => {
            const okDia    = !vals.dia      || c.dataset.dia === vals.dia;
            const okEstilo = !vals.estilo   || c.dataset.estilo === vals.estilo;
            const okNivel  = !vals.nivel    || c.dataset.nivel === vals.nivel;
            const okProf   = !vals.profesor || (c.dataset.profesores || '').split(' ').includes(vals.profesor);
            const ok = okDia && okEstilo && okNivel && okProf;
            c.classList.toggle('is-hidden', !ok);
            if (ok) {
                total++;
                visiblesPorDia[c.dataset.dia] = (visiblesPorDia[c.dataset.dia] || 0) + 1;
            }
        });
        document.querySelectorAll('[data-dia-head]').forEach(head => {
            const dia = head.dataset.diaHead;
            const cnt = visiblesPorDia[dia] || 0;
            const cntEl = head.querySelector('[data-dia-count]');
            if (cntEl) cntEl.textContent = cnt;
            head.classList.toggle('is-empty', cnt === 0);
        });

        if (countEl) countEl.textContent = total;
        empty.classList.toggle('hidden', total > 0);
        clear.classList.toggle('hidden', activos === 0);
    }

    filtros.forEach(s => s.addEventListener('change', aplicar));
    clear.addEventListener('click', () => {
        filtros.forEach(s => { s.value = ''; });
        aplicar();
    });

    // Click en chip de leyenda → filtra por ese estilo (toggle)
    chips.forEach(chip => {
        chip.addEventListener('click', () => {
            const sel = document.querySelector('#ryt-horario-filtros select[data-filter="estilo"]');
            sel.value = (sel.value === chip.dataset.legend) ? '' : chip.dataset.legend;
            aplicar();
        });
    });
})();
</script>
