<?php
$is_preview = get_field('is_preview');

$block_advantages__image = get_field('block_advantages__image');
$block_advantages__pretitle = get_field('block_advantages__pretitle');
$block_advantages__title = get_field('block_advantages__title');
$block_advantages__description = get_field('block_advantages__description');
$block_advantages__repeater = get_field('block_advantages__repeater');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    ?>
    <div <?= get_block_wrapper_attributes(['class' => 'advantages']); ?>>
        <?php
            if ($block_advantages__image) {
                ?>
                <div class="advantages__image" data-aos="fade-up">
                    <?= wp_get_attachment_image($block_advantages__image, 'full'); ?>
                </div>
                <?php
            }
        ?>

        <div class="advantages__block">
            <div class="advantages__left">
                <p class="pretitle advantages__pretitle" data-aos="fade-up"><?= $block_advantages__pretitle; ?></p>

                <h2 class="advantages__title" data-aos="fade-up"><?= $block_advantages__title; ?></h2>

                <?php
                    if ($block_advantages__description) {
                        ?>
                        <div class="advantages__description" data-aos="fade-up"><?= $block_advantages__description; ?></div>
                        <?php
                    }
                ?>
            </div>

            <?php
                if (!empty($block_advantages__repeater)) {
                    ?>
                    <div class="advantages__row" data-aos="fade-up">
                        <?php
                            foreach ($block_advantages__repeater as $index => $item) {
                                ?>
                                <div class="advantages-item">
                                    <div class="advantages-item__header">
                                        <h4 class="advantages-item__title"><?= $item['title']; ?></h4>

                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M28.031 16.531L20.531 24.031C20.4614 24.1008 20.3787 24.1561 20.2876 24.1938C20.1966 24.2316 20.099 24.251 20.0004 24.251C19.9019 24.251 19.8043 24.2316 19.7132 24.1938C19.6222 24.1561 19.5394 24.1008 19.4698 24.031L11.9698 16.531C11.8291 16.3903 11.75 16.1994 11.75 16.0004C11.75 15.8014 11.8291 15.6105 11.9698 15.4698C12.1105 15.3291 12.3014 15.25 12.5004 15.25C12.6994 15.25 12.8903 15.3291 13.031 15.4698L20.0004 22.4401L26.9698 15.4698C27.0395 15.4001 27.1222 15.3448 27.2132 15.3071C27.3043 15.2694 27.4019 15.25 27.5004 15.25C27.599 15.25 27.6965 15.2694 27.7876 15.3071C27.8786 15.3448 27.9614 15.4001 28.031 15.4698C28.1007 15.5395 28.156 15.6222 28.1937 15.7132C28.2314 15.8043 28.2508 15.9019 28.2508 16.0004C28.2508 16.099 28.2314 16.1965 28.1937 16.2876C28.156 16.3786 28.1007 16.4614 28.031 16.531Z" fill="#023D54"/>
                                        </svg>
                                    </div>

                                    <div class="advantages-item__description">
                                        <p><?= $item['description']; ?></p>
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
    </div>
    <?php
}
