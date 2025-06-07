import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { MotionPathPlugin } from "gsap/MotionPathPlugin";

gsap.registerPlugin(ScrollTrigger, MotionPathPlugin);

gsap.to(".road-line", {
    strokeDashoffset: -14,
    repeat: -1,
    ease: "none",
    duration: 0.5
});

document.querySelectorAll('.scroll-section').forEach(item => {
    const motionPath = item.querySelector(".basePath");
    const progressPath = item.querySelector(".progressPath");
    const truck = item.querySelector(".truck");
    const is_reversed = item.classList.contains('reverse');

    const pathLength = progressPath.getTotalLength();
    progressPath.style.strokeDasharray = pathLength;
    progressPath.style.strokeDashoffset = pathLength;

    const firstPoint = motionPath.getPointAtLength(0);

    gsap.set(truck, {
        x: firstPoint.x - 20,
        y: firstPoint.y - 10
    });

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: item.querySelector('.truckPathSvg'),
            start: "top bottom",
            end: "bottom 25%",
            scrub: true
        }
    });

    if (is_reversed) {
        progressPath.style.strokeDasharray = pathLength;
        progressPath.style.strokeDashoffset = 0;

        tl.to(truck, {
            motionPath: {
                path: motionPath,
                align: motionPath,
                autoRotate: true,
                alignOrigin: [0.5, 0.5],
                start: 1,
                end: 0
            },
            ease: "none"
        }, 0);

        tl.to(progressPath, {
            strokeDashoffset: pathLength,
            ease: "none"
        }, 0);
    }
    else {
        tl.to(truck, {
            motionPath: {
                path: motionPath,
                align: motionPath,
                autoRotate: true,
                alignOrigin: [0.5, 0.5],
            },
            ease: "none"
        }, 0);

        tl.to(progressPath, {
            strokeDashoffset: 0,
            ease: "none"
        }, 0);
    }
});

document.querySelectorAll('[data-number]').forEach(item => {
    const endVal = parseFloat(item.getAttribute('data-number'));
    const symbol = item.getAttribute('data-symbol') || '';
    const isFloat = !Number.isInteger(endVal);
    const obj = { val: 0 };

    const duration = endVal <= 10 ? 1 : 4;

    gsap.to(obj, {
        val: endVal,
        duration,
        ease: "sine.inOut",
        scrollTrigger: {
            trigger: item,
            start: "top 100%",
            toggleActions: "play none none none",
        },
        onUpdate: () => {
            item.innerText = isFloat
                ? `${obj.val.toFixed(1)}${symbol}`
                : `${Math.floor(obj.val)}${symbol}`;
        }
    });
});

const timeline_scroll_ell = document.querySelector('.timeline-scroll');
if (timeline_scroll_ell) {
    const bbox = timeline_scroll_ell.querySelector('.basePath').getBBox();

    const newX = bbox.x;
    const newY = bbox.y;
    const newWidth = bbox.width;
    const newHeight = document.querySelector('.timeline__row').offsetHeight;

    timeline_scroll_ell.querySelector('svg').setAttribute('viewBox', `${newX} ${newY} ${newWidth} ${newHeight}`);
    timeline_scroll_ell.querySelector('svg').style.aspectRatio = 23 + ' / ' + newHeight;

    const scroll_item_els = document.querySelectorAll('.timeline-item');
    let timeline_scroll_circles_str = '';
    const firstOffest = newHeight / scroll_item_els.length;
    let extraCounts = 0;

    if (window.innerWidth > 991) {
        extraCounts = -100 + 15 - scroll_item_els[0].offsetHeight;
    }

    for (let i = 0; i < scroll_item_els.length; i++) {
        const cy = firstOffest + scroll_item_els[i].offsetHeight + scroll_item_els[i].offsetTop + extraCounts;

        timeline_scroll_circles_str += `
            <circle class="timeline-dot" cx="12" cy="${cy}" data-index="${i}" r="8" fill="#EBF3F9" stroke="#DFDFE1" stroke-width="2"/>
        `;
    }

    timeline_scroll_ell.querySelector('.progressPath').insertAdjacentHTML('afterend', timeline_scroll_circles_str);

    const motionPath = timeline_scroll_ell.querySelector(".basePath");
    const progressPath = timeline_scroll_ell.querySelector(".progressPath");
    const truck = timeline_scroll_ell.querySelector(".truck");

    motionPath.setAttribute('d', `M12 247L12.0001 ${newHeight + 200}`);
    progressPath.setAttribute('d', `M12 247L12.0001 ${newHeight + 200}`);

    const pathLength = progressPath.getTotalLength();
    progressPath.style.strokeDasharray = pathLength;
    progressPath.style.strokeDashoffset = pathLength;

    const firstPoint = motionPath.getPointAtLength(0);

    const circles = timeline_scroll_ell.querySelectorAll('.timeline-dot');

    gsap.ticker.add(() => {
        const progress = ScrollTrigger.getById('truck-scroll')?.progress ?? 0;
        const point = motionPath.getPointAtLength(progress * pathLength);

        circles.forEach(circle => {
            const cy = parseFloat(circle.getAttribute('cy'));

            if (point.y >= cy) {
                circle.setAttribute('fill', 'url(#paint2_linear_10_10)');
                circle.setAttribute('stroke', 'white');
            } else {
                circle.setAttribute('fill', '#EBF3F9');
                circle.setAttribute('stroke', '#DFDFE1');
            }
        });
    });

    const TRUCK_HEIGHT = 60;
    const DOT_RADIUS = 8;
    const OFFSET_Y = 13;

    gsap.set(truck, {
        x: firstPoint.x - 20,
        y: firstPoint.y - TRUCK_HEIGHT / 2 - DOT_RADIUS - OFFSET_Y
    });

    const tl = gsap.timeline({
        scrollTrigger: {
            id: 'truck-scroll',
            trigger: timeline_scroll_ell,
            start: "top 25%",
            end: "bottom 50%",
            scrub: true,
            clamp: true,
        }
    });

    tl.to(truck, {
        motionPath: {
            path: motionPath,
            align: motionPath,
            autoRotate: true,
            alignOrigin: [0.5, 0.5]
        },
        ease: "none",
        immediateRender: true
    }, 0);

    tl.to(progressPath, {
        strokeDashoffset: 0,
        ease: "none"
    }, 0);
}
