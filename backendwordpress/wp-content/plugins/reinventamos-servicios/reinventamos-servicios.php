<?php

/*
    Plugin Name: reinventamos - dienstleistungen
    Plugin URI: http://appletoninteractive.ch
    Description: Dienstleistungen hinzufügen reinventamos
    Version: 1.0.0
    Author: Juan Pablo Appleton
    Author URI: http://appletoninteractive.ch
    Text Domain: reinventamos
*/

if(!defined('ABSPATH')) die();

// Registrar Custom Post Type
function reinventamos_dienstleistungen_post_type() {

	$labels = array(
		'name'                  => _x( 'dienstleistungenreinventamos', 'Post Type General Name', 'reinventamos' ),
		'singular_name'         => _x( 'dienstleistunge', 'Post Type Singular Name', 'reinventamos' ),
		'menu_name'             => __( 'dienstleistungen reinventamos', 'reinventamos' ),
		'name_admin_bar'        => __( 'dienstleistungen', 'reinventamos' ),
		'archives'              => __( 'archives', 'reinventamos' ),
		'attributes'            => __( 'Attribute', 'reinventamos' ),
		'parent_item_colon'     => __( 'Elternklasse', 'reinventamos' ),
		'all_items'             => __( 'alle dienstleistungen', 'reinventamos' ),
		'add_new_item'          => __( 'dienstleistungen hinzufügen', 'reinventamos' ),
		'add_new'               => __( 'dienstleistungen hinzufügen', 'reinventamos' ),
		'new_item'              => __( 'dienstleistungen hinzufügen', 'reinventamos' ),
		'edit_item'             => __( 'dienstleistungen bearbeiten', 'reinventamos' ),
		'update_item'           => __( 'Update-dienstleistungen', 'reinventamos' ),
		'view_item'             => __( 'siehe dienstleistungen', 'reinventamos' ),
		'view_items'            => __( 'siehe dienstleistungen', 'reinventamos' ),
		'search_items'          => __( 'dienstleistungen suchen', 'reinventamos' ),
		'not_found'             => __( 'nicht gefunden', 'reinventamos' ),
		'not_found_in_trash'    => __( 'nicht gefunden in trash', 'reinventamos' ),
		'featured_image'        => __( 'herausragendes Bild', 'reinventamos' ),
		'set_featured_image'    => __( 'Beitragsbild speichern', 'reinventamos' ),
		'remove_featured_image' => __( 'Beitragsbild entfernen', 'reinventamos' ),
		'use_featured_image'    => __( 'als Beitragsbild verwenden', 'reinventamos' ),
		'insert_into_item'      => __( 'dienstleistungen einfügen', 'reinventamos' ),
		'uploaded_to_this_item' => __( 'dienstleistungen hinzufügen', 'reinventamos' ),
		'items_list'            => __( 'dienstleistungenliste', 'reinventamos' ),
		'items_list_navigation' => __( 'dienstleistungennavigation', 'reinventamos' ),
		'filter_items_list'     => __( 'dienstleistungen filtern', 'reinventamos' ),
	);
	$args = array(
		'label'                 => __( 'dienstleistungen', 'reinventamos' ),
		'description'           => __( 'reinventamos-Dienstleistungen', 'reinventamos'),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true, // true = posts , false = paginas
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-screenoptions',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'dienst_rein', $args);

}
add_action( 'init', 'reinventamos_dienstleistungen_post_type', 0 );