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
        document.getElementById("scrollmenu").style.display = "block";
    }
    else {
        document.getElementById("scrollmenu").style.display = "none";
    }
    ;
};
