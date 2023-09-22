<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' : '; } ?><?php bloginfo( 'name' ); ?></title>
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
		
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php wp_head(); ?>
		
    </head>
	<?php $theme = get_field('theme_colour', 'options') == 'light' ? 'light__theme' : 'dark__theme'; ?>
    <body <?php body_class($theme); ?>>
		<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
	
		<!-- menu -->
		<?php get_template_part('templates/menu'); ?>
		<!-- / menu -->
		
		<header>
			<div class="main-header">
				<div class="inner_container">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-8" style="display: flex; align-items: center;">
							<div class="logo">
								<a href="<?php echo home_url(); ?>">
									<?php include 'assets/img/branding/irc-logo.svg'; ?>
								</a>
							</div>
						</div>
						<div class="row navigation end-lg end-md end-sm end-xs col-lg-8 col-md-8 col-sm-8 col-xs-12" style="margin-right: 0; margin-left: 0;">
						
							<!-- SOCIAL MEDIA -->
							<!-- <?php echo do_shortcode('[social_media]'); ?> -->
							<!-- / SOCIAL MEDIA -->

							<?php theme_secondary_nav(); ?>

							<?php echo theme_nav(); ?>
							
						</div>
						<!-- MENU TOGGLE -->
						<div class="row col-lg-4 col-md-4 col-sm-8 col-xs-4 end-sm end-xs">
							<button class="hamburger hamburger--spin" type="button">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
						<!-- / MENU TOGGLE -->
					</div>
				</div>
			</div>
		</header>