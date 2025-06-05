<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-logistics',
        'title' => 'Logistics',
        'fields' => [
            [
                'key' => 'block-logistics_pretitle',
                'name' => 'block_logistics__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'block-logistics_title',
                'name' => 'block_logistics__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'block-logistics_description',
                'name' => 'block_logistics__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 0,
            ],
            [
                'key' => 'block-logistics-repeater',
                'label' => 'Repeater',
                'name' => 'block_logistics__repeater',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'block-logistics-repeater_title',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'block-logistics-repeater_description',
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'textarea',
                        'required' => 1,
                    ],
                    [
                        'key' => 'block-logistics-repeater_image',
                        'name' => 'image_id',
                        'label' => 'Image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                    ],
                ],
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/logistics',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;