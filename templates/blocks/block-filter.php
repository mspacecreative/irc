<?php
$args = array(
    'post_type' => 'business',
    // 'tax_query' => array(
    //     array(
    //         'taxonomy' => 'business-category'
    //     );
    // );
);

$loop = new WP_Query($args);

if ($loop->have_posts()) {
    echo
    '<select>';
    while ($loop->have_posts()) {
        $loop->the_post();
        $terms = get_the_terms($loop->ID, 'business-category');
        foreach ($terms as $term) {
        echo
        '<option value=""' . $term->name . '">' . $term->name . '</option>';
        }
    }
    echo
    '</select>';
} wp_reset_query();