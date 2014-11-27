/*var $ = jQuery;
 window.onscroll = function() {
 var $window = $(window);
 
 var wWidth = $window.width();
 if (wWidth > 900) {
 document.getElementById("scrollmenu").className = "scrollmenu";
 var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
 if (scrollTop > 150) {
 $("#scrollmenu").slideDown();
 }else{
 $("#scrollmenu").slideUp();
 }
 ;
 } else {
 document.getElementById("scrollmenu").className = "scrollmenu_mini";
 }
 ;
 };*/
jQuery(function() {
    $("button.fks_minimenu_btn").click(function() {
        
        $("div.fksmenu").slideToggle("slow");
    });
});


/*jQuery(window).load(function() {
 var rewrite = new Array();
 rewrite = {
 //'': '',
 'div.dokuwiki[do=login] .button': 'button btn btn-success'
 
 
 };
 for (var k in rewrite) {
 if (rewrite.hasOwnProperty(k)) {
 //alert("Key is " + k + ", value is " + rewrite[k]);
 
 //console.log(rewrite[k]);
 $(" " + k).each(function() {
 $(this).toggleClass(" " + rewrite[k]);
 //console.log("1");
 });
 }
 }
 
 //console.clear();
 //console.log($('<span style="font:red">nesockuj tento kod</span>').context.outerHTML);
 console.log("%cNesockuj tento kód!!!", "color: red; font-size: x-large");
 //$("div.dokuwiki[do=login] .button").each(function() {
 //  $(this).toggleClass("button btn btn-success");
 //});
 //$(".edit").each(function(){ $(this).toggleClass("edit form-control");});
 
 
 });
 */