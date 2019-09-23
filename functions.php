<?php

/**************************************
    ESTILOS Y SCRIPTS
**************************************/
function theme_vpsite_style_scripts() {
    wp_enqueue_style( 'style-vpsite', get_stylesheet_directory_uri(), array(), '1.0.0', false );
    wp_enqueue_style( 'superslidescss', get_template_directory_uri() . '/css/superslides.css' );
    wp_enqueue_style( 'enlacescss', get_template_directory_uri() . '/css/enlaces.css' );
    wp_enqueue_script( 'script-vpsite', get_template_directory_uri() . '/scripts/scripts.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_vpsite_style_scripts' );

/**************************************
    REGISTER MENU
**************************************/
add_action( 'after_setup_theme', 'register_custom_nav_menus' );
function register_custom_nav_menus() {
	register_nav_menus( array(
		'main_menu' => 'Main Menú',
		'footer_menu' => 'Footer Menú',
		'privacy_menu' => 'Privacy Menú',
	) );
}

/**************************************
    SUPPORTS THEME
**************************************/
add_post_type_support( 'slide', 'thumbnail' );

add_theme_support( 'post-thumbnails' ); 

function themename_custom_logo_setup() {
	$defaults = array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

/**************************************
    POST TYPE SLIDER
**************************************/
add_action( 'init', 'codex_slides_init' );
/**
 * Register a slides post type.
 *
 */
function codex_slides_init() {
	$labels = array(
		'name'               => _x( 'Slides', 'post type general name', 'vpsite' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', 'vpsite' ),
		'menu_name'          => _x( 'Slides', 'admin menu', 'vpsite' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'vpsite' ),
		'add_new'            => _x( 'Add New', 'Slide', 'vpsite' ),
		'add_new_item'       => __( 'Add New Slide', 'vpsite' ),
		'new_item'           => __( 'New Slide', 'vpsite' ),
		'edit_item'          => __( 'Edit Slide', 'vpsite' ),
		'view_item'          => __( 'View Slide', 'vpsite' ),
		'all_items'          => __( 'All Slides', 'vpsite' ),
		'search_items'       => __( 'Search Slides', 'vpsite' ),
		'parent_item_colon'  => __( 'Parent Slides:', 'vpsite' ),
		'not_found'          => __( 'No slides found.', 'vpsite' ),
		'not_found_in_trash' => __( 'No slides found in Trash.', 'vpsite' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'vpsite' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slide' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null
	);

	register_post_type( 'slide', $args );
}

/**************************************
    POST TYPE EVENTOS
**************************************/
add_action( 'init', 'codex_eventos_init' );
/**
 * Register a eventos post type.
 *
 */
function codex_eventos_init() {
	$labels = array(
		'name'               => _x( 'Eventos', 'post type general name', 'vpsite' ),
		'singular_name'      => _x( 'Evento', 'post type singular name', 'vpsite' ),
		'menu_name'          => _x( 'Eventos', 'admin menu', 'vpsite' ),
		'name_admin_bar'     => _x( 'Evento', 'add new on admin bar', 'vpsite' ),
		'add_new'            => _x( 'Add New', 'Evento', 'vpsite' ),
		'add_new_item'       => __( 'Add New Evento', 'vpsite' ),
		'new_item'           => __( 'New Eventos', 'vpsite' ),
		'edit_item'          => __( 'Edit Evento', 'vpsite' ),
		'view_item'          => __( 'View Evento', 'vpsite' ),
		'all_items'          => __( 'All Eventos', 'vpsite' ),
		'search_items'       => __( 'Search Eventos', 'vpsite' ),
		'parent_item_colon'  => __( 'Parent Eventos:', 'vpsite' ),
		'not_found'          => __( 'No Eventos found.', 'vpsite' ),
		'not_found_in_trash' => __( 'No Eventos found in Trash.', 'vpsite' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'vpsite' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'evento' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null
	);

	register_post_type( 'evento', $args );
}

/**************************************
    POST TYPE PROGRAMAS
**************************************/
add_action( 'init', 'codex_programas_init' );
/**
 * Register a programas post type.
 *
 */
function codex_programas_init() {
	$labels = array(
		'name'               => _x( 'Programas', 'post type general name', 'vpsite' ),
		'singular_name'      => _x( 'Programa', 'post type singular name', 'vpsite' ),
		'menu_name'          => _x( 'Programas', 'admin menu', 'vpsite' ),
		'name_admin_bar'     => _x( 'Programa', 'add new on admin bar', 'vpsite' ),
		'add_new'            => _x( 'Add New', 'Programa', 'vpsite' ),
		'add_new_item'       => __( 'Add New Programa', 'vpsite' ),
		'new_item'           => __( 'New Programas', 'vpsite' ),
		'edit_item'          => __( 'Edit Programa', 'vpsite' ),
		'view_item'          => __( 'View Programa', 'vpsite' ),
		'all_items'          => __( 'All Programas', 'vpsite' ),
		'search_items'       => __( 'Search Programas', 'vpsite' ),
		'parent_item_colon'  => __( 'Parent Programas:', 'vpsite' ),
		'not_found'          => __( 'No Programas found.', 'vpsite' ),
		'not_found_in_trash' => __( 'No Programas found in Trash.', 'vpsite' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'vpsite' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'programa' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null
	);

	register_post_type( 'programa', $args );
}

/**************************************
    POST TYPE PROYECTOS
**************************************/
add_action( 'init', 'codex_proyectos_init' );
/**
 * Register a proyectos post type.
 *
 */
function codex_proyectos_init() {
	$labels = array(
		'name'               => _x( 'Proyectos', 'post type general name', 'vpsite' ),
		'singular_name'      => _x( 'Proyecto', 'post type singular name', 'vpsite' ),
		'menu_name'          => _x( 'Proyectos', 'admin menu', 'vpsite' ),
		'name_admin_bar'     => _x( 'Proyecto', 'add new on admin bar', 'vpsite' ),
		'add_new'            => _x( 'Add New', 'Proyecto', 'vpsite' ),
		'add_new_item'       => __( 'Add New Proyecto', 'vpsite' ),
		'new_item'           => __( 'New Proyectos', 'vpsite' ),
		'edit_item'          => __( 'Edit Proyecto', 'vpsite' ),
		'view_item'          => __( 'View Proyecto', 'vpsite' ),
		'all_items'          => __( 'All Proyectos', 'vpsite' ),
		'search_items'       => __( 'Search Proyectos', 'vpsite' ),
		'parent_item_colon'  => __( 'Parent Proyectos:', 'vpsite' ),
		'not_found'          => __( 'No Proyectos found.', 'vpsite' ),
		'not_found_in_trash' => __( 'No Proyectos found in Trash.', 'vpsite' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'vpsite' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'proyecto' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null
	);

	register_post_type( 'proyecto', $args );
}
