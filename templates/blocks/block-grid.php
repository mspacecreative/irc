<?php
$contenttype = get_field('content_type');
$heading = get_field('heading');
$body = get_field('lead-in_copy');
$anchor = get_field('block_anchor');
$iconsvisible = get_field('show_icons');
$colcount = get_field('column_count');
		
switch ( $colcount ) {
	case 'two':
		$col = 'col-lg-6 col-md-6';
		break;
	case 'three':
		$col = 'col-lg-4 col-md-4';
		break;
	case 'four':
		$col = 'col-lg-3 col-md-3';
		break;
	default:
		$col = 'col-lg-4 col-md-4';
} ?>
<section<?php if ( $anchor ): ?> id="<?php echo $anchor; echo '"'; endif; ?> class="padding-6em<?php if ( $anchor ): echo ' '; echo $anchor; endif; ?>">
	
	<div class="inner_container intro_container" data-aos="fade-up" data-aos-duration="1500">
		
		<?php if ( $heading ): ?>
		<h2 class="text_align_center"><?php echo $heading ?></h2>
		<?php endif; ?>
		
		<?php if ( $body ): ?>
		<p class="lead-in-copy"><?php echo $body ?></p>
		<?php endif; ?>
			
			<div class="row col_borders<?php if ( $iconsvisible ): echo ' row_with_icons'; endif; ?>">
				
				<?php if ( $contenttype === 'custom' ):
				
					if ( have_rows('column') ):
					while ( have_rows('column') ): the_row();
					
					// VARIABLES
					$icon = get_sub_field('icon');
					$content = get_sub_field('content');
					$cta = get_sub_field('cta'); ?>
					
					<div class="col <?php echo $col ?> col-sm-6 col-xs-12">
						<?php if( !empty( $icon ) ): ?>
						<div class="col_icon">
							<img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
						</div>
						<?php endif; ?>
						
						<div class="col_inner boxed">
						<?php if ( $content ) {
							echo $content;
						} ?>
						</div>
					</div>
					
					<?php endwhile;
					endif; ?>
					
				<?php elseif ( $contenttype === 'post-type' ): 
		
				$post_types = get_field('post_type');
				
				if ( $post_types ) :
				foreach( $post_types as $post ):
				
				setup_postdata($post);
				
				// VARIABLES
				$title = get_the_title($post->ID);
				$excerpt = get_the_excerpt($post->ID);
				$icon = get_field('icon', $post->ID);
				$showcta = get_field('show_cta', $post->ID);
				//$content = get_field('content');
				//$cta = get_field('cta'); ?>
				
				<div class="col <?php echo $col ?> col-sm-6 col-xs-12">
					<?php if( !empty( $icon ) ): ?>
					<div class="col_icon">
						<img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
					</div>
					<?php endif; ?>
						
					<div class="col_inner boxed">
					<?php if ( $title ) {
						echo '<h3>' . $title  . '</h3>';
					} ?>
					<?php if ( $excerpt ) {
						echo '<p>' . $excerpt . '</p>';
					}
					
					if ( $showcta ) {
						include 'includes/services-cta.php';
					} ?>
					</div>
				</div>
				
				<?php endforeach; wp_reset_postdata();
				endif;
				
				endif; ?>
				
			</div>
		
	</div>
	
</section>