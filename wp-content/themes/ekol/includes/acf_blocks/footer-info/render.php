<?php
$is_preview = get_field('is_preview');
$footer_info__image = get_field('footer_info__image');
$footer_info__title = get_field('footer_info__title');
$footer_info__description = get_field('footer_info__description');
$footer_info__link = get_field('footer_info__link');
$footer_info__lang = get_field('footer_info__lang');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    if (function_exists('pll_current_language') && $footer_info__lang && $footer_info__lang !== pll_current_language())
        return;

    ?>
    <div <?= get_block_wrapper_attributes(['class' => 'footer-info']); ?>>
        <a class="footer-info__logo" href="<?= get_home_url(); ?>">
            <?php echo wp_get_attachment_image($footer_info__image, 'full'); ?>
        </a>

        <?php
            if ($footer_info__title) {
                ?>
                <p class="h4 footer-info__title"><?= $footer_info__title; ?></p>
                <?php
            }
            
            if ($footer_info__description) {
                ?>
                <div class="content footer-info__description"><?= $footer_info__description; ?></div>
                <?php
            }
            
            if (!empty($footer_info__link)) {
                ?>
                <a class="button button--primary footer-info__button" href="<?= $footer_info__link['url']; ?>" <?php getLinkAttrs($footer_info__link); ?>><?= $footer_info__link['title']; ?></a>
                <?php
            }
        ?>
    </div>
    <?php
}
