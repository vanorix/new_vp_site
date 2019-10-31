<?php

add_shortcode( 'gallery', 'photospace_shortcode' );
add_shortcode( 'photospace', 'photospace_shortcode' );

function photospace_shortcode( $atts ) {
	
	global $post;
	global $photospace_count;
	
	if ( ! empty( $atts['ids'] ) ) {
		if ( empty( $atts['orderby'] ) )
			$atts['orderby'] = 'post__in';
		$atts['include'] = $atts['ids'];
	}
	
	extract(shortcode_atts(array(
		'id' 								=> intval($post->ID),
		'num_thumb' 				=> 8,
		'num_preload' 			=> 8,
		'show_captions' 		=> true,
		'show_download' 		=> false,
		'show_controls' 		=> true,
		'auto_play' 				=> true,
		'delay' 						=> '10000',
		'hide_thumbs' 			=> false,
		'use_paging' 				=> false,
		'horizontal_thumb' 	=> 0,
		'order'      				=> 'ASC',
		'orderby'    				=> 'menu_order ID',
		'include'    				=> '',
		'exclude'    				=> '',
		'sync_transitions' 	=> 1
				
	), $atts));
	
	$photospace_count += 1;
	$post_id = intval($post->ID) . '_' . $photospace_count;
	
	if ( 'RAND' == $order )
		$orderby = 'none';
	
	$thumb_style_init = 'display:none';
	$thumb_style_on  = "'display', 'block'";
	$thumb_style_off  = "'display', 'none'";
	
	$output_buffer ='
	
		<div id="slider_'.$post_id.'" class="slider-wrap slider-int">';
											
				if ( !empty($include) ) { 
					$include = preg_replace( '/[^0-9,]+/', '', $include );
					$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
			
					$attachments = array();
					foreach ( $_attachments as $key => $val ) {
						$attachments[$val->ID] = $_attachments[$key];
					}
				} elseif ( !empty($exclude) ) {
					$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
					$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
				} else {
					$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
				}

				if ( !empty($attachments) ) {
	
				$output_buffer .='
				<div class="slider">';
					
					// zooms
					foreach ( $attachments as $aid => $attachment ) {
						$img = wp_get_attachment_image_src( $aid , 'medium');
						$_post = & get_post($aid); 
						$image_title = esc_attr($_post->post_title);
													
						$output_buffer .='
							<div class="slide"><img src="' . $img[0] . '" title="' . $image_title . '" /></div>';
					}
				
				$output_buffer .='
				</div>';
	
				$output_buffer .='
				<div id="slidernav_'.$post_id.'" class="slider-int-nav">
					<ul>';
        
					$num = 0;
					
					// thumbs
					foreach ( $attachments as $aid => $attachment ) {
						$thumb = wp_get_attachment_image_src( $aid , 'gal_thumb');
													
						$output_buffer .='
							<li><a href="#" data-slide-index="'.$num.'"><img src="' . $thumb[0] . '" /></a></li>';
						$num = $num + 1;
						
					}
				
				$output_buffer .='
					</ul>
					<div class="slider-int-sub-nav">
						<span class="slider-int-sub-prev"></span>
						<span class="slider-int-sub-next"></span>
					</div>
				</div>';
					
				}
				
				$output_buffer .='
		<div class="slider-nav">
			<span class="slider-prev"></span>
			<span class="slider-next"></span>
		</div>
	</div>';
	
	$output_buffer .= "
	
	<script>";
			
			$output_buffer .= "
			var slider = $('#slider_".$post_id." .slider').bxSlider({
				pagerCustom: '#slidernav_".$post_id." ul',
				mode: 'fade',
				captions: true,
				video: true,
				responsive: true,
				nextSelector: '#slider_".$post_id." .slider-next',
				prevSelector: '#slider_".$post_id." .slider-prev',
				nextText: '<i class=".'"fa fa-angle-right fa-2x"'."></i>',
				prevText: '<i class=".'"fa fa-angle-left fa-2x"'."></i>'
			});
			var slidernav = $('#slidernav_".$post_id." ul').bxSlider({
				slideWidth: 115,
				minSlides: 7,
				maxSlides: 7,
				moveSlides: 7,
				infiniteLoop: false,
				pager: false,
				nextSelector: '#slidernav_".$post_id." .slider-int-sub-next',
				prevSelector: '#slidernav_".$post_id." .slider-int-sub-prev',
				nextText: '<i class=".'"fa fa-angle-right fa-lg"'."></i>',
				prevText: '<i class=".'"fa fa-angle-left fa-lg"'."></i>',
				slideMargin: 8
			});
			";
			
		$output_buffer .= "
	</script>";
		
		return $output_buffer;
}