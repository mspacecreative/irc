<?php
/* Template Name: Sidebar Layout */
get_header();

$pagetitle = get_field('hide_page_title');
$sidebar = get_field('show_sidebar');
$boxedlayout = get_field('boxed_layout'); ?>

<div class="content-wrapper">

	<div class="inner_container bottom-padding top-padding-2em">

		<div class="row gutter_space_2">
	
			<main id="main-content" class="main-content col col-lg-9 col-md-9 col-sm-12 col-xs-12">
				
				<?php 
				if (!is_page('home')) {
				echo
				'<div class="top-bottom-margin-2em">';
				breadcrumbs();
				echo
				'</div>';
				} 
				if ( !$pagetitle ) : ?>
				<h1><?php the_title(); ?></h1>
				<?php endif; ?>
			
				<?php
				if ( have_posts() ):
				while ( have_posts() ): the_post();
					
				the_content();
					
				endwhile;
					
				else : ?>

				<p>no posts found.</p>
					
				<?php endif; ?>

			</main>

			<aside class="sidebar top-bottom-margin-2em col col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<?php 
			if ( ! dynamic_sidebar( 'pages-sidebar' ) ) {
				dynamic_sidebar( 'pages-sidebar' );
			} ?>
			</aside>
		</div>
	</div>

</div>

<?php get_footer();