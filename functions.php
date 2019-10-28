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

add_image_size('mini', 320, 180, true); // Mini Thumbnail

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
add_action( 'init', 'create_cpt_eventos' );
// EVENTOS
function create_cpt_eventos(){
	$labels = array(
		'name' 					=> __('Eventos', 'seiel'),
		'singular_name' 		=> __('Evento', 'seiel'),
		'menu_name' 			=> __('Eventos', 'seiel'),
		'parent_item_colon'		=> __('Evento Padre', 'seiel'),
		'all_items' 			=> __('Todos los Eventos', 'seielwp'),
		'view_item' 			=> __('Ver Evento', 'seiel'),
		'add_new_item' 			=> __('Agregar Nuevo Evento', 'seiel'),
		'add_new' 				=> __('Agregar Nuevo', 'seiel'),
		'edit_item' 			=> __('Editar Evento', 'seiel'),
		'update_item'			=> __('Actualizar Evento', 'seiel'),
		'new_item' 				=> __('Nuevo Evento', 'seiel'),
		'edit' 					=> __('Editar', 'seiel'),
		'view' 					=> __('Ver Evento', 'seiel'),
		'all_items' 			=> __('Todos los Evento', 'seiel'),
		'search_items' 			=> __('Buscar Evento', 'seiel'),
		'not_found' 			=> __('No se encontraron Eventos', 'seiel'),
		'not_found_in_trash' 	=> __('No se encontraron Eventos en la papelera', 'seiel')
	);
	$args = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'exclude_from_search'	=> true,
		'show_in_nav_menus' 	=> false,
		'menu_position' 		=> 22,
		'menu_icon' 			=> 'dashicons-editor-table',
		'supports' 				=> array( 'title', 'author', 'editor', 'thumbnail'),
		'has_archive' 			=> true,
		'can_export' 			=> true
	);
	register_post_type('eventos', $args);
}

add_action( 'init', 'create_ct_eventos' );

// CATEGORIAS EVENTOS
function create_ct_eventos() {
	$labels = array(
		'name'              => _x( 'Tipos de Eventos', 'taxonomy general name' ),
		'singular_name'     => _x( 'Tipo de Evento', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Tipo' ),
		'all_items'         => __( 'Todos los Tipos' ),
		'parent_item'       => __( 'Tipo Padre' ),
		'parent_item_colon' => __( 'Tipo Padre:' ),
		'edit_item'         => __( 'Editar Tipo' ),
		'update_item'       => __( 'Actualizar Tipo' ),
		'add_new_item'      => __( 'Agregar Nuevo Tipo' ),
		'new_item_name'     => __( 'Nuevo Tipo' ),
		'menu_name'         => __( 'Tipos de Eventos' ),
	);
	$args = array(
		'labels' 			=> $labels,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical' 		=> true,
		'query_var'			=> true,
		'rewrite' 			=> array( 'slug' => 'tipo'),
	);
	register_taxonomy('tipos', array('eventos'), $args);
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

/**************************************
    POST TYPE ARTICULOS
**************************************/
add_action( 'init', 'codex_articulo_init' );
/**
 * Register articulos post type.
 *
 */
function codex_articulo_init() {
	$labels = array(
		'name'               => _x( 'Articulos', 'post type general name', 'vpsite' ),
		'singular_name'      => _x( 'Articulo', 'post type singular name', 'vpsite' ),
		'menu_name'          => _x( 'Articulos', 'admin menu', 'vpsite' ),
		'name_admin_bar'     => _x( 'Articulo', 'add new on admin bar', 'vpsite' ),
		'add_new'            => _x( 'Add new', 'Articulo', 'vpsite' ),
		'add_new_item'       => __( 'Add new Articulo', 'vpsite' ),
		'new_item'           => __( 'New Articulos', 'vpsite' ),
		'edit_item'          => __( 'Edit Articulo', 'vpsite' ),
		'view_item'          => __( 'View Articulo', 'vpsite' ),
		'all_items'          => __( 'All Articulos', 'vpsite' ),
		'search_items'       => __( 'Search Articulos', 'vpsite' ),
		'parent_item_colon'  => __( 'Parent Articulos:', 'vpsite' ),
		'not_found'          => __( 'No Articulos found.', 'vpsite' ),
		'not_found_in_trash' => __( 'No Articulos found in Trash.', 'vpsite' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'vpsite' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'articulo' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "page-attributes", "post-formats" ),
	);

	register_post_type( 'articulo', $args );
}