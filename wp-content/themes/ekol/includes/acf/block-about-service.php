<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-about-service',
        'title' => 'About Service',
        'fields' => [
            [
                'key' => 'block-about-service_pretitle',
                'name' => 'block_about_service__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'block-about-service_description',
                'name' => 'block_about_service__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/about-service',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;