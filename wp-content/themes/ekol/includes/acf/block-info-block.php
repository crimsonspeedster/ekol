<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'pretitle',
        'title' => 'Pretitle',
        'fields' => [
            [
                'key' => 'pretitle_text',
                'name' => 'pretitle__text',
                'label' => 'Text',
                'type' => 'text',
                'required' => 1,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/pretitle',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;