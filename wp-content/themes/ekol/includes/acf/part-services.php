<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'part-services',
        'title' => 'Part Services',
        'fields' => [
            [
                'key' => 'template-home_tab-services',
                'label' => 'Services',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_services-condition',
                'label' => 'Enable block?',
                'name' => 'services__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_services-pretitle',
                'name' => 'services__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services-title',
                'name' => 'services__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services-description',
                'name' => 'services__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services-link',
                'name' => 'services__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services-type',
                'label' => 'Posts type',
                'name' => 'services__type',
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
                            'field' => 'template-home_services-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services-amount',
                'label' => 'Posts Number',
                'name' => 'services__posts_number',
                'type' => 'number',
                'min' => 1,
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'template-home_services-type',
                            'operator' => '==',
                            'value' => 'number',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services-posts',
                'label' => 'Selected posts',
                'name' => 'services__posts',
                'type' => 'post_object',
                'post_type' => ['services'],
                'multiple' => true,
                'return_format' => 'object',
                'required' => 1,
                'allow_null' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'template-home_services-type',
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
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;