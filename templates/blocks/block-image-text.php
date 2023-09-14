<?php
$contenttype = get_field('content_type');
$featuredimg = get_field('image');
$size = 'image-tile';
$tile = $featuredimg['sizes'][$size];
$imgalt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
$content = get_field('content');
$container = 'inner_container reverse-even';
$row = 'row no_gutters padding-top-6em';
$col = 'col col-lg-6 col-md-6 col-sm-12 col-xs-12"';

echo '
<div class="' . $container . '">';
			
if ( $contenttype === 'custom' ) {
	echo '
	<div class="' . $row . '">
		<div class="' . $col . '">';
				
			if ( !empty($featuredimg) ) {
			echo '
			<img data-object-fit="cover" src="' . esc_url($tile) . '" alt="' . esc_attr($featuredimg['alt']) . '" class="object-fit">';
			}
				
		echo '
		</div>';
				
		echo '
		<div class="' . $col . '">
			<div class="col_inner col-align-items-center">';
					
			if ( $content ) {
				echo $content;
			}
					
			echo '
			</div>
		</div>
	</div>';
			
} elseif ( $contenttype === 'post_type' ) {
			
	$post_types = get_field('post_type');
					
	if ( $post_types ) {
		foreach ( $post_types as $post ) {
					
		setup_postdata($post);
		// VARIABLES
		$title = get_the_title($post->ID);
		$anchorid = sanitize_title($title);
		$content = apply_filters( 'the_content', get_the_content() );
		$featuredimg = get_the_post_thumbnail_url( $post->ID, 'image-tile' );
		$icon = get_field('icon', $post->ID);
						
		echo '
		<div id="' . $anchorid . '" class="' . $row . __(' service_section') . '">
			<div class="' . $col . '">';
					
			if ( !empty($featuredimg) ) {
				echo '
				<img data-object-fit="cover" src="' . $featuredimg . '" class="object-fit" alt="';
				if ( $imgalt ) { 
					echo $imgalt;
				} else { 
					echo bloginfo('title') . esc_html_e(': ') . $title; 
				}
				echo '">';
			}
					
			echo '
			</div>';
					
			echo '
			<div class="' . $col . '">
				<div class="col_inner col-align-items-center">';
						
				if ( $icon ) {
					echo '
					<div class="icon_container">
						<img src="' . esc_url($icon['url']) . '" alt="' . esc_attr($icon['alt']) . '">
					</div>';
				}
						
				if ( $title ) {
					echo '<h3>' . $title . '</h3>';
				}
						
				if ( $content ) {
					echo $content;
				}
						
				echo '
				</div>
			</div>
		</div>';
		
		} 
	}
}
echo '
</div>';