<!-- <select> -->
<!-- <?php -->
// $args = array(
//     'taxonomy'   => 'business-category',
//     'orderby'    => 'name',
//     'order'      => 'ASC',
//     'hide_empty' => false,
// );
// $loop = new WP_Term_Query($args);
// foreach($loop->get_terms() as $term) : ?>
//     <option data-id=".<?php echo strtolower($term->name); ?>"><?php echo $term->name ?></option>
// <?php 
// endforeach; ?>
// </select>

<?php

$taxonomies = get_terms( array(
	'taxonomy' => 'business-category',
	'hide_empty' => false
) );

if ( !empty($taxonomies) ) :
	$output = '<select>';
    foreach( $taxonomies as $term ) {
        $output.= '<optgroup label="'. esc_attr( $term->name ) .'">';
        $output.= '<option value="'. esc_attr( $subcategory->term_id ) .'">
            '. esc_html( $subcategory->name ) .'</option>';
    }
    $output.='</optgroup>';
	$output.='</select>';
	echo $output;
endif;