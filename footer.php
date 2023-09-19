		<footer>
			<div class="inner_container top-padding">
				<?php 
				$footerwidth = get_field('footer_content_width', 'options');
				switch ( $footerwidth ) {
					case 'narrow':
						$value = 'narrow';
						break;
					default:
						$value = '';
				} ?>
				<?php 
				if ( is_active_sidebar('footer-area-1') || is_active_sidebar('footer-area-2') || is_active_sidebar('footer-area-3') || is_active_sidebar('footer-area-4') ) {
					echo
					'<div class="row gutter_space_2 between-lg between-md">';
					if ( ! dynamic_sidebar( 'footer-area-1' ) && is_active_sidebar( 'footer-area-1' ) ) {
						dynamic_sidebar( 'footer-area-1' );
					}
					if ( ! dynamic_sidebar( 'footer-area-2' ) && is_active_sidebar( 'footer-area-2' ) ) {
						dynamic_sidebar( 'footer-area-2' );
					}
					if ( ! dynamic_sidebar( 'footer-area-3' ) && is_active_sidebar( 'footer-area-3' ) ) {
						dynamic_sidebar( 'footer-area-3' );
					}
					if ( ! dynamic_sidebar( 'footer-area-4' ) && is_active_sidebar( 'footer-area-4' ) ) {
						dynamic_sidebar( 'footer-area-4' );
					}
					echo
					'</div>';
				}
				?>
			</div>
			<div class="light inner_container <?php echo $value ?>" style="padding-bottom: 1em;">
				<p class="text__small"><?php echo __('&copy '); echo date('Y '); echo bloginfo('title'); echo __('. All rights reserved.'); ?></p>
			</div>
		</footer>

		<?php
		$args = array(
			'post_type' => 'director',
			'posts_per_page' => -1
		);
		$loop = new WP_Query($args);
		$count = 0;
		if ($loop->have_posts()) {
			echo
			'
			<div class="modal-backdrop"></div>
			<div class="modal">
				<div class="modal_table">
					<div class="modal_table_cell">';
					while ($loop->have_posts()) {
						$loop->the_post();
						$content = get_the_content($loop->ID);
						$count = $count + 1;
						echo
						'<div id="bio-' . $count . '" class="bio-container">
							<button class="closeModalButton">
								<span style="background-color: #000;">&nbsp;</span>
								<span style="background-color: #000;">&nbsp;</span>
							</button>'
							. $content . 
						'</div>';
					}
					echo
					'</div>
				</div>
			</div>';
		} wp_reset_query();
		?>
	    
	   	<?php wp_footer(); ?>
	</body>
</html>