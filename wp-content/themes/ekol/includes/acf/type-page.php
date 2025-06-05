<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'type-page',
        'title' => 'Type Page',
        'fields' => [
            [
                'key' => 'type-page_tab-common',
                'label' => 'Common',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'type-page_common-preview',
                'name' => 'common__show_preview',
                'label' => 'Show preview image',
                'type' => 'true_false',
                'required' => 0,
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'type-page_common-updated',
                'name' => 'common__show_updated',
                'label' => 'Show updated date',
                'type' => 'true_false',
                'required' => 0,
                'default_value' => 0,
                'ui' => 1,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;