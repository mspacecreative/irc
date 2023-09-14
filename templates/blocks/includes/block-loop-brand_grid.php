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
		<div class="row middle-lg middle-md center-lg center-md center-sm center-xs top-bottom-margin imgGrid">
			<!--<h3 class="align-center">THANK YOU TO OUR PARTNERS &amp; SPONSORS</h3>-->
			<?php while ( $loop->have_posts() ) : $loop->the_post();
			
			$colCount = get_field('column_count');
			$imagelogo = get_field('logo_image', get_the_ID());
			$size = 'medium';
			$logolink = get_field('logo_link', get_the_ID());
			$shrinklogo = get_field('square_logo', get_the_ID());
			$permalink = get_the_permalink(get_the_ID());
			
			if ( $colCount == 'two' ): ?>
			<div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12 text-align-center bottom-padding">
			
			<?php elseif ( $colCount == 'three' ): ?>
			<div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12 text-align-center bottom-padding">
			
			<?php elseif ( $colCount == 'four' ): ?>
			<div class="col col-lg-3 col-md-3 col-sm-6 col-xs-12 text-align-center bottom-padding">
			
			<?php else : ?>
			<div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12 text-align-center bottom-padding">
			<?php endif; ?>
			
				<div class="logo-cell">
					<?php
					if ( $imagelogo && $logolink && $shrinklogo ) : ?>
					<a href="<?php echo $logolink ?>" target="_blank">
						<span class="shrink-logo">
							<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
						</span>
					</a>
					<?php elseif ( $imagelogo && $shrinklogo ) : ?>
					<a href="<?php echo $permalink ?>">
						<span class="shrink-logo">
							<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
						</span>
					</a>
					<?php elseif ( $imagelogo && $logolink ) : ?>
					<a href="<?php echo $logolink ?>" target="_blank">
						<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
					</a>
					<?php elseif ( $imagelogo ) : ?>
						<a href="<?php echo $permalink ?>">
							<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
						</a>
					<?php endif; ?>
				</div>
				
			</div>
			
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; wp_reset_query(); ?>