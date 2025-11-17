<?php
$part_seo__description = get_field('part_seo__description');

if (!$part_seo__description) {
    return;
}
?>
<section class="part-seo">
    <div class="container">
        <div class="part-seo__description content"><?= $part_seo__description; ?></div>
    </div>
</section>
