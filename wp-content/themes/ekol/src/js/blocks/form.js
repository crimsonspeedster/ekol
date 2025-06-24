import SlimSelect from 'slim-select';

const initializedSelects = new WeakMap();

function initSlimSelectsInForm(container) {
    container.querySelectorAll('select.hs-input').forEach(select => {
        if (!initializedSelects.has(select)) {
            const instance = new SlimSelect({ select });
            initializedSelects.set(select, instance);
        }
    });
}
const formContainer = document.querySelector('.part-form__left');

if (formContainer) {
    initSlimSelectsInForm(formContainer);

    const observer = new MutationObserver(mutations => {
        mutations.forEach(mutation => {
            mutation.addedNodes.forEach(node => {
                if (node.nodeType === 1) {
                    if (node.matches('select.hs-input')) {
                        initSlimSelectsInForm(formContainer);
                    } else if (node.querySelector && node.querySelector('select.hs-input')) {
                        initSlimSelectsInForm(formContainer);
                    }
                }
            });
        });
    });

    observer.observe(formContainer, {
        childList: true,
        subtree: true,
    });
}

document.querySelectorAll('[data-form-select]').forEach(item => item.addEventListener('click', function () {
    const type = item.getAttribute('data-form-select');

    const select = document.querySelector('select[name="form_request_type"]');

    if (select) {
        document.querySelector('.header').classList.remove('active');
        document.querySelector('.header-button').classList.remove('active');
        document.querySelector('body').classList.remove('overflow-hidden');
        document.querySelector('.header-sidebar').classList.remove('active');

        select.value = type;
        select.dispatchEvent(new Event('change', { bubbles: true }));
    }

    item.click();
}));

const params = new URLSearchParams(window.location.search);

if (params.has('form')) {
    const get_data_form = params.get('form');
    console.log(get_data_form);

    setTimeout(function () {
        const select = document.querySelector('select[name="form_request_type"]');
        console.log(select);

        if (select) {
            let select_value = '';
            const select_options = select.querySelectorAll('option');
            select_options.forEach(item => {
                if (item.value.toLowerCase() === get_data_form) {
                    select_value = item.value;
                }
            });

            console.log(select_value);

            select.value = select_value;
            select.dispatchEvent(new Event('change', { bubbles: true }));
            select.value = select_value;
            select.dispatchEvent(new Event('change', { bubbles: true }));
        }
    }, 1000);
}