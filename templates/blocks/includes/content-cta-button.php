<?php if( have_rows('content_cta_button') ): ?>
<?php while( have_rows('content_cta_button') ): the_row();
 	
 	$label = get_sub_field('content_button_label');
 	$internal = get_sub_field('content_internal_link');
 	$external = get_sub_field('content_external_link');
 	$anchor = get_sub_field('content_anchor_link'); ?>
 	
	<ul class="actions">
		
		<li>
			<a href="<?php if ( $internal ): echo $internal; elseif ( $external ): echo $external; elseif ( $anchor ): echo $anchor; else: echo $internal; endif; ?>" <?php if ( $external ): echo 'target="_blank" '; endif; ?>class="<?php if ( $bgcolor === 'dark' || $bgimgoverlay === 'dark' ): echo 'dark'; elseif ( $bgcolor === 'light' || $bgimgoverlay === 'light' ): echo 'light'; else: echo 'light'; endif; ?> button"><?php if ( $label ): echo $label; else: echo __('Learn more'); endif; ?></a>
		</li>
	</ul>

<?php endwhile; ?>
<?php endif; ?>