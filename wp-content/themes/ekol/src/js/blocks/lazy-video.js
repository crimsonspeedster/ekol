window.addEventListener('load', function() {
    document.querySelectorAll('[data-video]').forEach(item => {
        const video_url = item.getAttribute('data-video');
        const video_el = item.querySelector('video');

        video_el.src = video_url;
        video_el.load();
    });
}, {
    passive: true
});