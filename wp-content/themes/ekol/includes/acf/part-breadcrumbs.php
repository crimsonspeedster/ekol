<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'part-breadcrumbs',
        'title' => 'Part Breadcrumbs',
        'fields' => [
            [
                'key' => 'part-breadcrumbs_tab',
                'label' => 'Breadcrumbs',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'part-breadcrumbs_posts',
                'label' => 'Related Posts before current',
                'name' => 'breadcrumbs__related_post',
                'type' => 'post_object',
                'allow_null' => 1,
                'multiple' => 0,
                'return_format' => 'id',
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'decisions',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;