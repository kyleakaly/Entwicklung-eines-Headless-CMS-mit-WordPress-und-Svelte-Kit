<?php
/**
 * Plugin Name: My API Endpoints
 * Plugin URI: http://juanpabloappleton.ch
 * Description: This plugins handles the submissions for my API.
 * Version: 1.0
 * Author: Juan Pablo Appleton
 * Author URI: http://juanpabloappleton.ch
 */ 


//creacion de tabla por primera vez 
// Esta función crea la tabla de contactos en la base de datos de WordPress
function create_contact_form_table() {
    global $wpdb;
    $table_name = $wpdb->prefix  . 'contact_form_entries';

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
    register_rest_route('myroutes', '/contactform', array(
        'methods' => 'POST',
        'callback' => 'handle_contact_form_submission',
    ));
});

// Esta función maneja la solicitud del formulario de contacto
function handle_contact_form_submission($request) {
    $params = $request->get_params();

    // Aquí puedes procesar y validar los datos recibidos del formulario
    $name = sanitize_text_field($params['names']);
    $email = sanitize_email($params['email']);
    $message = sanitize_textarea_field($params['nachrichte']);

    // Insertar los datos en la tabla de contactos
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form_entries'; // Se corrige la concatenación del prefijo de la tabla
    $wpdb->insert($table_name, array(
        'names' => $name,
        'email' => $email,
        'nachrichte' => $message
    ));

    // Verificar si la inserción fue exitosa
    if ($wpdb->last_error) {
        return new WP_REST_Response(array('error' => 'Error al insertar en la base de datos'), 500);
    }

    // Devuelve los datos insertados junto con un mensaje de éxito
    return new WP_REST_Response(array(
        'message' => 'Formulario de contacto recibido con éxito.',
        'data' => array(
            'name' => $name,
            'email' => $email,
            'message' => $message
        )
    ), 200);
}

