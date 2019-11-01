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
            
                <div class="home-post">
                    <a href="<?php the_permalink(); ?>">
                        <div class="post-thumbnail">
                        <?php $thumbnail = get_the_post_thumbnail_url(); ?>
                            <img src="<?php echo $thumbnail; ?>" alt="">
                        </div>
                        <div class="entry-summary">
                            <div class="post-title">
                                <h2><?php the_title(); ?></h2>
                            </div>
                            <div class="post-date">
                                <?php echo get_the_date(); ?>
                            </div>
                        </div>
                    </a>
                </div>
            
            <?php endwhile; ?>
            <?php get_template_part('pagination'); ?>

        </div>
    </div>

<?php get_footer(); ?>