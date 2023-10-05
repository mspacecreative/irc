<?php
$posttype = get_field('post_type');
$cols = get_field('columns');
$posts_per_page = get_field('number_of_posts');
$bottom_margin = $posttype == 'post' ? ' style="margin-block-end: 1rem;"' : '';
$link_to_post = get_field('link_to_post');
$placeholder_image = get_template_directory_uri() . '/assets/img/placeholders/irc-gyrfalcon-placeholder.svg';
$placeholder_images = get_field('allow_placeholders');
$taxonomy = get_field('taxonomy_select');
$filter_visibility = get_field('filter_visibility');

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

<?php if ($filter_visibility) : ?>
    
    <div class="taxonomy-filter-container">
    <?php $terms = get_terms( array(
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

<?php endif;

    while ( $loop->have_posts() ) : $loop->the_post();
    $featured_img = get_the_post_thumbnail(get_the_ID(), 'card-image');
    $title = get_the_title();
    $permalink = get_the_permalink();
    $job_title = get_field('job_title', get_the_ID());
    $phone_number = get_field('phone_number', get_the_ID());
    $email_address = get_field('email_address', get_the_ID());
    $mailing_address = get_field('mailing_address', get_the_ID());

    echo
    '<li class="wp-block-post">';

        if ($link_to_post) {
        echo
        '<a href="' . $permalink . '">';
        }

        if (!empty($featured_img) && !$placeholder_images) {
        echo   
        '<figure class="wp-block-post-featured-image">'
            . $featured_img .
        '</figure>';
        } elseif (empty($featured_img) && $placeholder_images) {
        echo   
        '<figure class="wp-block-post-featured-image">
            <img src="' . $placeholder_image . '" class="card__placeholder">
        </figure>';
        } else {
        echo   
        '<figure class="wp-block-post-featured-image">'
            . $featured_img .
        '</figure>';
        }
            
        $departments = get_the_terms($loop->ID, 'department');

        if ($departments) {
            echo
            '<div class="text__small bottom-margin-1em">';
            foreach ($departments as $department) { 
                echo $department->name;
            }
            echo 
            '</div>';
        }

        echo
        '<h2 class="wp-block-post-title has-medium-font-size"' . $bottom_margin . '>' . esc_html__($title) . '</h2>';

        if ( have_rows('staff_data', get_the_ID()) ) {
        echo
        '<ul class="staff-data">';
        while ( have_rows('staff_data', get_the_ID()) ) {
            the_row();
            if ( $data = get_row() ) {
                foreach (array_slice($data,0,1) as $key => $value) {
                    if (!empty($value) ) { 
                        $field = get_sub_field_object( $key );
                        echo
                        '<li class="has-small-font-size">' . $value . '</li>';
                    }
                }
                foreach (array_slice($data,1) as $key => $value) {
                    if (!empty($value) ) { 
                        $field = get_sub_field_object( $key );
                        echo
                        '<li><strong>' . $field['label'] . ':</strong> ' . $value . '</li>';
                    }
                }
            }
        }
        echo 
        '</ul>';
        }

        if ($posttype == 'post') {
            echo
            '<div class="wp-block-post-date">'
                . get_the_date(__('F j, Y', 'irc')) .
            '</div>';
        }
        
        if ($link_to_post) {
        echo
        '</a>';
        }
    echo
    '</li>';
endwhile; ?>
</ul>

<?php wp_reset_query();
