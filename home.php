<?php get_header(); ?>

    <div class="home-content">
        <div class="home-title">
            <h1>Sala de prensa</h1>
        </div>
        <div class="posts-container">
        
            <?php while ( have_posts() ) : the_post() ?>
            
                <?php get_template_part('templates/loop'); ?>
            
            <?php endwhile; ?>
            <?php get_template_part('pagination'); ?>

        </div>
    </div>

<?php get_footer(); ?>