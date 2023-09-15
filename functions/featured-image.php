<?php
/* Add Featured Image Support To Your WordPress Theme */
function featured_image_support() {
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'featured_image_support' );