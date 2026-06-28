<?php
/**
 * Home (/) — replica la estructura del home de prod.
 *
 * Secciones (en orden, idénticas al actual):
 *   1. Hero          — h1 "Clases de Salsa y Bachata en Mataró"
 *   2. Pricing       — 3 cards (0€, 12€, 36,90€)
 *   3. Horarios      — Lun-Dom + CTA "¿Quieres reservar?"
 *   4. Estilos       — 4 cards: Bachata · Salsa · Formación · Coreográfico
 *   5. Profesores    — equipo
 *   6. Instalaciones — espacios equipados
 *   7. Reseñas       — testimoniales alumnos
 *   8. CTA           — "Aprende a bailar con nosotros"
 *   9. FAQs          — preguntas frecuentes
 *  10. Blog          — últimos posts
 */
get_header();
?>

<main id="content" class="bg-white">
    <?php
    get_template_part('template-parts/home/hero');
    get_template_part('template-parts/home/pilares');       // v9 NUEVO
    get_template_part('template-parts/home/estilos');
    get_template_part('template-parts/home/pricing');
    get_template_part('template-parts/home/horarios');
    get_template_part('template-parts/home/profesores');
    get_template_part('template-parts/home/instalaciones');
    get_template_part('template-parts/home/app-alumno');    // v9 NUEVO
    get_template_part('template-parts/home/resenas');
    get_template_part('template-parts/home/cta');
    get_template_part('template-parts/home/faq');
    get_template_part('template-parts/home/blog');
    ?>
</main>

<?php
get_footer();
