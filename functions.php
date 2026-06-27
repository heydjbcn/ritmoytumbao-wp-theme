<?php
/**
 * Ritmo y Tumbao 2026 — bootstrap del tema.
 */

if (!defined('ABSPATH')) {
    exit;
}

define('RYT_VERSION', '1.0.0');
define('RYT_DIR', get_template_directory());
define('RYT_URI', get_template_directory_uri());

/* Datos reales extraídos del prod (header + footer) */
define('RYT_PHONE_1',     '+34 661 503 303');
define('RYT_PHONE_2',     '+34 675 671 406');
define('RYT_PHONE_LINK',  '34661503303');
define('RYT_ADDRESS',     'Josep Vicenç Foix 51, 08301 Mataró (Barcelona)');
define('RYT_ADDRESS_MAPS','https://g.co/kgs/Dhv1sAQ');
define('RYT_OFFICE_HOURS','De lunes a viernes: 18h - 23h');
define('RYT_EMAIL',       'info@ritmoytumbao-ds.es');

/* Redes (las 4 reales, incluyendo YouTube) */
define('RYT_INSTAGRAM', 'https://www.instagram.com/ritmoytumbao_/');
define('RYT_FACEBOOK',  'https://www.facebook.com/ritmoytumbao.escola');
define('RYT_YOUTUBE',   'https://www.youtube.com/user/TheRitmoytumbao');

/* CTAs principales */
define('RYT_WHATSAPP_MSG', 'Quisiera información sobre los cursos de Salsa, Bachata y otras disciplinas');
define('RYT_PREINSCRIPCION_URL', 'https://ritmoytumbao.playoffinformatica.com/preinscripcion/');
define('RYT_APP_URL', 'https://app.ritmoytumbao.es'); // panel alumno (mismo color #62D8AC)

/**
 * Construye URL de WhatsApp para CTAs.
 * @param string $msg Texto adicional (opcional). Si está vacío, usa el mensaje genérico.
 */
function ryt_whatsapp_url(string $msg = ''): string {
    $text = $msg ?: RYT_WHATSAPP_MSG;
    return 'https://api.whatsapp.com/send?phone=' . RYT_PHONE_LINK . '&text=' . rawurlencode($text);
}

require_once RYT_DIR . '/inc/setup.php';
require_once RYT_DIR . '/inc/enqueue.php';
require_once RYT_DIR . '/inc/template-tags.php';
require_once RYT_DIR . '/inc/contact-form.php';
require_once RYT_DIR . '/inc/ciudad-landing.php';
