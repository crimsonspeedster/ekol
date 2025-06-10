<?php
// Actions
add_action('init', function () {
    if (!function_exists('pll__')) {
        function pll__($text, $domain = 'default') {
            return $text;
        }
    }

    if (!function_exists('pll_e')) {
        function pll_e($text, $domain = 'default') {
            echo $text;
        }
    }

    $post_types = [
        'services' => [
            'label'  => null,
            'labels' => array(
                'name'               => pll__('Послуги'),
                'singular_name'      => pll__('Послуга'),
                'menu_name'          => pll__('Послуги')
            ),
            'has_archive'         => false,
            'public'              => true,
            'exclude_from_search' => true,
            'show_in_menu'        => true,
            'show_in_rest'        => true,
            'supports'            => array('title', 'thumbnail', 'editor', 'excerpt'),
        ],
        'solutions' => [
            'label'  => null,
            'labels' => array(
                'name'               => pll__('Галузеві рішення'),
                'singular_name'      => pll__('Галузеве рішення'),
                'menu_name'          => pll__('Галузеві рішення')
            ),
            'has_archive'         => false,
            'public'              => true,
            'exclude_from_search' => true,
            'show_in_menu'        => true,
            'show_in_rest'        => true,
            'supports'            => array('title', 'thumbnail', 'editor', 'excerpt'),
        ],
        'cases' => [
            'label'  => null,
            'labels' => array(
                'name'               => pll__('Кейси'),
                'singular_name'      => pll__('Кейс'),
                'menu_name'          => pll__('Кейси')
            ),
            'has_archive'         => false,
            'public'              => true,
            'exclude_from_search' => true,
            'show_in_menu'        => true,
            'show_in_rest'        => true,
            'supports'            => array('title', 'thumbnail', 'editor', 'excerpt'),
        ],
        'vacancies' => [
            'label'  => null,
            'labels' => array(
                'name'               => pll__('Вакансії'),
                'singular_name'      => pll__('Вакансія'),
                'menu_name'          => pll__('Вакансії')
            ),
            'has_archive'         => false,
            'public'              => true,
            'publicly_queryable'  => false,
            'exclude_from_search' => true,
            'show_in_menu'        => true,
            'show_in_rest'        => true,
            'supports'            => array('title'),
        ],
        'html_blocks' => [
            'label'  => null,
            'labels' => array(
                'name'               => pll__('HTML Blocks'),
                'singular_name'      => pll__('HTML Blocks'),
                'menu_name'          => pll__('HTML Blocks')
            ),
            'has_archive'         => false,
            'public'              => true,
            'publicly_queryable'  => false,
            'exclude_from_search' => true,
            'show_in_menu'        => true,
            'show_in_rest'        => true,
            'supports'            => array('title', 'editor'),
        ],
    ];
    $post_taxonomies = [
        'cases_cat' => [
            'post_types' => ['cases'],
            'args' => [
                'label'                 => '',
                'labels'                => array(
                    'name'              => pll__('Категорії'),
                    'singular_name'     => pll__('Категорія'),
                    'menu_name'         => pll__('Категорії')
                ),
                'description'           => '',
                'public'                => true,
                'publicly_queryable'    => true,
                'show_in_nav_menus'     => true,
                'show_ui'               => true,
                'show_tagcloud'         => true,
                'show_in_rest'          => true,
                'rest_base'             => null,
                'hierarchical'          => true,
                'update_count_callback' => '',
                'rewrite'               => true,
                'capabilities'          => array(),
                'meta_box_cb'           => null,
                'show_admin_column'     => false,
                '_builtin'              => false,
                'show_in_quick_edit'    => null,
            ]
        ],
        'services_cat' => [
            'post_types' => ['services'],
            'args' => [
                'label'                 => '',
                'labels'                => array(
                    'name'              => pll__('Категорії'),
                    'singular_name'     => pll__('Категорія'),
                    'menu_name'         => pll__('Категорії')
                ),
                'description'           => '',
                'public'                => true,
                'publicly_queryable'    => true,
                'show_in_nav_menus'     => true,
                'show_ui'               => true,
                'show_tagcloud'         => true,
                'show_in_rest'          => true,
                'rest_base'             => null,
                'hierarchical'          => true,
                'update_count_callback' => '',
                'rewrite'               => false,
                'capabilities'          => array(),
                'meta_box_cb'           => null,
                'show_admin_column'     => false,
                '_builtin'              => false,
                'show_in_quick_edit'    => null,
            ]
        ],
        'vacancies_cat' => [
            'post_types' => ['vacancies'],
            'args' => [
                'label'                 => '',
                'labels'                => array(
                    'name'              => pll__('Категорії'),
                    'singular_name'     => pll__('Категорія'),
                    'menu_name'         => pll__('Категорії')
                ),
                'description'           => '',
                'public'                => true,
                'publicly_queryable'    => true,
                'show_in_nav_menus'     => true,
                'show_ui'               => true,
                'show_tagcloud'         => true,
                'show_in_rest'          => true,
                'rest_base'             => null,
                'hierarchical'          => true,
                'update_count_callback' => '',
                'rewrite'               => true,
                'capabilities'          => array(),
                'meta_box_cb'           => null,
                'show_admin_column'     => false,
                '_builtin'              => false,
                'show_in_quick_edit'    => null,
            ]
        ],
    ];

    if (!empty($post_types)) {
        foreach ($post_types as $post_type => $post_type_data) {
            register_post_type($post_type, $post_type_data);
        }
    }

    if (!empty($post_taxonomies)) {
        foreach ($post_taxonomies as $post_taxonomy => $post_taxonomy_data) {
            register_taxonomy($post_taxonomy, $post_taxonomy_data['post_types'], $post_taxonomy_data['args']);
        }
    }
});
add_action('after_setup_theme', function () {
    add_image_size('large', 1100, '', true);
    add_image_size('medium', 700, '', true);
    add_image_size('small', 300, '', true);

    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'ekol'),
        'header-mobile-menu' => __('Header Mobile Menu', 'ekol'),
        'footer_copyright-menu' => __('Footer Copyright Menu', 'ekol'),
    ));

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'    => 'Theme settings',
            'menu_title'    => 'Theme settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
});
add_action('widgets_init', function () {
    register_sidebar([
        'name'          => 'Footer left',
        'id'            => 'footer-left',
        'description'   => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ]);

    register_sidebar([
        'name'          => 'Footer column 1',
        'id'            => 'footer-column-1',
        'description'   => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ]);

    register_sidebar([
        'name'          => 'Footer column 2',
        'id'            => 'footer-column-2',
        'description'   => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ]);

    register_sidebar([
        'name'          => 'Footer column 3',
        'id'            => 'footer-column-3',
        'description'   => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ]);

    register_sidebar([
        'name'          => 'Footer column 4',
        'id'            => 'footer-column-4',
        'description'   => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ]);
});
add_action('pre_get_posts', function ($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    $per_page = get_option('posts_per_page');

    if (is_tax('cases_cat') || is_tax('vacancies_cat')) {
        $query->set('posts_per_page', $per_page);
    }
});
add_action('wp_footer', function () {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (!document.getElementById('form-script')) {
                const script = document.createElement('script');
                script.id = 'form-script';
                script.src = 'https://js-eu1.hsforms.net/forms/embed/145851954.js';
                script.defer = true;

                document.body.appendChild(script);
            }

            if (!document.getElementById('hs-script-loader-script')) {
                const script = document.createElement('script');
                script.id = 'hs-script-loader-script';
                script.src = 'https://js-eu1.hs-scripts.com/145851954.js';
                script.defer = true;
                script.async = true;

                document.body.appendChild(script);
            }
        });
    </script>
    <?php
});
add_action('wp_head', function () {
    ?>
    <meta name="google-site-verification" content="wmH_V31whVizBSBq6XkGi6JfjEeamq1V918LllVpPpY" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5VT4PP9X');</script>
    <!-- End Google Tag Manager -->
    <?php
});
add_action('wp_body_open', function () {
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5VT4PP9X"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
});
add_action('wpseo_head', function () {
    $current_lang = get_permalink();

    if (is_home() && get_queried_object_id() === (int) get_option('page_for_posts')) {
        $current_lang = get_permalink(get_option('page_for_posts'));
    }

    echo '<link rel="alternate" hreflang="x-default" href="' . esc_url($current_lang) . '" />' . "\n";
});
add_action('wp_head', function () {
    $common__header_logo = get_field('common__header_logo', 'option');

    if (is_singular('post')) {
        $post_title = get_the_title();
        $post_url = get_permalink();
        $post_date = get_the_date('c');
        $post_modified_date = get_the_modified_date('c');
        $post_excerpt = get_the_excerpt();
        $post_content = get_the_content();
        $post_image = get_the_post_thumbnail_url();

        $author_id = get_the_author_meta( 'ID' );
        $author_info = get_userdata( $author_id );
        $author_output = $author_info->first_name && $author_info->last_name ? $author_info->first_name . ' ' . $author_info->last_name : $author_info->display_name;

        $blog_posting_schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $post_url
            ],
            'headline' => $post_title,
            'description' => $post_excerpt,
            'articleBody' => wp_strip_all_tags($post_content),
            'author' => [
                '@type' => 'Person',
                'name' => $author_output
            ],
            'datePublished' => $post_date,
            'dateModified' => $post_modified_date,
            'image' => $post_image,
            'publisher' => [
                '@type' => 'Organization',
                'name' => get_bloginfo('name'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => wp_get_attachment_image_url($common__header_logo, 'full'),
                ]
            ]
        ];

        echo '<script type="application/ld+json">' . json_encode($blog_posting_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }
    elseif (is_page_template('page_templates/about-us.php')) {
        $contacts__address = get_field('contacts__address', 'option');
        $contacts__phones = get_field('contacts__phones', 'option');
        $contacts__email = get_field('contacts__email', 'option');

        $posting_schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'url' => get_home_url(),
            'name' => get_bloginfo('name'),
            'logo' => wp_get_attachment_image_url($common__header_logo, 'full'),
        ];

        if (!empty($contacts__phones)) {
            $sub_array = [
                "@type" => "ContactPoint",
                "contactType" => "Служба підтримки",
            ];
            $contacts__phones_array = [];

            foreach ($contacts__phones as $item) {
                $contacts__phones_array[] = $item['phone'];
            }

            $sub_array['telephone'] = $contacts__phones_array;
            $posting_schema['contactPoint'] = $sub_array;
        }

        if ($contacts__address) {
            $posting_schema['address'] = [
                '@type' => "PostalAddress",
                'streetAddress' => $contacts__address,
                "addressCountry" => "UA",
            ];
        }

        if ($contacts__email) {
            $posting_schema['email'] = $contacts__email;
        }

        echo '<script type="application/ld+json">' . json_encode($posting_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }
});
add_action('template_redirect', function () {
    if ( is_admin() || wp_doing_ajax() ) {
        return;
    }

    $need_redirect = false;
    $request_uri = $_SERVER['REQUEST_URI'];

    if (preg_match('#//+#', $request_uri)) {
        $need_redirect = true;
        $request_uri = preg_replace('#/+#','/',$request_uri);
    }

    if ($request_uri !== strtolower($request_uri)) {
        $need_redirect = true;
        $request_uri = strtolower($request_uri);
    }

    if ($need_redirect) {
        wp_safe_redirect(home_url( $request_uri ), 301);
        exit;
    }
});


// Filters
add_filter('the_generator', function () {
    return '';
});
add_filter('script_loader_src', 'remove_wp_version_strings');
add_filter('style_loader_src', 'remove_wp_version_strings');
add_filter('wpseo_metabox_prio', function () {
    return 'low';
});
add_filter('acf/load_field/name=block_footer_menu__menu', function ($field) {
    $menus = wp_get_nav_menus();
    $choices = [];

    foreach ($menus as $menu) {
        $choices[$menu->slug] = $menu->name;
    }

    $field['choices'] = $choices;

    return $field;
});
add_filter('acf/load_field', function ($field) {
    $array_compare = [
        'template-vacancies_about-repeater-select',
        'part-about_about-repeater-select',
        'template-about-us_remake-repeater-select',
    ];

    if (in_array($field['key'], $array_compare)) {
        $field['choices'] = [
            'plus' => '+',
            'percent' => '%',
        ];
    }

    return $field;
});
add_filter('acf/load_field', function ($field) {
    $array_compare = [
        'block-footer-info_lang',
        'block-socials_lang',
        'block-footer-menu_lang',
        'block-contacts_lang',
    ];

    if (in_array($field['key'], $array_compare)) {
        $langs = [];

        if (function_exists('pll_the_languages')) {
            $pll_langs = pll_the_languages(['raw' => 1]);

            if (!empty($pll_langs)) {
                foreach ($pll_langs as $slug => $lang) {
                    $langs[$slug] = $lang['name'];
                }
            }
        }

        $field['choices'] = $langs;
    }

    return $field;
});
add_filter('wpseo_breadcrumb_links', function ($links) {
    if (is_singular('cases') || is_tax('cases_cat')) {
        $common__archive_cases = get_field('common__archive_cases', 'options');

        if ($common__archive_cases) {
            $breadcrumb_link = array(
                'url'  => get_permalink($common__archive_cases),
                'text' => get_the_title($common__archive_cases),
            );

            array_splice($links, 1, 0, array($breadcrumb_link));
        }
    }
    elseif (is_singular('solutions')) {
        $common__archive_solutions = get_field('common__archive_solutions', 'options');

        if ($common__archive_solutions) {
            $breadcrumb_link = array(
                'url'  => get_permalink($common__archive_solutions),
                'text' => get_the_title($common__archive_solutions),
            );

            array_splice($links, 1, 0, array($breadcrumb_link));
        }
    }
    elseif (is_singular('services')) {
        $common__archive_services = get_field('common__archive_services', 'options');

        if ($common__archive_services) {
            $breadcrumb_link = array(
                'url'  => get_permalink($common__archive_services),
                'text' => get_the_title($common__archive_services),
            );

            array_splice($links, 1, 0, array($breadcrumb_link));
        }
    }

    return $links;
}, 10, 1);
add_filter('walker_nav_menu_start_el', function ($item_output, $item, $depth, $args) {
    $html_block_id = get_field('menu_html_block', $item->ID);

    if ($html_block_id) {
        $html_content = get_post_field('post_content', $html_block_id);
        $item_output .= apply_filters('the_content', $html_content);
    }

    return $item_output;
}, 10, 4);
add_filter('request', function ($query_vars) {
    $vacancies_page_obj = get_field('common__archive_vacancies', 'option');

    if (
        $vacancies_page_obj &&
        isset($_GET['s']) &&
        isset($query_vars['pagename']) &&
        $query_vars['pagename'] === $vacancies_page_obj->post_name
    ) {
        unset($query_vars['s']);
    }

    return $query_vars;
});
add_filter('wp_get_attachment_image_attributes', function ($attr, $attachment) {
    global $post;

    if (!$post || !is_singular())
        return $attr;

    $h1 = get_the_title($post);
    $featured_id = get_post_thumbnail_id($post->ID);

    static $image_counter = [];

    $image_counter[$post->ID] = !isset($image_counter[$post->ID]) ? 1 : $image_counter[$post->ID]++;
    $text = $attachment->ID == $featured_id ? $h1 : $h1 . ' фото ' . $image_counter[$post->ID];

    $attr['alt'] = $text;
    $attr['title'] = $text;

    return $attr;
}, 10, 2);
add_filter('render_block_core/image', function ($block_content, $block) {
    if (!is_singular()) {
        return $block_content;
    }

    global $post;

    if (!$post) {
        return $block_content;
    }

    $h1 = get_the_title($post);

    static $img_count = 0;
    $img_count++;

    $text = $h1;
    if ($img_count > 1) {
        $text .= ' фото ' . $img_count;
    }

    $block_content = preg_replace('/alt=["\']{1}["\']{1}/i', '', $block_content);

    $block_content = preg_replace_callback(
        '/<img\b[^>]*>/i',
        function ($matches) use ($text) {
            $img_tag = $matches[0];

            $img_tag = preg_replace('/\s+alt=["\'][^"\']*["\']/', '', $img_tag);
            $img_tag = preg_replace('/\s+title=["\'][^"\']*["\']/', '', $img_tag);

            return str_replace('<img', '<img alt="' . esc_attr($text) . '" title="' . esc_attr($text) . '"', $img_tag);
        },
        $block_content
    );

    return $block_content;
}, 10, 2);
