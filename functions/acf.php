<?php

// REGISTER JSON BLOCKS
function load_json_blocks() {
	register_block_type( get_theme_file_path('/templates/blocks/quote/block.json') );
}
add_action( 'acf/init', 'load_json_blocks' );

// REGISTER ACF BLOCKS
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {

		// register loop block
		acf_register_block(array(
			'name'				=> 'loop',
			'title'				=> __('Loop Block'),
			'description'		=> __('Displays all posts related to a chosen post type'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'grid-view',
			'keywords'			=> array( 'post type', 'loop', 'list' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

	}
}
add_action('acf/init', 'my_acf_init');

function my_acf_block_render_callback( $block ) {
	
	$slug = str_replace('acf/', '', $block['name']);
	
	if( file_exists( get_theme_file_path("/templates/blocks/block-{$slug}.php") ) ) {
		include( get_theme_file_path("/templates/blocks/block-{$slug}.php") );
	}
}