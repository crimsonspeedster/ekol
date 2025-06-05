<?php

add_action('wp_ajax_load_more_posts', 'loadMorePosts');
add_action('wp_ajax_nopriv_load_more_posts', 'loadMorePosts');
function loadMorePosts () {
    $nonce = isset($_GET['nonce']) ? trim($_GET['nonce']) : '';
    $post_type = isset($_GET['post_type']) ? trim($_GET['post_type']) : '';
    $current = isset($_GET['current']) ? intval(trim($_GET['current'])) : 1;
    $per_page = isset($_GET['per_page']) ? intval(trim($_GET['per_page'])) : get_option('posts_per_page');
    $term_id = isset($_GET['term_id']) ? intval(trim($_GET['term_id'])) : '';
    $taxonomy = isset($_GET['taxonomy']) ? trim($_GET['taxonomy']) : '';
    $s = isset($_GET['s']) ? trim($_GET['s']) : '';

    if (!wp_verify_nonce($nonce, 'wp_front_rest')) {
        wp_send_json_error([
            'message' => 'Bad nonce',
        ]);
    }

    if (!$post_type) {
        wp_send_json_error([
            'message' => 'Bad post type',
        ]);
    }

    if (!$current) {
        wp_send_json_error([
            'message' => 'Bad current page number',
        ]);
    }

    $query_args = [
        'post_type'      => $post_type,
        'post_status'    => 'publish',
        'posts_per_page' => $per_page,
        'paged'          => $current+1,
    ];

    if ($s) {
        $query_args['s'] = $s;
    }

    if ($taxonomy && $term_id && $term_id !== 0) {
        $query_args['tax_query'][] = [
            'taxonomy' => $taxonomy,
            'field'    => 'term_id',
            'terms'    => [$term_id],
        ];
    }

    $posts_html = '';
    $posts_query = new WP_Query($query_args);

    ob_start();
    while ( $posts_query->have_posts() ) {
        $posts_query->the_post();
        setup_postdata($posts_query->post);

        get_template_part('partials/previews/preview', $post_type);
    }
    wp_reset_postdata();
    $posts_html = ob_get_clean();

    wp_send_json_success([
        'args' => $query_args,
        'posts' => $posts_query->posts,
        'posts_html' => $posts_html,
        'total_pages' => $posts_query->max_num_pages,
    ]);
}