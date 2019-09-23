<?php get_header(); ?>

    <div class="home-content">
        <?php while ( have_posts() ) : the_post() ?>

            <div class="home-posts">
                <div class="post-thumbnail">
                    <?php get_the_post_thumbnail_url(); ?>
                </div>
                <div class="entry-summary">
                    <div class="post-title">
                        <?php the_title(); ?>
                    </div>
                    <div class="post-date">
                        <?php the_time(); ?>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>

<?php get_footer(); ?>