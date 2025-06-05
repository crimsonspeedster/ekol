<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'template-vacancies',
        'title' => 'Vacancies page',
        'fields' => [
            [
                'key' => 'template-vacancies_tab-common',
                'label' => 'Common',
                'type' => 'tab',
            ],
            [
                'key' => 'template-vacancies_common-title',
                'name' => 'common__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 0,
            ],
            [
                'key' => 'template-vacancies_common-description',
                'name' => 'common__description',
                'label' => 'Description',
                'type' => 'textarea',
                'required' => 0,
            ],
            [
                'key' => 'template-vacancies_tab-internship',
                'label' => 'Internship',
                'type' => 'tab',
            ],
            [
                'key' => 'template-vacancies_internship-condition',
                'label' => 'Enable block?',
                'name' => 'internship__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-vacancies_internship-pretitle',
                'name' => 'internship__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_internship-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_internship-title',
                'name' => 'internship__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_internship-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_internship-description',
                'name' => 'internship__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_internship-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_internship-link',
                'name' => 'internship__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_internship-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_internship-image--left',
                'name' => 'internship__image_left',
                'label' => 'Image left',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_internship-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_internship-image--right',
                'name' => 'internship__image_right',
                'label' => 'Image right',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_internship-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_internship-background',
                'name' => 'internship__background',
                'label' => 'Background',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_internship-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],





            [
                'key' => 'template-vacancies_tab-about',
                'label' => 'About',
                'type' => 'tab',
            ],
            [
                'key' => 'template-vacancies_about-condition',
                'label' => 'Enable block?',
                'name' => 'about__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-vacancies_about-pretitle',
                'name' => 'about__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_about-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_about-title',
                'name' => 'about__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_about-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_about-description',
                'name' => 'about__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_about-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_about-link',
                'name' => 'about__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_about-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_about-image',
                'name' => 'about__image',
                'label' => 'Background',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_about-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-vacancies_about-repeater',
                'label' => 'Repeater',
                'name' => 'about__repeater',
                'type' => 'repeater',
                'required' => 0,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'template-vacancies_about-repeater-title',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-vacancies_about-repeater-number',
                        'name' => 'number',
                        'label' => 'Number',
                        'type' => 'number',
                        'required' => 1,
                        'min' => 1,
                    ],
                    [
                        'key' => 'template-vacancies_about-repeater-description',
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'textarea',
                        'new_lines' => 'br',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-vacancies_about-repeater-select',
                        'label' => 'Type',
                        'name' => 'type',
                        'type' => 'select',
                        'choices' => [],
                        'allow_null' => 0,
                        'multiple' => 0,
                        'required' => 1,
                        'ui' => 1,
                        'return_format' => 'value',
                        'ajax' => 0,
                    ],
                ],
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-vacancies_about-condition',
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
                    'value' => 'page_templates/vacancies.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;