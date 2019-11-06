    <?php echo get_template_part('/templates/related-links') ?>
    <footer>
        <div class="container">
            <?php $loop = new WP_Query( 
                array( 
                    'page_id'          => 18,
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
                    'theme_location'    => 'footer_menu',
                    'container'         => false
                ) ); ?>
            </div>
            <?php $loop = new WP_Query( 
                array( 
                    'page_id'          => 18,
                ) 
            );
            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="footer-form">
                        <?php $form = get_field('formulario'); echo do_shortcode($form); ?>
                    </div>
                    <div class="footer-copy">
                        <p>                                                                    
                            © <?php echo date('Y'); ?> <?php the_field('copy'); ?>
                        </p>
                    </div>
                <?php endwhile;
            endif; wp_reset_postdata(); ?>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>