<!-- cta -->
<?php 
// CUSTOM ID
$id = 'cta-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
// CUSTOM CLASS	
$className = 'cta';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

$heading = get_field('heading');
?>
<section id="<?php echo esc_attr($id); ?>" class="centered<?php echo ' '; echo esc_attr($className); ?>">
	<div class="inner_container padding-6em">
		
		<?php if ( $heading ): ?>
		<h2><?php echo $heading ?></h2>
		<?php endif;
		
		echo ctaButton(); ?>
		
	</div>
</section>
<!-- / cta -->