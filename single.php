<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  
  <section class="post-wraper">
    <article id="main-content">
      <div class="post-head">
        <h1><?php the_title(); ?></h1>
        <p class="date"><?php the_time('F j, Y'); ?></p>
      </div>
      
      <div class="rs-share row"><?php get_template_part('custom/social-share'); ?></div>
      <?php if(get_field('galeria_imagenes')) { ?>
          <?php the_field('galeria_imagenes'); ?>
      <?php } elseif ( has_post_thumbnail() ) {  ?>
        <div class="post-imagen">
            <?php   $speech_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false );
                    echo "<img src='" . $speech_featured_image[0] . "' alt=''>";?>
        </div>
      <?php } ?>
      <div class="post-content">
        <?php the_content(); ?>
      </div>

    </article>
  <?php get_template_part('sidebar/sidebar'); ?>
  </section>
  <?php endwhile; else: ?>
  <?php endif; ?>

<?php get_footer(); ?>