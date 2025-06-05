<?php
$is_preview = get_field('is_preview');
$pretitle__text = get_field('pretitle__text');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    ?>
    <p <?= get_block_wrapper_attributes(['class' => 'pretitle', 'data-aos' => 'fade-up']); ?>><?= $pretitle__text; ?></p>
    <?php
}
