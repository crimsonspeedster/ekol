<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'part-vacancies',
        'title' => 'Part Vacancies',
        'fields' => [
            [
                'key' => 'template-home_tab-vacancies',
                'label' => 'Vacancies',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_vacancies-condition',
                'label' => 'Enable block?',
                'name' => 'vacancies__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_vacancies-pretitle',
                'name' => 'vacancies__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_vacancies-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_vacancies-title',
                'name' => 'vacancies__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_vacancies-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_vacancies-description',
                'name' => 'vacancies__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_vacancies-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_vacancies-link',
                'name' => 'vacancies__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_vacancies-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_vacancies-repeater',
                'label' => 'Repeater',
                'name' => 'vacancies__repeater',
                'type' => 'repeater',
                'required' => 0,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'template-home_vacancies-repeater_image',
                        'name' => 'image_id',
                        'label' => 'Image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                    ],
                ],
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_vacancies-condition',
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
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_templates/home.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_templates/vacancies.php',
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