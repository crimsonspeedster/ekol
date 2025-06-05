<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'part-solutions',
        'title' => 'Part Solutions',
        'fields' => [
            [
                'key' => 'template-home_tab-solutions',
                'label' => 'Solutions',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_solutions-condition',
                'label' => 'Enable block?',
                'name' => 'solutions__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_solutions-pretitle',
                'name' => 'solutions__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_solutions-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_solutions-title',
                'name' => 'solutions__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_solutions-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_solutions-description',
                'name' => 'solutions__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_solutions-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_solutions-link',
                'name' => 'solutions__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_solutions-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_solutions-type',
                'label' => 'Posts type',
                'name' => 'solutions__type',
                'type' => 'select',
                'choices' => array(
                    'some_of_them' => 'Selected',
                    'all' => 'All',
                    'number' => 'Few',
                ),
                'default_value' => 'all',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'return_format' => 'value',
                'ajax' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_solutions-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_solutions-amount',
                'label' => 'Posts Number',
                'name' => 'solutions__posts_number',
                'type' => 'number',
                'min' => 1,
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_solutions-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'template-home_solutions-type',
                            'operator' => '==',
                            'value' => 'number',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_solutions-posts',
                'label' => 'Selected posts',
                'name' => 'solutions__posts',
                'type' => 'post_object',
                'post_type' => ['solutions'],
                'multiple' => true,
                'return_format' => 'object',
                'required' => 1,
                'allow_null' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_solutions-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'template-home_solutions-type',
                            'operator' => '==',
                            'value' => 'some_of_them',
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
                    'value' => 'page_templates/solutions.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_templates/services.php',
                ),
            ),
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