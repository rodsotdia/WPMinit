<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' -'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
      <link href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" rel="shortcut icon">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" media="all">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" media="all">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<!-- <div class="overlay-loading overlay-loading-int">
         <div class="fl-c fl-c-juscon-center fl-c-alitems-center fl-c-column h100 imagerender pdg-xs-2r">
            <span class="text-upper bold text-2r color-white letter-spacing-8p">&nbsp;Loading</span>
            <div class="loading-dots">
               <span class="dot-1"></span>
					<span class="dot-2"></span>
					<span class="dot-3"></span>
            </div>
         </div>
		</div> // Normal Overloading -->

      <header class="wrapper pdg-tb-2r">
			<nav class="flex flex-juscon-space-between">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
				</a>
				<div>
            	<?php wp_nav_menu(array('menu' => 'NAME_OF_MENU')); ?>
				</div>
			</nav>
		</header>