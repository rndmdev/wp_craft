<?php

/* Отключаем емоджи */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/* Отключаем автоматическую вставку <p> и <br>  для CF7 */
add_filter('wpcf7_autop_or_not', '__return_false');

/* Подключаем CodeMirror для редактора форм CF7*/
add_action('admin_print_styles-toplevel_page_wpcf7', function () {

    if (empty($_GET['post'])) {
        return;
    }
    // Подключаем редактор кода для HTML.
    $settings = wp_enqueue_code_editor(array('type' => 'text/html'));
    // Ничего не делаем, если CodeMirror отключен.
    if (false === $settings) {
        return;
    }
    // Инициализация редактора для редактирования шаблона формы
    wp_add_inline_script('code-editor', sprintf('jQuery( function() { wp.codeEditor.initialize( "wpcf7-form", %s ); } );', wp_json_encode($settings)));
    // Инициализация редактора для редактирования шаблона письма
    wp_add_inline_script('code-editor', sprintf('jQuery( function() { wp.codeEditor.initialize( "wpcf7-mail-body", %s ); } );', wp_json_encode($settings)));
});

add_action('wp_enqueue_scripts', 'wpcf7_modal_invalid_js');
add_action('wp_footer', 'wpcf7_modal_invalid_js_inline', 999);

/* Поключает библиотеку sweetalert.js для создания красивых модальных окон. */
function wpcf7_modal_invalid_js()
{

    wp_enqueue_script('sweetalert', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js');
}

/* Выводит на экран модальное окно при ошибках валидации формы. */
function wpcf7_modal_invalid_js_inline()
{

    ?>
	<script>
        // Срабатывает при ошибках валидации формы.
        document.addEventListener('wpcf7invalid', function (response) {
            // Запускает модальное окно.
            swal({
                title: "Ошибка!",
                text: response.detail.apiResponse.message,
                icon: "error",
                button: "Закрыть"
            });
        }, false);

        // Срабатывает при успешной отправке формы.
        document.addEventListener('wpcf7mailsent', function (response) {
            // Запускает модальное окно.
            swal({
                title: "Спасибо!",
                text: response.detail.apiResponse.message,
                icon: "success",
                button: "Закрыть"
            });
        }, false);
	</script>

	<style>
		.wpcf7-validation-errors,
		.wpcf7-mail-sent-ok {
			display: none !important;
		}
	</style>
    <?php

}