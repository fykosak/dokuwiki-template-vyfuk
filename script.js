let image = jQuery('.parallax-bg');
let content = jQuery('.parallax-fg');

let cookie = jQuery('.cookielaw-bottom');
let wrapper = jQuery('.parallax-wrapper')[0];

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
    const scaleValue = 1 - zValue;
    console.log(zValue, scaleValue);

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
    if (jQuery('#dw__login').length) {
        jQuery('input[namejQuery="u"]').attr("placeholder", "Uživatelské jméno");
        jQuery('input[namejQuery="p"]').attr("placeholder", "Heslo");
    }

    if (content[0]) {
        const resize_observer = new ResizeObserver(update_parallax);
        resize_observer.observe(content[0]);
        console.log('OBSERVE');
    }
    window.addEventListener('resize', update_parallax);
    if (cookie[0] != null) {
        update_cookie_pos();
        wrapper.addEventListener('scroll', update_cookie_pos);
    }

    jQuery('.loader-wrapper').fadeOut();
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
