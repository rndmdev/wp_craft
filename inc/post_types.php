<?php

/* Регистрация произвольного типа записи */
add_action('init', 'scf_register_cpt_articles');

function scf_register_cpt_articles()
{

    $labels = array(
        'name'               => 'Статья',
        'singular_name'      => 'Статья',
        'add_new'            => 'Добавить',
        'add_new_item'       => 'Добавить новую',
        'edit_item'          => 'Редактировать',
        'new_item'           => 'Создать',
        'all_items'          => 'Все',
        'view_item'          => 'Просмотр материала на сайте',
        'search_items'       => 'Поиск материалов',
        'not_found'          => 'Тут пусто.',
        'not_found_in_trash' => 'В корзине очень пусто.',
        'menu_name'          => 'Статьи',
    );
    $args   = array(
        'labels'        => $labels,
        'public'        => true,
        'show_ui'       => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-format-aside',
        'menu_position' => 20,
        'supports'      => array('title', 'editor', 'comments', 'author', 'thumbnail'),
    );
    register_post_type('articles', $args);
}