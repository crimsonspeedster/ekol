document.querySelectorAll('.header-langs__title').forEach(item => item.addEventListener('click', function () {
    const parent_el = this.closest('.header-langs');

    parent_el.classList.toggle('active');
}));

document.querySelectorAll('.header-langs__backdrop').forEach(item => item.addEventListener('click', function () {
    const parent_el = this.closest('.header-langs');

    parent_el.classList.remove('active');
}));