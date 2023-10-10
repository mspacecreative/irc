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
			<h1><?php echo single_term_title() ?></h1>
			<?php endif; ?>
		</div>
	
		<div class="inner_container">

			<?php echo term_description(); ?>

			<?php if (have_rows('contact_information', get_queried_object_id())) : ?>
			<div class="contact-information">
				<?php while (have_rows('contact_information', get_queried_object_id())) : the_row();
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

	</main>

	<?php if ($sidebar) : ?>
	<aside>
		 
	</aside>
	<?php endif; ?>

</div>

<?php get_footer();