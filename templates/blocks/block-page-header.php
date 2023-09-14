<?php

// VARIABLES
$title = get_the_title();
$intro = get_field('intro_copy');
$featuredimg = get_the_post_thumbnail_url( $post->ID, 'large' ); 
$imgalt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
$content = apply_filters( 'the_content', get_the_content() ); ?>
	
<div class="inner_container">
	
	<?php if ( $title ): ?>
	<h1 class="text_align_center"><?php echo $title ?></h1>
	<?php endif; ?>
	
	<div class="row no_gutters light_grey_bg middle-lg middle-md">
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<img data-object-fit="cover" src="<?php echo $featuredimg ?>" class="object-fit" alt="<?php echo $imgalt ?>">
		</div>
		
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="col_inner">
				<?php if ( is_page('services') ):
				echo queryServiceIcons( 'services' );
				endif; ?>
				<p><?php echo $intro ?></p>
				
			</div>
		</div>
	</div>
</div>