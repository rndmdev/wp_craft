<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
	<?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
</header>