<?php
if (empty($args) || $args['max_num_pages'] <= 1) {
    return;
}

$button_class = $args['button_class'];
$post_type = $args['post_type'];
$per_page = $args['per_page'];
$posts_inner_el = $args['posts_inner_el'];
$term_id = $args['term_id'];
$taxonomy = $args['taxonomy'];
$s = $args['s'];
$current = max(1, get_query_var('paged'));
?>

<button data-aos="fade-up" class="button button--primary button--more <?= $button_class; ?>" data-post_type="<?= $post_type; ?>" data-current="<?= $current; ?>" data-per_page="<?= $per_page; ?>" data-s="<?= $s; ?>" data-term_id="<?= $term_id; ?>" data-posts_inner_el="<?= $posts_inner_el; ?>" data-taxonomy="<?= $taxonomy; ?>">
    <?= pll__('Завантажити ще'); ?>

    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.2504 18.5004L8.50042 18.5004C8.3015 18.5004 8.11074 18.4214 7.97009 18.2807C7.82943 18.1401 7.75042 17.9493 7.75042 17.7504C7.75042 17.5515 7.82943 17.3607 7.97009 17.2201C8.11074 17.0794 8.3015 17.0004 8.50042 17.0004H16.4401L5.71979 6.28104C5.57906 6.14031 5.5 5.94944 5.5 5.75042C5.5 5.55139 5.57906 5.36052 5.71979 5.21979C5.86052 5.07906 6.05139 5 6.25042 5C6.44944 5 6.64031 5.07906 6.78104 5.21979L17.5004 15.9401V8.00042C17.5004 7.80151 17.5794 7.61074 17.7201 7.47009C17.8607 7.32944 18.0515 7.25042 18.2504 7.25042C18.4493 7.25042 18.6401 7.32944 18.7807 7.47009C18.9214 7.61074 19.0004 7.80151 19.0004 8.00042L19.0004 17.7504C19.0004 17.9493 18.9214 18.1401 18.7807 18.2807C18.6401 18.4214 18.4493 18.5004 18.2504 18.5004Z" fill="white"/>
    </svg>
</button>