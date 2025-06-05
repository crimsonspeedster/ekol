<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'template-cases',
        'title' => 'Cases page',
        'fields' => [
            [
                'key' => 'template-cases_tab-common',
                'label' => 'Common',
                'type' => 'tab',
            ],
            [
                'key' => 'template-cases_common-description',
                'name' => 'common__description',
                'label' => 'Description',
                'type' => 'textarea',
                'required' => 0,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_templates/cases.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;