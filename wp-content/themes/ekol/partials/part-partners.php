<?php $partners_list = get_field('partners_list', 'option'); ?>

<?php if (!empty($partners_list)) :?>
    <section class="partners-part">
        <div class="container">
            <div class="partners-part__inner" data-aos="fade-up">
                <div class="partners-part__slider" id="partnersSlider">
                    <?php for ( $i = 0; $i < 2; $i++ ) : ?>
                        <?php foreach ($partners_list as $partner) : ?>
                            <?php if (!empty($partner['image'])) : ?>
                                <div class="partners-part__slide">
                                    <img src="<?php echo esc_url($partner['image']['url']);?>" height="74.5" alt="<?php echo esc_attr($partner['image']['alt']);?>">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>