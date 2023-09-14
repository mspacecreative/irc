<!-- before + afters -->
<?php 
// CUSTOM ID
$id = 'before-after-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
// CUSTOM CLASS	
$className = 'before_and_after';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

$beforeafter = get_field('before_after');
setup_postdata($beforeafter);
// VARIABLES
$heading = get_field('heading');
$sub = get_field('sub_heading');
$beforeimg = get_field('before_image', $beforeafter);
$afterimg = get_field('after_image', $beforeafter);
$content = get_field('body_copy'); ?>

<section id="<?php echo esc_attr($id); ?>" class="padding-6em<?php echo ' '; echo esc_attr($className); ?>">
	<div class="inner_container">
		
		<?php if ( $heading ): ?>
		<h2 class="text_align_center"><?php echo $heading ?></h2>
		<?php else: ?>
		<h2 class="text_align_center"><?php echo esc_html_e('transform your space'); ?></h2>
		<?php endif; ?>
		
		<?php if ( $beforeafter ): ?>
		
		<div class="row margin-top-2em text_align_center no_gutters" data-aos="fade-up" data-aos-duration="1500">
			<div class="col col-lg-4 col-md-4 col-sm-12 col-xs-12">
				
				<?php if ( !empty( $beforeimg ) ): ?>
				<img data-object-fit="cover" src="<?php echo esc_url($beforeimg['url']); ?>" alt="<?php echo esc_attr($beforeimg['alt']); ?>" class="object-fit">
				<?php endif; ?>
				
				<p class="before"><?php echo esc_html_e('before'); ?></p>
			</div>
			
			<div class="col col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="col_inner grey_bg col-align-items-center padding-3em">
					
					<?php 
					if ( $sub ) {
						echo '<h3>' . $sub . '</h3>';
					}
					if ( $content ) {
					echo '<p>' . $content . '</p>';
					}
					
					echo ctaButton(); ?>
					
				</div>
			</div>
			
			<div class="col col-lg-4 col-md-4 col-sm-12 col-xs-12">
				
				<?php if ( !empty( $afterimg ) ): ?>
				<img data-object-fit="cover" src="<?php echo esc_url($afterimg['url']); ?>" alt="<?php echo esc_attr($afterimg['alt']); ?>" class="object-fit">
				<?php endif; ?>
				
				<p class="after"><?php echo esc_html_e('after'); ?></p>
			</div>
		</div>
		
		<?php endif; ?>
		
	</div>
</section>
<!-- / before + afters -->