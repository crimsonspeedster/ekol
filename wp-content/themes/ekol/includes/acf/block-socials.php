<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-socials',
        'title' => 'Socials',
        'fields' => [
            [
                'key' => 'block-socials_lang',
                'label' => 'Show on this lang',
                'name' => 'socials__lang',
                'type' => 'select',
                'choices' => [],
                'allow_null' => 1,
                'multiple' => 0,
                'required' => 0,
                'ui' => 1,
                'return_format' => 'value',
                'ajax' => 0,
            ],
            [
                'key' => 'block-socials-repeater',
                'label' => 'Repeater',
                'name' => 'socials__repeater',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'block-socials-repeater_image',
                        'name' => 'image',
                        'label' => 'Image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                    ],
                    [
                        'key' => 'block-socials-repeater_link',
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 1,
                    ],
                    [
                        'key' => 'block-socials-repeater_condition',
                        'label' => 'Is wide?',
                        'name' => 'is_wide',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1,
                    ],
                ],
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/socials',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;