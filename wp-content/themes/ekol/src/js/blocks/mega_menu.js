document.querySelectorAll('.has-mega-menu').forEach(el => el.addEventListener('mouseenter', () => {
    document.querySelectorAll('.mega-menu').forEach(item => item.classList.remove('active'));

    el.querySelector('.mega-menu').classList.add('active');
}));

document.querySelectorAll('.mega-menu').forEach(el => el.addEventListener('mouseleave', () => {
    el.classList.remove('active');
}));

document.querySelectorAll('.header__menu li:not(.has-mega-menu)').forEach(el => el.addEventListener('mouseenter', () => {
    document.querySelectorAll('.mega-menu').forEach(item => item.classList.remove('active'));
}));

document.querySelector('.header-button')?.addEventListener('click', function () {
    document.querySelector('.header').classList.toggle('active');
    this.classList.toggle('active');
    document.querySelector('body').classList.toggle('overflow-hidden');
    document.querySelector('.header-sidebar').classList.toggle('active');

    if (this.classList.contains('active')) {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
});

document.querySelectorAll('.menu-item__icon').forEach(item => item.addEventListener('click', function () {
    const parent_el = this.closest('.menu-item');
    parent_el.classList.toggle('active');
}));