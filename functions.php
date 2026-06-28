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

/* NAP oficial — datos confirmados (Mauri, jun 2026) */
define('RYT_BRAND_NAME',  'Ritmo y Tumbao Dance School');
define('RYT_PHONE_1',     '+34 661 503 303');
define('RYT_PHONE_2',     '+34 675 671 406'); // pendiente decidir si se mantiene
define('RYT_PHONE_LINK',  '34661503303');
define('RYT_ADDRESS_STREET', 'Carrer Josep Vicenç Foix, 51, Local 2');
define('RYT_ADDRESS_CP',     '08304');
define('RYT_ADDRESS_CITY',   'Mataró');
define('RYT_ADDRESS_REGION', 'Barcelona');
define('RYT_ADDRESS_COUNTRY','ES');
define('RYT_ADDRESS',        RYT_ADDRESS_STREET . ', ' . RYT_ADDRESS_CP . ' ' . RYT_ADDRESS_CITY . ' (' . RYT_ADDRESS_REGION . ')');
define('RYT_ADDRESS_MAPS',   'https://www.google.com/maps/search/?api=1&query=' . rawurlencode(RYT_ADDRESS_STREET . ', ' . RYT_ADDRESS_CP . ' ' . RYT_ADDRESS_CITY));
define('RYT_OFFICE_HOURS',   'De lunes a viernes: 18h - 23h');
define('RYT_EMAIL',          'info@ritmoytumbao-ds.es');

/* Redes (las 4 reales, incluyendo YouTube) */
define('RYT_INSTAGRAM', 'https://www.instagram.com/ritmoytumbao_/');
define('RYT_FACEBOOK',  'https://www.facebook.com/ritmoytumbao.escola');
define('RYT_YOUTUBE',   'https://www.youtube.com/user/TheRitmoytumbao');

/* Apps móviles — URLs reales pendientes (app en TestFlight / Firebase, Mauri actualizará al publicar) */
define('RYT_APP_IOS_URL',     'https://apps.apple.com/es/app/ritmo-y-tumbao/idPENDIENTE');
define('RYT_APP_ANDROID_URL', 'https://play.google.com/store/apps/details?id=es.ritmoytumbao.alumno');

/* CTAs principales */
define('RYT_WHATSAPP_MSG', 'Quisiera información sobre los cursos de Salsa, Bachata y otras disciplinas');
define('RYT_PREINSCRIPCION_URL', 'https://ritmoytumbao.playoffinformatica.com/preinscripcion/');
define('RYT_APP_URL', 'https://app.ritmoytumbao.es'); // panel alumno web (legacy, los alumnos usan ahora las apps móviles)

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
require_once RYT_DIR . '/inc/redirects.php';
require_once RYT_DIR . '/inc/schema.php';
