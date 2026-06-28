<?php
/**
 * Banda de Pilares v9 (NUEVA, Cloud Design v2).
 *
 * Banda completa mint con 4 items horizontales separados por border-right.
 * Cada item: icono SVG circular + texto pilar.
 */
$pilares = [
    [
        'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><polyline points="20 6 9 17 4 12"/></svg>',
        'text' => 'Primera clase GRATIS',
    ],
    [
        'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        'text' => 'No necesitas pareja',
    ],
    [
        'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18M9 16l2 2 4-4"/></svg>',
        'text' => 'Sin matrícula ni permanencia',
    ],
    [
        'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>',
        'text' => 'Más de 15 años enseñando',
    ],
];
?>
<section class="bg-ryt-mint">
    <div class="max-w-[1320px] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($pilares as $p): ?>
            <div class="ryt-pilar">
                <span class="ryt-pilar-icon"><?php echo $p['icon']; ?></span>
                <span class="ryt-pilar-text"><?php echo esc_html($p['text']); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>
