window.onscroll = function() {
    var $window = $(window);
    var wWidth = $window.width();
    //var wHeight = $window.height();
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

window.onload = function() {
    for (var i = 1; i < 5; i++) {
        document.getElementById("fks_images" + i).style.display = "none";
    }
    ;
    var show = 0;
    shownext(show);


};
function shownext(show) {
    setTimeout(function() {
        if (show == 4) {
            var newshow = 0;
        } else {
            var newshow = show;
            newshow++;
        }
        ;
        var percento = 100;
        opacityimages(percento, newshow, show);
    }, 10000);

}
;
function opacityimages(percento, newshow, show) {
    percento--;
    if (percento === 50) {
        percento = 49;

        document.getElementById("fks_images" + show).style.display = "none";
        document.getElementById("fks_images" + show).style.opacity = 1;
        document.getElementById("fks_images" + newshow).style.display = "block";
        document.getElementById("fks_images" + newshow).style.opacity = 0;

    }
    ;
    if (percento > 0) {
        if (percento > 50) {
               var percentojedna = (percento - 50)*2 / 100;
                document.getElementById("fks_images" + show).style.opacity = percentojedna;
            

        } else {
            var percentojedna = ((50 - percento) * 2) / 100;

            document.getElementById("fks_images" + newshow).style.opacity = percentojedna;

        }
        ;
        setTimeout(function() {
            opacityimages(percento, newshow, show);
        }, 50);
    } else {
        shownext(newshow);
    }
    ;

}
;