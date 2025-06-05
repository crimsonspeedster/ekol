<?php
if (empty($args))
    return;

$hero__repeater = $args['repeater'];

if (!empty($hero__repeater)) {
    ?>
    <section class="hero-block">
        <div class="container">
            <div class="hero-block__wrapper">
                <div class="swiper hero-block-slider">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($hero__repeater as $index => $item) {
                                ?>
                                <div class="swiper-slide hero-block-slider__slide">
                                    <div class="hero-block-item">
                                        <div class="hero-block-item__info">
                                            <?php
                                                if ($index === 0) {
                                                    ?>
                                                    <h1 class="hero-block-item__title hero--animation"><?= $item['title']; ?></h1>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <h2 class="h1 hero-block-item__title hero--animation"><?= $item['title']; ?></h2>
                                                    <?php
                                                }

                                                if ($item['description']) {
                                                    ?>
                                                    <p class="hero-block-item__description hero--animation"><?= $item['description']; ?></p>
                                                    <?php
                                                }
                                            ?>
                                        </div>

                                        <?= wp_get_attachment_image($item['image_id'], 'full'); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="swiper hero-block-subslider">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($hero__repeater as $item) {
                            $data_link = '';
                            $mini_title = $item['mini_title'] ?: get_the_title();

                            if ($item['is_link'] && $item['link']) {
                                $data_link = 'data-link="'.$item['link'].'"';
                            }
                            ?>
                            <div class="swiper-slide hero-block-subslider__slide">
                                <div class="hero-block-subitem" <?= $data_link; ?>>
                                    <p class="hero-block-subitem__title">
                                        <span><?= $mini_title; ?></span>
                                    </p>

                                    <div class="hero-block-subitem-progress">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <?php
                    if (count($hero__repeater) > 1) {
                        ?>
                        <div class="hero-block-slider__navigation">
                            <div class="swiper-button-prev"></div>

                            <div class="swiper-button-next"></div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <?php
}
