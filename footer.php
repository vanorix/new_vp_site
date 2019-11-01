    <?php echo get_template_part('/templates/related-links') ?>
    <footer>
        <div class="container">
            <?php $loop = new WP_Query( 
                array( 
                    'post_type'         => 'page',
                    'pagename'          => 'inicio',
                    'posts_per_page'    => -1
                ) 
            );
            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="footer-about">
                        <div class="about-description">
                            <p>
                                <?php the_field('direccion'); ?>
                            </p>
                        </div>
                        <div class="about-contact">
                            <p><a href="mailto:info@vicepresidencia.gob.do"><?php the_field('correo_eletronico'); ?></a></p>
                            <p><a href="tel:+18096958000">Tel: <?php the_field('telefono'); ?> llama ahora</a></p>
                        </div>
                    </div>
                    
                <?php endwhile;
            endif; wp_reset_postdata(); ?>
            <div class="footer-menu">
                <?php wp_nav_menu( array(
                    'menu'  => 'footer_menu'
                ) ); ?>
            </div>
            <div class="footer-form">
                <?php $form = get_field('formulario'); echo do_shortcode($form); ?>
            </div>
            <div class="footer-copy">
                <p>                                                                    
                © <?php echo date('Y'); ?> <?php the_field('copy'); ?>
                </p>
            </div>
        </div>
    </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/jquery.superslides.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/scripts.js"></script>
    <?php wp_footer(); ?>
</body>
</html>