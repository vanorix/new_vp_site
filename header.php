<!DOCTYPE html>
<html <?php language_attributes('es'); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/superslides.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <title><?php bloginfo('name'); ?> <?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="header-logo">
                <a href="<?php bloginfo('url'); ?>">
                <?php if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                } ?>
                </a>
            </div>            
            <div class="btn-open">
                <i class="fas fa-bars"></i>
            </div>
            <div class="header-right">
                <div class="escudo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/repDom.png" alt="">
                </div>
                <div class="search">
                    <input type="text" placeholder="¿Que buscar?">
                </div>
                <div class="header-menu">
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Mapa del Sitio</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- MOBILE MENU -->
    <nav class="mobile-menu">
        <div class="btn-close">
            <i class="fas fa-times"></i>
        </div>
        <?php wp_nav_menu( array(
            'theme_location'  => 'main_menu',
            'container'         => false
        )); ?>
    </nav>
    <!-- MAIN MENU -->
    <nav class="main-menu">
        <?php wp_nav_menu( array(
            'theme_location'  => 'main_menu',
            'container'         => false
        )); ?>
    </nav>