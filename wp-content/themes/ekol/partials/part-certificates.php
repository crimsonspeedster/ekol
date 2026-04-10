<?php
$badge = get_field('badge');
$section_title = get_field('section_title');
$section_subtitle = get_field('section_subtitle');
$certificates_list = get_field('certificates_list');
?>

<?php if (!empty($certificates_list)) :?>
<section class="certificates-part">
    <div class="container">

        <div class="certificates-part__top">
            <p class="pretitle certificates-part__pretitle aos-init aos-animate" data-aos="fade-up"><?php echo esc_html( $badge );?></p>
            <h2 class="certificates-part__title" data-aos="fade-up"><?php echo esc_html( $section_title );?></h2>
            <div class="content certificates-part__description" data-aos="fade-up">
                <?php echo apply_filters( 'the_content', $section_subtitle );?>
            </div>
        </div>

        <div class="certificates-part__slider swiper">
            <div class="swiper-wrapper">
                <?php
                    foreach ($certificates_list as $certificate) :
                        if ( !empty( $certificate ) ) :?>
                            <div class="swiper-slide certificates-part__slide">
                                <?php get_template_part( 'partials/previews/preview-certificate', null, $certificate );?>
                            </div>
                        <?php endif;
                    endforeach;
                ?>
            </div>

            <div class="certificates-part__pagination swiper-pagination"></div>
        </div>

        <div class="certificate-popup" id="certificatesCasePopup">
            <div class="certificate-popup__overlay js-close-popup"></div>
            <div class="certificate-popup__container">
                <button class="certificate-popup__close js-close-popup" aria-label="Close">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.781 13.7198C14.8507 13.7895 14.906 13.8722 14.9437 13.9632C14.9814 14.0543 15.0008 14.1519 15.0008 14.2504C15.0008 14.349 14.9814 14.4465 14.9437 14.5376C14.906 14.6286 14.8507 14.7114 14.781 14.781C14.7114 14.8507 14.6286 14.906 14.5376 14.9437C14.4465 14.9814 14.349 15.0008 14.2504 15.0008C14.1519 15.0008 14.0543 14.9814 13.9632 14.9437C13.8722 14.906 13.7895 14.8507 13.7198 14.781L7.50042 8.56073L1.28104 14.781C1.14031 14.9218 0.94944 15.0008 0.750417 15.0008C0.551394 15.0008 0.360523 14.9218 0.219792 14.781C0.0790615 14.6403 3.92322e-09 14.4494 0 14.2504C-3.92322e-09 14.0514 0.0790615 13.8605 0.219792 13.7198L6.4401 7.50042L0.219792 1.28104C0.0790615 1.14031 0 0.94944 0 0.750417C0 0.551394 0.0790615 0.360523 0.219792 0.219792C0.360523 0.0790615 0.551394 0 0.750417 0C0.94944 0 1.14031 0.0790615 1.28104 0.219792L7.50042 6.4401L13.7198 0.219792C13.8605 0.0790615 14.0514 -3.92322e-09 14.2504 0C14.4494 3.92322e-09 14.6403 0.0790615 14.781 0.219792C14.9218 0.360523 15.0008 0.551394 15.0008 0.750417C15.0008 0.94944 14.9218 1.14031 14.781 1.28104L8.56073 7.50042L14.781 13.7198Z" fill="#023D54"/>
                    </svg>
                </button>

                <div class="certificate-popup__content">
                    <img src="" alt="Certificate scan" class="js-popup-img">
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>