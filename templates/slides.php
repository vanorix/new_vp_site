<!-- SLIDER -->
<section id="slides">
    <ul class="slides-container">
        <?php $loop = new WP_Query( 
                array( 
                    'post_type'         => 'slide', 
                    'posts_per_page'    => 4
                ) 
            );
            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <li>
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        <div class="container">
                            <div class="slide-title">
                                <a href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                </a>
                            </div>
                        </div>
                    </li>

                <?php endwhile;
            endif;
            wp_reset_postdata();
        ?>
    </ul>
    <nav class="slides-navigation">
        <a href="#" class="next"><i class="fas fa-caret-right"></i></a>
        <a href="#" class="prev"><i class="fas fa-caret-left"></i></a>
    </nav>
</section>
<!-- ELEMENTOS -->