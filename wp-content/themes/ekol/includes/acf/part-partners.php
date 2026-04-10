<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'part-partners',
        'title' => 'Part Partners',
        'fields' => [
            [
                'key' => 'part-partners_tab',
                'label' => 'Partners',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'part-partners_partners_list',
                'name' => 'partners_list',
                'label' => 'Partners List',
                'type' => 'repeater',
                'required' => 0,
                'layout' => 'table',
                'button_label' => 'Add Partner',
                'sub_fields' => [
                    [
                        'key' => 'part-partners_partners_list_image',
                        'name' => 'image',
                        'label' => 'Partner Logo',
                        'type' => 'image',
                        'return_format' => 'array',
                        'required' => 1,
                    ],
                ],
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ),
            ),
        ),
        'menu_order' => 20,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;
