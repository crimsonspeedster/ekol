<?php
$solutions__condition = get_field('solutions__condition');
$solutions__pretitle = get_field('solutions__pretitle');
$solutions__title = get_field('solutions__title');
$solutions__description = get_field('solutions__description');
$solutions__link = get_field('solutions__link');
$solutions__type = get_field('solutions__type');
$solutions__posts = [];

switch ($solutions__type) {
    case 'some_of_them':
        $solutions__posts = get_field('services__posts');

        if (!is_array($solutions__posts)) {
            $solutions__posts = [];
        }
        break;
    case 'number':
        $solutions__posts_number = get_field('solutions__posts_number');

        $solutions__posts = get_posts([
            'post_type'      => 'solutions',
            'posts_per_page' => $solutions__posts_number,
            'post_status'    => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        break;
    default:
        $solutions__posts_number = -1;

        $solutions__posts = get_posts([
            'post_type'      => 'solutions',
            'posts_per_page' => $solutions__posts_number,
            'post_status'    => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        break;
}

if ($solutions__condition) {
    ?>
    <section class="solutions-part">
        <?php
            get_template_part('partials/global/car-animation', '', [
                'mob_classes' => 'solutions-part__car-animation solutions-part__car-animation--mob',
                'mob_svg_el' => '
                    <svg class="truckPathSvg" width="100%" height="106" viewBox="0 0 361 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="basePath" d="M0 1H237.5C246.337 1 253.5 8.16344 253.5 17V89C253.5 97.8366 260.663 105 269.5 105H361" />
                        
                        <path class="progressPath" d="M0 1H237.5C246.337 1 253.5 8.16344 253.5 17V89C253.5 97.8366 260.663 105 269.5 105H361" />
                        
                        <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
            ]);
        ?>

        <div class="container">
            <div class="solutions-part__top">
                <p class="pretitle solutions-part__pretitle" data-aos="fade-up"><?= $solutions__pretitle; ?></p>

                <h2 class="solutions-part__title" data-aos="fade-up"><?= $solutions__title; ?></h2>

                <div class="content solutions-part__description" data-aos="fade-up"><?= $solutions__description; ?></div>
            </div>
        </div>

        <?php
            if (!empty($solutions__posts)) {
                ?>
                <div class="swiper solutions-part-slider" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($solutions__posts as $post) {
                                ?>
                                <div class="swiper-slide solutions-part__slide">
                                    <?php
                                        setup_postdata($post);

                                        get_template_part('partials/previews/preview', $post->post_type);
                                    ?>
                                </div>
                                <?php
                            }

                            wp_reset_postdata();
                        ?>
                    </div>

                    <div class="swiper-bottom-part solutions-part-slider__bottom">
                        <div class="swiper-button-prev"></div>

                        <div class="swiper-scrollbar solutions-part-slider__scrollbar"></div>

                        <div class="swiper-button-next"></div>
                    </div>
                </div>
                <?php
            }

            if (!empty($solutions__link)) {
                ?>
                <a data-aos="fade-up" class="button button--primary solutions-part__button" href="<?= $solutions__link['url']; ?>" <?php getLinkAttrs($solutions__link); ?>><?= $solutions__link['title']; ?></a>
                <?php
            }
        ?>
    </section>
    <?php
}