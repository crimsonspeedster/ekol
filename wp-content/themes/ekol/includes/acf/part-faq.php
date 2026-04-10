<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'part-faq',
        'title' => 'Part FAQ',
        'fields' => [
            [
                'key' => 'part-faq_tab',
                'label' => 'FAQ',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'part-faq_badge',
                'name' => 'badge',
                'label' => 'Badge',
                'type' => 'text',
                'required' => 0,
            ],
            [
                'key' => 'part-faq_section_title',
                'name' => 'section_title',
                'label' => 'Section Title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'part-faq_section_subtitle',
                'name' => 'section_subtitle',
                'label' => 'Section Subtitle',
                'type' => 'textarea',
                'required' => 0,
            ],
            [
                'key' => 'part-faq_faq_list',
                'name' => 'faq_list',
                'label' => 'FAQ List',
                'type' => 'repeater',
                'required' => 0,
                'layout' => 'row',
                'button_label' => 'Add Question',
                'sub_fields' => [
                    [
                        'key' => 'part-faq_faq_list_question',
                        'name' => 'question',
                        'label' => 'Question',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'part-faq_faq_list_answer',
                        'name' => 'answer',
                        'label' => 'Answer',
                        'type' => 'wysiwyg',
                        'required' => 1,
                    ],
                ],
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'services',
                ),
            ),
        ),
        'menu_order' => 10,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;
