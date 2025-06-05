document.querySelectorAll('.logistics-item').forEach(item => item.addEventListener('mouseenter', function() {
    this.classList.add('active');

    const panel_el = this.querySelector('.logistics-item__description');
    panel_el.style.maxHeight = panel_el.scrollHeight + "px";
}));

document.querySelectorAll('.logistics-item').forEach(item => item.addEventListener('mouseleave', function() {
    this.classList.remove('active');

    const panel_el = this.querySelector('.logistics-item__description');
    panel_el.style.maxHeight = null;
}));