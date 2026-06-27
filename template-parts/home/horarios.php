<?php
/**
 * Horarios — widget real con 4 filtros (estilo / día / nivel / profesor) + grid por día.
 *
 * Datos: theme/data/horarios.json (extraído del widget rt-horario-clases de prod, 25 clases).
 * Filtros: JS vanilla que oculta tarjetas con display:none según data-* matching.
 *
 * NOTA: en una segunda fase migrar a CPT rt_clase para que Anaïs lo edite en wp-admin.
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
?>
<section class="section bg-white" id="horarios">
    <div class="container mx-auto px-4">
        <header class="text-center max-w-3xl mx-auto mb-10">
            <span class="pre-title">Horarios <?php echo esc_html(date('Y')); ?></span>
            <h2 class="text-ink-heading uppercase">Horario completo de la temporada</h2>
            <p class="text-base md:text-lg text-ink-soft mt-4">
                Filtra por estilo, día, nivel o profesor. Si tienes dudas, escríbenos por WhatsApp.
            </p>
        </header>

        <!-- Filtros -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8 max-w-5xl mx-auto"
             id="ryt-horario-filtros">
            <label class="block">
                <span class="sr-only">Filtrar por estilo</span>
                <select data-filter="estilo" class="w-full rounded-pill border border-paper-alt bg-paper-soft px-4 py-3 text-sm font-sans focus:outline-none focus:border-ryt-mint">
                    <option value="">Todos los estilos</option>
                    <?php foreach ($estilos as $e): ?>
                        <option value="<?php echo esc_attr(ryt_slug($e)); ?>"><?php echo esc_html($e); ?></option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label class="block">
                <span class="sr-only">Filtrar por día</span>
                <select data-filter="dia" class="w-full rounded-pill border border-paper-alt bg-paper-soft px-4 py-3 text-sm font-sans focus:outline-none focus:border-ryt-mint">
                    <option value="">Todos los días</option>
                    <?php foreach ($dias_orden as $d): ?>
                        <?php if (!empty($por_dia[$d])): ?>
                            <option value="<?php echo esc_attr(ryt_slug($d)); ?>"><?php echo esc_html($dias_label[$d]); ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </label>

            <label class="block">
                <span class="sr-only">Filtrar por nivel</span>
                <select data-filter="nivel" class="w-full rounded-pill border border-paper-alt bg-paper-soft px-4 py-3 text-sm font-sans focus:outline-none focus:border-ryt-mint">
                    <option value="">Todos los niveles</option>
                    <?php foreach ($niveles as $n): ?>
                        <option value="<?php echo esc_attr(ryt_slug($n)); ?>"><?php echo esc_html($n); ?></option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label class="block">
                <span class="sr-only">Filtrar por profesor</span>
                <select data-filter="profesor" class="w-full rounded-pill border border-paper-alt bg-paper-soft px-4 py-3 text-sm font-sans focus:outline-none focus:border-ryt-mint">
                    <option value="">Todos los profesores</option>
                    <?php foreach ($profesores as $p): ?>
                        <option value="<?php echo esc_attr(ryt_slug($p)); ?>"><?php echo esc_html($p); ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>

        <!-- Grid por día -->
        <div class="grid gap-6 lg:grid-cols-7" id="ryt-horario-grid">
            <?php foreach ($dias_orden as $d): ?>
                <?php if (empty($por_dia[$d])) continue; ?>
                <div class="ryt-dia-col" data-dia="<?php echo esc_attr(ryt_slug($d)); ?>">
                    <h3 class="font-serif text-center text-ink-heading uppercase border-b-2 border-ryt-mint pb-2 mb-4 text-base">
                        <?php echo esc_html($dias_label[$d]); ?>
                    </h3>
                    <div class="space-y-3">
                        <?php foreach ($por_dia[$d] as $c):
                            $profes_slugs = array_map('ryt_slug', preg_split('/\s*&\s*/u', $c['profesores']));
                        ?>
                        <article class="ryt-clase bg-paper-soft rounded-xl p-3 border border-paper-alt"
                                 data-estilo="<?php echo esc_attr(ryt_slug($c['estilo'])); ?>"
                                 data-nivel="<?php echo esc_attr(ryt_slug($c['nivel'])); ?>"
                                 data-profesores="<?php echo esc_attr(implode(' ', $profes_slugs)); ?>">
                            <p class="text-[10px] uppercase tracking-widest font-bold text-ryt-mint mb-1">
                                <?php echo esc_html($c['hora_inicio']); ?> – <?php echo esc_html($c['hora_fin']); ?>
                            </p>
                            <p class="font-sans font-bold text-sm text-ink-heading leading-tight">
                                <?php echo esc_html($c['estilo']); ?> <?php echo esc_html($c['nivel']); ?>
                            </p>
                            <p class="text-xs text-ink-soft mt-1"><?php echo esc_html($c['profesores']); ?></p>
                            <p class="text-[10px] uppercase text-ink-mute mt-1"><?php echo esc_html($c['sala']); ?></p>
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <p id="ryt-horario-empty" class="hidden text-center text-ink-soft py-12">
            No hay clases que coincidan con los filtros seleccionados.
            <a href="<?php echo esc_url(ryt_whatsapp_url('Hola! Quiero información sobre los horarios')); ?>" class="text-ryt-mint hover:underline">
                Pregúntanos por WhatsApp
            </a>.
        </p>

        <div class="text-center mt-12">
            <a href="<?php echo esc_url(home_url('/horarios-y-tarifas/')); ?>" class="btn btn-primary">
                Ver horarios y tarifas
            </a>
        </div>
    </div>
</section>

<script>
(function () {
    const root = document.getElementById('ryt-horario-grid');
    if (!root) return;
    const filtros = document.querySelectorAll('#ryt-horario-filtros select');
    const empty = document.getElementById('ryt-horario-empty');

    function aplicar() {
        const vals = {};
        filtros.forEach(s => { vals[s.dataset.filter] = s.value; });
        let visibles = 0;
        document.querySelectorAll('.ryt-dia-col').forEach(col => {
            const diaFiltro = vals.dia;
            const colDia = col.dataset.dia;
            const matchDia = !diaFiltro || diaFiltro === colDia;
            let colVisibles = 0;
            col.querySelectorAll('.ryt-clase').forEach(c => {
                const matchEstilo  = !vals.estilo  || c.dataset.estilo === vals.estilo;
                const matchNivel   = !vals.nivel   || c.dataset.nivel === vals.nivel;
                const matchProf    = !vals.profesor|| (c.dataset.profesores || '').split(' ').includes(vals.profesor);
                const ok = matchDia && matchEstilo && matchNivel && matchProf;
                c.style.display = ok ? '' : 'none';
                if (ok) { colVisibles++; visibles++; }
            });
            col.style.display = colVisibles > 0 ? '' : 'none';
        });
        empty.classList.toggle('hidden', visibles > 0);
    }

    filtros.forEach(s => s.addEventListener('change', aplicar));
})();
</script>
