jQuery(function () {
    var $ = jQuery;
});

$(window).on("load",function(){
	let ticking = false;
	let lastPos = 0;
	
	if (document.cookie.includes("new-era")) {
		$("#new-era-wrapper").hide();
	}
	$(".loader-wrapper").fadeOut("500");
	window.addEventListener("scroll", function(e) {
		Y = window.scrollY;
		menuH = $(".navbar-bg")[0].scrollHeight;
		footerH = $("footer")[0].scrollHeight;
		bodyH = document.body.scrollHeight-menuH-footerH;
		winH = window.innerHeight-menuH;
		imgH = 1669*document.body.scrollWidth/1920;
		
		bckgrdY = Math.round((Y*(bodyH-imgH)/(bodyH-winH))+menuH);
		$("body").css("background-position", "0 " + bckgrdY + "px");
		console.log("Y = " + Y + "\nbodyH = " + bodyH + "\nwinH = " + winH + "\nbckgrdY = " + bckgrdY);
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