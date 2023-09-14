<!-- cta button -->
<?php 
// CUSTOM ID
$id = 'cta-button' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
// CUSTOM CLASS	
$className = 'cta-button';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

echo ctaButton(); ?>
<!-- / cta button -->