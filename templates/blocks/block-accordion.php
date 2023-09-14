<?php
$heading = get_field('heading');
$anchor = get_field('anchor'); ?>
<section<?php if ( $anchor ): echo ' id="'; echo $anchor; echo '"'; endif; ?>class="section darkGreyBg light">
	<div class="inner_container maxWidth980">
	<?php
	if ( $heading ) {
		echo '<h2>'. $heading . '</h2>';
	}
	if ( have_rows('tab_row') ) {
		while ( have_rows('tab_row') ) {
			the_row();
			$title = get_sub_field('title');
			$content = get_sub_field('content');
			echo '<div class="tabRow">
			      	<a href="#">' . $title . '</a>
				  	<div class="tabAnswer">' . $content . '</div>
				  </div>';
		}
	} ?>
	</div>
</section>