let image = $('.parallax-bg');
let content = $('.parallax-fg');

let cookie = $('.cookielaw-bottom');
let wrapper = $('.parallax-wrapper')[0];
jQuery(function () {
    var $ = jQuery;
});

function update_cookie_pos() {
    const scrollHeight = wrapper.scrollTop;
    const pageHeight = wrapper.scrollHeight;
    const winHeight = window.innerHeight;
    cookie.css('bottom', pageHeight - scrollHeight - winHeight);
}

function update_parallax() {
    const imgDisplay = image.css('display');
    image.css('display', 'block');
    const imgHeight = image[0].clientHeight;
    image.css('display', imgDisplay);
    const pageHeight = content[0].scrollHeight;
    const winHeight = window.innerHeight;

    const zValue = (imgHeight - pageHeight) / (imgHeight - winHeight);
    const scaleValue = 1 - (zValue * 1.01);

    if (imgHeight >= pageHeight) {
        image.css('display', 'none');
        content.css('background', '');
    } else {
        image.css({
            'transform': `translateZ(${zValue}px) scale(${scaleValue})`,
            'display': 'block'
        });
        content.css('background', 'none');
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    if ($('#dw__login').length) {
        $('input[name$="u"]').attr("placeholder", "Uživatelské jméno");
        $('input[name$="p"]').attr("placeholder", "Heslo");
    }

    const resize_observer = new ResizeObserver(update_parallax);
    resize_observer.observe(content[0]);
    window.addEventListener('resize', update_parallax);
    if (cookie[0] != null) {
        update_cookie_pos();
        wrapper.addEventListener('scroll', update_cookie_pos);
    }

    $('.loader-wrapper').fadeOut();
});
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
