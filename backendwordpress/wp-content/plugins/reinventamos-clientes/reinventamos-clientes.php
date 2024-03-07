<?php

/*
    Plugin Name: reinventamos - clientes
    Plugin URI: http://appletoninteractive.ch
    Description: clientes hinzufügen reinventamos
    Version: 1.0.0
    Author: Juan Pablo Appleton
    Author URI: http://appletoninteractive.ch
    Text Domain: reinventamos
*/

if(!defined('ABSPATH')) die();

// Registrar Custom Post Type
function reinventamos_clientes_post_type() {

	$labels = array(
		'name'                  => _x( 'clientesreinventamos', 'Post Type General Name', 'reinventamos' ),
		'singular_name'         => _x( 'cliente', 'Post Type Singular Name', 'reinventamos' ),
		'menu_name'             => __( 'clientes reinventamos', 'reinventamos' ),
		'name_admin_bar'        => __( 'clientes', 'reinventamos' ),
		'archives'              => __( 'archives', 'reinventamos' ),
		'attributes'            => __( 'Attribute', 'reinventamos' ),
		'parent_item_colon'     => __( 'Elternklasse', 'reinventamos' ),
		'all_items'             => __( 'alle clientes', 'reinventamos' ),
		'add_new_item'          => __( 'clientes hinzufügen', 'reinventamos' ),
		'add_new'               => __( 'clientes hinzufügen', 'reinventamos' ),
		'new_item'              => __( 'clientes hinzufügen', 'reinventamos' ),
		'edit_item'             => __( 'clientes bearbeiten', 'reinventamos' ),
		'update_item'           => __( 'Update-clientes', 'reinventamos' ),
		'view_item'             => __( 'siehe clientes', 'reinventamos' ),
		'view_items'            => __( 'siehe Kunden', 'reinventamos' ),
		'search_items'          => __( 'Kunden suchen', 'reinventamos' ),
		'not_found'             => __( 'nicht gefunden', 'reinventamos' ),
		'not_found_in_trash'    => __( 'nicht gefunden in trash', 'reinventamos' ),
		'featured_image'        => __( 'herausragendes Bild', 'reinventamos' ),
		'set_featured_image'    => __( 'Beitragsbild speichern', 'reinventamos' ),
		'remove_featured_image' => __( 'Beitragsbild entfernen', 'reinventamos' ),
		'use_featured_image'    => __( 'als Beitragsbild verwenden', 'reinventamos' ),
		'insert_into_item'      => __( 'partner einfügen', 'reinventamos' ),
		'uploaded_to_this_item' => __( 'partner hinzufügen', 'reinventamos' ),
		'items_list'            => __( 'partnerliste', 'reinventamos' ),
		'items_list_navigation' => __( 'partnernavigation', 'reinventamos' ),
		'filter_items_list'     => __( 'partner filtern', 'reinventamos' ),
	);
	$args = array(
		'label'                 => __( 'cliente', 'reinventamos' ),
		'description'           => __( 'reinventamos-clientes', 'reinventamos'),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true, // true = posts , false = paginas
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'clientes_rein', $args );

}
add_action( 'init', 'reinventamos_clientes_post_type', 0 );