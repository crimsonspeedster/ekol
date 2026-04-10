document.addEventListener('DOMContentLoaded', function() {
    const questions = document.querySelectorAll('.accordion__header');

    if (questions.length === 0) return;

    questions.forEach(question => {
        question.addEventListener('click', function() {
            const item = this.parentElement;
            const answer = this.nextElementSibling;

            document.querySelectorAll('.accordion').forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('open')) {
                    otherItem.classList.remove('open');
                    otherItem.querySelector('.accordion__content').style.maxHeight = 0;
                }
            });

            item.classList.toggle('open');

            if (item.classList.contains('open')) {
                answer.style.maxHeight = answer.scrollHeight + "px";
            } else {
                answer.style.maxHeight = 0;
            }
        });
    });
});