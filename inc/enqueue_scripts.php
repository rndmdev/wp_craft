<?php
/* правильный способ подключить стили и скрипты */
function scf_theme_scripts() {

	// Подключаем стили
	wp_enqueue_style( 'slick-style', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css' );
	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'wp-style', get_stylesheet_uri() );

	// Подключаем скрипты
	wp_enqueue_script( 'slick-scr', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'main-scr', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'scf_theme_scripts' );

/* Отключаем wp-embed */
function my_deregister_scripts() {

	wp_deregister_script( 'wp-embed' );
}

add_action( 'init', 'my_deregister_scripts' );


