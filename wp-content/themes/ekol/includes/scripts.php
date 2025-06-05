<?php

add_action( 'wp_enqueue_scripts', function () {
    $ver = 1;

    wp_enqueue_style( 'font-calibri', get_template_directory_uri() . '/dist/font/calibri/stylesheet.css', [], $ver );
    wp_enqueue_style( 'font-futura_pt', get_template_directory_uri() . '/dist/font/futura-pt/style.css', [], $ver );
    wp_enqueue_style( 'font-tektur', get_template_directory_uri() . '/dist/font/tektur/stylesheet.css', [], $ver );

    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/dist/css/style.css', [], $ver );

    wp_enqueue_script('theme-script', get_template_directory_uri() . '/dist/js/script.js', [], $ver,  true);
    wp_localize_script('theme-script', 'api_settings', array(
        'root' => esc_url_raw(rest_url()),
        'nonce' => wp_create_nonce('wp_front_rest'),
        'ajax_url' => admin_url('admin-ajax.php'),
    ));

    $template_slug = pathinfo(get_page_template_slug(), PATHINFO_FILENAME);

    if ($template_slug) {
        $template_style_path = get_template_directory() . "/dist/css/page_templates/{$template_slug}.css";
        $template_style_uri  = get_template_directory_uri() . "/dist/css/page_templates/{$template_slug}.css";

        if (file_exists($template_style_path)) {
            wp_enqueue_style( "template-style", $template_style_uri, [], $ver );
        }

        $template_script_path = get_template_directory() . "/dist/js/page_templates/{$template_slug}.js";
        $template_script_uri  = get_template_directory_uri() . "/dist/js/page_templates/{$template_slug}.js";

        if (file_exists($template_script_path)) {
            wp_enqueue_script('template-script', $template_script_uri, [], $ver,  true);
        }
    }
    elseif ((is_home() && ! is_front_page()) || is_category()) {
        wp_enqueue_style( "template-style", get_template_directory_uri() . '/dist/css/page_templates/blog.css', [], $ver );
    }
    elseif (is_tax()) {
        $taxonomy = get_taxonomy(get_queried_object()->taxonomy);
        $template_slug = $taxonomy->object_type[0];

        $template_style_path = get_template_directory() . "/dist/css/page_templates/{$template_slug}.css";
        $template_style_uri  = get_template_directory_uri() . "/dist/css/page_templates/{$template_slug}.css";

        if (file_exists($template_style_path)) {
            wp_enqueue_style( "template-style", $template_style_uri, [], $ver );
        }
    }
    elseif (is_singular()) {
        $post_type = get_post_type();

        $template_style_path = get_template_directory() . "/dist/css/page_templates/single-{$post_type}.css";
        $template_style_uri  = get_template_directory_uri() . "/dist/css/page_templates/single-{$post_type}.css";

        if (file_exists($template_style_path)) {
            wp_enqueue_style( "template-style", $template_style_uri, [], $ver );
        }
    }
    elseif (is_404()) {
        wp_enqueue_style( "template-style", get_template_directory_uri() . '/dist/css/page_templates/404.css', [], $ver );
    }
}, 10010 );
