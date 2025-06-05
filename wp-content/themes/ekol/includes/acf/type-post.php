<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'type-post',
        'title' => 'Type Post',
        'fields' => [
            [
                'key' => 'type-post_tab-common',
                'label' => 'Common',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'type-post_common-before_image',
                'name' => 'common__before_image',
                'label' => 'Text before image',
                'type' => 'textarea',
                'required' => 0,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;