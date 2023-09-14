<?php
// Header navigation
function theme_nav() {
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'primary-menu-container',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="menu">%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
            )
        );
}

function theme_secondary_nav() {
    wp_nav_menu(
        array(
            'theme_location'  => 'header-secondary-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'secondary-menu-container',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="menu">%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
        )
    );
}

function combined_navs() {
    $secondary_menu_items = wp_nav_menu( array(
        'theme_location' => 'header-secondary-menu',
        'fallback_cb'    => false,
        'container'      => '',
        'items_wrap'     => '%3$s',
        'echo'           => false
    ));
    wp_nav_menu(
        array(
            'theme_location'  => 'combined-navs',
            'items_wrap'      => '<ul class="menu menu__mobile">%3$s ' . $secondary_menu_items . '</ul>',
        )
    );
}

// Register Navigation
function register_theme_menu() {
    register_nav_menus( array(
        'header-menu'  => esc_html( 'Header Menu', 'irc' ),
        'header-secondary-menu' => esc_html('Header Secondary Menu', 'irc'),
        // 'combined-navs' => esc_html('Combined Navigation for Mobile')
    ) );
}
add_action( 'init', 'register_theme_menu' );

// function my_wp_nav_menu_args( $args = '' ) {
//     $args['container'] = false;
//     return $args;
// }
// add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );