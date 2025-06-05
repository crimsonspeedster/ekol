document.querySelectorAll('.footer-menu__title').forEach(item => item.addEventListener('click', function () {
    if (window.innerWidth <= 767) {
        const parent_el = this.closest('.footer-menu');
        const panel_el = parent_el.querySelector('.footer-menu__list');

        parent_el.classList.toggle('active');
        panel_el.style.maxHeight = parent_el.classList.contains('active') ? panel_el.scrollHeight + "px" : null;
    }
}));
