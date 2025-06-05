document.querySelectorAll('.preview-vacancies__button').forEach(item => item.addEventListener('click', function () {
    const parent_el = item.closest('.preview-vacancies');
    const panel_el = parent_el.querySelector('.preview-vacancies__content--hidden');
    const span_el = item.querySelector('span');
    const more_text = item.getAttribute('data-text-more');
    const lest_text = item.getAttribute('data-text-less');

    item.classList.toggle('active');

    if (item.classList.contains('active')) {
        span_el.textContent = lest_text;
        panel_el.style.maxHeight = panel_el.scrollHeight + "px";
    }
    else {
        span_el.textContent = more_text;
        panel_el.style.maxHeight = null;
    }
}));