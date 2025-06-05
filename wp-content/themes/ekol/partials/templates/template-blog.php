<?php
if (empty($args))
    return;

get_header();

global $wp_query;

$page_for_posts_id = get_option( 'page_for_posts' );
$title = $args['title'];
$content = $args['content'];

get_template_part('partials/global/breadcrumbs');
?>
    <main>
        <section class="blog-section">
            <?php
                get_template_part('partials/global/car-animation', '', [
                    'classes' => 'blog-section-top__car-animation blog-section-top__car-animation--pc',
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
                    'mob_classes' => 'blog-section-top__car-animation blog-section-top__car-animation--mob',
                ]);

                get_template_part('partials/global/car-animation', '', [
                    'classes' => 'blog-section-bottom__car-animation blog-section-bottom__car-animation--pc',
                    'svg_el' => '
                        <svg class="truckPathSvg" width="100%" height="84" viewBox="0 0 1440 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="basePath" d="M0 1H528C536.837 1 544 8.16344 544 17V66.561C544 75.3975 551.163 82.561 560 82.561H973.5H1310.5C1319.34 82.561 1326.5 75.3975 1326.5 66.561V17C1326.5 8.16343 1333.66 1 1342.5 1H1439" />
                            
                            <path class="progressPath" d="M0 1H528C536.837 1 544 8.16344 544 17V66.561C544 75.3975 551.163 82.561 560 82.561H973.5H1310.5C1319.34 82.561 1326.5 75.3975 1326.5 66.561V17C1326.5 8.16343 1333.66 1 1342.5 1H1439" />
                            
                            <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                        </svg>
                    ',
                    'is_reversed' => true,
                    'mob_svg_el' => '
                        <svg class="truckPathSvg" width="100%" height="86" viewBox="0 0 360 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="basePath" d="M0 1H157.5C166.337 1 173.5 8.16344 173.5 17V69C173.5 77.8366 180.663 85 189.5 85H361" />
                            
                            <path class="progressPath" d="M0 1H157.5C166.337 1 173.5 8.16344 173.5 17V69C173.5 77.8366 180.663 85 189.5 85H361" />
                            
                            <image class="truck" href="'.get_template_directory_uri().'/dist/img/truck.png" width="60" height="23" />
                        </svg>
                    ',
                    'mob_classes' => 'blog-section-bottom__car-animation blog-section-bottom__car-animation--mob',
                ]);
            ?>

            <div class="container">
                <?php
                    get_template_part('partials/global/archive-top', '', [
                        'title' => $title,
                        'content' => $content,
                        'is_search_enabled' => true,
                        'post_type' => 'post',
                        'terms' => get_terms([
                            'taxonomy' => 'category',
                        ]),
                        'main_term' => [
                            'id' => $page_for_posts_id,
                            'title' => pll__('Всі статті'),
                            'link' => get_permalink($page_for_posts_id),
                        ],
                    ]);

                    if (have_posts()) {
                        ?>
                        <div class="blog-section__row">
                            <?php
                                while (have_posts()) {
                                    the_post();
                                    get_template_part('partials/previews/preview', 'post');
                                }
                            ?>
                        </div>

                        <?php
                        get_template_part('partials/global/ajax-pagination', '', [
                            'post_type' => 'post',
                            'per_page' => get_option('posts_per_page'),
                            'posts_inner_el' => '.blog-section__row',
                            'term_id' => is_category() ? get_queried_object_id() : '',
                            's' => isset($_GET['s']) ? trim($_GET['s']) : '',
                            'taxonomy' => 'category',
                            'button_class' => 'blog-section__button',
                            'max_num_pages' => $wp_query->max_num_pages,
                        ]);
                    }
                    else {
                        ?>
                        <p class="blog-section__noting"><?= pll__('Постів не знайдено'); ?></p>
                        <?php
                    }
                ?>
            </div>
        </section>

        <?php
            get_template_part('partials/global/part-form');
        ?>
    </main>
<?php
get_footer();