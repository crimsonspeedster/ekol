<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'type-menu',
        'title' => 'Type Menu',
        'fields' => [
            [
                'key' => 'type-menu_html-block',
                'label' => 'HTML Block',
                'name' => 'menu_html_block',
                'type' => 'post_object',
                'post_type' => ['html_blocks'],
                'allow_null' => 1,
                'multiple' => 0,
                'return_format' => 'id',
            ],
        ],
        'location' => array(
            [
                [
                    'param' => 'nav_menu_item',
                    'operator' => '==',
                    'value' => 'all',
                ],
            ],
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;