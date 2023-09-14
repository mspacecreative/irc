<?php
$blockanchor = get_field('block_anchor');
$bgcolor = get_field('background_colour');
$textcolor = get_field('text_colour');
$reverse = get_field('image_on_left');

if ( $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="checkerBoardContainer">
	<div class="verticalDashedLine">&nbsp;</div>
<?php else : ?>
<div class="checkerBoardContainer">
	<div class="verticalDashedLine">&nbsp;</div>
<?php endif;

if ( $reverse ):
	
	if ( $textcolor == 'light' ): ?>
	<div class="row noPadding half_half_section light text_on_left reverse">
	<?php elseif ( $textcolor == 'dark' ): ?>
	<div class="row noPadding half_half_section text_on_left reverse">
	<?php else : ?>
	<div class="row noPadding half_half_section text_on_left reverse">
	<?php endif; ?>
		
		<?php if ( $bgcolor == 'lightblue' ): ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 no-right-padding blue_bg">
		<?php elseif ( $bgcolor == 'orange' ): ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 no-right-padding orange_bg">
		<?php elseif ( $bgcolor == 'navy' ): ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 no-right-padding navy_bg">
		<?php else : ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 no-right-padding orange_bg">
		<?php endif; ?>
		
			<div class="col-inner">
				<?php
				$heading = get_field('heading');
				$content = get_field('content'); 
				$icon = get_field('icon');
				$size = 'icon';
				
				if ( $icon ) {
					echo '<div class="imgContainer">' .  wp_get_attachment_image( $icon, $size ) . '</div>';
				}
				
				if ( $heading ) {
					echo '<h2>' . $heading . '</h2>';
				}
				if ( $content ) {
					echo $content;
				}
				
				include 'includes/cta-button-single.php'; ?>
			</div>
		</div>
		<?php 
		$featuredimg = get_field('featured_image');
		if ( !empty( $featuredimg ) ): ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 who_we_are no-left-padding absolute_img_container">
			<img data-object-fit="cover" class="absolute_img" src="<?php echo esc_url($featuredimg['url']); ?>" alt="<?php echo esc_attr($featuredimg['alt']); ?>">
		</div>
		<?php endif; ?>
	</div>
	
<?php else :
	if ( $textcolor == 'light' ): ?>
	<div class="row noPadding half_half_section light text_on_left">
	<?php elseif ( $textcolor == 'dark' ): ?>
	<div class="row noPadding half_half_section text_on_left">
	<?php else : ?>
	<div class="row noPadding half_half_section text_on_left">
	<?php endif; ?>
		
		<?php if ( $bgcolor == 'lightblue' && $textcolor == 'dark' ): ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 no-right-padding blue_bg dark">
		<?php elseif ( $bgcolor == 'lightblue' ): ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 no-right-padding blue_bg">
		<?php elseif ( $bgcolor == 'orange' ): ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 no-right-padding orange_bg">
		<?php elseif ( $bgcolor == 'navy' ): ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 no-right-padding navy_bg">
		<?php else : ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 no-right-padding orange_bg">
		<?php endif; ?>
		
			<div class="col-inner">
				<?php
				$heading = get_field('heading');
				$content = get_field('content');
				$icon = get_field('icon');
				$size = 'icon';
				
				if ( $icon ) {
					echo '<div class="imgContainer">' .  wp_get_attachment_image( $icon, $size ) . '</div>';
				}
				
				if ( $heading ) {
					echo '<h2>' . $heading . '</h2>';
				}
				if ( $content ) {
					echo $content;
				}
				
				include 'includes/cta-button-single.php'; ?>
			</div>
		</div>
		<?php 
		$featuredimg = get_field('featured_image');
		if ( !empty( $featuredimg ) ): ?>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 who_we_are no-left-padding absolute_img_container">
			<img data-object-fit="cover" class="absolute_img" src="<?php echo esc_url($featuredimg['url']); ?>" alt="<?php echo esc_attr($featuredimg['alt']); ?>">
		</div>
		<?php endif; ?>
	</div>
	
<?php endif; ?>
	
</div>