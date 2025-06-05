<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-footer-menu',
        'title' => 'Footer Menu',
        'fields' => [
            [
                'key' => 'block-footer-menu_lang',
                'label' => 'Show on this lang',
                'name' => 'block_footer_menu__lang',
                'type' => 'select',
                'choices' => [],
                'allow_null' => 1,
                'multiple' => 0,
                'required' => 0,
                'ui' => 1,
                'return_format' => 'value',
                'ajax' => 0,
            ],
            [
                'key' => 'block-footer-menu_title',
                'name' => 'block_footer_menu__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'block-footer-menu_menu',
                'label' => 'Menu',
                'name' => 'block_footer_menu__menu',
                'type' => 'select',
                'choices' => [],
                'allow_null' => 0,
                'multiple' => 0,
                'required' => 1,
                'ui' => 1,
                'return_format' => 'value',
                'ajax' => 0,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/footer-menu',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;