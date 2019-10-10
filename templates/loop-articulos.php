  <article id="post-<?php the_ID(); ?>" class="post articulo">
    <div class="articulo-imagen">
      <a href="<?php the_permalink() ?>">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('mini'); } else { ?>
        <img src="<?php bloginfo("template_url"); ?>/img/no-disponible.jpg" alt="">
      <?php } ?>
      </a>
    </div>
    <div class="articulo-cont">
      <p class="articulo-date"><?php the_time('F j, Y'); ?></p>
      <h5><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
      <?php if(get_field('subtitulo')) { ?><h6><?php the_field('subtitulo'); ?></h6><?php } ?>
      <p><a href="<?php the_permalink() ?>" class="view-article">Leer Artículo <i class="fa fa-angle-double-right"></i></a></p>
    </div>
  </article>