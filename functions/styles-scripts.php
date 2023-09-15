<?php

// PRECONNECT LINKS
function irc_preconnect_links() {
    $domain1 = 'https://fonts.googleapis.com';
    $domain2 = 'https://fonts.gstatic.com'; ?>
    <link rel="preconnect" href="<?php echo $domain1; ?>">
    <link rel="preconnect" href="<?php echo $domain2; ?>" crossorigin>
    <?php
}
add_action('wp_head', 'irc_preconnect_links', 5);

// ENQUEUE STYLESHEETS
function irc_styles() {
    
    // RANDOM NUMBER
    $rand_num = rand();

    wp_register_style( 'slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), null );
	wp_enqueue_style( 'slick-css' );

	wp_register_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), true );
	wp_enqueue_script('slick-js');
	
	wp_register_style( 'fontawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), null );
	wp_enqueue_style( 'fontawesome' );

    // MAIN STYLESHEET
	wp_register_style( 'main-styles', get_stylesheet_directory_uri() . '/assets/css/style.css?ver=' . $rand_num, false, null, 'all' );
    wp_enqueue_style('main-styles');

    // MAIN SCRIPTS
	wp_register_script( 'main-scripts', get_stylesheet_directory_uri() . '/assets/js/main.js?ver=' . $rand_num, array('jquery'), null, true);
    wp_enqueue_script('main-scripts');

    // GOOGLE FONTS
    wp_register_style( 'google-font', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap', false, null, 'all' );
    wp_enqueue_style('google-font');

}
add_action( 'wp_enqueue_scripts', 'irc_styles' );
