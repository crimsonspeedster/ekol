<?php
$is_preview = get_field('is_preview');

$block_about_service__pretitle = get_field('block_about_service__pretitle');
$block_about_service__description = get_field('block_about_service__description');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    ?>
    <div <?= get_block_wrapper_attributes(['class' => 'about-service']); ?>>
        <?php
            get_template_part('partials/global/car-animation', '', [
                'classes' => 'about-service__car-animation about-service__car-animation--pc',
                'svg_el' => '
                    <svg class="truckPathSvg" width="100%" height="66" viewBox="0 0 1440 66" fill="none">
                        <path class="basePath" d="M0 1H370.5C379.337 1 386.5 8.16344 386.5 17V39C386.5 47.8366 393.663 55 402.5 55H1110H1440" />
                        
                        <path class="progressPath" d="M0 1H370.5C379.337 1 386.5 8.16344 386.5 17V39C386.5 47.8366 393.663 55 402.5 55H1110H1440" />
                        
                        <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
                'mob_classes' => 'about-service__car-animation about-service__car-animation--mob',
                'mob_svg_el' => '
                    <svg class="truckPathSvg" width="100%" height="106" viewBox="0 0 360 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="basePath" d="M0 1H157.5C166.337 1 173.5 8.16344 173.5 17V89C173.5 97.8366 180.663 105 189.5 105H361" />
                        
                        <path class="progressPath" d="M0 1H157.5C166.337 1 173.5 8.16344 173.5 17V89C173.5 97.8366 180.663 105 189.5 105H361" />
                        
                        <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                    </svg>
                ',
            ]);
        ?>

        <p class="pretitle about-service__pretitle" data-aos="fade-up"><?= $block_about_service__pretitle; ?></p>

        <div class="about-service__description" data-aos="fade-up"><?= $block_about_service__description; ?></div>
    </div>
    <?php
}
