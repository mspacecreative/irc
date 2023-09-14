<?php
$heading = get_sub_field('heading');
$iconsizing = get_sub_field('icon_sizing');
$icon = get_sub_field('icon');
$size = 'medium';
$content = get_sub_field('content');
					
if ( $heading ) {
	echo '<h3 class="bold">' . $heading . '</h3>';
}
if ( $icon && $iconsizing && $content ) {
	echo '<div class="icon row larger middle-lg middle-md middle-sm middle-xs" style="flex-direction: column"><div class="iconContainer alt">' . wp_get_attachment_image( $icon, $size ) '</div><p class="icon-text">' . $content . '</p></div>';
} elseif ( $icon && $content ) {
	echo '<div class="icon row middle-lg middle-md middle-sm middle-xs" style="flex-direction: column"><div class="iconContainer">' . wp_get_attachment_image( $icon, $size ) '</div><p class="icon-text">' . $content . '</p></div>';
} elseif ( $icon && $iconsizing ) {
	echo '<div class="icon row middle-lg middle-md middle-sm middle-xs" style="flex-direction: column"><div class="iconContainer alt">' . wp_get_attachment_image( $icon, $size ), '</div></div>';
} elseif ( $icon ) {
	echo '<div class="icon row middle-lg middle-md middle-sm middle-xs" style="flex-direction: column"><div class="iconContainer">' . wp_get_attachment_image( $icon, $size ), '</div></div>';
} elseif ( $content ) {
	echo $content;
}
					
include 'cta-button-inline.php';