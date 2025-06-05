<?php
$form__condition = get_field('form__condition', 'option');
$form__pretitle = get_field('form__pretitle', 'option');
$form__title = get_field('form__title', 'option');
$form__description = get_field('form__description', 'option');
$form__image_form = get_field('form__image_form', 'option');

if ($form__condition) {
    ?>
    <section class="part-form" data-aos="fade-up" id="part-form">
        <div class="container">
            <div class="part-form__wrap">
                <div class="part-form__top">
                    <div class="pretitle part-form__pretitle"><?= $form__pretitle; ?></div>

                    <h2 class="part-form__title"><?= $form__title; ?></h2>

                    <?php
                        if ($form__description) {
                            ?>
                            <div class="part-form__description"><?= $form__description; ?></div>
                            <?php
                        }
                    ?>
                </div>

                <div class="part-form__row">
                    <div class="part-form__left">
                        <div class="hs-form-frame part-form__iframe" data-region="eu1" data-form-id="89ea1954-84e5-4498-949c-c07a3e819117" data-portal-id="145851954"></div>
                    </div>

                    <?php
                        if ($form__image_form) {
                            ?>
                            <div class="part-form__right">
                                <?= wp_get_attachment_image($form__image_form, 'full'); ?>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
