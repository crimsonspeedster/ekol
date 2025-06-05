<?php
if (empty($args))
    return;

get_header();

$title = $args['title'];
$content = $args['content'];

$common__archive_vacancies_obj = get_field('common__archive_vacancies', 'option');
$common__archive_vacancies_id = $common__archive_vacancies_obj ? $common__archive_vacancies_obj->ID : 0;

$internship__condition = get_field('internship__condition', $common__archive_vacancies_id);
$internship__pretitle = get_field('internship__pretitle', $common__archive_vacancies_id);
$internship__title = get_field('internship__title', $common__archive_vacancies_id);
$internship__description = get_field('internship__description', $common__archive_vacancies_id);
$internship__link = get_field('internship__link', $common__archive_vacancies_id);
$internship__image_left = get_field('internship__image_left', $common__archive_vacancies_id);
$internship__image_right = get_field('internship__image_right', $common__archive_vacancies_id);
$internship__background = get_field('internship__background', $common__archive_vacancies_id);

$about__condition = get_field('about__condition', $common__archive_vacancies_id);
$about__pretitle = get_field('about__pretitle', $common__archive_vacancies_id);
$about__title = get_field('about__title', $common__archive_vacancies_id);
$about__description = get_field('about__description', $common__archive_vacancies_id);
$about__link = get_field('about__link', $common__archive_vacancies_id);
$about__image = get_field('about__image', $common__archive_vacancies_id);
$about__repeater = get_field('about__repeater', $common__archive_vacancies_id);

$per_page = 5;
$s = isset($_GET['s']) ? trim($_GET['s']) : '';
$query_args = [
    'post_type'      => 'vacancies',
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
        <section class="vacancies">
            <?php
                get_template_part('partials/global/car-animation', '', [
                    'classes' => 'vacancies__car-animation vacancies__car-animation--pc',
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
                    'mob_classes' => 'vacancies__car-animation vacancies__car-animation--mob',
                ]);
            ?>

            <div class="container">
                <?php
                    get_template_part('partials/global/archive-top', '', [
                        'title' => $title,
                        'content' => $content,
                        'is_search_enabled' => true,
                        'post_type' => 'vacancies',
                        'terms' => get_terms([
                            'taxonomy' => 'vacancies_cat',
                        ]),
                        'main_term' => [
                            'id' => $common__archive_vacancies_id,
                            'title' => pll__('Всі'),
                            'link' => get_permalink($common__archive_vacancies_id),
                        ],
                    ]);

                    if ($posts_query->have_posts()) {
                        ?>
                        <div class="vacancies__row">
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
                            'post_type' => 'vacancies',
                            'per_page' => $per_page,
                            'posts_inner_el' => '.vacancies__row',
                            'term_id' => is_category() ? get_queried_object_id() : '',
                            's' => isset($_GET['s']) ? trim($_GET['s']) : '',
                            'taxonomy' => 'vacancies_cat',
                            'button_class' => 'vacancies__button',
                            'max_num_pages' => $posts_query->max_num_pages,
                        ]);
                    }
                ?>
            </div>
        </section>

        <?php
            if ($internship__condition) {
                ?>
                <section class="internship background-block">
                    <div class="background-block__image">
                        <?= wp_get_attachment_image($internship__background, 'full'); ?>
                    </div>

                    <div class="container background-block__container">
                        <div class="internship-image internship-image--left" data-aos="fade-up">
                            <?= wp_get_attachment_image($internship__image_left, 'full'); ?>
                        </div>

                        <div class="internship-middle">
                            <p class="pretitle internship__pretitle" data-aos="fade-up"><?= $internship__pretitle; ?></p>

                            <h2 class="internship__title" data-aos="fade-up"><?= $internship__title; ?></h2>

                            <div class="content internship__description" data-aos="fade-up"><?= $internship__description; ?></div>

                            <?php
                                if (!empty($internship__link)) {
                                    ?>
                                    <a href="<?= $internship__link['url']; ?>" data-aos="fade-up" class="button button--primary internship__button" <?php getLinkAttrs($internship__link); ?>><?= $internship__link['title']; ?></a>
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="internship-image internship-image--right" data-aos="fade-up">
                            <?= wp_get_attachment_image($internship__image_right, 'full'); ?>
                        </div>
                    </div>
                </section>
                <?php
            }

            if ($about__condition) {
                ?>
                <section class="corporate">
                    <div class="container corporate__wrapper">
                        <div class="corporate__left">
                            <p class="pretitle corporate__pretitle" data-aos="fade-up"><?= $about__pretitle; ?></p>

                            <h2 class="corporate__title" data-aos="fade-up"><?= $about__title; ?></h2>

                            <div class="content corporate__description" data-aos="fade-up"><?= $about__description; ?></div>

                            <div class="corporate__image" data-aos="fade-up">
                                <?= wp_get_attachment_image($about__image, 'full'); ?>
                            </div>

                            <?php
                                if (!empty($about__link)) {
                                    ?>
                                    <a data-aos="fade-up" href="<?= $about__link['url']; ?>" class="button button--primary corporate__button" <?php getLinkAttrs($about__link); ?>><?= $about__link['title']; ?></a>
                                    <?php
                                }

                                if (!empty($about__repeater)) {
                                    ?>
                                    <div class="corporate-bottom" data-aos="fade-up">
                                        <?php
                                            foreach ($about__repeater as $item) {
                                                ?>
                                                <div class="corporate-bottom-item">
                                                    <div class="corporate-bottom-item__content">
                                                        <p
                                                            class="h1 corporate-bottom-item__number"
                                                            data-number="<?= $item['number']; ?>"
                                                            data-symbol="<?= str_replace($item['number'], '', $item['title']); ?>"
                                                        ><?= $item['title']; ?></p>

                                                        <?php
                                                            echo getNumberHelperIcon($item['type']);
                                                        ?>
                                                    </div>

                                                    <p class="corporate-bottom-item__text"><?= $item['description']; ?></p>
                                                </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="corporate__right" data-aos="fade-up">
                            <?= wp_get_attachment_image($about__image, 'full'); ?>
                        </div>
                    </div>
                </section>
                <?php
            }

            get_template_part('partials/part-vacancies');

            get_template_part('partials/global/part-form');
        ?>
    </main>
<?php
get_footer();
