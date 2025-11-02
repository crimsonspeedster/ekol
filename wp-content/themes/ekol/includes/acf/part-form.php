<?php

if( function_exists('acf_add_local_field_group') ) {
    acf_add_local_field_group(array(
        'key' => 'part-form',
        'title' => 'Part Form',
        'fields' => [
            [
                'key' => 'acf_theme_settings-tab-form',
                'label' => 'Form',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'acf_theme_settings-form_condition',
                'label' => 'Enable block?',
                'instructions' => 'If not enabled here, then data takes from Theme Settings',
                'name' => 'form__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'acf_theme_settings-form_pretitle',
                'name' => 'form__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'acf_theme_settings-form_condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'acf_theme_settings-form_title',
                'name' => 'form__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'acf_theme_settings-form_condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'acf_theme_settings-form_description',
                'name' => 'form__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'acf_theme_settings-form_condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'acf_theme_settings-form-repeater',
                'label' => 'Repeater',
                'name' => 'form__repeater',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'acf_theme_settings-form_condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'sub_fields' => [
                    [
                        'key' => 'acf_theme_settings-form-repeater_image',
                        'name' => 'image_id',
                        'label' => 'Image for block Form',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                    ],
                    [
                        'key' => 'acf_theme_settings-form-repeater_name',
                        'name' => 'name',
                        'label' => 'User Name',
                        'type' => 'text',
                        'required' => 0,
                    ],
                    [
                        'key' => 'acf_theme_settings-form-repeater_position',
                        'name' => 'position',
                        'label' => 'User Position',
                        'type' => 'text',
                        'required' => 0,
                    ],
                ],
            ],
            [
                'key' => 'acf_theme_settings-form_shortcode',
                'name' => 'form__shortcode',
                'label' => 'Shortcode',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'acf_theme_settings-form_condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'services',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'solutions',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'cases',
                ),
            ),
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ));
}