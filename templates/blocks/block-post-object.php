<?php
$postobject = get_field('post_object');
$cols = get_field('columns');
$showimg = get_field('display_featured_iamge');

switch($cols) {
    case '1':
        $cols = '1';
        break;
    case '2':
        $cols = '2';
        break;
    case '3':
        $cols = '3';
        break;
    case '4':
        $cols = '4';
        break;
    default:
        $cols = '3';
        break;
}

// CUSTOM CLASS	
$className = '';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if ($postobject) {
echo
'<ul class="is-flex-container columns-' . $cols . ' wp-block-post-template-container wp-block-post-template wp-block-post-object' . esc_attr($className) . '">';
    
    foreach ($postobject as $object) {
    setup_postdata($object);
    $featured_img = get_the_post_thumbnail($object->ID, 'card-image');
    $title = get_the_title($object->ID);
    $permalink = get_the_permalink($object->ID);

    echo
    '<li class="wp-block-post">
        <a href="' . $permalink . '"></a>';
        if ($showimg) {
        echo
        '<figure class="wp-block-post-featured-image">
            <a href="' . $permalink . '">'
                . $featured_img . 
            '</a>
        </figure>';
        }
        echo
        '<h3 class="wp-block-post-title has-medium-font-size">' . esc_html__($title) . '</h3>
    </li>';
    }
echo
'</ul>';
}
