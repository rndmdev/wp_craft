<?php

/* правильный способ подключить стили и скрипты */
function scf_theme_scripts() {

	// Подключаем стили
	wp_enqueue_style( 'main-style', THEME_CSS . 'main.css' );
	wp_enqueue_style( 'wp-style', get_stylesheet_uri() );

	// Подключаем скрипты
	wp_enqueue_script( 'main-scr', THEME_JS . 'main.js', array( 'jquery' ), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'scf_theme_scripts' );

/* Отключаем wp-embed */
function my_deregister_scripts() {

	wp_deregister_script( 'wp-embed' );
}

add_action( 'init', 'my_deregister_scripts' );


