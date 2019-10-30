<div class="discurso">
    <div class="discurso-img">
        <?php $thumb = get_the_post_thumbnail_url(); ?>
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="discurso-detalles">
        <div class="discurso-title">
            <a href="<?php the_permalink(); ?>">
                <h1><?php the_title(); ?></h1>
            </a>
        </div>
        <div class="discurso-text">
            <?php the_excerpt(); ?>
        </div>
    </div>
</div>
