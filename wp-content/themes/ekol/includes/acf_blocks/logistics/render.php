<?php
$is_preview = get_field('is_preview');

$block_logistics__pretitle = get_field('block_logistics__pretitle');
$block_logistics__title = get_field('block_logistics__title');
$block_logistics__description = get_field('block_logistics__description');
$block_logistics__repeater = get_field('block_logistics__repeater');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    ?>
    <div <?= get_block_wrapper_attributes(['class' => 'logistics']); ?>>
        <div class="logistics__top">
            <p class="pretitle logistics__pretitle" data-aos="fade-up"><?= $block_logistics__pretitle; ?></p>

            <h2 class="logistics__title" data-aos="fade-up"><?= $block_logistics__title; ?></h2>

            <?php
                if ($block_logistics__description) {
                    ?>
                    <div class="logistics__description" data-aos="fade-up"><?= $block_logistics__description; ?></div>
                    <?php
                }
            ?>
        </div>

        <?php
            if (!empty($block_logistics__repeater)) {
                ?>
                <div class="logistics__row" data-aos="fade-up">
                    <?php
                        foreach ($block_logistics__repeater as $item) {
                            ?>
                            <div class="logistics-item">
                                <div class="logistics-item__img">
                                    <?= wp_get_attachment_image($item['image_id'], 'full'); ?> ?>
                                </div>

                                <div class="logistics-item__block">
                                    <p class="h4 logistics-item__title"><?= $item['title']; ?></p>

                                    <div class="logistics-item__description">
                                        <p><?= $item['description']; ?></p>
                                    </div>
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
    <?php
}