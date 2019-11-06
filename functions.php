<?php

/**************************************
    ESTILOS Y SCRIPTS
**************************************/
function theme_vpsite_style_scripts() {
    wp_enqueue_style( 'style-vpsite', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0', false );
    wp_enqueue_style( 'superslidescss', get_template_directory_uri() . '/css/superslides.css' );
    wp_enqueue_style( 'enlacescss', get_template_directory_uri() . '/css/enlaces.css' );
	  wp_enqueue_script( 'script-vpsite', get_template_directory_uri() . '/scripts/scripts.js', array(), '1.0.0', true );
	  wp_enqueue_script( 'jquery-2', 'https://code.jquery.com/jquery-2.1.4.min.js', array(), '3.1.1', true );
	  wp_enqueue_script( 'superslides', get_template_directory_uri() . '/scripts/jquery.superslides.js', array(), '1.0.0', true );
    if (is_front_page()) {
      wp_enqueue_script( 'instagram-posts', get_template_directory_uri() . '/scripts/instagram_posts.js', array(), '1.0.0', true );
    }
    if(!is_front_page()) {
      wp_enqueue_script( 'FitVids', 'https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.1.0/jquery.fitvids.min.js', array(), '1.0.0', true );		
      wp_enqueue_script( 'bxsliderjs', get_template_directory_uri() . '/scripts/bxslider.js', array(), '1.0.0', true );
      wp_enqueue_style( 'bxslidercss', get_template_directory_uri() . '/css/bxslider.css' );
      wp_enqueue_style( 'legacyStyles', get_template_directory_uri() . '/css/legacy.css' );	}
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
add_action( 'init', 'create_cpt_eventos' );
// EVENTOS
function create_cpt_eventos(){
	$labels = array(
		'name' 					=> __('Eventos', 'vpsite'),
		'singular_name' 		=> __('Evento', 'vpsite'),
		'menu_name' 			=> __('Eventos', 'vpsite'),
		'parent_item_colon'		=> __('Evento Padre', 'vpsite'),
		'all_items' 			=> __('Todos los Eventos', 'vpsite'),
		'view_item' 			=> __('Ver Evento', 'vpsite'),
		'add_new_item' 			=> __('Agregar Nuevo Evento', 'vpsite'),
		'add_new' 				=> __('Agregar Nuevo', 'vpsite'),
		'edit_item' 			=> __('Editar Evento', 'vpsite'),
		'update_item'			=> __('Actualizar Evento', 'vpsite'),
		'new_item' 				=> __('Nuevo Evento', 'vpsite'),
		'edit' 					=> __('Editar', 'vpsite'),
		'view' 					=> __('Ver Evento', 'vpsite'),
		'all_items' 			=> __('Todos los Evento', 'vpsite'),
		'search_items' 			=> __('Buscar Evento', 'vpsite'),
		'not_found' 			=> __('No se encontraron Eventos', 'vpsite'),
		'not_found_in_trash' 	=> __('No se encontraron Eventos en la papelera', 'vpsite')
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
		'hierarchical' 		=> true,
		'show_ui'			=> true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'query_var'			=> true,
		'rewrite' 			=> array( 'slug' => 'tipo'),
	);
	register_taxonomy('tipos', array('eventos'), $args);
}

/**************************************
    POST TYPE DISCURSOS
**************************************/
add_action( 'init', 'create_cpt_discursos' );
// DISCURSOS
function create_cpt_discursos(){
	$labels = array(
		'name' 					=> __('Discursos', 'vpsite'),
		'singular_name' 		=> __('Discurso', 'vpsite'),
		'menu_name' 			=> __('Discursos', 'vpsite'),
		'parent_item_colon'		=> __('Discurso Padre', 'vpsite'),
		'all_items' 			=> __('Todos los Discursos', 'vpsite'),
		'view_item' 			=> __('Ver Discurso', 'vpsite'),
		'add_new_item' 			=> __('Agregar Nuevo Discurso', 'vpsite'),
		'add_new' 				=> __('Agregar Nuevo', 'vpsite'),
		'edit_item' 			=> __('Editar Discurso', 'vpsite'),
		'update_item'			=> __('Actualizar Discurso', 'vpsite'),
		'new_item' 				=> __('Nuevo Discurso', 'vpsite'),
		'edit' 					=> __('Editar', 'vpsite'),
		'view' 					=> __('Ver Discurso', 'vpsite'),
		'all_items' 			=> __('Todos los Discurso', 'vpsite'),
		'search_items' 			=> __('Buscar Discurso', 'vpsite'),
		'not_found' 			=> __('No se encontraron Discursos', 'vpsite'),
		'not_found_in_trash' 	=> __('No se encontraron Discursos en la papelera', 'vpsite')
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
	register_post_type('discursos', $args);
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
		'name'               => _x( 'Art&iacute;culos', 'post type general name', 'vpsite' ),
		'singular_name'      => _x( 'Art&iacute;culo', 'post type singular name', 'vpsite' ),
		'menu_name'          => _x( 'Art&iacute;culos', 'admin menu', 'vpsite' ),
		'name_admin_bar'     => _x( 'Art&iacute;culo', 'add new on admin bar', 'vpsite' ),
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

// Pagination for paged posts
function seiel_pagination(){
	global $wp_query;
	$big = 999999999;

	echo paginate_links(array(
		'base' => str_replace($big, '%#%', get_pagenum_link($big)),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages
	));
}

/**************************************
	GALLERY SHORTCODE
	Agrega una version modificada del shortcode de la galeria de imagenes
	para que funcione como un slider. Utiliza bxslider.js
**************************************/
add_action('after_setup_theme', 'add_gallery_shortcode');
function add_gallery_shortcode() {
	add_image_size('mini', 320, 180, true); // Mini Thumbnail
	add_image_size('gal_thumb', 120, 68, true); // Slider Thumbs
	add_image_size('medium', 960, 540, true); // Medium Thumbnail
	require_once('library/gallery-shortcode.php');
}

