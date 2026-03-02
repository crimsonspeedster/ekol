<?php
get_header();

get_template_part('partials/global/breadcrumbs');

$common__location = get_field('common__location');
$common__banner_image = get_field('common__banner_image') ?: get_field('vacancies__banner_image', 'option');

$vacancies__form_condition = get_field('vacancies__form_condition', 'option');
$vacancies__form_shortcode = get_field('vacancies__form_shortcode', 'option');
$vacancies__manager_photo = get_field('vacancies__manager_photo', 'option');
$vacancies__manager_name = get_field('vacancies__manager_name', 'option');
$vacancies__manager_position = get_field('vacancies__manager_position', 'option');

$vacancies__more_pretitle = get_field('vacancies__more_pretitle', 'option');
$vacancies__more_title = get_field('vacancies__more_title', 'option');
$vacancies__more_description = get_field('vacancies__more_description', 'option');

$vacancies_more = new WP_Query(array(
    'post_type' => 'vacancies',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order'   => 'DESC',
    'post__not_in' => [get_the_ID()],
    'no_found_rows' => true,
));
?>
    <main>
        <section class="post-vacancies">
            <div class="container">
                <?php
                    if ($common__banner_image) {
                        ?>
                        <div class="post-vacancies__banner">
                            <?= wp_get_attachment_image($common__banner_image, 'full'); ?>
                        </div>
                        <?php
                    }
                ?>

                <div class="post-vacancies__wrapper <?= $vacancies__form_condition ? 'post-vacancies__wrapper--row' : ''; ?>">
                    <div class="post-vacancies__info">
                        <p class="pretitle post-vacancies__pretitle">
                            <?=
                                str_replace('%s1', get_the_date('j F Y'), pll__('опубліковано %s1 р'));
                            ?>
                        </p>

                        <h1 class="post-vacancies__title h2"><?php the_title(); ?></h1>

                        <?php
                            if ($common__location) {
                                ?>
                                <p class="post-vacancies__address"><?= $common__location; ?></p>
                                <?php
                            }
                        ?>

                        <div class="post-vacancies__content post-section__content content"><?php the_content(); ?></div>
                    </div>

                    <?php
                        if ($vacancies__form_condition) {
                            ?>
                            <div class="post-vacancies__form">
                                <div class="vacancy-form">
                                    <div class="vacancy-form__header">
                                        <div class="vacancy-form__image">
                                            <?= wp_get_attachment_image($vacancies__manager_photo, 'full'); ?>
                                        </div>

                                        <div class="vacancy-form__info">
                                            <p class="vacancy-form__name"><?= $vacancies__manager_name; ?></p>

                                            <?php
                                                if ($vacancies__manager_position) {
                                                    ?>
                                                    <p class="vacancy-form__position"><?= $vacancies__manager_position; ?></p>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <p class="vacancy-form__title h3"><?= pll__('Подати заявку на вакансію'); ?></p>

                                    <div class="vacancy-form__wrapper hubspot-form">
                                        <?= do_shortcode($vacancies__form_shortcode); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </section>

        <?php
            if ($vacancies_more->have_posts()) {
                ?>
                <section class="vacancies-single-part">
                    <?php
                        if ($vacancies__more_pretitle || $vacancies__more_title || $vacancies__more_description) {
                            ?>
                            <div class="container">
                                <div class="vacancies-single-part__top">
                                    <?php
                                        if ($vacancies__more_pretitle) {
                                            ?>
                                            <p class="pretitle vacancies-single-part__pretitle" data-aos="fade-up"><?= $vacancies__more_pretitle; ?></p>
                                            <?php
                                        }

                                        if ($vacancies__more_title) {
                                            ?>
                                            <h2 class="vacancies-single-part__title" data-aos="fade-up"><?= $vacancies__more_title; ?></h2>
                                            <?php
                                        }

                                        if ($vacancies__more_description) {
                                            ?>
                                            <div class="content vacancies-single-part__description" data-aos="fade-up"><?= $vacancies__more_description; ?></div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    ?>

                    <div class="swiper vacancies-single-part-slider" data-aos="fade-up">
                        <div class="swiper-wrapper">
                            <?php
                                while ($vacancies_more->have_posts()) {
                                    $vacancies_more->the_post();
                                    ?>
                                    <div class="swiper-slide vacancies-single-part__slide">
                                        <?php
                                            get_template_part('partials/previews/preview-vacancies-small');
                                        ?>
                                    </div>
                                    <?php
                                }

                                wp_reset_postdata();
                            ?>
                        </div>

                        <div class="swiper-bottom-part vacancies-single-part-slider__bottom">
                            <div class="swiper-button-prev"></div>

                            <div class="swiper-scrollbar solutions-part-slider__scrollbar"></div>

                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </section>
                <?php
            }
        ?>
    </main>
<?php
get_footer();
