<select>
<?php
$args = array(
    'taxonomy'   => 'business-category',
    'orderby'    => 'name',
    'order'      => 'ASC',
    'hide_empty' => false,
);
$loop = new WP_Term_Query($args);
foreach($loop->get_terms() as $term) : ?>
    <option data-id=".<?php echo strtolower($term->name); ?>"><?php echo $term->name ?></option>
<?php 
endforeach; ?>
</select>