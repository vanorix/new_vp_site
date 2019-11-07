<div class="speaker">
    <div class="speaker_col">
        <div class="speaker_image" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
    </div>
    <div class="speaker-text">
        <div class="speaker_content">
            <div class="speaker_title">
                <?php the_title(); ?>
            </div>
            <div class="speaker_text">
                <p><?php the_field('resumen_evento'); ?></p>
            </div>
            <?php if (get_field('url_evento_externo')) {  ?>
                <div class="button speaker_button"><a href="<?php the_field('url_evento_externo'); ?>">Ver Evento</a></div>
            <?php } else { ?>
                <div class="button speaker_button"><a href="<?php the_permalink(); ?>">Ver Evento</a></div>
            <?php } ?>
        </div>
    </div>
</div>
                 