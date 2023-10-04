<?php
// $args = array(
//     'post_type' => 'business',
//     // 'tax_query' => array(
//     //     array(
//     //         'taxonomy' => 'business-category'
//     //     );
//     // );
// );

// $loop = new WP_Query($args);

// if ($loop->have_posts()) {
    echo
    '<select>';
    // while ($loop->have_posts()) {
    //     $loop->the_post();
        $args = array(
            'taxonomy'   => 'business-category',
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => false,
        );
        $loop = new WP_Term_Query($args);
        foreach($loop->get_terms() as $term) {
            echo '<option>' . $term->name . '</option>';
        }
    // }
    echo
    '</select>';
// } wp_reset_query();