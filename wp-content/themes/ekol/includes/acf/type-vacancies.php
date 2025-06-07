<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'type-vacancies',
        'title' => 'Type Vacancies',
        'fields' => [
            [
                'key' => 'type-vacancies_tab-common',
                'label' => 'Common',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'type-vacancies_common-full_time',
                'label' => 'Is full time?',
                'name' => 'common__full_time',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'type-vacancies_common-location',
                'name' => 'common__location',
                'label' => 'Location',
                'type' => 'text',
                'required' => 0,
            ],
            [
                'key' => 'type-vacancies_common-description--small',
                'name' => 'common__description_small',
                'label' => 'Description (small)',
                'type' => 'wysiwyg',
                'required' => 1,
            ],
            [
                'key' => 'type-vacancies_common-description--hidden',
                'name' => 'common__description_hidden',
                'label' => 'Description (hidden)',
                'type' => 'wysiwyg',
                'required' => 1,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'vacancies',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;