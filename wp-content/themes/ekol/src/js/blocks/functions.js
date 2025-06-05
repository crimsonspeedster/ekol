export function sliderProgress (instance) {
    const active_index = instance.activeIndex;
    const pagination_bullets = document.querySelectorAll('.hero-block-subitem-progress');

    if (pagination_bullets.length === 0)
        return;

    let width = 0;
    let intervalId = null;

    pagination_bullets.forEach((el, i) => {
        if (i < active_index) {
            el.classList.add('full');
        } else {
            el.classList.remove('full');
            el.querySelector('span').style.width = '0%';
        }

        el.closest('.hero-block-subitem').classList.remove('active');
    });

    intervalId = setInterval(() => {
        if (width < 100) {
            width += 1;

            if (pagination_bullets[active_index]?.querySelector('span')) {
                pagination_bullets[active_index].closest('.hero-block-subitem').classList.add('active');
                pagination_bullets[active_index].querySelector('span').style.width = `${width}%`;
            }
        } else {
            clearInterval(intervalId);

            if (instance.isEnd) {
                instance.slideTo(0);
            }
            else {
                instance.slideNext();
            }
        }
    }, 100);

    if (instance.activeIntervals) {
        instance.activeIntervals[instance.activeIndex].forEach(clearInterval);
        instance.activeIntervals[instance.activeIndex] = [intervalId];
    }
}