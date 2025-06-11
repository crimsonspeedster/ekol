<?php
get_header();

get_template_part('partials/global/breadcrumbs');

$common__error_video = get_field('common__error_video', 'option');
?>
<main>
    <section class="error-section">
        <div class="container error-section__wrapper">
            <div class="error-section__left" data-video="<?= $common__error_video; ?>">
                <video src="" loop autoplay muted playsinline></video>
            </div>

            <div class="error-section__right">
                <h1 class="error-section__title">404</h1>

                <p class="error-section__description"><?= pll__('Сторінка, яку ви шукаєте, не знайдена'); ?></p>

                <a href="<?= trailingslashit(get_home_url()); ?>" class="button button--primary error-section__button"><?= pll__('Повернутись на головну'); ?></a>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();