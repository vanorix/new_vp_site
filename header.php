<!DOCTYPE html>
<html <?php language_attributes('es'); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->
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
                    <form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
                        <input class="search-input" required maxlength="255" type="search" name="s" placeholder="buscar...">
                        <button class="search-submit" type="submit" role="button"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="header-menu">
                    <?php wp_nav_menu( array(
                        'theme_location'  => 'privacy_menu',
                        'container'         => false
                    )); ?>
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