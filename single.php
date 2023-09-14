<?php
get_header();

$pagetitle = get_field('hide_page_title'); ?>

<div class="content-wrapper">

	<div id="main-content" class="main-content top-bottom-padding">

		<div class="inner_container">

			<main>

				<?php 
				if ( !$pagetitle ) : ?>
				<h1><?php the_title(); ?></h1>
				<?php endif;

				if ( have_posts() ):
				while ( have_posts() ): the_post();
				
				the_content(); ?>
					
				<?php endwhile;
					
				else : ?>

				<p>no posts found.</p>
					
				<?php endif; ?>

			</main>

			<aside class="sidebar">
				<?php dynamic_sidebar( 'posts-sidebar' ); ?>
			</aside>

		</div>

	</div>

</div>

<?php get_footer();