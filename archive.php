<?php
get_header();

$pagetitle = get_field('hide_page_title');
$sidebar = get_field('show_sidebar');
$boxedlayout = get_field('boxed_layout'); ?>

<div class="content-wrapper">	
	
	<main id="main-content" class="main-content bottom-padding top-padding-2em">

		<div class="inner_container">
			<?php 
			if (!is_page('home')) {
			echo
			'<div class="top-bottom-margin-2em">';
			breadcrumbs();
			echo
			'</div>';
			} 
			if ( !$pagetitle ) : ?>
			<h1><?php the_archive_title('',''); ?></h1>
			<?php endif; ?>
		</div>
	
		<?php
		if ( have_posts() ):
		while ( have_posts() ): the_post();
		
		if ($boxedlayout) : ?>
		<div class="inner_container">
		<?php endif; ?>
			
		<?php echo get_the_archive_description(); echo the_content();

		if ($boxedlayout) : ?>
		</div>
		<?php endif; ?>
			
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