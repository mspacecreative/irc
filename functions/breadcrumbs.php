<?php
function breadcrumbs() {
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<div class="breadcrumbs"><p id="breadcrumbs">','</p></div>' );
    }
}

// ADDING NEWS INDEX LINK TO BREADCRUMBS
add_filter( 'wpseo_breadcrumb_links', 'unbox_yoast_seo_breadcrumb_append_link' );
 function unbox_yoast_seo_breadcrumb_append_link( $links ) {
     global $post;
     if( is_singular('post')){
         $breadcrumb = array(
            array(
            'url' => site_url( '/news/' ),
            'text' => 'News',
            )
        );
       array_splice($links, -1, 0, $breadcrumb); 
     }
     return $links;
 }

 // ADDING SERVICES INDEX LINK TO BREADCRUMBS
add_filter( 'wpseo_breadcrumb_links', 'unbox_yoast_seo_breadcrumb_append_link' );
function unbox_yoast_seo_breadcrumb_append_link( $links ) {
    global $post;
    if( is_singular('services')){
        $breadcrumb = array(
           array(
           'url' => site_url( '/services/' ),
           'text' => 'Services',
           )
       );
      array_splice($links, -1, 0, $breadcrumb); 
    }
    return $links;
}