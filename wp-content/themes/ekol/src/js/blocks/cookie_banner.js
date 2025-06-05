function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

document.querySelectorAll('[data-banner-close]').forEach(el => el.addEventListener('click', function () {
    const parent_el = this.closest('.cookie-banner');

    if (el.classList.contains('cookie-banner__button--primary')) {
        setCookie('cookie_banner', 'hide', 7);
    }

    parent_el.remove();
}));