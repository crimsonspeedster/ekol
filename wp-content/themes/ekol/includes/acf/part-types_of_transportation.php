<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'part-types-of-transportation',
        'title' => 'Part Types of transportation',
        'fields' => [
            [
                'key' => 'template-about-us_tab-our-solution',
                'label' => 'Types of transportation',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'template-about-us_our-solution_condition',
                'name' => 'our_solution__show_section',
                'label' => 'Show section?',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Show',
                'ui_off_text' => 'Hide',
                'default_value' => 0,
            ],
            [
                'key' => 'template-about-us_our-solution_pretitle',
                'name' => 'our_solution__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-about-us_our-solution_condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-about-us_our-solution_title',
                'name' => 'our_solution__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-about-us_our-solution_condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-about-us_our-solution_description',
                'name' => 'our_solution__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-about-us_our-solution_condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-about-us_our-solution-repeater',
                'label' => 'Repeater',
                'name' => 'our_solution__repeater',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-about-us_our-solution_condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'sub_fields' => [
                    [
                        'key' => 'template-about-us_our-solution-repeater_tab',
                        'name' => 'tab',
                        'label' => 'Tab',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 33,
                        ],
                    ],
                    [
                        'key' => 'template-about-us_our-solution-repeater_title',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 33,
                        ],
                    ],
                    [
                        'key' => 'template-about-us_our-solution-repeater_description',
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'wysiwyg',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 50,
                        ],
                    ],
                    [
                        'key' => 'block-about-solution-link',
                        'name' => 'button_link',
                        'label' => 'Button link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 0,
                        'wrapper' => [
                            'width' => 33,
                        ],
                    ],
                    [
                        'key' => 'template-about-us_our-solution-repeater_image',
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
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'services',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_templates/about-us.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;