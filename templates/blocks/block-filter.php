<?php
$taxonomies = get_terms( array(
	'taxonomy' => 'business-category',
	'hide_empty' => false
) );

if ( !empty($taxonomies) ) :
	$output = '<select>';
    $output.= '<option value="-&nbsp;Any&nbsp;-" selected>-&nbsp;Any&nbsp;-</option>';
    foreach( $taxonomies as $term ) {
        $output.= '<option value="'. esc_attr( $term->term_id ) .'">'. esc_html( $term->name ) .'</option>';
    }
	$output.='</select>';
	echo $output;
endif; ?>