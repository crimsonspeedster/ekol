document.querySelectorAll('.part-seo__button').forEach(item => item.addEventListener('click', function () {
    const parent_el = item.closest('.part-seo');
    const description_el = parent_el.querySelector('.part-seo__description');

    description_el.classList.toggle('active');
}));
