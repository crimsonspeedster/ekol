<?php
$cases__condition = get_field('cases__condition');
$cases__pretitle = get_field('cases__pretitle');
$cases__title = get_field('cases__title');
$cases__description = get_field('cases__description');
$cases__link = get_field('cases__link');
$cases__type = get_field('cases__type');
$cases__posts = [];

switch ($cases__type) {
    case 'some_of_them':
        $services__posts = get_field('cases__posts');

        if (!is_array($cases__posts)) {
            $cases__posts = [];
        }
        break;
    case 'number':
        $cases__posts_number = get_field('cases__posts_number');

        $cases__posts = get_posts([
            'post_type'      => 'cases',
            'posts_per_page' => $cases__posts_number,
            'post_status'    => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        break;
    default:
        $cases__posts_number = -1;

        $cases__posts = get_posts([
            'post_type'      => 'cases',
            'posts_per_page' => $cases__posts_number,
            'post_status'    => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        break;
}

if ($cases__condition) {
    ?>
    <section class="cases-part">
        <?php
            get_template_part('partials/global/car-animation', '', [
                'classes' => 'cases-part__car-animation cases-part__car-animation--pc',
                'svg_el' => '
                    <svg class="truckPathSvg" width="100%" height="126" viewBox="0 0 1440 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="basePath" d="M0 1H510.5C519.337 1 526.5 8.16344 526.5 17V99C526.5 107.837 533.663 115 542.5 115H1094C1102.84 115 1110 107.837 1110 99V47.8104C1110 38.9738 1117.16 31.8104 1126 31.8104H1440" />
                        
                        <path class="progressPath" d="M0 1H510.5C519.337 1 526.5 8.16344 526.5 17V99C526.5 107.837 533.663 115 542.5 115H1094C1102.84 115 1110 107.837 1110 99V47.8104C1110 38.9738 1117.16 31.8104 1126 31.8104H1440" />
                        
                        <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
                'mob_svg_el' => '
                    <svg class="truckPathSvg" width="100%" height="60" viewBox="0 0 360 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="basePath" d="M0 59.5H74C82.8366 59.5 90 52.3366 90 43.5V17C90 8.16344 97.1634 1 106 1H254C262.837 1 270 8.16345 270 17V43.5C270 52.3366 277.163 59.5 286 59.5H360" />
                        
                        <path class="progressPath" d="M0 59.5H74C82.8366 59.5 90 52.3366 90 43.5V17C90 8.16344 97.1634 1 106 1H254C262.837 1 270 8.16345 270 17V43.5C270 52.3366 277.163 59.5 286 59.5H360" />
                        
                        <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
                'mob_classes' => 'cases-part__car-animation cases-part__car-animation--mob',
            ]);
        ?>

        <div class="container">
            <div class="cases-part__top">
                <div class="cases-part__left">
                    <p class="pretitle cases-part__pretitle" data-aos="fade-up"><?= $cases__pretitle; ?></p>

                    <h2 class="cases-part__title" data-aos="fade-up"><?= $cases__title; ?></h2>

                    <div class="content cases-part__description" data-aos="fade-up"><?= $cases__description; ?></div>
                </div>

                <?php
                    if (!empty($cases__link)) {
                        ?>
                        <a data-aos="fade-up" class="button button--primary cases-part__button" href="<?= $cases__link['url']; ?>" <?php getLinkAttrs($cases__link); ?>><?= $cases__link['title']; ?></a>
                        <?php
                    }
                ?>
            </div>
        </div>

        <?php
            if (!empty($cases__posts)) {
                ?>
                <div class="swiper cases-part-slider" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($cases__posts as $post) {
                                ?>
                                <div class="swiper-slide cases-part__slide">
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
                </div>

                <div class="swiper-scrollbar cases-part-slider__scrollbar"></div>
                <?php
            }

            if (!empty($cases__link)) {
                ?>
                <a data-aos="fade-up" class="button button--primary cases-part__button" href="<?= $cases__link['url']; ?>" <?php getLinkAttrs($cases__link); ?>><?= $cases__link['title']; ?></a>
                <?php
            }
        ?>
    </section>
    <?php
}