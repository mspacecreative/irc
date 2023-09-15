<?php
get_header();

$pagetitle = get_field('hide_page_title'); ?>

<div class="content-wrapper">

	<div id="main-content" class="main-content bottom-padding">

		<div class="inner_container">

			<div class="row between-lg between-md top-bottom-margin-2em bottom-padding">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<?php breadcrumbs(); ?>
				</div>
				<div class="row col-lg-6 col-md-6 col-sm-12 col-xs-12 end-lg end-md" style="margin-left:0; margin-right: 0;">
					<a href="<?php echo home_url('news'); ?>" class="text__small">
						All News <span class="arrow__right"></span>
					</a>
				</div>
			</div>

			<div class="row">

				<div class="col-lg-offset-4 col-md-offset-4 col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<?php 
					if ( !$pagetitle ) : ?>
					<h1 class="post__title"><?php the_title(); ?></h1>
					<?php endif; ?>
				</div>

				<main class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<div class="post__date col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<?php echo the_date(); ?>
					</div>

					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

						<?php 
						if ( have_posts() ):
						while ( have_posts() ): the_post();
						
						the_content(); ?>
							
						<?php endwhile;
							
						else : ?>

						<p>no posts found.</p>
							
						<?php endif; ?>

					</div>

				</main>

			</div>

		</div>

	</div>

</div>

<?php get_footer();