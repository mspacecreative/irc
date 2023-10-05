<div class="taxonomy-filter-container">
<?php
$taxonomy = get_field('taxonomy_select');
$terms = get_terms( array(
	'taxonomy' => $taxonomy,
	'hide_empty' => false
) );

if ( !empty($terms) ) :
	$output = '<select>';
    $output.= '<option value="-&nbsp;Any&nbsp;-" selected>-&nbsp;Any&nbsp;-</option>';
    foreach( $terms as $term ) {
        $output.= '<option value=".' . esc_attr( $term->term_id ) .'">' . esc_html( $term->name ) . '</option>';
    }
	$output.='</select>';
	echo $output;
endif; ?>
</div>