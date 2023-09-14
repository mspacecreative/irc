<?php
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) : ?>
<section class="section">
	<div class="inner">
		<?php
		$rowheading = get_field('row_heading');
		$rowheadingalignment = get_field('row_heading_alignment');
		
		if ( $rowheading && $rowheadingalignment ) {
			echo '<h1 class="text-align-center">' . $rowheading . '</h1>';
		} elseif ( $rowheading ) {
			echo '<h1>' . $rowheading . '</h1>';
		} ?>
		<div class="carousel">
				
			<?php while ( $loop->have_posts() ) : $loop->the_post();
		
			$imagelogo = get_field('logo_image', get_the_ID());
			$size = 'medium';
			$logolink = get_field('logo_link', get_the_ID());
			$shrinklogo = get_field('square_logo', get_the_ID());
				
			if ( $imagelogo && $logolink && $shrinklogo ) : ?>
			<div>
				<a href="<?php echo $logolink ?>" target="_blank">
					<span class="shrink-logo">
						<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
					</span>
				</a>
			</div>
			<?php elseif ( $imagelogo && $logolink ) : ?>
			<div>
				<a href="<?php echo $logolink ?>" target="_blank">
					<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
				</a>
			</div>
			<?php elseif ( $imagelogo ) : ?>
			<div>
				<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
			</div>
			<?php endif; ?>
			
			<?php endwhile; ?>
			
		</div>
	</div>
</section>
<?php endif; wp_reset_query(); ?>