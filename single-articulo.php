<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php edit_post_link( __( '<i class="fa fa-pencil-square"></i>', 'seielwp' ), '', ''); ?>
  
  <div id="header-img" class="row">
    <div id="header-info">
        <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>
    </div>
  </div>
  
  <section class="post-wraper">
    <article id="main-content" class="column twelve left padding-right">
        <p class="date"><?php the_time('F j, Y'); ?></p>
        <h1><?php the_title(); ?></h1>
        
        <div class="rs-share row"><?php get_template_part('custom/social-share'); ?></div>
        
        <?php if ( has_post_thumbnail() ) {  ?>
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
  
  <a href="#" class="scrolltop"><i class="fa fa-angle-up fa-2x"></i></a>

<?php get_footer(); ?>