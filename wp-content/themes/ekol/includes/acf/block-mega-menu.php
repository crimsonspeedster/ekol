<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-mega-menu',
        'title' => 'Mega menu',
        'fields' => [
            [
                'key' => 'block-mega-menu_title',
                'name' => 'block_mega_menu__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'block-mega-menu_description',
                'name' => 'block_mega_menu__description',
                'label' => 'Description',
                'type' => 'textarea',
                'required' => 0,
            ],
            [
                'key' => 'block-mega-menu_link',
                'name' => 'block_mega_menu__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
            ],
            [
                'key' => 'block-mega-menu-repeater',
                'label' => 'Repeater',
                'name' => 'block_mega_menu__repeater',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'block-mega-menu-repeater_title',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'block-mega-menu-repeater_description',
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'textarea',
                        'required' => 0,
                    ],
                    [
                        'key' => 'block-mega-menu-repeater_link',
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 1,
                    ],
                ],
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/mega-menu',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;