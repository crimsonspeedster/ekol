<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'type-cases',
        'title' => 'Type Cases',
        'fields' => [
            [
                'key' => 'type-cases_tab-company',
                'label' => 'Company',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'type-cases_company-condition',
                'label' => 'Enable block?',
                'name' => 'company__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'type-cases_company-pretitle',
                'name' => 'company__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'type-cases_company-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'type-cases_company-title',
                'name' => 'company__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'type-cases_company-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'type-cases_company-description',
                'name' => 'company__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'type-cases_company-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'type-cases_company-image',
                'name' => 'company__image',
                'label' => 'Image left',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'type-cases_company-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'cases',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;