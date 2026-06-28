<?php
/**
 * Horarios — widget visualmente refinado (v7.4)
 *
 * Filtros: estilo / día / nivel / profesor (JS vanilla con data-*).
 * Datos: theme/data/horarios.json (25 clases reales).
 *
 * Refinamientos v7.4:
 *   - Barra lateral 4px de color por estilo
 *   - Sala como badge pill arriba a la derecha
 *   - Headers de día serif italic + contador de clases
 *   - Filtros con iconos SVG inline + indicador activo + botón limpiar
 *   - Animación fade+scale al filtrar
 *   - Empty state con SVG ilustrativo
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

/**
 * Helper: color de acento por estilo (barra lateral de las cards).
 */
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

$total_clases = count($clases);
?>
<section class="section bg-white" id="horarios">
    <div class="container mx-auto px-4 max-w-[1280px]">
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
                <!-- Estilo -->
                <label class="ryt-filtro-pill">
                    <span class="ryt-filtro-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M2 12h20"/></svg>
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

                <!-- Día -->
                <label class="ryt-filtro-pill">
                    <span class="ryt-filtro-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                    </span>
                    <select data-filter="dia" aria-label="Filtrar por día">
                        <option value="">Todos los días</option>
                        <?php foreach ($dias_orden as $d): ?>
                            <?php if (!empty($por_dia[$d])): ?>
                                <option value="<?php echo esc_attr(ryt_slug($d)); ?>"><?php echo esc_html($dias_label[$d]); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <span class="ryt-filtro-chev" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </span>
                </label>

                <!-- Nivel -->
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

                <!-- Profesor -->
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

            <!-- Acciones (contador + limpiar) -->
            <div class="flex items-center justify-between mt-4 text-xs">
                <span id="ryt-horario-count" class="text-ink-soft">
                    <strong class="font-bold text-ryt-mint" data-count><?php echo (int) $total_clases; ?></strong>
                    <span class="lowercase">clases disponibles</span>
                </span>
                <button type="button" id="ryt-horario-clear"
                        class="hidden text-ryt-mint hover:text-ryt-mint-dark font-bold uppercase tracking-widest text-[11px] inline-flex items-center gap-1.5 transition-colors">
                    <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                    Limpiar filtros
                </button>
            </div>
        </div>

        <!-- Grid por día -->
        <div class="grid gap-5 lg:grid-cols-6" id="ryt-horario-grid">
            <?php foreach ($dias_orden as $d):
                if (empty($por_dia[$d])) continue;
                $count_dia = count($por_dia[$d]);
            ?>
                <div class="ryt-dia-col" data-dia="<?php echo esc_attr(ryt_slug($d)); ?>">
                    <h3 class="flex items-baseline justify-center gap-2 font-serif italic text-[17px] text-ink-heading border-b-2 border-ryt-mint pb-2.5 mb-4">
                        <span><?php echo esc_html($dias_label[$d]); ?></span>
                        <span class="font-sans not-italic font-bold text-[11px] text-ink-mute" data-dia-count>(<?php echo $count_dia; ?>)</span>
                    </h3>
                    <div class="space-y-3">
                        <?php foreach ($por_dia[$d] as $c):
                            $profes_slugs = array_map('ryt_slug', preg_split('/\s*&\s*/u', $c['profesores']));
                            $color = ryt_estilo_color($c['estilo']);
                        ?>
                        <article class="ryt-clase ryt-clase-card relative bg-white rounded-[14px] border border-[#EFEBE6] pl-4 pr-3 py-3 cursor-default"
                                 style="border-left: 4px solid <?php echo esc_attr($color); ?>;"
                                 data-estilo="<?php echo esc_attr(ryt_slug($c['estilo'])); ?>"
                                 data-nivel="<?php echo esc_attr(ryt_slug($c['nivel'])); ?>"
                                 data-profesores="<?php echo esc_attr(implode(' ', $profes_slugs)); ?>">

                            <!-- Sala como badge en esquina sup. derecha -->
                            <span class="absolute top-2 right-2 inline-flex items-center text-[9.5px] font-bold uppercase tracking-[0.08em] text-ink-soft bg-paper-alt rounded-full px-2 py-[3px]">
                                <?php echo esc_html(str_replace('Sala ', 'S', $c['sala'])); ?>
                            </span>

                            <p class="text-[10.5px] uppercase tracking-[0.08em] font-bold text-ryt-mint mb-1 inline-flex items-center gap-1">
                                <svg class="w-2.5 h-2.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                                <?php echo esc_html($c['hora_inicio']); ?>–<?php echo esc_html($c['hora_fin']); ?>
                            </p>

                            <p class="font-sans font-bold text-[13.5px] text-ink-heading leading-[1.25] mt-1">
                                <?php echo esc_html($c['estilo']); ?>
                                <span class="font-normal text-ink-soft"><?php echo esc_html($c['nivel']); ?></span>
                            </p>

                            <p class="text-[11.5px] text-ink-soft mt-1.5 inline-flex items-center gap-1">
                                <svg class="w-2.5 h-2.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="3.5"/><path d="M5 21a7 7 0 0 1 14 0"/></svg>
                                <?php echo esc_html($c['profesores']); ?>
                            </p>
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
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
                No hay clases que coincidan con los filtros que has elegido. Prueba a relajarlos o pregúntanos directamente.
            </p>
            <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero información sobre los horarios')); ?>"
               target="_blank" rel="noopener" class="btn btn-primary">
                Pregúntanos por WhatsApp
            </a>
        </div>

        <div class="text-center mt-12">
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

    function aplicar() {
        const vals = {};
        let activos = 0;
        filtros.forEach(s => {
            vals[s.dataset.filter] = s.value;
            if (s.value) activos++;
            s.parentElement.classList.toggle('is-active', !!s.value);
        });

        let total = 0;
        document.querySelectorAll('.ryt-dia-col').forEach(col => {
            const colDia = col.dataset.dia;
            const matchDia = !vals.dia || vals.dia === colDia;
            let colVisibles = 0;
            col.querySelectorAll('.ryt-clase').forEach(c => {
                const okEstilo  = !vals.estilo   || c.dataset.estilo === vals.estilo;
                const okNivel   = !vals.nivel    || c.dataset.nivel === vals.nivel;
                const okProf    = !vals.profesor || (c.dataset.profesores || '').split(' ').includes(vals.profesor);
                const ok = matchDia && okEstilo && okNivel && okProf;
                c.classList.toggle('is-hidden', !ok);
                if (ok) { colVisibles++; total++; }
            });
            col.classList.toggle('is-hidden', colVisibles === 0);
            const cdc = col.querySelector('[data-dia-count]');
            if (cdc) cdc.textContent = '(' + colVisibles + ')';
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
})();
</script>
