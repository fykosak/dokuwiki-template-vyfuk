window.onscroll = function() {
    var $window = $(window);
    var wWidth = $window.width();
    var wHeight = $window.height();
    if (wWidth > 500) {

        var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        if (scrollTop > 320) {
            document.getElementById("scrollmenu").className = "scrollmenu";
        }
        ;
        if (scrollTop < 300) {
            document.getElementById("scrollmenu").className = "scrollmenu_dis";
        }
        ;
    }else{
        document.getElementById("scrollmenu").className = "scrollmenu_dis";
    }
    ;
};

function scrollopacitydown(opacity) {
    setTimeout(function() {
        if (opacity < 0.15) {
            document.getElementById("scrollmenu").style.display = "none";
            document.getElementById("scrollmenu").style.opacity = 0;
        } else {
            document.getElementById("scrollmenu").style.opacity = opacity;
            opacity = opacity - 0.1;
            scrollopacitydown(opacity);
        }
        ;

    }, 100);
}
;

function scrollopacityup(opacity) {
    setTimeout(function() {
        if (opacity > 0.95) {
            document.getElementById("scrollmenu").style.display = "block";
            document.getElementById("scrollmenu").style.opacity = 1;
        } else {
            document.getElementById("scrollmenu").style.opacity = opacity;
            document.getElementById("scrollmenu").style.display = "block";
            opacity = opacity + 0.1;
            scrollopacityup(opacity);
        }
        ;

    }, 100);
}
;
