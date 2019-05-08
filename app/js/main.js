/*Global variables*/

function isMobileDeviceUsed() {
    var isMobile = false;
    // device detection
    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) isMobile = true;
    return isMobile;
}

function inlineSVG() {
    /*
     * Replace all SVG images with inline SVG
     */
    jQuery('img.svg').each(function () {
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function (data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
            if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });
}

function scrollDown() {
    jQuery(".header-arrow-down").on("click", function () {
        var e = jQuery(".header-home").height();
        jQuery("html, body").animate({
            scrollTop: e
        }, 500)
    })
}

function modalForm() {
    jQuery('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });
}

function vacancyReadmore() {
    var elem = jQuery('.vacancy-readmore'),
        textmore = elem.attr('data-textmore'),
        texthide = elem.attr('data-texthide');

    if (elem.length !== 0) {
        elem.readmore({
            speed: 100,
            collapsedHeight: 285,
            moreLink: '<a href="#" class="category-readmore-link">' + textmore + ' <i class="icon-readmore"></i></a>',
            lessLink: '<a href="#" class="category-readmore-link less">' + texthide + ' <i class="icon-readmore"></i></a>'
        });
    }
}

function changeCalcImg() {
    jQuery('#object').on('change', function(){
        var url = jQuery(this).find(':selected').data('path');
        jQuery('#object_img').attr('src', url);
    });
}

function galleryThumbs() {
    jQuery('.gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function (item) {
                return item.el.attr('title');
            }
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function (element) {
                return element.find('img');
            }
        }
    });
}

function galleryProduct() {
    jQuery('.product-card-slider-top').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function (item) {
                return item.el.attr('title');
            }
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function (element) {
                return element.find('img');
            }
        }
    });
}

function productSlider() {
    var galleryThumbs = new Swiper('.product-card-slider-thumbs', {
        spaceBetween: 16,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        // loop: true,
        slidesPerView: 3,
        direction: 'vertical',
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: '.next-gallery-thumbs-slider',
            prevEl: '.prev-gallery-thumbs-slider'
        },
        breakpoints: {
            700: {
                slidesPerView: 3
            },
            480: {
                direction: 'horizontal',
                slidesPerView: 3
            }
        }
    });
    var galleryTop = new Swiper('.product-card-slider-top', {
        spaceBetween: 20,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        // loop: true,
        navigation: {
            nextEl: '.next-gallery-top-slider',
            prevEl: '.prev-gallery-top-slider'
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });

    jQuery( ".single_variation_wrap" ).on( "show_variation", function ( event, variation ) {
        var slideImgId = variation.image_id;
        galleryTop.slideTo( jQuery('.product-card-slider-top .swiper-slide[data-id="'+slideImgId+'"]').index(),300,false);
    } );
}

function modalAddingToCart() {
    // Цепляемся за событие adding_to_cart
    jQuery( document.body ).on( 'adding_to_cart', function( event, button ) {

        //Обновим счетчик корзины
        var count = parseInt(jQuery('.scf_count').text());
        jQuery('.scf_count').text(count+1);

        // Выцепляем инициатора события (ссылка/кнопка)
        var $btn = jQuery( button[0] );

        // Пытаемся найти в вёрстке название товара
        var product_title = $btn.parents( 'li.product' ).find( '.woocommerce-loop-product__title' ).text();

        // if ( product_title ) {
        // Формируем шаблон попапа
        var tpl = '';
        tpl += '<p class="modal-cart-added-title">Товар добавлен в корзину</p>';
        tpl += '<div class="modal-cart-added-content">';
        tpl += '<a class="button" onclick="jQuery.unblockUI();">Продолжить покупки</a>';
        tpl += '<a href="/checkout/" class="alt">Оформить заказ</a>';
        tpl += '</div>';

        // Выводим шаблон в модальное окно.
        // Используем blockUI из WooCommerce
        jQuery.blockUI({
            message: tpl,
            // timeout: 0,
            css: {
                width: '300px',
                border: 0,
                padding: 30
            }
        } );
        // }
    } );
}

function videoLazy() {
    jQuery('.video-item-img').click(function () {
        var videoSrc = jQuery(this).attr('data-video');
        jQuery(this).parent().addClass('on');
        jQuery(this).replaceWith('<iframe width="100%" height="258" src="//www.youtube.com/embed/' + videoSrc + '?rel=0&showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe>')
    });
}

function searchForm() {
    var elem = jQuery('.scf-search input');
    var elemfocus = jQuery('.info-box');
    elem.focus(function () {
        elemfocus.css('opacity', 0);
    });
    elem.blur(function () {
        elemfocus.css('opacity', 1);
    });
}


function toggleMenu() {
    var tbtn = jQuery('.toggle-btn');
    var tmenu = jQuery('.toggle-menu');
    var tlink = jQuery('.toggle-menu a');
    tbtn.click(function () {
        jQuery(this).toggleClass("on");
        tmenu.toggleClass("on");
    });
    tlink.click(function () {
        tbtn.removeClass("on");
        tmenu.removeClass("on");
    });
}


function smoothscroll() {
    jQuery(document).on('click', '.go_to', function (event) {
        event.preventDefault();

        jQuery('html, body').animate({
            scrollTop: jQuery(jQuery.attr(this, 'href')).offset().top
        }, 500);
    });
}

function footerBottom() {
    var h = jQuery('.footer').outerHeight();
    jQuery('body').css('padding-bottom', h);
}

function formStyler() {
    jQuery('.scf-select').styler();
}


function show_comment_form() {
    jQuery('#show_comment_form').click(function (e) {
        e.preventDefault();
        jQuery(this).hide();
        jQuery('#review_form').show();

    });
}

function toggleInfo() {
    var tbtn = jQuery('.icon-info');
    var tmenu = jQuery('.info-box');
    var tclose = jQuery('.info-box .close');

    tbtn.click(function () {
        jQuery(this).toggleClass("on");
        tmenu.toggleClass("on");
    });

    tclose.click(function () {
        tbtn.toggleClass("on");
        tmenu.toggleClass("on");
    });
}


function initEvents() {

    /*Actions on 'DOM ready' event*/
    jQuery(function () {
        inlineSVG();
        scrollDown();
        modalForm();
        vacancyReadmore();
        galleryThumbs();
        productSlider();
        modalAddingToCart();
        videoLazy();
        searchForm();
        toggleMenu();
        smoothscroll();
        footerBottom();
        formStyler();
        changeCalcImg();
        galleryProduct();
        toggleInfo();
        show_comment_form();
    });

    jQuery(document).mouseup(function (e) {

        if (isMobileDeviceUsed()) {
        }
    });

    jQuery(window).resize(function () {
        footerBottom();
    });

    /*Actions on 'Window load' event*/
    jQuery(window).on("load", function () {

    });
}

/*Start all functions and actions*/
initEvents();
