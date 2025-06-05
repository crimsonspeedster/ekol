<?php
$is_preview = get_field('is_preview');
$socials__repeater = get_field('socials__repeater');
$socials__lang = get_field('socials__lang');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    if (function_exists('pll_current_language') && $socials__lang && $socials__lang !== pll_current_language())
        return;

    if (!empty($socials__repeater)) {
        ?>
        <ul <?= get_block_wrapper_attributes(['class' => 'socials']); ?>>
            <?php
                foreach ($socials__repeater as $item) {
                    ?>
                    <li class="socials-item <?= $item['is_wide'] ? 'socials-item--wide' : ''; ?>">
                        <a href="<?= $item['link']['url']; ?>" <?php getLinkAttrs($item['link']); ?>>
                            <span class="socials-item__image">
                                <?php echo wp_get_attachment_image($item['image'], 'full'); ?>
                            </span>

                            <?php
                                if ($item['is_wide'])  {
                                    ?>
                                    <span class="socials-item__text"><?= $item['link']['title']; ?></span>
                                    <?php
                                }
                            ?>
                        </a>
                    </li>
                    <?php
                }
            ?>
        </ul>
        <?php
    }
}
