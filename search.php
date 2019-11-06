<?php get_header(); ?>
  
<div class="home-content">
		<?php if (have_posts()): ?>
		<div class="home-title">
			<h3>Resultados para la búsqueda: <span><?php echo get_search_query(); ?></span> (<?php echo sprintf( '%s', $wp_query->found_posts ); ?>)</h3>
		</div>
	<div class="posts-container">
      <?php while (have_posts()) : the_post();
				if ($post->post_type == 'discursos') { get_template_part( 'templates/loop-discursos');
				} else if ($post->post_type == 'eventos') { get_template_part( 'templates/loop-eventos');
				} else { get_template_part( 'templates/loop'); }
			endwhile;
			get_template_part('pagination'); ?>
    </div>
		<?php else : ?>
		<div class="home-title">
			<h3>No se encontraron resultados para la búsqueda: <span><?php echo get_search_query(); ?></span></h3>
	    </div>
	<div id="main-content" class="posts-container">
		<div class="column ten left">
			<h4>Sugerencias:</h4>
			<ul class="linea-lista">
				<li>Revisa la ortografía.</li>
				<li>Intenta usar palabras más genéricas.</li>
				<li>Prueba con un término diferente.</li>
			</ul>
		</div>
		<div class="column six left">
			<?php get_search_form(); ?>
			<a href="<?php echo home_url(); ?>" class="view-article">Volver a la página de Inicio <i class="fa fa-long-arrow-right"></i></a>
	    </div>
    </div>
      
    <?php endif; ?>
</div>

<?php get_footer(); ?>