<?php
$form__condition = get_field('form__condition');
$_post_id = $form__condition ? get_the_ID() : 'option';

if (!$form__condition) {
    $form__condition = get_field('form__condition', 'option');
}

$form__pretitle = get_field('form__pretitle', $_post_id);
$form__title = get_field('form__title', $_post_id);
$form__description = get_field('form__description', $_post_id);
$form__shortcode = get_field('form__shortcode', $_post_id);
$form__repeater = get_field('form__repeater', $_post_id);

if ($form__condition) {
    ?>
    <section class="part-form" data-aos="fade-up" id="part-form">
        <div class="container">
            <div class="part-form__wrap">
                <div class="part-form__top">
                    <div class="pretitle part-form__pretitle"><?= $form__pretitle; ?></div>

                    <h2 class="part-form__title"><?= $form__title; ?></h2>

                    <?php
                        if ($form__description) {
                            ?>
                            <div class="part-form__description"><?= $form__description; ?></div>
                            <?php
                        }
                    ?>
                </div>

                <div class="part-form__row">
                    <div class="part-form__left">
                        <?= do_shortcode($form__shortcode); ?>
                    </div>

                    <?php
                        if (!empty($form__repeater)) {
                            ?>
                            <div class="part-form__right">
                                <div class="part-form-slider swiper">
                                    <div class="swiper-wrapper">
                                        <?php
                                            foreach ($form__repeater as $item) {
                                                ?>
                                                <div class="swiper-slide">
                                                    <div class="part-form__img">
                                                        <?= wp_get_attachment_image($item['image_id'], 'full'); ?>
                                                    </div>

                                                    <?php
                                                        if ($item['name'] || $item['position']) {
                                                            ?>
                                                            <div class="part-form-info">
                                                                <?php
                                                                    if ($item['name']) {
                                                                        ?>
                                                                        <h3 class="part-form-info__name"><?= $item['name']; ?></h3>
                                                                        <?php
                                                                    }

                                                                    if ($item['position']) {
                                                                        ?>
                                                                        <p class="part-form-info__position"><?= $item['position']; ?></p>
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
                                </div>

                                <div class="swiper-bottom-part part-form-slider__bottom">
                                    <div class="swiper-button-prev"></div>

                                    <div class="swiper-scrollbar part-form-slider__scrollbar"></div>

                                    <div class="swiper-button-next"></div>
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
}
