<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-advantages',
        'title' => 'Advantages',
        'fields' => [
            [
                'key' => 'block-advantages_image',
                'name' => 'block_advantages__image',
                'label' => 'Image',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 0,
            ],
            [
                'key' => 'block-advantages_pretitle',
                'name' => 'block_advantages__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'block-advantages_title',
                'name' => 'block_advantages__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'block-advantages_description',
                'name' => 'block_advantages__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 0,
            ],
            [
                'key' => 'block-advantages-repeater',
                'label' => 'Repeater',
                'name' => 'block_advantages__repeater',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'block-advantages-repeater_title',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'block-advantages-repeater_description',
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'textarea',
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
                    'value' => 'acf/advantages',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;