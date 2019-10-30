<div class="discurso">
    <div class="discurso-img">
        <img src="<?php get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="discurso-detalles">
        <div class="discurso-title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="discurso-text">
            <?php the_excerpt(); ?>
        </div>
    </div>
</div>
