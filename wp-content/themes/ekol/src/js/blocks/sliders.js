import Swiper from 'swiper';
import {Scrollbar, Navigation} from "swiper/modules";
import {sliderProgress} from "./functions";
import 'swiper/css';

document.querySelectorAll('.part-more__slider').forEach(item => {
    const post_type = item.getAttribute('data-post_type');

    let swiper_args = {};

    switch (post_type) {
        case 'post':
            swiper_args = {
                breakpoints: {
                    0: {
                        enabled: false,
                        slidesOffsetBefore: 0,
                        init: false,
                    },
                    576: {
                        autoHeight: true,
                        enabled: true,
                        init: true,
                        slidesOffsetBefore: 16,
                        slidesPerView: 1.7,
                        spaceBetween: 16,
                    },
                    768: {
                        autoHeight: true,
                        spaceBetween: 16,
                        slidesPerView: 2.2,
                        slidesOffsetBefore: 16,
                    },
                    1024: {
                        autoHeight: true,
                        slidesPerView: 2.5,
                        slidesOffsetBefore: 60,
                        spaceBetween: 16,
                    },
                    1200: {
                        autoHeight: true,
                        slidesPerView: 3.27,
                        spaceBetween: 16,
                        slidesOffsetBefore: 60,
                    }
                },
            };
            break;
        case 'cases':
            swiper_args = {
                breakpoints: {
                    0: {
                        enabled: false,
                        slidesOffsetBefore: 0,
                        init: false,
                    },
                    576: {
                        autoHeight: true,
                        enabled: true,
                        init: true,
                        slidesOffsetBefore: 16,
                        slidesPerView: 1.7,
                        spaceBetween: 16,
                    },
                    768: {
                        autoHeight: true,
                        spaceBetween: 16,
                        slidesPerView: 2.2,
                        slidesOffsetBefore: 16,
                    },
                    1024: {
                        autoHeight: true,
                        slidesPerView: 2.5,
                        slidesOffsetBefore: 60,
                        spaceBetween: 16,
                    },
                    1200: {
                        autoHeight: true,
                        slidesPerView: 2.2,
                        spaceBetween: 24,
                        slidesOffsetBefore: 60,
                    }
                },
            };
            break;
        default:
            break;
    }

    new Swiper(item, swiper_args);
});

document.querySelectorAll('.vacancies-part-slider').forEach(item => {
    const parent_el = item.closest('.vacancies-part');

    new Swiper(item, {
        modules: [Scrollbar],
        centeredSlides: true,
        autoHeight: true,
        initialSlide: 1,
        centeredSlidesBounds: true,
        scrollbar: {
            el: parent_el.querySelector('.swiper-scrollbar'),
            hide: false,
        },
        breakpoints: {
            0: {
                slidesOffsetBefore: 0,
                slidesOffsetAfter: 0,
                slidesPerView: 1.095,
                spaceBetween: 8,
            },
            1024: {
                slidesPerView: 2.02,
                spaceBetween: 16,
                slidesOffsetBefore: 60,
                slidesOffsetAfter: 60,
            },
        },
    });
});

document.querySelectorAll('.blog-part-slider').forEach(item => {
    const parent_el = item.closest('.blog-part');

    new Swiper(item, {
        modules: [Scrollbar],
        slidesPerView: 1.089,
        spaceBetween: 8,
        autoHeight: true,
        slidesOffsetBefore: 16,
        slidesOffsetAfter: 16,
        scrollbar: {
            el: parent_el.querySelector('.swiper-scrollbar'),
            hide: false,
        },
        breakpoints: {
            576: {
                slidesPerView: 1.7,
            },
            768: {
                slidesPerView: 2.3,
            },
            992: {
                slidesPerView: 2.7,
            },
            1024: {
                slidesOffsetBefore: 60,
                slidesOffsetAfter: 60,
                spaceBetween: 16,
                slidesPerView: 3.1,
            },
            1200: {
                slidesOffsetBefore: 60,
                slidesOffsetAfter: 60,
                spaceBetween: 16,
                slidesPerView: 3.27,
            }
        },
    });
});

document.querySelectorAll('.cases-part-slider').forEach(item => {
    const parent_el = item.closest('.cases-part');

    new Swiper(item, {
        modules: [Scrollbar],
        enabled: true,
        init: true,
        spaceBetween: 20,
        scrollbar: {
            el: parent_el.querySelector('.swiper-scrollbar'),
            hide: false,
        },
        breakpoints: {
            0: {
                enabled: false,
                init: false,
                spaceBetween: 0,
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 1.3,
                slidesOffsetAfter: 16,
                slidesOffsetBefore: 16,
                autoHeight: true,
            },
            768: {
                slidesPerView: 1.5,
                autoHeight: true,
                slidesOffsetAfter: 16,
                slidesOffsetBefore: 16,
            },
            1024: {
                slidesOffsetBefore: 60,
                slidesOffsetAfter: 60,
                spaceBetween: 20,
                autoHeight: true,
                slidesPerView: 1.8,
            },
            1200: {
                slidesOffsetBefore: 60,
                slidesOffsetAfter: 60,
                slidesPerView: 2.175,
                autoHeight: true,
                spaceBetween: 40,
            }
        },
    });
});

document.querySelectorAll('.services-part-slider').forEach(item => {
    const parent_el = item.closest('.services-part');

    new Swiper(item, {
        modules: [Scrollbar],
        slidesOffsetBefore: 16,
        slidesOffsetAfter: 16,
        spaceBetween: 8,
        slidesPerView: 1.095,
        autoHeight: true,
        scrollbar: {
            el: parent_el.querySelector('.swiper-scrollbar'),
            hide: false,
        },
        breakpoints: {
            576: {
                slidesPerView: 1.8,
            },
            768: {
                slidesPerView: 2.1,
            },
            992: {
                spaceBetween: 12,
                slidesPerView: 2.3,
            },
            1024: {
                slidesOffsetBefore: 60,
                slidesOffsetAfter: 60,
                spaceBetween: 24,
                slidesPerView: 2.7,
            },
            1200: {
                slidesOffsetBefore: 60,
                slidesOffsetAfter: 60,
                spaceBetween: 24,
                slidesPerView: 3.02,
            }
        }
    });
});

document.querySelectorAll('.solutions-part-slider').forEach(item => {
    new Swiper(item, {
        autoHeight: true,
        spaceBetween: 8,
        slidesOffsetBefore: 16,
        slidesOffsetAfter: 16,
        slidesPerView: 1.31,
        breakpoints: {
            576: {
                slidesPerView: 2.2,
            },
            768: {
                slidesPerView: 2.6,
            },
            992: {
                slidesPerView: 3.2,
            },
            1024: {
                slidesPerView: 3.5,
                slidesOffsetBefore: 60,
                slidesOffsetAfter: 60,
            },
            1200: {
                slidesPerView: 4.35,
                spaceBetween: 24,
                slidesOffsetBefore: 60,
                slidesOffsetAfter: 60,
            }
        },
    });
});

document.querySelectorAll('.hero-block-slider').forEach(item => {
    const parent_el = item.closest('.hero-block');
    const subslider_el = parent_el.querySelector('.hero-block-subslider');

    const main_slider = new Swiper(item, {
        modules: [Navigation],
        slidesPerView: 1,
        spaceBetween: 0,
        autoHeight: true,
        allowTouchMove: false,
        navigation: {
            nextEl: parent_el.querySelector('.swiper-button-next'),
            prevEl: parent_el.querySelector('.swiper-button-prev'),
        },
        on: {
            slideChange: function (instance) {
                if (!instance.activeIntervals) {
                    instance.activeIntervals = {};
                    instance.activeIntervals[instance.activeIndex] = [];
                }
                else {
                    instance.activeIntervals[instance.activeIndex] = [];

                    if (instance.activeIntervals[instance.previousIndex]) {
                        instance.activeIntervals[instance.previousIndex].forEach(clearInterval);
                    }
                }

                sliderProgress(instance);

                parent_el.querySelector('.hero-block-subslider').swiper.slideTo(instance.activeIndex);
            }
        }
    });

    const sub_slider = new Swiper(subslider_el, {
        slidesPerView: 1,
        spaceBetween: 16,
        allowTouchMove: false,
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 12,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 24,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 33,
            },
        },
        on: {
            afterInit: function (instance) {
                instance.slides[0].querySelector('.hero-block-subitem').classList.add('active');

                if (!main_slider.activeIntervals) {
                    main_slider.activeIntervals = {};
                    main_slider.activeIntervals[main_slider.activeIndex] = [];
                }
                else {
                    main_slider.activeIntervals[main_slider.activeIndex] = [];

                    if (main_slider.activeIntervals[main_slider.previousIndex]) {
                        main_slider.activeIntervals[main_slider.previousIndex].forEach(clearInterval);
                    }
                }

                sliderProgress(main_slider);
            },
            click: function (instance) {
                instance.el.querySelectorAll('.hero-block-subitem').forEach(item => item.classList.remove('active'));

                const current_block_el = instance.slides[instance.clickedIndex].querySelector('.hero-block-subitem');
                current_block_el.classList.add('active');

                if (current_block_el.getAttribute('data-link')) {
                    window.location.href = current_block_el.getAttribute('data-link');
                }

                main_slider.slideTo(instance.clickedIndex);
            },
        }
    });
});

document.querySelectorAll('.reviews-slider--names').forEach((item, i) => {
    const parent_el = item.closest('.reviews');
    const comments_el = parent_el.querySelector('.reviews-slider--main');

    const names_slider = new Swiper(item, {
        slidesPerView: 1,
        spaceBetween: 0,
        autoHeight: true,
        allowTouchMove: false,
        breakpoints: {
            1200: {
                slidesPerView: 'auto',
                spaceBetween: 29,
                initialSlide: 1,
                centeredSlides: true,
                centeredSlidesBounds: true,
            }
        },
    });

    const comments_slider = new Swiper(comments_el, {
        modules: [Navigation],
        initialSlide: 1,
        allowTouchMove: false,
        navigation: {
            nextEl: parent_el.querySelector('.swiper-button-next'),
            prevEl: parent_el.querySelector('.swiper-button-prev'),
        },
        on: {
            slideChange: function (instance) {
                names_slider.slideTo(instance.activeIndex);

                let numberIndex = instance.activeIndex + 1;

                numberIndex = numberIndex <= 9 ? '0' + numberIndex : numberIndex;

                document.querySelectorAll('.reviews-names__title').forEach(item => item.classList.remove('active'));
                document.querySelectorAll('.reviews-names__title')[instance.activeIndex].classList.add('active');

                if (document.querySelector('.reviews__number')) {
                    document.querySelector('.reviews__number').textContent = numberIndex;
                }
            }
        },
    });
});

document.querySelectorAll('.our-team__slider').forEach(item => {
    const parent_el = item.closest('.our-team');

    new Swiper(item, {
        modules: [Scrollbar],
        autoHeight: true,
        spaceBetween: 16,
        slidesOffsetBefore: 16,
        slidesOffsetAfter: 16,
        slidesPerView: 1.61,
        breakpoints: {
            576: {
                slidesPerView: 1.8,
            },
        },
        scrollbar: {
            el: parent_el.querySelector('.swiper-scrollbar'),
            hide: false,
        },
    });
});