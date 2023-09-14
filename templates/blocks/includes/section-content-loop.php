<?php 
$padding = get_field('section_padding');
$content = get_field('content_editor');
$txtalign = get_field('text_alignment');

switch ( $padding ) {
	case 'top':
		$space = 'topPadding';
		break;
	case 'bottom':
		$space = 'bottomPadding';
		break;
	case 'both':
		$space = 'topBottomPadding';
		break;
	default:
		$space = '';
}
switch ( $txtalign ) {
	case 'left':
		$text = '';
		break;
	case 'center':
		$text = 'text-align-center';
		break;
	case 'right':
		$text = 'text-align-right';
		break;
	default:
		$text = '';
} ?>
	
<div class="<?php if ( $space && $text ): echo $space; echo ' '; echo $text; echo ' '; elseif ( $space ): echo $space; echo ' '; elseif ( $text ): echo $text; echo ' '; endif; ?>clear">
	
	<?php if ( $content ) {
		echo $content;
		include 'content-cta-button.php';
	} ?>
			
</div>