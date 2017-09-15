<?php
/* Регистрация произвольного типа записи */
add_action( 'init', 'true_register_post_type_init' );

function true_register_post_type_init() {
	$labels = array(
		'name' => 'Статья',
		'singular_name' => 'Статья', // админ панель Добавить->Функцию
		'add_new' => 'Добавить Статью',
		'add_new_item' => 'Добавить новую Статью', // заголовок тега <title>
		'edit_item' => 'Редактирова статью',
		'new_item' => 'Новая Статья',
		'all_items' => 'Все Статьи',
		'view_item' => 'Просмотр Статьи на сайте',
		'search_items' => 'Искать Статьи',
		'not_found' =>  'Статей не найдено.',
		'not_found_in_trash' => 'В корзине нет Статей.',
		'menu_name' => 'Статьи' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true,
		'menu_icon' => 'dashicons-format-aside', // иконка в меню
		'menu_position' => 20, // порядок в меню
		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail')
	);
	register_post_type('articles', $args);
}