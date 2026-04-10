<?php
$badge = get_field('badge');
$section_title = get_field('section_title');
$section_subtitle = get_field('section_subtitle');
$faq_list = get_field('faq_list');

$faq_counter = 0;
?>

<section class="faq-part">
    <div class="container faq-part__container">

        <div class="faq-part__top">
            <p class="pretitle faq-part__pretitle aos-init aos-animate" data-aos="fade-up"><?php echo esc_html( $badge );?></p>
            <h2 class="faq-part__title" data-aos="fade-up"><?php echo esc_html( $section_title );?></h2>
            <div class="content faq-part__description" data-aos="fade-up">
                <?php echo apply_filters( 'the_content', $section_subtitle );?>
            </div>
        </div>

        <?php if ( $faq_list ) : ?>
            <div class="faq-part__wrapper" data-aos="fade-up">
                <?php foreach ( $faq_list as $faq ) : ?>
                    <div class="accordion">
                        <div class="accordion__header">
                            <div class="accordion__counter"><?php echo esc_html( ++$faq_counter );?></div>
                            <h4 class="accordion__title"><?php echo esc_html( $faq['question'] );?></h4>
                            <button class="accordion__button" aria-expanded="false">
                                <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.75 0.75L12 12.5625L22.375 0.75" stroke="#023D54" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                        <div class="accordion__content">
                            <div class="content"><?php echo apply_filters( 'the_content', $faq['answer'] );?></div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>

    </div>
</section>