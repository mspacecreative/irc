<?php
$bgimg = get_field('background_image');
$bgcolor = get_field('background_color');
$blockanchor = get_field('block_anchor');
$bgimgoverlay = get_field('background_image_overlay');
$width = get_field('content_width');
	
switch ( $bgimgoverlay ) {
	case 'dark':
		$tint = 'dark-overlay light';
		break;
	case 'light':
		$tint = 'light-overlay';
		break;
	default:
		$tint = '';
}

switch ( $bgcolor ) {
	case 'dark':
		$bg = 'darkGreyBg light';
		break;
	case 'light':
		$bg = 'lightbg';
		break;
	default:
		$bg = '';
} ?>

<div<?php if ( $blockanchor ): echo ' id="'; echo $blockanchor; echo '" '; endif; ?>class="<?php if ( $bg ): echo $bg; echo ' '; endif; if ( $bgimg ): echo 'bg-img-cover'; endif; if ( $tint ): echo ' '; echo $tint; echo ' '; endif; ?>content-section"<?php if ( $bgimg ): echo ' style="background-image: url('; echo $bgimg; echo ');'; endif; ?>">
	
	<div class="bullet-points inner_container<?php if ( $width ): echo ' maxWidth850'; endif; ?>">
		<?php include('includes/section-content-loop.php'); ?>
	</div>
	
</div>