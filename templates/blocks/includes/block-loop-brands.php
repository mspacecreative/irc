<?php
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) : ?>
<!-- Partners -->
<section class="section">
	<div class="inner">
		<!--<h3 class="align-center">THANK YOU TO OUR PARTNERS &amp; SPONSORS</h3>-->
		
		<?php while ( $loop->have_posts() ) : $loop->the_post();
		
		$format = get_field('display_format');
		$imagelogo = get_field('logo_image');
		$size = 'medium';
		$logolink = get_field('logo_link');
		$shrinklogo = get_field('square_logo');
		$colCount = get_field('column_count');
		
		if ( $format == 'carousel' ) : ?>
		
		<div class="partner-slider">
				
			<?php if ( $imagelogo && $logolink && $shrinklogo ) : ?>
			<a href="<?php the_field('logo_link', get_the_ID()); ?>" target="_blank">
				<span class="shrink-logo">
					<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
				</span>
			</a>
			<?php elseif ( $imagelogo && $logolink ) : ?>
			<a href="<?php the_field('logo_link', get_the_ID()); ?>" target="_blank">
				<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
			</a>
			<?php elseif ( $imagelogo ) : ?>
				<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
			<?php endif; ?>
			
		</div>
				
		<?php elseif ( $format == 'grid' ) :
		
		if ( $colCount == 'two' ): ?>
		<button class="col col-lg-6 col-md-6 col-sm-6 col-xs-12 text-align-center">
		
		<?php elseif ( $colCount == 'three' ): ?>
		<button class="col col-lg-4 col-md-4 col-sm-6 col-xs-12 text-align-center">
		
		<?php elseif ( $colCount == 'four' ): ?>
		<button class="col col-lg-3 col-md-3 col-sm-6 col-xs-12 text-align-center">
		
		<?php else : ?>
		<button class="col col-lg-4 col-md-4 col-sm-6 col-xs-12 text-align-center">
		<?php endif; ?>
		
			<div class="logo-cell">
				<?php
				if ( $imagelogo && $logolink && $shrinklogo ) : ?>
				<a href="<?php the_field('logo_link', get_the_ID()); ?>" target="_blank">
					<span class="shrink-logo">
						<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
					</span>
				</a>
				<?php elseif ( $imagelogo && $logolink ) : ?>
				<a href="<?php the_field('logo_link', get_the_ID()); ?>" target="_blank">
					<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
				</a>
				<?php elseif ( $imagelogo ) : ?>
					<?php echo wp_get_attachment_image( $imagelogo, $size ); ?>
				<?php endif; ?>
			</div>
			
		</button>
		<?php endif;
		
		endwhile; ?>
		
	</div>
	
</section>
<!-- /Partners -->
<?php endif; wp_reset_postdata(); ?>