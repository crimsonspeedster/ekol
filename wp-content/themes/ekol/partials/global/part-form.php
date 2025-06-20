<?php
$form__condition = get_field('form__condition', 'option');
$form__pretitle = get_field('form__pretitle', 'option');
$form__title = get_field('form__title', 'option');
$form__description = get_field('form__description', 'option');
$form__image_form = get_field('form__image_form', 'option');
$form__shortcode = get_field('form__shortcode', 'option');
$form__user_name = get_field('form__user_name', 'option');
$form__user_position = get_field('form__user_position', 'option');

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
                        <?= do_shortcode($form__shortcode); ?>
                    </div>

                    <?php
                        if ($form__image_form) {
                            ?>
                            <div class="part-form__right">
                                <div class="part-form__img">
                                    <?= wp_get_attachment_image($form__image_form, 'full'); ?>
                                </div>

                                <?php
                                    if ($form__user_position || $form__user_name) {
                                        ?>
                                        <div class="part-form-info">
                                            <?php
                                                if ($form__user_name) {
                                                    ?>
                                                    <h3 class="part-form-info__name"><?= $form__user_name; ?></h3>
                                                    <?php
                                                }

                                                if ($form__user_position) {
                                                    ?>
                                                    <p class="part-form-info__position"><?= $form__user_position; ?></p>
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
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
