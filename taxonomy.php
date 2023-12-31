<?php
get_header();

$pagetitle = get_field('hide_page_title');
$date = get_the_date(__('F j, Y', 'irc'));
$post_type = get_post_type();
$layout = get_field('layout');
$featuredimg = get_field('featured_image'); ?>

<div class="content-wrapper">

	<div id="main-content" class="main-content bottom-padding">

		<div class="inner_container">

			<div class="row between-lg between-md top-bottom-margin-2em middle-lg middle-md" style="row-gap:1rem;">
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					<?php breadcrumbs(); ?>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 row end-lg end-md" style="margin-left:0; margin-right: 0;">
					<a href="<?php echo home_url('about/communities/community-corporations'); ?>" class="text__small link__arrow-right">
						<?php echo __('All Communities'); ?>
					</a>
				</div>
			</div>

			<div class="row gutter_space_2">

				<div class="col col-lg-offset-4 col-md-offset-4 col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<?php if ( !$pagetitle ) :
					$title = $post_type == 'post' ? the_title() : single_term_title('', false); ?>
					<h1 class="post__title"><?php echo $title ?></h1>
					<?php endif;
					
					if ($post_type == 'post') : ?>
					<div class="hide-on-desktop bottom-margin-2em">
						<p class="text__small">
							<?php echo $date; ?>
						</p>
					</div>
					<?php endif;

					if ($featuredimg) : ?>
					<div class="hide-on-desktop">
						<?php echo get_the_post_thumbnail(get_the_ID(), 'large') ?>
					</div>
					<?php endif; ?>

				</div>

				<main class="row gutter_space_2 no-margin-inline">

					<div class="post__date col col-lg-4 col-md-4 col-sm-12 col-xs-12">

						<?php if ($post_type == 'post') : ?>	
						<div class="hide-on-mobile" style="margin-block-end: 3em;">
							<p class="text__small" style="margin-block-start: 0;">
								<?php echo $date; ?>
							</p>
						</div>
						<?php endif; 
						
						if ($featuredimg) : ?>
							<div class="hide-on-mobile bottom-margin-2em">
								<?php 
								$caption = get_post(get_post_thumbnail_id())->post_excerpt ? '<p class="text__small" style="margin-block-start: 0;">' . get_post(get_post_thumbnail_id())->post_excerpt . '</p>' : '';
								echo get_the_post_thumbnail(get_the_ID(), 'large');
								echo $caption ?>
							</div>
						<?php endif;
						
						if (have_rows('contact_information_term')) : ?>
						<div class="contact-information">
							<?php while (have_rows('contact_information_term')) : the_row();
							$position = get_sub_field('position__title');
							$name = get_sub_field('name');
							$emailaddress = get_sub_field('email_address');
							$address = get_sub_field('address');
							$fax = get_sub_field('fax_number');

							if ($position || $name || $emailaddress || $address || $fax) : ?>
							<h3><?php echo __('Contact Information'); ?></h3>
							<?php endif;

							if ($name) : ?>
							<p style="font-weight: 600;"><?php echo $name ?></p>
							<?php endif;

							if ($position) : ?>
							<p><?php echo $position ?></p>
							<?php endif;

							if ($address) : ?>
							<p style="margin-block-start: 1rem;"><?php echo $address ?></p>
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
							<?php endif;

							if ($fax) : ?>
							<p style="margin-block-start: 1rem;"><?php echo __('Fax:'); ?>
							<p><?php echo $fax ?></p>
							<?php endif; ?>

							<?php endwhile; ?>

						</div>
						<?php endif; ?>
					</div>

					<div class="col col-lg-8 col-md-8 col-sm-12 col-xs-12">

						<?php echo term_description(); ?>

					</div>

				</main>

			</div>

		</div>

	</div>

</div>

<?php get_footer();