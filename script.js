/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onscroll = function(e) {
    var browserIE = document.all ? true : false;

    if ((browserIE ? event.clientY + document.body.scrollTop : e.pageY) > 0) {
        document.getElementById("scrollmenu").style.display = "block";
    }
    else {
        document.getElementById("scrollmenu").style.display = "none";
    }
    ;
    //document.getElementById("fksnewsmoreinfo" + ID).style.display = 'block';
    //var IDfull = document.getElementById("fksnewsmoreinfo" + ID);

    //document.body.onmousemove = function(e) {
    //  var browserIE = document.all ? true : false;
    //if (!browserIE) {
    //  document.captureEvents(Event.MOUSEMOVE);
    //}
    //;
    //IDfull.style.left = (browserIE ? event.clientX + document.body.scrollLeft : e.pageX) + "px";
    //IDfull.style.top = (browserIE ? event.clientY + document.body.scrollTop : e.pageY) + "px";

    //IDfull.style.left = ((e || event).clientX + document.body.scrollLeft) + "px";
    //IDfull.style.top = ((e || event).clientY + document.body.scrollTop) + "px";
    //};
}
;

window.onscroll = function() {
    var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    if (scrollTop > 80) {
        if (document.getElementById("scrollmenu").style.display == "none" ) {
            scrollopacityup(0.0);
        } else {
            document.getElementById("scrollmenu").style.display = "block";
            document.getElementById("scrollmenu").style.opacity = 1;
        }
        ;
    }
    else {
        if (document.getElementById("scrollmenu").style.display == "block") {
            scrollopacitydown(1.0);
        } else {
            document.getElementById("scrollmenu").style.display = "none";
            document.getElementById("scrollmenu").style.opacity = 0;
        }
        ;
    }
    ;
};

function scrollopacitydown(opacity) {
    setTimeout(function() {
        if (opacity < 0.15) {
            document.getElementById("scrollmenu").style.display = "none"
            document.getElementById("scrollmenu").style.opacity = 0;
        } else {
            document.getElementById("scrollmenu").style.opacity = opacity;
            opacity = opacity - 0.1;
            scrollopacitydown(opacity);
        }

    }, 50);
}
;

function scrollopacityup(opacity) {
    setTimeout(function() {
        if (opacity > 0.95) {
            document.getElementById("scrollmenu").style.display = "block"
            document.getElementById("scrollmenu").style.opacity = 1;
        } else {
            document.getElementById("scrollmenu").style.opacity = opacity;
            opacity = opacity + 0.1;
            scrollopacityup(opacity);
        }

    }, 50);
}
;