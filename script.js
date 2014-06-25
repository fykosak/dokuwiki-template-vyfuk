var $ = jQuery;
window.onscroll = function() {
    var $window = $(window);

    var wWidth = $window.width();
    if (wWidth > 900) {
        document.getElementById("scrollmenu").className = "scrollmenu";
        var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        if (scrollTop > 320) {
            $("#scrollmenu").slideDown();
        }
        ;
        if (scrollTop < 300) {
            $("#scrollmenu").slideUp();
        }
        ;
    } else {
        document.getElementById("scrollmenu").className = "scrollmenu_mini";
    }
    ;
};
