<?php
// хук, через который подключается функция
// регистрирующая новые таксономии (create_book_taxonomies)
//add_action( 'init', 'create_book_taxonomies' );
//
//// функция, создающая 2 новые таксономии "genres" и "writers" для постов типа "book"
//function create_book_taxonomies(){
//
//	// Добавляем древовидную таксономию 'genre' (как категории)
//	register_taxonomy('genre', array('book'), array(
//		'hierarchical'  => true,
//		'labels'        => array(
//			'name'              => _x( 'Genres', 'taxonomy general name' ),
//			'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
//			'search_items'      =>  __( 'Search Genres' ),
//			'all_items'         => __( 'All Genres' ),
//			'parent_item'       => __( 'Parent Genre' ),
//			'parent_item_colon' => __( 'Parent Genre:' ),
//			'edit_item'         => __( 'Edit Genre' ),
//			'update_item'       => __( 'Update Genre' ),
//			'add_new_item'      => __( 'Add New Genre' ),
//			'new_item_name'     => __( 'New Genre Name' ),
//			'menu_name'         => __( 'Genre' ),
//		),
//		'show_ui'       => true,
//		'query_var'     => true,
//		//'rewrite'       => array( 'slug' => 'the_genre' ), // свой слаг в URL
//	));
//
//	// Добавляем НЕ древовидную таксономию 'writer' (как метки)
//	register_taxonomy('writer', 'book',array(
//		'hierarchical'  => false,
//		'labels'        => array(
//			'name'                        => _x( 'Writers', 'taxonomy general name' ),
//			'singular_name'               => _x( 'Writer', 'taxonomy singular name' ),
//			'search_items'                =>  __( 'Search Writers' ),
//			'popular_items'               => __( 'Popular Writers' ),
//			'all_items'                   => __( 'All Writers' ),
//			'parent_item'                 => null,
//			'parent_item_colon'           => null,
//			'edit_item'                   => __( 'Edit Writer' ),
//			'update_item'                 => __( 'Update Writer' ),
//			'add_new_item'                => __( 'Add New Writer' ),
//			'new_item_name'               => __( 'New Writer Name' ),
//			'separate_items_with_commas'  => __( 'Separate writers with commas' ),
//			'add_or_remove_items'         => __( 'Add or remove writers' ),
//			'choose_from_most_used'       => __( 'Choose from the most used writers' ),
//			'menu_name'                   => __( 'Writers' ),
//		),
//		'show_ui'       => true,
//		'query_var'     => true,
//		//'rewrite'       => array( 'slug' => 'the_writer' ), // свой слаг в URL
//	));
//}