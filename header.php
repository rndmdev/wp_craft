<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
	<div class="container">
		<nav class="header-menu">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'top',
					'container'      => false
				)
			); ?>
		</nav>
	</div>
</header>
