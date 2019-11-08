<?php

/* ACF Options page */
if ( function_exists( 'acf_add_options_page' ) ) {
	$option_page = acf_add_options_page( array(
		'page_title' => 'Настройки сайта',
		'menu_title' => 'Настройки сайта',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}

/* включаем поддержку миниатюр */
add_theme_support('post-thumbnails');

/* Автоматический title через хук wp_head() */
add_theme_support('title-tag');

/* Подсчет количества посещений страниц
---------------------------------------------------------- */
add_action('wp_head', 'kama_postviews');
function kama_postviews()
{

    /* ------------ Настройки -------------- */
    $meta_key     = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.
    $who_count    = 0;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
    $exclude_bots = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.
    global $user_ID, $post;
    if (is_singular()) {
        $id = (int)$post->ID;
        static $post_views = false;
        if ($post_views) {
            return true;
        } // чтобы 1 раз за поток
        $post_views   = (int)get_post_meta($id, $meta_key, true);
        $should_count = false;
        switch ((int)$who_count) {
            case 0:
                $should_count = true;
                break;
            case 1:
                if ((int)$user_ID == 0) {
                    $should_count = true;
                }
                break;
            case 2:
                if ((int)$user_ID > 0) {
                    $should_count = true;
                }
                break;
        }
        if ((int)$exclude_bots == 1 && $should_count) {
            $useragent = $_SERVER['HTTP_USER_AGENT'];
            $notbot    = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
            $bot       = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
            if ( ! preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent)) {
                $should_count = false;
            }
        }
        if ($should_count) {
            if ( ! update_post_meta($id, $meta_key, ($post_views + 1))) {
                add_post_meta($id, $meta_key, 1, true);
            }
        }
    }

    return true;
}

/* Функция вывода пагинации */
function pagination()
{

    global $wp_query;
    $big = 999999999;

    if ($wp_query->max_num_pages > 1) :
        ?>
		<div class="pagination">
            <?php echo paginate_links(array(
                'base'               => str_replace($big, '%#%', esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
                'format'             => '?paged=%#%', // формат, %#% будет заменено
                'current'            => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
                'type'               => 'list', // ссылки в ul
                'prev_text'          => '<span>Предыдущая</span>', // текст назад
                'next_text'         => '<span>Следующая</span>', // текст вперед
                'total'              => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
                'show_all'           => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
                'end_size'           => 2, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
                'mid_size'           => 2, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
                'add_args'           => false, // массив GET параметров для добавления в ссылку страницы
                'add_fragment'       => '', // строка для добавления в конец ссылки на страницу
                'before_page_number' => '', // строка перед цифрой
                'after_page_number'  => '' // строка после цифры
            )); ?>
		</div>
    <?php
    endif;
}
