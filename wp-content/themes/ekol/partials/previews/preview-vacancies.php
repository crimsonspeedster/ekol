<?php
$is_full_time = get_field('common__full_time');
$common__location = get_field('common__location');
$common__description_small = get_field('common__description_small');
$common__description_hidden = get_field('common__description_hidden');
$common__link = get_field('common__link');

$terms = get_the_terms(get_the_ID(), 'vacancies_cat');
?>

<div class="preview-vacancies preview-vacancies--<?= get_the_ID(); ?>">
    <div class="preview-vacancies__list">
        <p class="pretitle preview-vacancies-pretitle">
            <?=
                str_replace('%s1', '', pll__('опубліковано %s1'));
            ?>
        </p>

        <?php
            if ($is_full_time) {
                ?>
                <p class="pretitle preview-vacancies-pretitle"><?= pll__('повна зайнятість'); ?></p>
                <?php
            }
            else {
                ?>
                <p class="pretitle preview-vacancies-pretitle"><?= pll__('неповна зайнятість'); ?></p>
                <?php
            }

            if (is_array($terms) && !empty($terms)) {
                foreach ($terms as $term) {
                    ?>
                    <a href="<?= get_term_link($term); ?>" class="pretitle preview-vacancies-pretitle"><?= $term->name; ?></a>
                    <?php
                }
            }
        ?>
    </div>

    <div class="preview-vacancies__body">
        <h4 class="preview-vacancies__title"><?php the_title(); ?></h4>

        <?php
            if ($common__location) {
                ?>
                <h6 class="preview-vacancies__location"><?= $common__location; ?></h6>
                <?php
            }
        ?>

        <div class="content preview-vacancies__content preview-vacancies__content--mini"><?= $common__description_small; ?></div>

        <div class="content preview-vacancies__content preview-vacancies__content--hidden"><?= $common__description_hidden; ?></div>
    </div>

    <div class="preview-vacancies__buttons">
        <button class="button button--read preview-vacancies__button" data-text-more="<?= pll__('Читати більше'); ?>" data-text-less="<?= pll__('Читати менше'); ?>">
            <span><?= pll__('Читати більше'); ?></span>

            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.7504 18.5004L8.00042 18.5004C7.8015 18.5004 7.61074 18.4214 7.47009 18.2807C7.32943 18.1401 7.25042 17.9493 7.25042 17.7504C7.25042 17.5515 7.32943 17.3607 7.47009 17.2201C7.61074 17.0794 7.8015 17.0004 8.00042 17.0004H15.9401L5.21979 6.28104C5.07906 6.14031 5 5.94944 5 5.75042C5 5.55139 5.07906 5.36052 5.21979 5.21979C5.36052 5.07906 5.55139 5 5.75042 5C5.94944 5 6.14031 5.07906 6.28104 5.21979L17.0004 15.9401V8.00042C17.0004 7.80151 17.0794 7.61074 17.2201 7.47009C17.3607 7.32944 17.5515 7.25042 17.7504 7.25042C17.9493 7.25042 18.1401 7.32944 18.2807 7.47009C18.4214 7.61074 18.5004 7.80151 18.5004 8.00042L18.5004 17.7504C18.5004 17.9493 18.4214 18.1401 18.2807 18.2807C18.1401 18.4214 17.9493 18.5004 17.7504 18.5004Z" fill="#023D54"/>
            </svg>
        </button>

        <?php
            if (!empty($common__link)) {
                ?>
                <a href="<?= $common__link['url']; ?>" class="preview-vacancies__link" <?php getLinkAttrs($common__link); ?>>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.7504 6V15.75C18.7504 15.9489 18.6714 16.1397 18.5307 16.2803C18.3901 16.421 18.1993 16.5 18.0004 16.5C17.8015 16.5 17.6107 16.421 17.4701 16.2803C17.3294 16.1397 17.2504 15.9489 17.2504 15.75V7.81031L6.53104 18.5306C6.39031 18.6714 6.19944 18.7504 6.00042 18.7504C5.80139 18.7504 5.61052 18.6714 5.46979 18.5306C5.32906 18.3899 5.25 18.199 5.25 18C5.25 17.801 5.32906 17.6101 5.46979 17.4694L16.1901 6.75H8.25042C8.0515 6.75 7.86074 6.67098 7.72009 6.53033C7.57943 6.38968 7.50042 6.19891 7.50042 6C7.50042 5.80109 7.57943 5.61032 7.72009 5.46967C7.86074 5.32902 8.0515 5.25 8.25042 5.25H18.0004C18.1993 5.25 18.3901 5.32902 18.5307 5.46967C18.6714 5.61032 18.7504 5.80109 18.7504 6Z" fill="#023D54"/>
                    </svg>
                </a>
                <?php
            }
        ?>
    </div>
</div>