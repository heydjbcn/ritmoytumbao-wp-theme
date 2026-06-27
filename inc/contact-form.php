<?php
/**
 * Endpoint del formulario de contacto del FAQ (admin-post.php?action=ryt_contact).
 *
 * - Nonce ryt_contact_nonce
 * - Honeypot field 'web' debe quedar vacío
 * - wp_mail() a info@ritmoytumbao-ds.es con respuesta-a del usuario
 * - Redirige a la home con ?contact=sent|error
 */
if (!defined('ABSPATH')) exit;

add_action('admin_post_nopriv_ryt_contact', 'ryt_handle_contact');
add_action('admin_post_ryt_contact', 'ryt_handle_contact');

function ryt_handle_contact() {
    $redirect_ok  = add_query_arg('contact', 'sent',  home_url('/#faq'));
    $redirect_err = add_query_arg('contact', 'error', home_url('/#faq'));

    // Validación nonce
    if (!isset($_POST['ryt_nonce']) || !wp_verify_nonce($_POST['ryt_nonce'], 'ryt_contact')) {
        wp_safe_redirect($redirect_err); exit;
    }
    // Honeypot
    if (!empty($_POST['web'])) {
        wp_safe_redirect($redirect_ok); exit; // simula éxito al bot
    }

    $nombre  = sanitize_text_field($_POST['nombre']  ?? '');
    $email   = sanitize_email($_POST['email']        ?? '');
    $tel     = sanitize_text_field($_POST['tel']     ?? '');
    $mensaje = sanitize_textarea_field($_POST['mensaje'] ?? '');

    if (!$nombre || !$email || !is_email($email) || !$mensaje) {
        wp_safe_redirect($redirect_err); exit;
    }

    $to      = RYT_EMAIL;
    $subject = sprintf('[Web] Mensaje de %s', $nombre);
    $body    = sprintf(
        "Nombre: %s\nEmail: %s\nTel: %s\n\nMensaje:\n%s\n",
        $nombre, $email, $tel ?: '—', $mensaje
    );
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $nombre . ' <' . $email . '>',
    ];

    $sent = wp_mail($to, $subject, $body, $headers);
    wp_safe_redirect($sent ? $redirect_ok : $redirect_err);
    exit;
}
