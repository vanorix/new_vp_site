<?php get_header(); ?>

    <div id="eventos-archive">
        <?php if (have_posts()) : while (have_posts()) : the_post();
            get_template_part( 'templates/loop-eventos');
        endwhile;
            // get_template_part('pagination');
        else : ?>
            <h3>No se encontraron eventos</h3>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>