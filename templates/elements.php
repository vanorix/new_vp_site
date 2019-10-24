<section class="section-elements" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/edd.jpg)">
    <div class="bg-elements">
        <div class="elements-container">
            <div class="elements">
                <div class="element-title">
                    <h2>Eventos</h2>
                </div>
                <div class="element-items">
                    <?php $loop = new WP_Query( 
                            array( 
                                'post_type'         => 'eventos', 
                                'posts_per_page'    => 5
                            ) 
                        );
                        if ( $loop->have_posts() ) :
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <div class="element-item">
                                    <a href="">
                                        <h4><?php the_title(); ?></h4>
                                    </a>
                                    <div class="item-divider"></div>
                                </div>

                            <?php endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                </div>
                <div class="more-elements">
                    <a href="<?php bloginfo('url'); ?>/eventos">Ver Todos</a>
                </div>
            </div>
            <div class="elements">
                <div class="element-title">
                    <h2>Proyectos</h2>
                </div>
                <div class="element-items">
                    <?php $loop = new WP_Query( 
                            array( 
                                'post_type'         => 'proyecto', 
                                'posts_per_page'    => 5
                            ) 
                        );
                        if ( $loop->have_posts() ) :
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <div class="element-item">
                                    <a href="">
                                        <h4><?php the_title(); ?></h4>
                                    </a>
                                    <div class="item-divider"></div>
                                </div>

                            <?php endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                </div>
                <div class="more-elements">
                    <a href="<?php bloginfo('url'); ?>/proyectos">Ver Todos</a>
                </div>
            </div>
            <div class="elements">
                <div class="element-title">
                    <h2>Programas</h2>
                </div>
                <div class="element-items">
                    <?php $loop = new WP_Query( 
                            array( 
                                'post_type'         => 'programa', 
                                'posts_per_page'    => 5
                            ) 
                        );
                        if ( $loop->have_posts() ) :
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <div class="element-item">
                                    <a href="">
                                        <h4><?php the_title(); ?></h4>
                                    </a>
                                    <div class="item-divider"></div>
                                </div>

                            <?php endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                </div>
                <div class="more-elements">
                    <a href="<?php bloginfo('url'); ?>/programas">Ver Todos</a>
                </div>
            </div>
        </div>
    </div>
</section>