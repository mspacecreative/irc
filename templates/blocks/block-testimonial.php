<?php 
// CUSTOM ID
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
// CUSTOM CLASS	
$className = 'testimonial';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

$testimonial = get_field('display_testimonial');
setup_postdata($testimonial);
// VARIABLES
$titleposition = get_field( 'title_position', $testimonial );
$hidetitle = get_field( 'hide_title__position' );
$bgimg = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial ), 'full' );
$content = get_the_content();

if ( $testimonial ): ?>
<!-- testimonial -->
<section id="<?php echo esc_attr($id); ?>" class="padding-6em light<?php if ( !$bgimg ): echo ' no-bg-img'; endif; echo ' '; echo esc_attr($className); ?>" <?php if ( $bgimg ): ?> style="background-image: url(<?php echo $bgimg[0] ?>);" <?php endif; ?>>
	<div class="inner_container">
		<div class="row wide_gutters middle-lg middle-md" data-aos="fade-up" data-aos-duration="1500">
			<div class="col col-lg-5 col-md-5 col-sm-12 col-xs-12">
				<h3><?php echo esc_html( $testimonial->post_title ); if ( $titleposition && !$hidetitle ): echo esc_html_e(', '); echo $titleposition; endif; ?></h3>
			</div>
			
			<div class="col col-lg-7 col-md-7 col-sm-12 col-xs-12">
				<?php echo $content ?>
			</div>
			
			<!--<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 justify-content-end margin-top-2em"><a href="#quote" class="button align-self-center">view all</a></div>-->
		</div>
	</div>
</section>
<!-- / testimonial -->
<?php endif; ?>