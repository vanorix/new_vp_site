<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  
  <section class="post-wraper">
    <article id="main-content">
      <div class="post-head">
        <h1><?php the_title(); ?></h1>
        <p class="date"><?php the_time('F j, Y'); ?></p>
      </div>
      
      <div class="rs-share row"><?php get_template_part('custom/social-share'); ?></div>
      <?php if ( has_post_thumbnail() ) {  ?>
        <?php if( get_field('videoid') ) { ?>
        
        <div id="slider_<?php the_ID(); ?>" class="slider-wrap slider-int">
          
          <div class="slider">
            <div class="slide">
            	<?php
            		$speech_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium', false );
            		echo "<img src='" . $speech_featured_image[0] . "' alt=''>";
            	?>
            </div>
            <div class="slide"><iframe id="SliderPlayer_<?php the_ID(); ?>" src="https://www.youtube.com/embed/<?php the_field('videoid'); ?>?autoplay=0&HD=1&rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe></div>
          </div>
      
          <div id="slidernav_<?php the_ID(); ?>" class="slider-int-nav">
            <ul>
              <li><a href="#" data-slide-index="0"><?php the_post_thumbnail('medium');  ?></a></li>
              <li><a href="#" data-slide-index="1" class="btn-play"><span><img src="<?php bloginfo("template_url"); ?>/img/btn-play.png" alt=""></span><span><img src="https://img.youtube.com/vi/<?php the_field('videoid'); ?>/maxresdefault.jpg" alt=""></span></a></li>
            </ul>
            <div class="slider-int-sub-nav">
              <span class="slider-int-sub-prev"></span>
              <span class="slider-int-sub-next"></span>
            </div>
          </div>
          
          <div class="slider-nav">
            <span class="slider-prev"></span>
            <span class="slider-next"></span>
          </div>
          
        </div>
      
        <script>
        window.onload = function() {
            jQuery('#slider_<?php the_ID(); ?> .slider').bxSlider({
                pagerCustom: '#slidernav_<?php the_ID(); ?> ul',
                mode: 'fade',
                captions: true,
                video: true,
                responsive: true,
                nextSelector: '#slider_<?php the_ID(); ?> .slider-next',
                prevSelector: '#slider_<?php the_ID(); ?> .slider-prev',
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>'
            });
            jQuery('#slidernav_<?php the_ID(); ?> ul').bxSlider({
                slideWidth: 115,
                minSlides: 7,
                maxSlides: 7,
                moveSlides: 7,
                infiniteLoop: false,
                pager: false,
                nextSelector: '#slidernav_<?php the_ID(); ?> .slider-int-sub-next',
                prevSelector: '#slidernav_<?php the_ID(); ?> .slider-int-sub-prev',
                nextText: '<i class="fa fa-angle-right fa-2x"></i>',
                prevText: '<i class="fa fa-angle-left fa-2x"></i>',
                slideMargin: 8
            });
        };
        </script>
        
        <?php } else { ?>
		    <div class="post-imagen">
				<?php
					$speech_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium', false );
					echo "<img src='" . $speech_featured_image[0] . "' alt=''>";
				?>
			</div>
        <?php } // si hay videoid ?>
        
      <?php } else { ?>
      
        <?php if(get_field('videoid')) { ?>
      <div class="post-video"><div class="embed video"><iframe id="VideoPlayer_<?php the_ID(); ?>" src="https://www.youtube.com/embed/<?php the_field('videoid'); ?>?autoplay=0&HD=1&rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe></div></div>
        <?php } // si hay videoid ?>
        
      <?php } // si hay thumbnail ?>
      
      <div class="post-content">
        <?php the_content(); ?>
      </div>

    </article>
  <?php get_template_part('sidebar/sidebar'); ?>
  </section>
  <?php endwhile; else: ?>
  <?php endif; ?>

<?php get_footer(); ?>