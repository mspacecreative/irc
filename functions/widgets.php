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
}