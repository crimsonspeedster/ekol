<?php
$categories = get_the_category();
$time_to_read = get_reading_time();
?>

<div class="preview-post">
    <a href="<?php the_permalink(); ?>" class="preview-post__img">
        <?php getPostThumbnail(get_the_ID()); ?>
    </a>

    <?php
        if ($time_to_read > 0 || !empty($categories)) {
            ?>
            <div class="tags preview-post__tags">
                <?php
                    if ($time_to_read > 0) {
                        ?>
                        <p class="tags-item">
                            <?=
                                str_replace('%s1', $time_to_read, pll__('%s1 хв читання'));
                            ?>
                        </p>
                        <?php
                    }

                    if (!empty($categories)) {
                        foreach ($categories as $term) {
                            ?>
                            <a href="<?= get_category_link($term); ?>" class="tags-item"><?= $term->name; ?></a>
                            <?php
                        }
                    }
                ?>
            </div>
            <?php
        }
    ?>

    <div class="preview-post__body">
        <a href="<?php the_permalink(); ?>" class="h5 preview-post__title"><?php the_title(); ?></a>

        <?php
            if (has_excerpt()) {
                ?>
                <div class="content preview-post__content"><?php the_excerpt(); ?></div>
                <?php
            }
        ?>

        <a class="button button--read preview-post__button" href="<?php the_permalink(); ?>">
            <span><?= pll__('Читати більше'); ?></span>

            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.7504 6V15.75C18.7504 15.9489 18.6714 16.1397 18.5307 16.2803C18.3901 16.421 18.1993 16.5 18.0004 16.5C17.8015 16.5 17.6107 16.421 17.4701 16.2803C17.3294 16.1397 17.2504 15.9489 17.2504 15.75V7.81031L6.53104 18.5306C6.39031 18.6714 6.19944 18.7504 6.00042 18.7504C5.80139 18.7504 5.61052 18.6714 5.46979 18.5306C5.32906 18.3899 5.25 18.199 5.25 18C5.25 17.801 5.32906 17.6101 5.46979 17.4694L16.1901 6.75H8.25042C8.0515 6.75 7.86074 6.67098 7.72009 6.53033C7.57943 6.38968 7.50042 6.19891 7.50042 6C7.50042 5.80109 7.57943 5.61032 7.72009 5.46967C7.86074 5.32902 8.0515 5.25 8.25042 5.25H18.0004C18.1993 5.25 18.3901 5.32902 18.5307 5.46967C18.6714 5.61032 18.7504 5.80109 18.7504 6Z" fill="#023D54"/>
            </svg>
        </a>
    </div>
</div>