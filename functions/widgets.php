<?php
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Posts Sidebar', 'irc'),
        'id'   => 'posts-sidebar',
        'description'   => 'Widget Area for Single Post Template',
        'before_widget' => '<div id="sidebar-%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Pages Sidebar', 'irc'),
        'id'   => 'pages-sidebar',
        'description'   => 'Widget Area for Page with Sidebar Template',
        'before_widget' => '<div id="sidebar-%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Footer Area 1', 'irc'),
        'id'   => 'footer-area-1',
        'description'   => 'Widget Area for the first footer column',
        'before_widget' => '<div id="footer-%1$s" class="col col-flex-auto">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Area 2', 'irc'),
        'id'   => 'footer-area-2',
        'description'   => 'Widget Area for the second footer column',
        'before_widget' => '<div id="footer-%1$s" class="col col-flex-auto">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Area 3', 'irc'),
        'id'   => 'footer-area-3',
        'description'   => 'Widget Area for the third footer column',
        'before_widget' => '<div id="footer-%1$s" class="col col-flex-auto">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Area 4', 'irc'),
        'id'   => 'footer-area-4',
        'description'   => 'Widget Area for the fourth footer column',
        'before_widget' => '<div id="footer-%1$s" class="col col-flex-auto">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}