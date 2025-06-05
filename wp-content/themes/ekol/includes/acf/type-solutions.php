<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'type-solutions',
        'title' => 'Type Solutions',
        'fields' => [
            [
                'key' => 'type-solutions_tab-common',
                'label' => 'Common',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'type-solutions_common-image--hover',
                'name' => 'common__image_hover',
                'label' => 'Image for hover',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 0,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'solutions',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;