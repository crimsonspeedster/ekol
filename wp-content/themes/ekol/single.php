<?php
get_header();

$categories = get_the_category();
$time_to_read = get_reading_time();

$common__before_image = get_field('common__before_image');
$page_for_posts_id = get_option( 'page_for_posts' );

get_template_part('partials/global/breadcrumbs');
?>
    <main>
        <section class="post-section">
            <?php
                get_template_part('partials/global/car-animation', '', [
                    'classes' => 'post-section__car-animation post-section__car-animation--pc',
                    'svg_el' => '
                        <svg class="truckPathSvg" width="100%" height="23" viewBox="0 0 1440 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="basePath" d="M0 12L137.235 12L527.433 12L733.383 12L1440 12" />
                            
                            <path class="progressPath" d="M0 12L137.235 12L527.433 12L733.383 12L1440 12" />
                            
                            <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                        </svg>
                    ',
                    'mob_svg_el' => '
                        <svg class="truckPathSvg" width="100%" height="16" viewBox="0 0 360 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="basePath" d="M-1 8H172.5C172.5 8 172.5 8.00002 172.5 8.00005V8.00005C172.5 8.00008 172.5 8.0001 172.5 8.0001H360" />
                            
                            <path class="progressPath" d="M-1 8H172.5C172.5 8 172.5 8.00002 172.5 8.00005V8.00005C172.5 8.00008 172.5 8.0001 172.5 8.0001H360" />
                            
                            <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                        </svg>
                    ',
                    'mob_classes' => 'post-section__car-animation post-section__car-animation--mob',
                ]);
            ?>

            <div class="container">
                <div class="post-section__top">
                    <div class="post-section__left">
                        <h1 class="post-section__title"><?php the_title(); ?></h1>

                        <?php
                            if ($common__before_image) {
                                ?>
                                <p class="post-section__pretext"><?= $common__before_image; ?></p>
                                <?php
                            }
                        ?>
                    </div>

                    <div class="post-section__right">
                        <?php
                            if (!empty($categories) || $time_to_read > 0) {
                                ?>
                                <div class="tags post-section__tags">
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

                        <div class="post-section-social">
                            <p class="post-section-social__title"><?= pll__('Поділитись:'); ?></p>

                            <div class="post-section-social__row">
                                <a class="post-section-social-item" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()); ?>" target="_blank" rel="nofollow noopener noindex">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.5 3.50245C17.5 3.36984 17.4473 3.24266 17.3536 3.1489C17.2598 3.05513 17.1326 3.00245 17 3.00245H14.5C13.2411 2.93974 12.0086 3.37784 11.0717 4.22103C10.1348 5.06422 9.56978 6.24394 9.5 7.50245V10.2024H7C6.86739 10.2024 6.74021 10.2551 6.64645 10.3489C6.55268 10.4427 6.5 10.5698 6.5 10.7024V13.3024C6.5 13.4351 6.55268 13.5622 6.64645 13.656C6.74021 13.7498 6.86739 13.8024 7 13.8024H9.5V20.5024C9.5 20.6351 9.55268 20.7622 9.64645 20.856C9.74021 20.9498 9.86739 21.0024 10 21.0024H13C13.1326 21.0024 13.2598 20.9498 13.3536 20.856C13.4473 20.7622 13.5 20.6351 13.5 20.5024V13.8024H16.12C16.2312 13.804 16.3397 13.7685 16.4285 13.7015C16.5172 13.6345 16.5811 13.5398 16.61 13.4324L17.33 10.8324C17.3499 10.7586 17.3526 10.6811 17.3378 10.606C17.3231 10.531 17.2913 10.4603 17.2449 10.3994C17.1985 10.3386 17.1388 10.2892 17.0704 10.255C17.0019 10.2209 16.9265 10.2029 16.85 10.2024H13.5V7.50245C13.5249 7.25493 13.6411 7.02556 13.826 6.85914C14.0109 6.69272 14.2512 6.6012 14.5 6.60245H17C17.1326 6.60245 17.2598 6.54977 17.3536 6.456C17.4473 6.36223 17.5 6.23506 17.5 6.10245V3.50245Z" fill="#023D54"/>
                                    </svg>
                                </a>

                                <a class="post-section-social-item" href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(get_permalink()); ?>" target="_blank" rel="nofollow noopener noindex">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.46875 4.99999C6.46849 5.53043 6.25752 6.03903 5.88226 6.41391C5.507 6.7888 4.99818 6.99926 4.46775 6.99899C3.93732 6.99873 3.42871 6.78776 3.05383 6.4125C2.67894 6.03724 2.46849 5.52843 2.46875 4.99799C2.46902 4.46756 2.67998 3.95896 3.05524 3.58407C3.4305 3.20919 3.93932 2.99873 4.46975 2.99899C5.00018 2.99926 5.50879 3.21023 5.88367 3.58549C6.25856 3.96075 6.46902 4.46956 6.46875 4.99999ZM6.52875 8.47999H2.52875V21H6.52875V8.47999ZM12.8488 8.47999H8.86875V21H12.8088V14.43C12.8088 10.77 17.5788 10.43 17.5788 14.43V21H21.5288V13.07C21.5288 6.89999 14.4688 7.12999 12.8088 10.16L12.8488 8.47999Z" fill="#023D54"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="post-section__image">
                    <?php getPostThumbnail(get_the_ID()); ?>
                </div>

                <div class="content post-section__content"><?php the_content(); ?></div>
            </div>
        </section>

        <?php
            get_template_part('partials/part-more', '', [
                'title' => pll__('Схожі статті'),
                'description' => '',
                'tag' => pll__('читайте ще'),
                'button' => [
                    'title' => pll__('Переглянути всі статті'),
                    'link' => get_permalink($page_for_posts_id),
                ],
                'posts' => get_posts([
                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'posts_per_page' => 6,
                    'post__not_in'   => [get_the_ID()],
                ]),
                'post_type' => 'post',
            ]);

            get_template_part('partials/global/part-form');
        ?>
    </main>
<?php
get_footer();