<?php
$posttype = get_field('post_type');
$cols = get_field('columns');

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
    default:
        $cols = '3';
        break;
}

// CUSTOM CLASS	
$className = '';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

$loop = new WP_Query( array(
    'post_type' => $posttype,
    'orderby' => 'name',
    'order' => 'ASC',
) ); ?>
<ul class="is-flex-container columns-<?php echo $cols ?> wp-block-post-template-container wp-block-post-template wp-block-terms<?php echo esc_attr($className); ?>">
<?php while ( $loop->have_posts() ) : $loop->the_post();
    $featured_img = get_the_post_thumbnail(get_the_ID(), 'swiper-thumb');
    $title = get_the_title();
    $permalink = get_the_permalink();

    echo
    '<li class="wp-block-post">
        <figure class="wp-block-post-featured-image">
            <a href="' . $permalink . '">'
                . $featured_img . 
            '</a>
        </figure>
        <h3 class="wp-block-post-title has-large-font-size">' . esc_html__($title) . '</h3>
    </li>';
endwhile; ?>
</ul>

<?php wp_reset_query();
