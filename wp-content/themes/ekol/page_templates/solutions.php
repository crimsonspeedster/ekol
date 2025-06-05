<?php
/*
Template Name: Solutions page
*/

get_header();

$hero_repeater = [];

$solutions_posts = get_posts([
    'post_type'      => 'solutions',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'fields' => 'ids',
]);

if (!empty($solutions_posts)) {
    foreach ($solutions_posts as $post_id) {
        $hero__repeater = get_field('hero__repeater', $post_id);
        $image_id = get_post_thumbnail_id($post_id);

        if (!empty($hero__repeater)) {
            $image_id = $hero__repeater[0]['image_id'];
        }

        $hero_repeater[] = [
            'title' => get_the_title($post_id),
            'mini_title' => get_the_title($post_id),
            'description' => get_the_excerpt($post_id),
            'image_id' => $image_id,
            'is_link' => true,
            'link' => get_permalink($post_id),
        ];
    }
}
?>
<main>
    <?php
        get_template_part('partials/global/breadcrumbs');

        get_template_part('partials/part-hero', '', [
            'repeater' => $hero_repeater,
        ]);

        get_template_part('partials/part-solutions');

        get_template_part('partials/part-services');

        get_template_part('partials/global/part-form');
    ?>
</main>
<?php
get_footer();
