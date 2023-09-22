<?php
get_header();

$pagetitle = get_field('hide_page_title');
$date = the_date('F j, Y'); ?>

<div class="content-wrapper">

	<div id="main-content" class="main-content bottom-padding top-padding-2em">

		<div class="inner_container">

			<div class="row between-lg between-md top-bottom-margin-2em">
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					<?php breadcrumbs(); ?>
				</div>
				<div class="row col-lg-2 col-md-2 col-sm-12 col-xs-12 end-lg end-md" style="margin-left:0; margin-right: 0;">
					<?php
					$post_type = get_post_type(); ?>
					<a href="<?php echo get_post_type_archive_link($post_type); ?>" class="text__small">
						<?php echo __('All '), ucfirst($post_type), __('s'); ?> <span class="arrow__right"></span>
					</a>
				</div>
			</div>

			<div class="row">

				<div class="col-lg-offset-4 col-md-offset-4 col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<?php 
					if ( !$pagetitle ) : ?>
					<h1 class="post__title"><?php the_title(); ?></h1>
					<?php endif; ?>

					<div class="hide-on-desktop bottom-margin-2em">
						<p class="text__small"><?php $date ?></p>
					</div>
				</div>

				<main class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<div class="post__date col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="hide-on-mobile">
						<?php $date ?>
						</div>
						
						<?php if (have_rows('contact_information')) : ?>
						<div class="contact-information">
							<h3><?php echo __('Contact Information'); ?></h3>
							<?php while (have_rows('contact_information')) : the_row();
							$position = get_sub_field('position__title');
							$name = get_sub_field('name');
							$emailaddress = get_sub_field('email_address');

							if ($name) : ?>
							<p style="font-weight: 600;"><?php echo $name ?></p>
							<?php endif;

							if ($position) : ?>
							<p><?php echo $position ?></p>
							<?php endif; ?>

							<?php if ($emailaddress) : ?>
							<p style="margin-block-start: 1rem;"><?php echo __('Email: ') . '<a href="mailto:' . $emailaddress . '">' . $emailaddress . '</a>'; ?></p>
							<?php endif; ?>

							<?php if (have_rows('phone_numbers')) : ?>
							<p style="margin-block-start: 1rem;"><?php echo __('Phone:'); ?>
							<ul class="phone-numbers">
							<?php while (have_rows('phone_numbers')) : the_row(); ?>
								<li><?php echo get_sub_field('phone_number'); ?></li>
							<?php endwhile; ?>
							</ul>
							<?php endif; ?>

							<?php endwhile; ?>

						</div>
						<?php endif; ?>
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