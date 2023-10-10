<?php
function breadcrumbs() {
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<div class="breadcrumbs"><p id="breadcrumbs">','</p></div>' );
    }
}

// ADDING CUSTOM PARENT LINKS TO BREADCRUMBS
add_filter( 'wpseo_breadcrumb_links', 'unbox_yoast_seo_breadcrumb_append_link' );
 function unbox_yoast_seo_breadcrumb_append_link( $links ) {
     
     if( is_singular('post')){
        $breadcrumb = array(
            array(
            'url' => site_url( '/news/' ),
            'text' => 'News',
            )
        );
       array_splice($links, -1, 0, $breadcrumb); 
     } elseif( is_singular('services')){
        $breadcrumb = array(
           array(
           'url' => site_url( '/services/' ),
           'text' => 'Services',
           )
        );
      array_splice($links, -1, 0, $breadcrumb); 
    } elseif( is_singular('business')){
        $breadcrumb = array(
           array(
           'url' => site_url( '/businesst' ),
           'text' => 'Business',
           )
           array(
            'url' => site_url( '/business/inuvialuit-business-list' ),
            'text' => 'Inuvialuit Business List',
            )
        );
      array_splice($links, -1, 0, $breadcrumb); 
    } elseif( is_tax('communities')){
        $breadcrumb = array(
           array(
           'url' => site_url( '/about/communities/community-corporations' ),
           'text' => 'Community Corporations',
           )
       );
      array_splice($links, -1, 0, $breadcrumb); 
    }
     return $links;
 }