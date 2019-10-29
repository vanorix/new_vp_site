<?php 
/***
 * 
 * Template Name: Eventos Nacionales
 */

get_header(); ?>

    <main class="eventos">
        <div class="hero-title">
            <h1>Eventos Nacionales</h1>
        </div>

        <?php $args = array( 
            'post_type' 		=> 'eventos',
            'posts_per_page'	=> -1,
            'tax_query'			=> array(
                array(
                    'taxonomy'	=> 'tipos',
                    'field'		=> 'slug',
                    'terms'		=> 'nacionales'
                ),
            ),
        );

        $custom_query = new WP_Query( $args );

        if ( $custom_query->have_posts() ) : 
            while ( $custom_query-> have_posts() ) : $custom_query->the_post();
                get_template_part( 'templates/loop-eventos');
            endwhile; 
        else: ?>

            <h1>No hay eventos</h1>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </main>

<?php get_footer(); ?>