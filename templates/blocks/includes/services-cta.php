<?php

if ( have_rows('cta', $post->ID) ):
	while ( have_rows('cta', $post->ID) ): the_row();
							
	setup_postdata($post);
	$button_type = get_sub_field('button_type', $post->ID);
	$pagelink = get_sub_field('page_link', $post->ID);
	$anchorlink = get_sub_field('anchor_link', $post->ID);
	$internalurl = get_sub_field('internal_url', $post->ID);
	$externallink = get_sub_field('external_link', $post->ID);
	$label = get_sub_field('label', $post->ID); ?>
							
	<a 
	<?php 
	if ( $button_type === 'internal' ): echo 'href="'; echo $pagelink; echo '"'; 
	elseif ( $button_type === 'anchor' ): echo 'href="#'; echo $anchorlink; echo '"'; 
	elseif ( $button_type === 'internalurl' ): echo 'href="'; echo $internalurl; echo '"'; 
	elseif ( $internalurl === 'external' ): echo 'href="'; echo $externallink; echo '"'; echo 'target="_blank"'; 
	endif; ?> class="button">
	<?php 
	if ( $label ): echo $label; 
	else: echo esc_html_e('Learn more'); 
	endif; ?>
	</a>
							
	<?php 
	endwhile;
endif;