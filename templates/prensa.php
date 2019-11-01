<div class="home-content">
    <div class="home-title">
        <h1>Sala de prensa</h1>
    </div>
    <div class="posts-container">
    
        <?php   
            $args = array(
                'posts_type'         => 'posts',
                'posts_per_page'    => 3
            );

            $query = new WP_Query($args); while ( $query->have_posts() ) : $query->the_post() ?>
        
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

    </div>
</div>