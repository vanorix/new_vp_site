<?php get_header(); ?>

    <div id="articulo-archive">
        <?php if (have_posts()) : while (have_posts()) : the_post();
            get_template_part( 'templates/loop-articulos');
        endwhile;
            // get_template_part('pagination');
        else : ?>
            <h3>No se encontraron artículos</h3>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>