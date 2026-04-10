<?php
$certificate = $args;
?>
<div class="preview-certificate">
    <div class="preview-certificate__top">
        <div class="preview-certificate__info-block <?php echo 'preview-certificate__info-block--' . (esc_attr($certificate['type']) ?: 'default');?>">
            <div class="preview-certificate__info-icon">
                <img src="<?php echo esc_url($certificate['icon']['url']);?>" width="16" height="16" alt="Certificate icon">
            </div>
            <div class="preview-certificate__info-standard">
                <?php echo esc_html($certificate['quality_standard']);?>
            </div>
            <div class="preview-certificate__info-year">
                <?php echo esc_html($certificate['year']);?>
            </div>
        </div>
        <h4 class="preview-certificate__title">
            <?php echo esc_html($certificate['title']);?>
        </h4>
    </div>

    <div class="preview-certificate__bottom">
        <div class="preview-certificate__date"><?php echo esc_html($certificate['date']);?></div>

        <div class="preview-certificate__view-btn js-open-popup" data-popup-img="<?php echo esc_url($certificate['certificate']['url']);?>">
            <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.6499 6.75182C18.6499 6.75182 15.7516 12.8535 9.6499 12.8535C3.54821 12.8535 0.649902 6.75182 0.649902 6.75182C0.649902 6.75182 3.54821 0.650126 9.6499 0.650126C15.7516 0.650126 18.6499 6.75182 18.6499 6.75182Z" stroke="#023D54" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.7008 6.75189C12.7008 5.06694 11.3349 3.70104 9.64997 3.70104C7.96502 3.70104 6.59912 5.06694 6.59912 6.75189C6.59912 8.43683 7.96502 9.80273 9.64997 9.80273C11.3349 9.80273 12.7008 8.43683 12.7008 6.75189Z" stroke="#023D54" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
</div>