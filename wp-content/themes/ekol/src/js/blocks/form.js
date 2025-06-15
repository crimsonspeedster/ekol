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
        select.value = type;
        select.dispatchEvent(new Event('change', { bubbles: true }));
    }

    item.click();
}));