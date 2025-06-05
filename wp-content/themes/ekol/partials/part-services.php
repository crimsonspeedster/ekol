<?php
$services__condition = get_field('services__condition');
$services__pretitle = get_field('services__pretitle');
$services__title = get_field('services__title');
$services__description = get_field('services__description');
$services__link = get_field('services__link');
$services__type = get_field('services__type');
$services__posts = [];

switch ($services__type) {
    case 'some_of_them':
        $services__posts = get_field('services__posts');

        if (!is_array($services__posts)) {
            $services__posts = [];
        }
        break;
    case 'number':
        $services__posts_number = get_field('services__posts_number');

        $services__posts = get_posts([
            'post_type'      => 'services',
            'posts_per_page' => $services__posts_number,
            'post_status'    => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        break;
    default:
        $services__posts_number = -1;

        $services__posts = get_posts([
            'post_type'      => 'services',
            'posts_per_page' => $services__posts_number,
            'post_status'    => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        break;
}

if ($services__condition) {
    ?>
    <section class="services-part">
        <?php
            get_template_part('partials/global/car-animation', '', [
                'classes' => 'services-part__car-animation services-part__car-animation--pc',
                'svg_el' => '
                    <svg class="truckPathSvg" width="100%" height="65" viewBox="0 0 1440 65" fill="none">
                        <path class="basePath" d="M0 1H370.5C379.337 1 386.5 8.16344 386.5 17V39C386.5 47.8366 393.663 55 402.5 55H1110H1440" />
                        
                        <path class="progressPath" d="M0 1H370.5C379.337 1 386.5 8.16344 386.5 17V39C386.5 47.8366 393.663 55 402.5 55H1110H1440" />
                        
                        <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
                'mob_classes' => 'services-part__car-animation services-part__car-animation--mob',
                'mob_svg_el' => '
                    <svg class="truckPathSvg" width="100%" height="106" viewBox="0 0 361 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="basePath" d="M0 1H157.5C166.337 1 173.5 8.16344 173.5 17V89C173.5 97.8366 180.663 105 189.5 105H361" />
                        
                        <path class="progressPath" d="M0 1H157.5C166.337 1 173.5 8.16344 173.5 17V89C173.5 97.8366 180.663 105 189.5 105H361" />
                        
                        <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
            ]);
        ?>

        <div class="container">
            <div class="services-part__top">
                <div class="services-part__left">
                    <p class="pretitle services-part__pretitle" data-aos="fade-up"><?= $services__pretitle; ?></p>

                    <h2 class="services-part__title" data-aos="fade-up"><?= $services__title; ?></h2>

                    <div class="content services-part__description" data-aos="fade-up"><?= $services__description; ?></div>
                </div>

                <?php
                    if (!empty($services__link)) {
                        ?>
                        <a data-aos="fade-up" class="button button--primary services-part__button" href="<?= $services__link['url']; ?>" <?php getLinkAttrs($services__link); ?>><?= $services__link['title']; ?></a>
                        <?php
                    }
                ?>
            </div>
        </div>

        <?php
            if (!empty($services__posts)) {
                ?>
                <div class="swiper services-part-slider" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($services__posts as $post) {
                                ?>
                                <div class="swiper-slide services-part__slide">
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

                    <div class="swiper-scrollbar services-part-slider__scrollbar"></div>
                </div>
                <?php
            }

            if (!empty($services__link)) {
                ?>
                <a data-aos="fade-up" class="button button--primary services-part__button" href="<?= $services__link['url']; ?>" <?php getLinkAttrs($services__link); ?>><?= $services__link['title']; ?></a>
                <?php
            }
        ?>
    </section>
    <?php
}