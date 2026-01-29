<?php
$part_seo__description = get_field('part_seo__description');

if (!$part_seo__description) {
    return;
}
?>
<section class="part-seo">
    <div class="container">
        <div data-aos="fade-up" class="part-seo__description content"><?= $part_seo__description; ?></div>

        <button data-aos="fade-up" class="part-seo__button button button--primary"><?= pll__('Читати далі'); ?></button>
    </div>
</section>
