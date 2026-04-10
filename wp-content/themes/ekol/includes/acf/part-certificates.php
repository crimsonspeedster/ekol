<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'part-certificates',
        'title' => 'Part Certificates',
        'fields' => [
            [
                'key' => 'part-certificates_tab',
                'label' => 'Certificates',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'part-certificates_badge',
                'name' => 'badge',
                'label' => 'Badge',
                'type' => 'text',
                'required' => 0,
            ],
            [
                'key' => 'part-certificates_section_title',
                'name' => 'section_title',
                'label' => 'Section Title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'part-certificates_section_subtitle',
                'name' => 'section_subtitle',
                'label' => 'Section Subtitle',
                'type' => 'wysiwyg',
                'required' => 0,
            ],
            [
                'key' => 'part-certificates_certificates_list',
                'name' => 'certificates_list',
                'label' => 'Certificates List',
                'type' => 'repeater',
                'required' => 0,
                'layout' => 'block',
                'button_label' => 'Add Certificate',
                'sub_fields' => [
                    [
                        'key' => 'part-certificates_certificates_list_type',
                        'name' => 'type',
                        'label' => 'Type (for class)',
                        'type' => 'select',
                        'choices' => [
                            'default' => 'Default',
                            'gold' => 'Gold',
                        ],
                        'default_value' => 'default',
                        'required' => 1,
                    ],
                    [
                        'key' => 'part-certificates_certificates_list_icon',
                        'name' => 'icon',
                        'label' => 'Icon',
                        'type' => 'image',
                        'return_format' => 'array',
                        'required' => 1,
                    ],
                    [
                        'key' => 'part-certificates_certificates_list_quality_standard',
                        'name' => 'quality_standard',
                        'label' => 'Quality Standard',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'part-certificates_certificates_list_year',
                        'name' => 'year',
                        'label' => 'Year',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'part-certificates_certificates_list_title',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'part-certificates_certificates_list_date',
                        'name' => 'date',
                        'label' => 'Date',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'part-certificates_certificates_list_certificate',
                        'name' => 'certificate',
                        'label' => 'Certificate Image/File (for popup)',
                        'type' => 'image',
                        'return_format' => 'array',
                        'required' => 1,
                    ],
                ],
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_templates/about-us.php',
                ),
            ),
        ),
        'menu_order' => 30,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;
