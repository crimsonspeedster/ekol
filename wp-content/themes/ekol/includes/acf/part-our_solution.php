<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'service-our-solution',
        'title' => 'Types of transportation',
        'fields' => [
            [
                'key' => 'service_tab-our-solution',
                'label' => 'List of transports',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'service_our-solution_show_section',
                'name' => 'our_solution__show_section',
                'label' => 'Show section?',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Show',
                'ui_off_text' => 'Hide',
                'default_value' => 0,
            ],
            [
                'key' => 'service_our-solution_pretitle',
                'name' => 'our_solution__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'service_our-solution_title',
                'name' => 'our_solution__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'service_our-solution_description',
                'name' => 'our_solution__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
            ],
            [
                'key' => 'service_our-solution-repeater',
                'label' => 'Repeater',
                'name' => 'our_solution__repeater',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'block',
                'min' => 1,
                'max' => 3,
                'sub_fields' => [
                    [
                        'key' => 'service_our-solution-repeater_tab',
                        'name' => 'tab',
                        'label' => 'Tab',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 33,
                        ],
                    ],
                    [
                        'key' => 'service_our-solution-repeater_title',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 33,
                        ],
                    ],
                    [
                        'key' => 'service_our-solution-repeater_button_link',
                        'name' => 'button_link',
                        'label' => 'Button link',
                        'type' => 'link',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 33,
                        ],
                    ],

                    [
                        'key' => 'service_our-solution-repeater_description',
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'wysiwyg',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 50,
                        ],
                    ],
                    [
                        'key' => 'service_our-solution-repeater_image',
                        'name' => 'background_id',
                        'label' => 'Image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 50,
                        ],
                    ],
                ],
            ]
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'services',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;