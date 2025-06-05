<?php
$vacancies__condition = get_field('vacancies__condition');
$vacancies__pretitle = get_field('vacancies__pretitle');
$vacancies__title = get_field('vacancies__title');
$vacancies__description = get_field('vacancies__description');
$vacancies__link = get_field('vacancies__link');
$vacancies__repeater = get_field('vacancies__repeater');

if ($vacancies__condition) {
    ?>
    <section class="vacancies-part">
        <?php
            get_template_part('partials/global/car-animation', '', [
                'classes' => 'vacancies-part__car-animation vacancies-part__car-animation--pc',
                'svg_el' => '
                    <svg class="truckPathSvg" width="100%" height="300" viewBox="0 0 1440 195" fill="none">
                        <path class="basePath" d="M1 196H394.917C397.126 196 398.917 194.209 398.917 192V5C398.917 2.79086 400.708 1 402.917 1H1099.08C1101.29 1 1103.08 2.79086 1103.08 5V192C1103.08 194.209 1104.87 196 1107.08 196H1501" />
                        
                        <path class="progressPath" d="M1 196H394.917C397.126 196 398.917 194.209 398.917 192V5C398.917 2.79086 400.708 1 402.917 1H1099.08C1101.29 1 1103.08 2.79086 1103.08 5V192C1103.08 194.209 1104.87 196 1107.08 196H1501" />
                        
                        <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
                 'mob_classes' => 'vacancies-part__car-animation vacancies-part__car-animation--mob',
                'mob_svg_el' => '
                    <svg width="100%" height="16" viewBox="0 0 360 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="basePath" d="M0 8H360" />
                        
                        <path class="progressPath" d="M0 8H360" />
                        
                         <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
            ]);
        ?>

        <div class="container">
            <div class="vacancies-part__top">
                <p class="pretitle vacancies-part__pretitle" data-aos="fade-up"><?= $vacancies__pretitle; ?></p>

                <h2 class="vacancies-part__title" data-aos="fade-up"><?= $vacancies__title; ?></h2>

                <div class="content vacancies-part__description" data-aos="fade-up"><?= $vacancies__description; ?></div>

                <?php
                    if (!empty($vacancies__link)) {
                        ?>
                        <a data-aos="fade-up" class="button button--primary vacancies-part__button" href="<?= $vacancies__link['url']; ?>" <?php getLinkAttrs($vacancies__link); ?>><?= $vacancies__link['title']; ?></a>
                        <?php
                    }
                ?>
            </div>
        </div>

        <?php
            if (!empty($vacancies__repeater)) {
                ?>
                <div class="swiper vacancies-part-slider" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($vacancies__repeater as $item) {
                                ?>
                                <div class="swiper-slide">
                                    <div class="vacancies-part-item">
                                        <?php echo wp_get_attachment_image($item['image_id'], 'full'); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="swiper-scrollbar vacancies-part-slider__scrollbar"></div>
                <?php
            }
        ?>
    </section>
    <?php
}