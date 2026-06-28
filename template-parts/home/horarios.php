<?php
/**
 * Horarios — TABLA CLÁSICA (v7.6)
 *
 * Una sola tabla grande con todas las clases. Columnas: Día / Hora /
 * Estilo / Nivel / Profesores / Sala. Filas alternadas zebra y bordes
 * finos, como un horario impreso de escuela de toda la vida.
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
            'salsa'             => '#E76F51',
            'bachata'           => '#E9A23B',
            'bachata fusión'    => '#9C7FCE',
            'casino'            => '#62D8AC',
            'casino con timba'  => '#3FB389',
            'lady style'        => '#E5739F',
            'pasos libres'      => '#5A8FA5',
        ];
        $k = mb_strtolower($estilo, 'UTF-8');
        return $map[$k] ?? '#62D8AC';
    }
}

// Ordenar clases por día (orden de la semana) → hora_inicio → estilo
function ryt_min($hhmm) {
    [$h, $m] = array_map('intval', explode(':', $hhmm));
    return $h * 60 + $m;
}
$orden_dia_idx = array_flip($dias_orden);
$clases_ordenadas = $clases;
usort($clases_ordenadas, function ($a, $b) use ($orden_dia_idx) {
    $da = $orden_dia_idx[$a['dia'] === 'miercoles' ? 'miércoles' : ($a['dia'] === 'sabado' ? 'sábado' : $a['dia'])] ?? 9;
    $db = $orden_dia_idx[$b['dia'] === 'miercoles' ? 'miércoles' : ($b['dia'] === 'sabado' ? 'sábado' : $b['dia'])] ?? 9;
    if ($da !== $db) return $da - $db;
    return ryt_min($a['hora_inicio']) - ryt_min($b['hora_inicio']);
});

$total_clases = count($clases);
?>
<section class="section bg-paper" id="horarios">
    <div class="container mx-auto px-4 max-w-[1180px]">
        <header class="text-center max-w-3xl mx-auto mb-10">
            <span class="pre-title">Horarios <?php echo esc_html(date('Y')); ?></span>
            <h2 class="text-ink-heading uppercase">Horario completo de la temporada</h2>
            <p class="text-base md:text-lg text-ink-soft mt-4">
                Filtra por estilo, día, nivel o profesor. Si tienes dudas, escríbenos por WhatsApp.
            </p>
        </header>

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
                        <?php foreach ($dias_orden as $d):
                            $hay = count(array_filter($clases, fn($c) => ($c['dia'] === 'miercoles' ? 'miércoles' : ($c['dia'] === 'sabado' ? 'sábado' : $c['dia'])) === $d));
                            if ($hay):
                        ?>
                            <option value="<?php echo esc_attr(ryt_slug($d)); ?>"><?php echo esc_html($dias_label[$d]); ?></option>
                        <?php endif; endforeach; ?>
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

        <!-- Tabla clásica -->
        <div class="ryt-tabla-wrap bg-white rounded-[18px] border border-[#EFEBE6] shadow-card-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="ryt-tabla w-full" id="ryt-horario-grid">
                    <thead>
                        <tr>
                            <th class="ryt-th text-left w-[110px]">Hora</th>
                            <th class="ryt-th text-left">Clase</th>
                            <th class="ryt-th text-left">Profesores</th>
                            <th class="ryt-th text-center w-[100px]">Sala</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dia_actual = null;
                        foreach ($clases_ordenadas as $c):
                            $d_key = $c['dia'] === 'miercoles' ? 'miércoles' : ($c['dia'] === 'sabado' ? 'sábado' : $c['dia']);
                            $primera_fila_del_dia = ($d_key !== $dia_actual);
                            $dia_actual = $d_key;
                            $color = ryt_estilo_color($c['estilo']);
                            $profes_slugs = array_map('ryt_slug', preg_split('/\s*&\s*/u', $c['profesores']));
                        ?>
                            <?php if ($primera_fila_del_dia): ?>
                            <tr class="ryt-tr-grupo" data-dia-grupo="<?php echo esc_attr(ryt_slug($d_key)); ?>">
                                <td class="ryt-td-grupo" colspan="4">
                                    <span class="ryt-grupo-dia"><?php echo esc_html($dias_label[$d_key]); ?></span>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr class="ryt-tr"
                                data-estilo="<?php echo esc_attr(ryt_slug($c['estilo'])); ?>"
                                data-nivel="<?php echo esc_attr(ryt_slug($c['nivel'])); ?>"
                                data-dia="<?php echo esc_attr(ryt_slug($d_key)); ?>"
                                data-profesores="<?php echo esc_attr(implode(' ', $profes_slugs)); ?>">

                                <td class="ryt-td ryt-td-hora">
                                    <span class="text-[14px] font-bold tabular-nums tracking-tight text-ink-heading">
                                        <?php echo esc_html($c['hora_inicio']); ?>
                                    </span>
                                    <span class="text-[11px] text-ink-mute block tabular-nums">
                                        <?php echo esc_html($c['hora_fin']); ?>
                                    </span>
                                </td>
                                <td class="ryt-td">
                                    <span class="ryt-dot" style="background: <?php echo esc_attr($color); ?>;" aria-hidden="true"></span>
                                    <span class="font-bold text-ink-heading"><?php echo esc_html($c['estilo']); ?></span>
                                    <span class="text-ink-soft"><?php echo esc_html($c['nivel']); ?></span>
                                </td>
                                <td class="ryt-td text-ink-soft">
                                    <?php echo esc_html($c['profesores']); ?>
                                </td>
                                <td class="ryt-td text-center">
                                    <span class="ryt-badge-sala">
                                        <?php echo esc_html($c['sala']); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
    const tabla = document.getElementById('ryt-horario-grid');
    if (!tabla) return;
    const filtros = document.querySelectorAll('#ryt-horario-filtros select');
    const empty   = document.getElementById('ryt-horario-empty');
    const clear   = document.getElementById('ryt-horario-clear');
    const countEl = document.querySelector('#ryt-horario-count [data-count]');

    function aplicar() {
        const vals = {};
        let activos = 0;
        filtros.forEach(s => {
            vals[s.dataset.filter] = s.value;
            if (s.value) activos++;
            s.parentElement.classList.toggle('is-active', !!s.value);
        });

        let total = 0;
        // Visibles por día (para esconder la cabecera de grupo si está vacío)
        const visiblesPorDia = {};
        tabla.querySelectorAll('.ryt-tr').forEach(tr => {
            const okDia    = !vals.dia      || tr.dataset.dia === vals.dia;
            const okEstilo = !vals.estilo   || tr.dataset.estilo === vals.estilo;
            const okNivel  = !vals.nivel    || tr.dataset.nivel === vals.nivel;
            const okProf   = !vals.profesor || (tr.dataset.profesores || '').split(' ').includes(vals.profesor);
            const ok = okDia && okEstilo && okNivel && okProf;
            tr.classList.toggle('is-hidden', !ok);
            if (ok) {
                total++;
                visiblesPorDia[tr.dataset.dia] = (visiblesPorDia[tr.dataset.dia] || 0) + 1;
            }
        });
        // Ocultar cabecera de grupo si el día no tiene visibles
        tabla.querySelectorAll('.ryt-tr-grupo').forEach(g => {
            const dia = g.dataset.diaGrupo;
            g.classList.toggle('is-hidden', !visiblesPorDia[dia]);
        });

        if (countEl) countEl.textContent = total;
        empty.classList.toggle('hidden', total > 0);
        clear.classList.toggle('hidden', activos === 0);
    }

    // Estado inicial: marcar las primeras visibles
    aplicar();

    filtros.forEach(s => s.addEventListener('change', aplicar));
    clear.addEventListener('click', () => {
        filtros.forEach(s => { s.value = ''; });
        aplicar();
    });
})();
</script>
