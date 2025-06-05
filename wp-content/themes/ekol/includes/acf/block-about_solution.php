<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-about-solution',
        'title' => 'About solution',
        'fields' => [
            [
                'key' => 'block-about-solution-pretitle',
                'name' => 'about_solution__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'block-about-solution-title',
                'name' => 'about_solution__title',
                'label' => 'Text',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'block-about-solution-description',
                'name' => 'about_solution__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
            ],
            [
                'key' => 'block-about-solution-link',
                'name' => 'about_solution__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
            ],
            [
                'key' => 'block-about-solution-image',
                'name' => 'about_solution__image',
                'label' => 'Image',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/about-solution',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;