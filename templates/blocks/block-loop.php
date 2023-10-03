<?php
$posttype = get_field('post_type');
$cols = get_field('columns');
$posts_per_page = get_field('number_of_posts');

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
    'posts_per_page' => $posts_per_page,
    'orderby' => $posttype !== 'post' ? 'name' : '',
    'order' => $posttype !== 'post' ? 'ASC' : '',
) ); ?>
<ul class="is-flex-container columns-<?php echo $cols ?> wp-block-post-template-container wp-block-post-template wp-block-cards<?php echo esc_attr($className); ?>">
<?php while ( $loop->have_posts() ) : $loop->the_post();
    $featured_img = get_the_post_thumbnail(get_the_ID(), 'card-image');
    $title = get_the_title();
    $permalink = get_the_permalink();

    echo
    '<li class="wp-block-post">
        <figure class="wp-block-post-featured-image">
            <a href="' . $permalink . '">'
                . $featured_img . 
            '</a>
        </figure>
        <h2 class="wp-block-post-title has-medium-font-size">' . esc_html__($title) . '</h2>';
    if ($posttype == 'post') {
        echo
        '<div class="wp-block-post-date">'
            . get_the_date(__('F j, Y', 'irc')) .
        '</div>';
    }
    echo
    '</li>';
endwhile; ?>
</ul>

<?php wp_reset_query();
