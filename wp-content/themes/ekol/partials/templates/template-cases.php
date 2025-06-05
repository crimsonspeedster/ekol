<?php
if (empty($args))
    return;

get_header();

$title = $args['title'];
$content = $args['content'];

$common__archive_cases_id = get_field('common__archive_cases', 'option');

$per_page = 10;
$s = isset($_GET['s']) ? trim($_GET['s']) : '';
$query_args = [
    'post_type'      => 'cases',
    'post_status'    => 'publish',
    'posts_per_page' => $per_page,
    'paged'          => 1,
];

if ($s) {
    $query_args['s'] = $s;
}

if (is_tax()) {
    $query_args['tax_query'][] = [
        'taxonomy' => get_queried_object()->taxonomy,
        'field'    => 'term_id',
        'terms'    => [get_queried_object()->term_id],
    ];
}

$posts_query = new WP_Query($query_args);

get_template_part('partials/global/breadcrumbs');
?>
<main>
    <section class="cases">
        <?php
            get_template_part('partials/global/car-animation', '', [
                'classes' => 'cases__car-animation cases__car-animation--pc',
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
                'mob_classes' => 'cases__car-animation cases__car-animation--mob',
            ]);
        ?>

        <div class="container">
            <?php
                get_template_part('partials/global/archive-top', '', [
                    'title' => $title,
                    'content' => $content,
                    'is_search_enabled' => false,
                    'post_type' => 'cases',
                    'terms' => get_terms([
                        'taxonomy' => 'cases_cat',
                    ]),
                    'main_term' => [
                        'id' => $common__archive_cases_id,
                        'title' => pll__('Всі статті'),
                        'link' => get_permalink($common__archive_cases_id),
                    ],
                ]);

                if ($posts_query->have_posts()) {
                    ?>
                    <div class="cases__row">
                        <?php
                            while ($posts_query->have_posts()) {
                                $posts_query->the_post();
                                setup_postdata($posts_query->post);

                                get_template_part('partials/previews/preview', $posts_query->post->post_type);
                            }

                            wp_reset_postdata();
                        ?>
                    </div>

                    <?php
                    get_template_part('partials/global/ajax-pagination', '', [
                        'post_type' => 'cases',
                        'per_page' => $per_page,
                        'posts_inner_el' => '.cases__row',
                        'term_id' => is_tax() ? get_queried_object_id() : '',
                        's' => isset($_GET['s']) ? trim($_GET['s']) : '',
                        'taxonomy' => 'cases_cat',
                        'button_class' => 'cases__button',
                        'max_num_pages' => $posts_query->max_num_pages,
                    ]);
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
