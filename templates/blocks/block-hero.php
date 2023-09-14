<div class="hero">
	<div class="innerContainer">
		<div class="hero_title">
			<?php 
			$heading = get_field('heading');
			if ( $heading ) {
				echo '<h1>' . $heading . '</h1>';
			} else {
				echo '<h1>' .  __('What&#8217;s Happening') . '</h1>';
			} ?>
		</div>
		<div class="hero_feed">
			<div class="row">
				<?php include 'loops/loop-latest-event.php'; ?>
				<?php include 'loops/loop-latest-news-article.php'; ?>
				<div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12 contact_info_home">
					<div class="col_inner">
						<h2><?php echo __('Contact Us'); ?></h2>
						<?php
						$img = get_template_directory_uri() . '/assets/img/placeholders/farming-image.jpg';
						echo '<img class="home_img" src="' . $img . '" alt="Brant County Federation of Agriculture">';
						$phone = get_field('phone_number', 'options');
						$email = get_field('email_address', 'options');
						if ( $phone && $email ): ?>
						<ul>
							<li><?php echo __('Phone: '); echo $phone ?></li>
							<li><?php echo __('Email: '); ?><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
						</ul>
						<a class="learn_more" href="<?php echo home_url('contact-us'); ?>"><?php echo __('More details'); ?></a>
						<?php elseif ( $email ): ?>
						<ul>
							<li><?php echo __('Email: '); ?><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
						</ul>
						<p class="inline">
							<a class="learn_more" href="<?php echo home_url('contact-us'); ?>"><?php echo __('More details'); ?></a>
						</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>