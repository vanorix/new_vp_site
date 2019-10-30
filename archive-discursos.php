<?php get_header(); ?>
    <main class="discursos">
        <div class="hero-title">
            <h1>Discursos</h1>
        </div>

        <div id="discursos-archive">
            <div class="container">
                <?php if (have_posts()) : while (have_posts()) : the_post();
                    get_template_part( 'templates/loop-discursos');
                endwhile;
                    // get_template_part('pagination');
                else : ?>
                    <h3>No se encontraron artículos</h3>
                <?php endif; ?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>