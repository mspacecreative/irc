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
    <option><?php echo $term->name ?></option>
<?php endif; ?>
</select>