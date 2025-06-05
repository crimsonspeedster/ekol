<?php
$is_preview = get_field('is_preview');
$block_contacts__repeater = get_field('block_contacts__repeater');
$block_contacts__lang = get_field('block_contacts__lang');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    if (function_exists('pll_current_language') && $block_contacts__lang && $block_contacts__lang !== pll_current_language())
        return;

    if (!empty($block_contacts__repeater)) {
        ?>
        <ul <?= get_block_wrapper_attributes(['class' => 'contacts']); ?>>
            <?php
                foreach ($block_contacts__repeater as $item) {
                    $title = '';
                    ?>
                    <li>
                        <?php
                            if ($item['is_link']) {
                                $title = $item['link']['title'];

                                echo '<a class="contacts-item" href="'.$item['link']['url'].'" '.getLinkAttrs($item['link']).'">';
                            }
                            else {
                                $title = $item['title'];

                                echo '<p class="contacts-item">';
                            }

                            if ($item['image_id']) {
                                ?>
                                <span class="contacts-item__image">
                                    <?php echo wp_get_attachment_image($item['image_id'], 'full'); ?>
                                </span>
                                <?php
                            }

                            echo '<span class="contacts-item__text">'.$title.'</span>';

                            if ($item['is_link']) {
                                echo '</a>';
                            }
                            else {
                                echo '</p>';
                            }
                        ?>
                    </li>
                    <?php
                }
            ?>
        </ul>
        <?php
    }
}
