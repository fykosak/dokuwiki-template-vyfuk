window.onscroll = function() {
    var $window = $(window);
    var wWidth = $window.width();
    if (wWidth > 900) {
        var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        if (scrollTop > 320) {
            document.getElementById("scrollmenu").className = "scrollmenu";
        }
        ;
        if (scrollTop < 300) {
            document.getElementById("scrollmenu").className = "scrollmenu_dis";
        }
        ;
    } else {
        document.getElementById("scrollmenu").className = "scrollmenu_mini";
    }
    ;
};
