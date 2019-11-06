<div class="home-post">
    <a href="<?php the_permalink(); ?>">
        <div class="post-thumbnail">
        <?php if ( has_post_thumbnail() ) { $thumbnail = get_the_post_thumbnail_url(); ?>
            <img src="<?php echo $thumbnail; ?>" alt="">
        <?php } else { ?>
            <img src="<?php bloginfo("template_url"); ?>/img/no-disponible.jpg" alt="">
        <?php } ?>
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