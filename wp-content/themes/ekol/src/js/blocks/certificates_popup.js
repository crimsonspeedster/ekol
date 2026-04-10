const popup = document.getElementById('certificatesCasePopup');

if ( popup ) {
    const popupImg = popup.querySelector('.js-popup-img');
    const triggers = document.querySelectorAll('.js-open-popup');
    const closeButtons = document.querySelectorAll('.js-close-popup');

    function openPopup(card) {
        const certificateImg = card.getAttribute('data-popup-img');

        if ( popupImg && certificateImg ) {
            popupImg.src = certificateImg;
        }

        popup.classList.add('is-active');
        document.body.classList.add('no-scroll');
    }

    function closePopup() {
        popup.classList.remove('is-active');
        document.body.classList.remove('no-scroll');

        setTimeout(() => {
            reviewImg.src = '';
        }, 300);
    }


    triggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {

            e.preventDefault();
            openPopup(trigger);
        });
    });

    closeButtons.forEach(btn => {
        btn.addEventListener('click', closePopup);
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && popup.classList.contains('is-active')) {
            closePopup();
        }
    });
}