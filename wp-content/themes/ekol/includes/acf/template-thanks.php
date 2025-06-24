<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'template-thanks',
        'title' => 'Thanks page',
        'fields' => [
            [
                'key' => 'template-thanks_tab-common',
                'label' => 'Common',
                'type' => 'tab',
            ],
            [
                'key' => 'template-thanks_common-video',
                'name' => 'common__video',
                'label' => 'Video',
                'type' => 'file',
                'return_format' => 'url',
                'required' => 1,
                'mime_types' => 'mp4,webm,ogg',
            ],
            [
                'key' => 'template-thanks_common-image',
                'name' => 'common__image',
                'label' => 'Image',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
            ],
            [
                'key' => 'template-thanks_common-title',
                'name' => 'common__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'template-thanks_common-description',
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
                    'value' => 'page_templates/thanks.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;