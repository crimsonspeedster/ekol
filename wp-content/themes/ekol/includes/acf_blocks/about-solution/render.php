<?php
$is_preview = get_field('is_preview');

$about_solution__pretitle = get_field('about_solution__pretitle');
$about_solution__title = get_field('about_solution__title');
$about_solution__description = get_field('about_solution__description');
$about_solution__link = get_field('about_solution__link');
$about_solution__image = get_field('about_solution__image');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    ?>
    <div <?= get_block_wrapper_attributes(['class' => 'about-solution']); ?>>
        <div class="about-solution__left">
            <p class="pretitle about-solution__pretitle" data-aos="fade-up"><?= $about_solution__pretitle; ?></p>

            <h2 class="about-solution__title" data-aos="fade-up"><?= $about_solution__title; ?></h2>

            <div class="about-solution__description" data-aos="fade-up"><?= $about_solution__description; ?></div>

            <?php
                if (!empty($about_solution__link)) {
                    ?>
                    <a href="<?= $about_solution__link['url']; ?>" class="button button--primary about-solution__button" <?php getLinkAttrs($about_solution__link); ?>><?= $about_solution__link['title']; ?></a>
                    <?php
                }
            ?>
        </div>

        <div class="about-solution__right">
            <div class="about-solution__img">
                <?= wp_get_attachment_image($about_solution__image, 'full'); ?>
            </div>

            <?php
                if (!empty($about_solution__link)) {
                    ?>
                    <a href="<?= $about_solution__link['url']; ?>" class="button button--primary about-solution__button" <?php getLinkAttrs($about_solution__link); ?>><?= $about_solution__link['title']; ?></a>
                    <?php
                }
            ?>
        </div>
    </div>
    <?php
}
