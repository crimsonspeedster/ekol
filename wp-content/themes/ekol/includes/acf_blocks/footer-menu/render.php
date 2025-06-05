<?php
$is_preview = get_field('is_preview');
$block_footer_menu__title = get_field('block_footer_menu__title');
$block_footer_menu__menu = get_field('block_footer_menu__menu');
$block_footer_menu__lang = get_field('block_footer_menu__lang');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    if (function_exists('pll_current_language') && $block_footer_menu__lang && $block_footer_menu__lang !== pll_current_language())
        return;

    if ($block_footer_menu__menu) {
        ?>
        <div <?= get_block_wrapper_attributes(['class' => 'footer-menu']); ?>>
            <p class="footer-menu__title"><?= $block_footer_menu__title; ?></p>

            <?php
                wp_nav_menu([
                    'menu' => $block_footer_menu__menu,
                    'menu_class' => 'footer-menu__list',
                    'container' => '',
                    'depth' => 1,
                ]);
            ?>
        </div>
        <?php
    }
}
