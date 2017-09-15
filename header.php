<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <title><?php echo wp_get_document_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
	<?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
</header>