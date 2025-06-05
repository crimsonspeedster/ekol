<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'taxonomy',
        'title' => 'Taxonomy',
        'fields' => [
            [
                'key' => 'taxonomy_tab-common',
                'label' => 'Common',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'taxonomy_common-description',
                'name' => 'common__description',
                'label' => 'Description',
                'type' => 'text',
                'required' => 0,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'category',
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'vacancies_cat',
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'cases_cat',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;