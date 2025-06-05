<?php

add_filter('block_categories_all', function ($categories) {
    return array_merge(
        array(
            array(
                'slug' => 'ekol',
                'title' => 'Ekol',
            ),
        ),
        $categories,
    );
});

if (function_exists('acf_register_block_type')) {
    $blocks_path = get_template_directory() . '/includes/acf_blocks';
    $blocks_path_uri = get_template_directory_uri() . '/includes/acf_blocks';

    acf_register_block_type(array(
        'name'              => 'footer-info',
        'title'             => 'Footer Info',
        'description'       => 'Footer Info',
        'render_template'   => $blocks_path . '/footer-info/render.php',
        'category'          => 'ekol',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/footer-info/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'about-solution',
        'title'             => 'About solution',
        'description'       => 'About solution',
        'render_template'   => $blocks_path . '/about-solution/render.php',
        'category'          => 'ekol',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/about-solution/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'advantages',
        'title'             => 'Advantages',
        'description'       => 'Advantages',
        'render_template'   => $blocks_path . '/advantages/render.php',
        'category'          => 'ekol',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/advantages/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'logistics',
        'title'             => 'Logistics',
        'description'       => 'Logistics',
        'render_template'   => $blocks_path . '/logistics/render.php',
        'category'          => 'ekol',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/logistics/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'about-service',
        'title'             => 'About service',
        'description'       => 'About service',
        'render_template'   => $blocks_path . '/about-service/render.php',
        'category'          => 'ekol',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/about-service/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'mega-menu',
        'title'             => 'Mega Menu',
        'description'       => 'Mega Menu',
        'render_template'   => $blocks_path . '/mega-menu/render.php',
        'category'          => 'ekol',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/mega-menu/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'contacts',
        'title'             => 'Contacts',
        'description'       => 'Contacts',
        'render_template'   => $blocks_path . '/contacts/render.php',
        'category'          => 'ekol',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/contacts/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'footer-menu',
        'title'             => 'Footer Menu',
        'description'       => 'Footer Menu',
        'render_template'   => $blocks_path . '/footer-menu/render.php',
        'category'          => 'ekol',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/footer-menu/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'socials',
        'title'             => 'Socials',
        'description'       => 'Socials',
        'render_template'   => $blocks_path . '/socials/render.php',
        'category'          => 'ekol',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/socials/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'pretitle',
        'title'             => 'Pretitle',
        'description'       => 'Pretitle',
        'render_template'   => $blocks_path . '/pretitle/render.php',
        'category'          => 'ekol',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/pretitle/image.png'
                )
            )
        ),
    ));
}