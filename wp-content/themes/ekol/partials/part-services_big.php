<?php
$services_big__condition = get_field('services_big__condition');
$services_big__pretitle = get_field('services_big__pretitle');
$services_big__title = get_field('services_big__title');
$services_big__description = get_field('services_big__description');
$services_big__type = get_field('services_big__type');
$services_big__posts = [];

switch ($services_big__type) {
    case 'some_of_them':
        $services_big__posts = get_field('services_big__posts');

        if (!is_array($services_big__posts)) {
            $services_big__posts = [];
        }
        break;
    case 'number':
        $services_big__number = get_field('services_big__posts_number');

        $services_big__posts = get_posts([
            'post_type'      => 'services',
            'posts_per_page' => $services_big__number,
            'post_status'    => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        break;
    default:
        $services_big__number = -1;

        $services_big__posts = get_posts([
            'post_type'      => 'services',
            'posts_per_page' => $services_big__number,
            'post_status'    => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        break;
}

if ($services_big__condition) {
    ?>
    <section class="services_big-part">
        <div class="container">
            <p class="pretitle services_big-part__pretitle" data-aos="fade-up"><?= $services_big__pretitle; ?></p>

            <h2 class="services_big-part__title" data-aos="fade-up"><?= $services_big__title; ?></h2>

            <?php
                if ($services_big__description) {
                    ?>
                    <div class="content services_big-part__description" data-aos="fade-up"><?= $services_big__description; ?></div>
                    <?php
                }
            ?>

            <?php
                if (!empty($services_big__posts)) {
                    ?>
                    <div class="services_big-part__row" data-aos="fade-up">
                        <?php
                            foreach ($services_big__posts as $post) {
                                setup_postdata($post);

                                get_template_part('partials/previews/preview-services_big');
                            }

                            wp_reset_postdata();
                        ?>
                    </div>
                    <?php
                }
            ?>
        </div>
    </section>
    <?php
}