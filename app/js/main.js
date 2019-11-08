/*Global variables*/
function returnToTop() {
    let btn = jQuery('.btn-top');
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() >= 50) {
            btn.fadeIn(200);
        } else {
            btn.fadeOut(200);
        }
    });
    btn.click(function () {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 500);
    });
}

function initEvents() {

    /*Actions on 'DOM ready' event*/
    jQuery(function () {
        returnToTop();
    });

    jQuery(window).resize(function () {

    });

}

/*Start all functions and actions*/
initEvents();
