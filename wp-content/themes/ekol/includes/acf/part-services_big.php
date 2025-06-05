<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'part-services_big',
        'title' => 'Part Services Big',
        'fields' => [
            [
                'key' => 'template-home_tab-services_big',
                'label' => 'Services Big',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_services_big-condition',
                'label' => 'Enable block?',
                'name' => 'services_big__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_services_big-pretitle',
                'name' => 'services_big__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services_big-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services_big-title',
                'name' => 'services_big__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services_big-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services_big-description',
                'name' => 'services_big__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services_big-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services_big-type',
                'label' => 'Posts type',
                'name' => 'services_big__type',
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
                            'field' => 'template-home_services_big-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services_big-amount',
                'label' => 'Posts Number',
                'name' => 'services_big__posts_number',
                'type' => 'number',
                'min' => 1,
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services_big-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'template-home_services_big-type',
                            'operator' => '==',
                            'value' => 'number',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_services_big-posts',
                'label' => 'Selected posts',
                'name' => 'services_big__posts',
                'type' => 'post_object',
                'post_type' => ['services'],
                'multiple' => true,
                'return_format' => 'object',
                'required' => 1,
                'allow_null' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_services_big-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'template-home_services_big-type',
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
                    'value' => 'page_templates/services.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;