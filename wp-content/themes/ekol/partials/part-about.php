<?php
$part_about__condition = get_field('part_about__condition', 'option');
$part_about__pretitle = get_field('part_about__pretitle', 'option');
$part_about__title = get_field('part_about__title', 'option');
$part_about__description = get_field('part_about__description', 'option');
$part_about__link = get_field('part_about__link', 'option');
$part_about__image = get_field('part_about__image', 'option');
$part_about__repeater = get_field('part_about__repeater', 'option');

if ($part_about__condition) {
    ?>
    <section class="part-about">
        <?php
            get_template_part('partials/global/car-animation', '', [
                'classes' => 'part-about__car-animation part-about__car-animation--pc',
                'svg_el' => '
                    <svg class="truckPathSvg" width="100%" height="244" viewBox="0 0 1440 244" fill="none">
                        <path class="basePath" d="M0 234H313C321.837 234 329 226.837 329 218V17C329 8.16345 336.163 1 345 1H1440" />
                        
                        <path class="progressPath" d="M0 234H313C321.837 234 329 226.837 329 218V17C329 8.16345 336.163 1 345 1H1440" />
                        
                        <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
                'mob_svg_el' => '
                    <svg class="truckPathSvg" width="100%" height="106" viewBox="0 0 361 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="basePath" d="M0 1H157.5C166.337 1 173.5 8.16344 173.5 17V89C173.5 97.8366 180.663 105 189.5 105H361" />
                        
                        <path class="progressPath" d="M0 1H157.5C166.337 1 173.5 8.16344 173.5 17V89C173.5 97.8366 180.663 105 189.5 105H361" />
                    
                       <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
                'mob_classes' => 'part-about__car-animation part-about__car-animation--mob',
            ]);
        ?>

        <div class="container">
            <p class="pretitle part-about__pretitle" data-aos="fade-up"><?= $part_about__pretitle; ?></p>

            <div class="part-about__top" data-aos="fade-up">
                <h2 class="part-about__title"><?= $part_about__title; ?></h2>

                <div class="part-about__right">
                    <div class="content part-about__description"><?= $part_about__description; ?></div>

                    <?php
                        if (!empty($part_about__link)) {
                            ?>
                            <a class="button button--primary part-about__button" href="<?= $part_about__link['url']; ?>" <?php getLinkAttrs($part_about__link); ?>><?= $part_about__link['title']; ?></a>
                            <?php
                        }
                    ?>
                </div>
            </div>

            <div class="part-about__image" data-aos="fade-up">
                <?php echo wp_get_attachment_image($part_about__image, 'full'); ?>
            </div>

            <?php
                if (!empty($part_about__repeater)) {
                    ?>
                    <div class="part-about__counters" data-aos="fade-up">
                        <?php
                            foreach ($part_about__repeater as $item) {
                                ?>
                                <div class="part-about-item">
                                    <p
                                        class="part-about-item__number"
                                        data-number="<?= $item['number']; ?>"
                                        data-symbol="<?= str_replace($item['number'], '', $item['title']); ?>"
                                    ><?= $item['title']; ?></p>

                                    <div class="part-about-item__content">
                                        <div class="part-about-item__icon">
                                            <?= getNumberHelperIcon($item['type']); ?>
                                        </div>

                                        <p class="part-about-item__text"><?= $item['description']; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                }

                if (!empty($part_about__link)) {
                    ?>
                    <a data-aos="fade-up" class="button button--primary part-about__button" href="<?= $part_about__link['url']; ?>" <?php getLinkAttrs($part_about__link); ?>><?= $part_about__link['title']; ?></a>
                    <?php
                }
            ?>
        </div>
    </section>
    <?php
}
