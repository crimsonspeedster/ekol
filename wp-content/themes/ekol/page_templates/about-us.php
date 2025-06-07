<?php
/*
Template Name: About us page
*/

get_header();

$hero__title = get_field('hero__title');
$hero__description = get_field('hero__description');
$hero__bg_id = get_field('hero__bg_id');

$timeline__pretitle = get_field('timeline__pretitle');
$timeline__title = get_field('timeline__title');
$timeline__description = get_field('timeline__description');
$timeline__repeater = get_field('timeline__repeater');

$our_solution__pretitle = get_field('our_solution__pretitle');
$our_solution__title = get_field('our_solution__title');
$our_solution__description = get_field('our_solution__description');
$our_solution__repeater = get_field('our_solution__repeater');

$remake__pretitle = get_field('remake__pretitle');
$remake__title = get_field('remake__title');
$remake__description = get_field('remake__description');
$remake__image = get_field('remake__image');
$remake__repeater = get_field('remake__repeater');

$our_team__pretitle = get_field('our_team__pretitle');
$our_team__title = get_field('our_team__title');
$our_team__description = get_field('our_team__description');
$our_team__repeater = get_field('our_team__repeater');

$reviews__bg_id = get_field('reviews__bg_id');
$reviews__pretitle = get_field('reviews__pretitle');
$reviews__repeater = get_field('reviews__repeater');
?>
<main>
    <?php
        get_template_part('partials/global/breadcrumbs');
    ?>

    <section class="hero-about">
        <div class="container">
            <div class="hero-about__block">
                <div class="hero-about__image">
                    <?= wp_get_attachment_image($hero__bg_id, 'full'); ?>
                </div>

                <div class="hero-about__content background-block__container">
                    <h1 class="hero-about__title hero--animation"><?= $hero__title; ?></h1>

                    <?php
                        if ($hero__description) {
                            ?>
                            <p class="hero-about__description hero--animation"><?= $hero__description; ?></p>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php
        get_template_part('partials/part-about');
    ?>

    <section class="timeline">
        <div class="container">
            <p class="pretitle timeline__pretitle"><?= $timeline__pretitle; ?></p>

            <h2 class="timeline__title"><?= $timeline__title; ?></h2>

            <div class="content timeline__description"><?= $timeline__description; ?></div>

            <?php
                if (!empty($timeline__repeater)) {
                    ?>
                    <div class="timeline__row">
                        <div class="timeline-scroll">
                            <svg class="truckPathSvg" viewBox="0 0 23 1826" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="basePath" d="M12 247L12.0001 2014" stroke="#DFDFE1" stroke-width="2"/>

                                <path class="progressPath" d="M12 247L12.0001 2014" stroke="url(#paint2_linear_10_10)" stroke-width="2"/>

                                <defs>
                                    <linearGradient id="paint0_linear_10_10" x1="12.5" y1="247" x2="12.5001" y2="2014" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DFDFE1" stop-opacity="0"/>
                                        <stop offset="0.0335901" stop-color="#DFDFE1"/>
                                        <stop offset="0.875148" stop-color="#DFDFE1"/>
                                        <stop offset="1" stop-color="#DFDFE1" stop-opacity="0"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_10_10" x1="12" y1="253.5" x2="13" y2="253.5" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#06AEEF"/>
                                        <stop offset="1" stop-color="#A4ECE2"/>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_10_10" x1="4" y1="268" x2="20" y2="268" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#06AEEF"/>
                                        <stop offset="1" stop-color="#A4ECE2"/>
                                    </linearGradient>
                                </defs>

                                <image class="truck" href="<?= get_template_directory_uri(); ?>/dist/img/truck.png" width="60" height="23" style="rotate: -90deg;" />
                            </svg>
                        </div>

                        <?php
                            foreach ($timeline__repeater as $index => $item) {
                                $is_reversed = ($index % 2) == 0 ? 'reverse' : '';
                                ?>
                                <div class="timeline-item <?= $is_reversed; ?>">
                                    <p class="timeline-item__pretitle"><?= $item['pretitle']; ?></p>

                                    <?php
                                        if ($item['title']) {
                                            ?>
                                            <h3 class="timeline-item__title"><?= $item['title']; ?></h3>
                                            <?php
                                        }

                                        if ($item['description']) {
                                            ?>
                                            <p class="timeline-item__description"><?= $item['description']; ?></p>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                }
            ?>
        </div>
    </section>

    <section class="our-solution">
        <div class="container">
            <p class="pretitle our-solution__pretitle"><?= $our_solution__pretitle; ?></p>

            <h2 class="our-solution__title"><?= $our_solution__title; ?></h2>

            <div class="content our-solution__description"><?= $our_solution__description; ?></div>

            <?php
                if (!empty($our_solution__repeater)) {
                    ?>
                    <div class="our-solution-tabs">
                        <?php
                            foreach ($our_solution__repeater as $index => $item)
                            {
                                ?>
                                <div class="h4 our-solution-tab <?= $index === 0 ? 'active' : ''; ?>"><?= $item['tab']; ?></div>
                                <?php
                            }
                        ?>
                    </div>

                    <div class="our-solution-tabs-content">
                        <?php
                            foreach ($our_solution__repeater as $index => $item) {
                                ?>
                                <div class="our-solution-tab-content <?= $index === 0 ? 'active' : ''; ?>">
                                    <div class="our-solution-tab-content__left">
                                        <h2 class="our-solution-tab-content__title"><?= $item['title']; ?></h2>

                                        <div class="content our-solution-tab-content__description"><?= $item['description']; ?></div>
                                    </div>

                                    <div class="our-solution-tab-content__right">
                                        <?= wp_get_attachment_image($item['background_id'], 'full'); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                }
            ?>
        </div>
    </section>

    <section class="remake">
        <div class="container">
            <div class="remake__container">
                <div class="remake__left">
                    <div class="remake__top">
                        <p class="pretitle remake__pretitle"><?= $remake__pretitle; ?></p>

                        <h2 class="remake__title"><?= $remake__title; ?></h2>

                        <div class="content remake__description"><?= $remake__description; ?></div>
                    </div>

                    <?php
                        if (!empty($remake__repeater)) {
                            ?>
                            <div class="remake__bottom">
                                <?php
                                    foreach ($remake__repeater as $item) {
                                        ?>
                                        <div class="remake-item">
                                            <p
                                                class="remake-item__number"
                                                data-number="<?= $item['number']; ?>"
                                                data-symbol="<?= str_replace($item['number'], '', $item['title']); ?>"
                                            ><?= $item['title']; ?></p>

                                            <div class="remake-item__icon">
                                                <?= getNumberHelperIcon($item['type']); ?>
                                            </div>

                                            <p class="remake-item__description"><?= $item['description']; ?></p>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </div>

                <div class="remake__right">
                    <?= wp_get_attachment_image($remake__image, 'full'); ?> ?>
                </div>
            </div>
        </div>
    </section>

    <section class="our-team">
        <div class="container">
            <p class="pretitle our-team__pretitle"><?= $our_team__pretitle; ?></p>

            <h2 class="our-team__title"><?= $our_team__title; ?></h2>

            <div class="content our-team__description"><?= $our_team__description; ?></div>

            <?php
                if (!empty($our_team__repeater)) {
                    ?>
                    <div class="our-team__row">
                        <?php
                            foreach ($our_team__repeater as $item) {
                                ?>
                                <div class="our-team-item">
                                    <div class="our-team-item__image">
                                        <?= wp_get_attachment_image($item['image_id'], 'full'); ?>
                                    </div>

                                    <h4 class="our-team-item__title"><?= $item['title']; ?></h4>

                                    <?php
                                        if ($item['position']) {
                                            ?>
                                            <p class="our-team-item__position"><?= $item['position']; ?></p>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                }
            ?>
        </div>

        <?php
            if (!empty($our_team__repeater)) {
                ?>
                <div class="swiper our-team__slider">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($our_team__repeater as $item) {
                                ?>
                                <div class="swiper-slide our-team__slide">
                                    <div class="our-team-item">
                                        <div class="our-team-item__image">
                                            <?= wp_get_attachment_image($item['image_id'], 'full'); ?>
                                        </div>

                                        <h4 class="our-team-item__title"><?= $item['title']; ?></h4>

                                        <?php
                                            if ($item['position']) {
                                                ?>
                                                <p class="our-team-item__position"><?= $item['position']; ?></p>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="swiper-scrollbar our-team__scrollbar"></div>
                <?php
            }
        ?>
    </section>

    <?php
        get_template_part('partials/part-vacancies');
    ?>

    <section class="reviews background-block" id="reviews">
        <div class="background-block__image">
            <?= wp_get_attachment_image($reviews__bg_id, 'full'); ?>
        </div>

        <div class="container background-block__container">
            <div class="reviews__top">
                <p class="pretitle reviews__pretitle"><?= $reviews__pretitle; ?></p>

                <div class="h4 reviews__number">01</div>

                <div class="reviews__buttons">
                    <div class="swiper-button-prev"></div>

                    <div class="swiper-button-next"></div>
                </div>
            </div>

            <div class="swiper reviews-slider reviews-slider--names">
                <div class="swiper-wrapper">
                    <?php
                        foreach ($reviews__repeater as $item) {
                            ?>
                            <div class="swiper-slide">
                                <div class="reviews-names">
                                    <p class="reviews-names__title"><?= $item['title']; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>

            <div class="reviews__line"></div>

            <div class="swiper reviews-slider reviews-slider--main">
                <div class="swiper-wrapper">
                    <?php
                        foreach ($reviews__repeater as $item) {
                            ?>
                            <div class="swiper-slide">
                                <div class="reviews-item">
                                    <div class="content reviews-item__description"><?= $item['description']; ?></div>

                                    <div class="reviews-item__bottom">
                                        <div class="reviews-item-rating">
                                            <div class="reviews-item-rating__svgs">
                                                <?php
                                                    for ($i = 1; $i <= $item['rating']; $i++) {
                                                        ?>
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.6392 7.17741L11.8267 9.60429L12.6836 13.2337C12.7308 13.4307 12.7187 13.6373 12.6486 13.8274C12.5785 14.0175 12.4536 14.1826 12.2898 14.3018C12.1259 14.4209 11.9304 14.4889 11.728 14.497C11.5255 14.5051 11.3252 14.4531 11.1523 14.3474L7.99605 12.4049L4.83793 14.3474C4.66507 14.4525 4.46499 14.504 4.26289 14.4956C4.06079 14.4872 3.8657 14.4191 3.70218 14.3001C3.53867 14.181 3.41404 14.0162 3.344 13.8264C3.27395 13.6367 3.26162 13.4304 3.30855 13.2337L4.16856 9.60429L1.35605 7.17741C1.20312 7.04523 1.09251 6.87092 1.03804 6.67625C0.98358 6.48159 0.987674 6.27519 1.04981 6.08283C1.11195 5.89048 1.22939 5.72069 1.38745 5.59468C1.54551 5.46867 1.73719 5.39201 1.93855 5.37429L5.62605 5.07679L7.04855 1.63429C7.12555 1.44667 7.2566 1.28619 7.42504 1.17325C7.59347 1.06031 7.79169 1 7.99449 1C8.19729 1 8.39551 1.06031 8.56395 1.17325C8.73239 1.28619 8.86343 1.44667 8.94043 1.63429L10.3623 5.07679L14.0498 5.37429C14.2516 5.39135 14.4438 5.46758 14.6024 5.59342C14.7611 5.71925 14.8791 5.88911 14.9416 6.0817C15.0041 6.27429 15.0084 6.48104 14.954 6.67607C14.8995 6.87109 14.7887 7.04571 14.6354 7.17804L14.6392 7.17741Z" fill="#06AEEF"/>
                                                        </svg>
                                                        <?php
                                                    }

                                                    if ($item['rating'] < 5) {
                                                        for ($i = 1; $i <= (5 - $item['rating']); $i++) {
                                                            ?>
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.6392 7.17741L11.8267 9.60429L12.6836 13.2337C12.7308 13.4307 12.7187 13.6373 12.6486 13.8274C12.5785 14.0175 12.4536 14.1826 12.2898 14.3018C12.1259 14.4209 11.9304 14.4889 11.728 14.497C11.5255 14.5051 11.3252 14.4531 11.1523 14.3474L7.99605 12.4049L4.83793 14.3474C4.66507 14.4525 4.46499 14.504 4.26289 14.4956C4.06079 14.4872 3.8657 14.4191 3.70218 14.3001C3.53867 14.181 3.41404 14.0162 3.344 13.8264C3.27395 13.6367 3.26162 13.4304 3.30855 13.2337L4.16856 9.60429L1.35605 7.17741C1.20312 7.04523 1.09251 6.87092 1.03804 6.67625C0.98358 6.48159 0.987674 6.27519 1.04981 6.08283C1.11195 5.89048 1.22939 5.72069 1.38745 5.59468C1.54551 5.46867 1.73719 5.39201 1.93855 5.37429L5.62605 5.07679L7.04855 1.63429C7.12555 1.44667 7.2566 1.28619 7.42504 1.17325C7.59347 1.06031 7.79169 1 7.99449 1C8.19729 1 8.39551 1.06031 8.56395 1.17325C8.73239 1.28619 8.86343 1.44667 8.94043 1.63429L10.3623 5.07679L14.0498 5.37429C14.2516 5.39135 14.4438 5.46758 14.6024 5.59342C14.7611 5.71925 14.8791 5.88911 14.9416 6.0817C15.0041 6.27429 15.0084 6.48104 14.954 6.67607C14.8995 6.87109 14.7887 7.04571 14.6354 7.17804L14.6392 7.17741Z" stroke="#06AEEF"/>
                                                            </svg>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </div>

                                            <p class="reviews-item-rating__text"><?= $item['rating']; ?>.0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php
        get_template_part('partials/global/part-form');
    ?>
</main>
<?php
get_footer();
