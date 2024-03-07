<?php

//creacion de tabla por primera vez 
// Esta función crea la tabla de contactos en la base de datos de WordPress
function create_contact_form_table() {
    global $wpdb;
    $table_name = $wpdb->wp_ . 'contact_form_entries';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        names varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        nachrichte text NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
// Esta acción asegura que la tabla se cree cuando se active el tema o el plugin
register_activation_hook( __FILE__, 'create_contact_form_table' );


// Esta acción registra una nueva ruta REST para manejar la solicitud del formulario de contacto
add_action('rest_api_init', function () {
    register_rest_route('custom', '/contactform', array(
        'methods' => 'POST',
        'callback' => 'handle_contact_form_submission',
        'permission_callback' => 'rest_user_has_access'
    ));
});

// Esta función maneja la solicitud del formulario de contacto
function handle_contact_form_submission($request) {
    $params = $request->get_params();

    // Aquí puedes procesar y validar los datos recibidos del formulario
    $name = sanitize_text_field($params['names']);
    $email = sanitize_email($params['email']);
    $message = sanitize_textarea_field($params['message']);

    // Insertar los datos en la tabla de contactos
    global $wpdb;
    $table_name = $wpdb->wp_ . 'contact_form_entries';
    $wpdb->insert($table_name, array(
        'names' => $name,
        'email' => $email,
        'message' => $message
    ));

    // Devuelve una respuesta adecuada
    return new WP_REST_Response(array('message' => 'Formulario de contacto recibido con éxito.'), 200);
}



