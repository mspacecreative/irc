<?php
function custom_thumbnails() {
	add_image_size( 'card-image', 800, 425, array('center', 'center') );
}
add_action( 'after_setup_theme', 'custom_thumbnails' );

function add_image_size_to_media($sizes){
    $custom_sizes = array(
    'card-image' => 'Card Image'
    );
    return array_merge( $sizes, $custom_sizes );
}
add_filter('image_size_names_choose', 'add_image_size_to_media');