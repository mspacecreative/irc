<?php

function gutenberg_editor_assets() {
    // wp_register_style( 'google-font', 'https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,400;0,600;1,400;1,600&family=Montserrat:ital,wght@0,400;0,600;1,400;1,600&display=swap', array(), null );
	// wp_enqueue_style( 'google-font' );
    wp_register_style('my-gutenberg-editor-styles', get_theme_file_uri('/assets/css/gutenberg.css'), false);
    wp_enqueue_style('my-gutenberg-editor-styles');
}
add_action('enqueue_block_editor_assets', 'gutenberg_editor_assets');

function fontawesome_dashboard() {
    wp_enqueue_style('fontawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', '', null, 'all');
 }
 
 add_action('admin_init', 'fontawesome_dashboard');