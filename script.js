jQuery(function () {
    var $ = jQuery;
});
$(window).on("load",function(){
	if ($("body").attr("data-act") == "login") {
		$('input[name$="u"]').attr("placeholder", "Uživatelské jméno");
		$('input[name$="p"]').attr("placeholder", "Heslo");
	}
	$(".loader-wrapper").fadeOut("200");
	window.addEventListener("scroll", function(e) {
		winW = document.body.scrollWidth;
		if (winW > 992) {
			Y = window.scrollY;
			menuH = $(".navbar-bg")[0].scrollHeight;
			footerH = $("footer")[0].scrollHeight;
			bodyH = document.body.scrollHeight;
			winH = window.innerHeight;
			imgH = 1669*document.body.scrollWidth/1920;
			koef = Y/(bodyH-winH);
			bckgrdY = (koef*(bodyH-footerH-imgH+menuH))+menuH;
			$("body").css("background-position", "0 " + bckgrdY + "px");
		}
	});
	window.scrollTo(window.scrollX, window.scrollY - 1);
	window.scrollTo(window.scrollX, window.scrollY + 1);
});
function closeWelcome(){
	var date = new Date();
	date.setFullYear(date.getFullYear() + 1);
	document.cookie = "name=new-era; path=/; expires=" + date.toGMTString();
	$("#new-era-wrapper").hide();
};
(function (i, s, o, g, r, a, m) {
    i["GoogleAnalyticsObject"] = r;
    i[r] = i[r] || function () {
		(i[r].q = i[r].q || []).push(arguments)
	}, i[r].l = 1 * new Date();
    a = s.createElement(o),
	m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, "script", "//www.google-analytics.com/analytics.js", "ga");
ga("create", "UA-51523765-1", "cuni.cz");
ga("send", "pageview");