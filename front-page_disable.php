<?php get_header();

get_template_part('templates/hero'); ?>

<?php
$pagetitle = get_field('hide_page_title');
if ( !$pagetitle ) {
	echo '<h1>' . the_title() . '</h1>';
} ?>
	
<?php 
if ( have_posts() ):
while ( have_posts() ): the_post();
	
the_content();
	
endwhile;
	
else : ?>
<p>no posts found.</p>
	
<?php endif; ?>

<?php get_footer();