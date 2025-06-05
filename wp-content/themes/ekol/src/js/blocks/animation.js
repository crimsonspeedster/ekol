import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({ duration: 1000 });

let lastScroll = 0;
const header = document.querySelector('.header');
const home_hero_el = document.querySelector('.home-hero');

window.addEventListener('load', () => {
    document.querySelectorAll('.hero--animation').forEach((item, index) => {
        const delay = index * 400;

        setTimeout(() => {
            item.classList.add('animated');
        }, delay);
    });
});

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    let min_offset = header.offsetHeight;

    if (currentScroll > lastScroll && currentScroll > min_offset) {
        header.classList.add('hide');
    } else {
        header.classList.remove('hide');
    }

    if (document.querySelector('body.page-template-home') && window.innerWidth < 1200) {
        if (currentScroll > home_hero_el.offsetHeight) {
            header.classList.add('header--revert');
        }
        else {
            header.classList.remove('header--revert');
        }
    }

    lastScroll = currentScroll;
}, {
    passive: true
});