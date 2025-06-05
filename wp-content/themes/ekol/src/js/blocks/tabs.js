document.querySelectorAll('.our-solution-tab').forEach((el, i) => el.addEventListener('click', function () {
    if (el.classList.contains('active'))
        return false;

    document.querySelectorAll('.our-solution-tab').forEach(item => item.classList.remove('active'));
    document.querySelectorAll('.our-solution-tab-content').forEach(item => item.classList.remove('active'));

    this.classList.add('active');
    document.querySelectorAll('.our-solution-tab-content')[i].classList.add('active');
}));