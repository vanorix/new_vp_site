<?php /* Template Name: Página Galería de Fotos */ get_header(); ?>

<div class="home-content">
    <div class="home-title">
        <h1>Galeria de imagenes</h1>
    </div>
    <div class="post-container">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <?php $custom_query_args = array( 
                'post_type' => 'multimedia',
                'post_status' => 'publish',
                'showposts' => 9
            );
            $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            $custom_query = new WP_Query( $custom_query_args );
            $temp_query = $wp_query;
            $wp_query   = NULL;
            $wp_query   = $custom_query;
            if ( $custom_query->have_posts() ) : while ( $custom_query-> have_posts() ) : $custom_query->the_post(); 
                    get_template_part( 'templates/loop-fotos'); 
                endwhile;
            else: ?>
        <article>
        <p>No se encontraron fotos.</p>
        </article>
            <?php endif;
                wp_reset_postdata();
            
            get_template_part('pagination');
        
            $wp_query = NULL;
        $wp_query = $temp_query; ?>
    <?php endwhile; else: ?>
    <?php endif; ?>
    </div>
    
</div>
  
<?php get_footer(); ?>