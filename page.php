<?php
get_header();

$pagetitle = get_field('hide_page_title');
$sidebar = get_field('show_sidebar'); ?>

<div class="content-wrapper">	
	
	<main id="main-content" class="main-content top-bottom-padding">

		<?php 
		if ( !$pagetitle ) : ?>
		<div class="inner_container">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php endif;

		if ( have_posts() ):
		while ( have_posts() ): the_post(); ?>
			
		<div class="inner_container">
			<?php the_content(); ?>
		</div>
			
		<?php endwhile;
			
		else : ?>

		<div class="inner_container">
		<p>no posts found.</p>
		</div>
			
		<?php endif; ?>

	</main>

	<?php if ($sidebar) : ?>
	<aside>
		
	</aside>
	<?php endif; ?>

</div>

<?php get_footer();