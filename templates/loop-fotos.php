<div class="home-post">
    <a href="<?php the_permalink(); ?>">
        <div class="post-thumbnail">
        <?php if(get_field('imagen')) { 
            $attachment_id = get_field('imagen');
            $size = "medium";
            $image = wp_get_attachment_image_src( $attachment_id, $size ); ?>
            <img src="<?php echo $image[0]; ?>" alt="" />
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