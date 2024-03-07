<?php


function init_template()
{
    //imagen destacada
    add_theme_support('post-thumbnails');
    //titulo para seo
    add_theme_support('title-tag');
    add_theme_support('custom-logo', array(
      'height'      => 100,
    'width'       => 600,
    'flex-height' => true,
    'flex-width'  => true,
    ));

    register_nav_menus(
        array(
            'menuprincipal' => esc_html__( 'Hauptnavigation', 'reinventamos' ),
            'submenu' => esc_html__( 'SubMenu', 'reinventamos' ),
            'redessociales' => esc_html__( 'RedesSociales - Navigation', 'reinventamos' ),
            'menuprincipalsoloclick' => esc_html__( 'Hauptmenü nur ein click Navigation', 'reinventamos' ),
        )
    );
}

add_action('after_setup_theme', 'init_template');

function registrar_sidebar()
{
    register_sidebar(array(
        'name' => 'Pie de página',
        'id'  => 'footer',
        'description' => 'Zona de Widgets para pie de página',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<p>',
        'after_title'   => '</p>',
    ));
}

add_action('widgets_init', 'registrar_sidebar');




    //Gutenberg deaktivieren

add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
return false;
}



function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
   }
   add_filter('upload_mimes', 'cc_mime_types');


//    $post_id = 10;
//    $meta_key = 'parrafo-1';
//    $meta_value = 'Reinventamos';
//    update_post_meta($post_id, $meta_key, $meta_value);


//cunston fields

function custom_meta_description() {
    if (is_single() || is_page()) {
      global $post;
      $description = get_post_meta($post->ID, 'Beschreibungfurseo', true);
      if (!empty($description)) {
        echo '<meta name="description" content="' . $description . '">';
      } else {
        $description = strip_tags($post->post_content);
        $description = str_replace("\n", "", $description);
        $description = substr($description, 0, 155);
        echo '<meta name="description" content="' . $description . '">';
      }
    } elseif (is_home()) {
      echo '<meta name="description" content="'.get_bloginfo( "description" ).'">';
    } elseif (is_category()) {
      echo '<meta name="description" content="Archivo de la categoría: ' . single_cat_title('', false) . '">';
    } elseif (is_tag()) {
      echo '<meta name="description" content="Archivo de la etiqueta: ' . single_tag_title('', false) . '">';
    }
  }
  add_action('wp_head', 'custom_meta_description');


  // Modificar respuesta JSON para incluir URL de imagen destacada
add_filter('rest_prepare_post', 'custom_prepare_post', 10, 3);

function custom_prepare_post($data, $post, $request) {
    $featured_image_id = $data->data['featured_media']; // ID de la imagen destacada
    if ($featured_image_id) {
        $featured_image_url = wp_get_attachment_image_src($featured_image_id, 'full'); // Obtener URL de la imagen
        $data->data['featured_image_url'] = $featured_image_url[0]; // Agregar URL de la imagen a la respuesta JSON
    } else {
        $data->data['featured_image_url'] = ''; // Si no hay imagen, establecer URL vacía
    }
    return $data;
}


add_filter('rest_authentication_errors', function($result) {
   if (!empty($result)) {
       return $result;
   }

   // Verifica el origen de la solicitud
   $allowed_origin = 'http://localhost:5173'; // Reemplaza con el origen de tu frontend
   $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

  // Si la solicitud proviene del frontend permitido, permite la solicitud
  if ($origin === $allowed_origin) {
       return $result;   }

  // Si el origen no está permitido, devuelve un error
 return new WP_Error('rest_invalid_domain', 'Invalid domain.', array('status' => 403));
 });



function get_logo_src() {
  $size = 'full';
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $feat_img_array = wp_get_attachment_image_src($custom_logo_id, $size, true);
  return $feat_img_array[0];
}



function get_menu_name() {
  return wp_get_nav_menu_items('erstelleneinemenu');
}

function get_custom_logo_and_menu() {
  // Obtener datos del menú
  $menu_items = get_menu_name();

  // Obtener datos del logo personalizado
  $custom_logo_data = get_logo_src();

  // Combinar datos del menú y del logo en un arreglo
  $data = array(
      'menu_items' => $menu_items,
      'custom_logo' => $custom_logo_data
  );

  // Devolver los datos combinados
  return $data;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'myroutes', '/menu-and-logo', array(
      'methods' => 'GET',
      'callback' => 'get_custom_logo_and_menu',
  ) );
} );


// //clientes cumston post type in rest api
// // Registrar una ruta REST personalizada para obtener los clientes
// add_action('rest_api_init', function () {
//   register_rest_route('myroutes', '/clientes', array(
//       'methods' => 'GET',
//       'callback' => 'get_clientes',
//   ));
// });

// // Definir la función de devolución de llamada para obtener los clientes
// function get_clientes() {
//   // Obtener los clientes utilizando WP_Query
//   $clientes_query = new WP_Query(array(
//       'post_type' => 'clientes_rein',
//       'posts_per_page' => -1, // Obtener todos los clientes
//   ));

//   // Array para almacenar los datos de los clientes
//   $clientes = array();

//   // Loop a través de los resultados de la consulta y construir el array de clientes
//   if ($clientes_query->have_posts()) {
//       while ($clientes_query->have_posts()) {
//           $clientes_query->the_post();

//           // Obtener los datos del cliente actual
//           $cliente_data = array(
//               'id' => get_the_ID(),
//               'title' => get_the_title(),
//               'content' => get_the_content(),
//               // Agrega más campos personalizados aquí si es necesario
//           );

//           // Agregar datos del cliente al array de clientes
//           $clientes[] = $cliente_data;
//       }
//   }

//   // Restaurar datos del cliente
//   wp_reset_postdata();

//   // Devolver los datos de los clientes en formato JSON
//   return $clientes;
// }


// Registrar una ruta REST personalizada para obtener los clientes y los servicios
add_action('rest_api_init', function () {
  register_rest_route('myroutes', '/datos', array(
      'methods' => 'GET',
      'callback' => 'get_datos',
  ));
});

// Definir la función de devolución de llamada para obtener los clientes y los servicios
function get_datos() {
  // Array para almacenar todos los datos
  $datos = array();

  // Obtener clientes utilizando WP_Query
  $clientes_query = new WP_Query(array(
      'post_type' => 'clientes_rein',
      'posts_per_page' => -1, // Obtener todos los clientes
  ));

  // Obtener servicios utilizando WP_Query
  $servicios_query = new WP_Query(array(
      'post_type' => 'dienst_rein',
      'posts_per_page' => -1, // Obtener todos los servicios
  ));

  // Agregar datos de clientes al array de datos
  if ($clientes_query->have_posts()) {
      while ($clientes_query->have_posts()) {
          $clientes_query->the_post();
          $cliente_data = array(
              'id' => get_the_ID(),
              'title' => get_the_title(),
              'content' => get_the_content(),
              // Agregar más campos personalizados aquí si es necesario
          );
          $datos[] = $cliente_data;
      }
  }

  // Agregar datos de servicios al array de datos
  if ($servicios_query->have_posts()) {
      while ($servicios_query->have_posts()) {
          $servicios_query->the_post();
          $servicio_data = array(
              'id' => get_the_ID(),
              'title' => get_the_title(),
              'content' => get_the_content(),
              // Agregar más campos personalizados aquí si es necesario
          );
          $datos[] = $servicio_data;
      }
  }

  // Restaurar datos del cliente y del servicio
  wp_reset_postdata();

  // Devolver todos los datos en formato JSON
  return $datos;
}

///////TAGS EN NOMBRE

function ag_filter_post_json($response, $post, $context) {
  $tags = wp_get_post_tags($post->ID);
  $response->data['tag_names'] = [];

  foreach ($tags as $tag) {
      $response->data['tag_names'][] = $tag->name;
  }

  return $response;
}

add_filter( 'rest_prepare_post', 'ag_filter_post_json', 10, 3 );


//formulario rest api
//codigo



