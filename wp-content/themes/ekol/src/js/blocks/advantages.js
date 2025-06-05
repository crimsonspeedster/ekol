document.querySelectorAll('.advantages-item__header').forEach(item => item.addEventListener('click', function () {
    const parent_el = this.closest('.advantages-item');
    const panel_el = parent_el.querySelector('.advantages-item__description');

    parent_el.classList.toggle('active');
    panel_el.style.maxHeight = parent_el.classList.contains('active') ? panel_el.scrollHeight + "px" : null;
}));
