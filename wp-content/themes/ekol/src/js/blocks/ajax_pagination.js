import axios from "axios";

document.querySelectorAll('.button--more').forEach(item => item.addEventListener('click', function () {
    item.setAttribute('disabled', 'disabled');

    const posts_inner_el = document.querySelector(item.getAttribute('data-posts_inner_el'));
    let current_page_number = parseInt(item.getAttribute('data-current'));

    axios.get(api_settings.ajax_url, {
        params: {
            nonce: api_settings.nonce,
            action: 'load_more_posts',
            post_type: item.getAttribute('data-post_type'),
            current: current_page_number,
            per_page: item.getAttribute('data-per_page'),
            s: item.getAttribute('data-s'),
            term_id: item.getAttribute('data-term_id'),
            taxonomy: item.getAttribute('data-taxonomy'),
        }
    })
        .then(function (response) {
            const data = response.data.data;

            if (response.data.success) {
                current_page_number+=1;
                item.setAttribute('data-current', current_page_number);

                posts_inner_el.insertAdjacentHTML('beforeend', data.posts_html);

                if (current_page_number >= data.total_pages) {
                    item.style.display = 'none';
                }
            }
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(function () {
            item.removeAttribute('disabled');
        });
}));
