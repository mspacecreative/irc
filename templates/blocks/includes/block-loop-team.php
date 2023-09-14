<?php
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) :

$rowheading = get_field('row_heading');
$rowsubheading = get_field('row_sub_heading');
$centeredheading = get_field('row_heading_alignment');
$anchor = get_field('block_anchor'); ?>

<?php if ( $anchor ): ?>
<section id="<?php echo $anchor ?>" class="section">
<?php else : ?>
<section class="section">
<?php endif; ?>

	<div class="inner">
		
		<?php if ( $rowheading && $rowsubheading && $centeredheading ) {
			echo '
				<div class="text-align-center bottom-margin">
					<h1>' . $rowheading . '</h1>
					<h4>' . $rowsubheading . '</h4>
				</div>
				';
		} elseif ( $rowheading && $rowsubheading ) {
			echo '
				<h1>' . $rowheading . '</h1>
				<h4 class="bottom-margin">' . $rowsubheading . '</h4>
				';
		} elseif ( $rowheading && $centeredheading ) {
			echo '<h1 class="text-align-center bottom-margin">' . $rowheading . '</h1>';
		} elseif ( $rowheading ) {
			echo '<h1 class="bottom-margin">' . $rowheading . '</h1>';
		} ?>
		
		<div class="row gutter_space_2 team-container clear center-lg center-md">
					
			<div class="bioContainerUnderlay"></div>
					
			<?php while ( $loop->have_posts() ) : $loop->the_post();
			
			$position = get_field('position__title', get_the_ID());
			$colCount = get_field('column_count');
			$shortbio = get_field('short_bio', get_the_ID());
			$displaybio = get_field('display_short_bio', get_the_ID());
			$link = get_permalink();
			
			if ( $colCount == 'two' ): ?>
			<div class="team-profile col col-lg-6 col-md-6 col-sm-6 col-xs-12 text-align-center">
			
			<?php elseif ( $colCount == 'three' ): ?>
			<div class="team-profile col col-lg-4 col-md-4 col-sm-6 col-xs-12 text-align-center">
			
			<?php elseif ( $colCount == 'four' ): ?>
			<div class="team-profile col col-lg-3 col-md-3 col-sm-6 col-xs-12 text-align-center">
			
			<?php elseif ( $colCount == 'five' ): ?>
			<div class="team-profile col col-lg-1_5 col-md-1_5 col-sm-1_5 col-xs-12 text-align-center">
			
			<?php else : ?>
			<div class="team-profile col col-lg-4 col-md-4 col-sm-6 col-xs-12 text-align-center">
			<?php endif;
			
				if ( $shortbio ) : ?>				
				<a href="#" class="profile-img-wrap">
					<div class="plus-sign">
						<i class="fa fa-plus"></i>
					</div>
					<div class="profile-overlay"></div>
					<?php if ( has_post_thumbnail() ) {
						echo the_post_thumbnail( array(400,400) );
					} ?>
				</a>
				<h4><?php the_title(); ?></h4>
							
				<?php if ( $position ) {
					echo '<p>' . $position . '</p>';
				} ?>
				<?php
				else :
				
				if ( has_post_thumbnail() ) : ?>
				<a href="<?php echo $link ?>" class="profile-img-wrap">
					<div class="plus-sign">
						<i class="fa fa-plus"></i>
					</div>
					<div class="profile-overlay"></div>
					<?php echo the_post_thumbnail( array(400,400) ); ?>
				</a>
				
				<h4><?php the_title(); ?></h4>
							
				<?php if ( $position ) {
					echo '<p>' . $position . '</p>';
				} ?>
				<?php else : ?>
				<a href="<?php echo $link ?>" class="profile-img-wrap">
					<h4><?php the_title(); ?></h4>
							
					<?php if ( $position ) {
						echo '<p>' . $position . '</p>';
					} ?>
				</a>
				<?php endif;
				endif; ?>
												
			</div>
					 
			<?php if ( $displaybio ) : ?>
			<div class="team-bio-container">
				<div class="team-bio-inner">
					<span class="close-button desktop"></span>
					<?php
					if ( $shortbio ): ?>
						<div class="shortBio">
							<?php echo $shortbio ?>
							<a class="button light" href="<?php echo $link ?>">Read more</a>
						</div>
					<?php endif;
							
					$file = get_field('file', get_the_ID());
					if ( $file ) : ?>
						<p><a class="button light" style="margin-top: 15px;" href="<?php the_field('file'); ?>" download>Download high res head shot</a></p>
					<?php endif; ?>
					
				</div>
			</div>
			<?php endif; ?>
					
			<?php endwhile; ?>
				
		</div>
	</div>
</section>
<?php endif; wp_reset_query();