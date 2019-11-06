<?php get_header(); ?>

    <div class="home-content">
        <div class="home-title">
            <h1>
                <?php if ( is_post_type_archive() ) { ?>
                    <?php post_type_archive_title(); ?>
                <?php } ?>
            </h1>
        </div>
        <div class="posts-container">
        
            <?php while ( have_posts() ) : the_post() ?>
            
            <?php get_template_part('templates/loop'); ?>
            
            <?php endwhile; ?>
            <?php get_template_part('pagination'); ?>

        </div>
    </div>

<?php get_footer(); ?>