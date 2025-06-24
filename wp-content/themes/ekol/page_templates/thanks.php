<?php
/*
Template Name: Thanks page
*/

get_header();

get_template_part('partials/global/breadcrumbs');

$common__video = get_field('common__video');
$common__title = get_field('common__title');
$common__image = get_field('common__image');
$common__description = get_field('common__description');
?>
    <main>
        <section class="error-section">
            <div class="container error-section__wrapper">
                <div class="error-section__left" data-video="<?= $common__video; ?>">
                    <video src="" loop autoplay muted playsinline></video>
                </div>

                <div class="error-section__right">
                    <div class="error-section__image">
                        <?= wp_get_attachment_image($common__image, 'full'); ?>
                    </div>

                    <h1><?= $common__title; ?></h1>

                    <?php
                        if ($common__description) {
                            ?>
                            <p class="error-section__description"><?= $common__description; ?></p>
                            <?php
                        }
                    ?>

                    <a href="<?= trailingslashit(get_home_url()); ?>" class="button button--primary error-section__button"><?= pll__('Повернутись на головну'); ?></a>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();