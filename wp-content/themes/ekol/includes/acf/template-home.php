<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'template-home',
        'title' => 'Home page',
        'fields' => [
            [
                'key' => 'template-home_tab-hero',
                'label' => 'Hero',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_hero-title',
                'name' => 'hero__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'template-home_hero-description',
                'name' => 'hero__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
            ],
            [
                'key' => 'template-home_hero-link',
                'name' => 'hero__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
            ],
            [
                'key' => 'template-home_hero-video',
                'name' => 'hero__video',
                'label' => 'Video',
                'type' => 'file',
                'return_format' => 'url',
                'required' => 1,
                'mime_types' => 'mp4,webm,ogg',
            ],
            [
                'key' => 'template-home_tab-partners',
                'label' => 'Partners',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_partners-condition',
                'label' => 'Enable block?',
                'name' => 'partners__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_partners-pretitle',
                'name' => 'partners__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_partners-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_partners-title',
                'name' => 'partners__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_partners-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_partners-description',
                'name' => 'partners__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_partners-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_partners-link',
                'name' => 'partners__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_partners-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_partners-background',
                'name' => 'partners__bg',
                'label' => 'Background',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_partners-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_tab-cases',
                'label' => 'Cases',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_cases-condition',
                'label' => 'Enable block?',
                'name' => 'cases__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_cases-pretitle',
                'name' => 'cases__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_cases-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_cases-title',
                'name' => 'cases__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_cases-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_cases-description',
                'name' => 'cases__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_cases-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_cases-link',
                'name' => 'cases__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_cases-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_cases-type',
                'label' => 'Posts type',
                'name' => 'cases__type',
                'type' => 'select',
                'choices' => array(
                    'some_of_them' => 'Selected',
                    'all' => 'All',
                    'number' => 'Few',
                ),
                'default_value' => 'all',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'return_format' => 'value',
                'ajax' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_cases-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_cases-amount',
                'label' => 'Posts Number',
                'name' => 'cases__posts_number',
                'type' => 'number',
                'min' => 1,
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_cases-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'template-home_cases-type',
                            'operator' => '==',
                            'value' => 'number',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_cases-posts',
                'label' => 'Selected posts',
                'name' => 'cases__posts',
                'type' => 'post_object',
                'post_type' => ['cases'],
                'multiple' => true,
                'return_format' => 'object',
                'required' => 1,
                'allow_null' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_cases-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'template-home_cases-type',
                            'operator' => '==',
                            'value' => 'some_of_them',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_tab-blog',
                'label' => 'Blog',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_blog-condition',
                'label' => 'Enable block?',
                'name' => 'blog__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_blog-pretitle',
                'name' => 'blog__pretitle',
                'label' => 'Pretitle',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_blog-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_blog-title',
                'name' => 'blog__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_blog-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_blog-description',
                'name' => 'blog__description',
                'label' => 'Description',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_blog-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_blog-link',
                'name' => 'blog__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_blog-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_blog-type',
                'label' => 'Posts type',
                'name' => 'blog__type',
                'type' => 'select',
                'choices' => array(
                    'some_of_them' => 'Selected',
                    'all' => 'All',
                    'number' => 'Few',
                ),
                'default_value' => 'all',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'return_format' => 'value',
                'ajax' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_blog-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_blog-amount',
                'label' => 'Posts Number',
                'name' => 'blog__posts_number',
                'type' => 'number',
                'min' => 1,
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_blog-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'template-home_blog-type',
                            'operator' => '==',
                            'value' => 'number',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_blog-posts',
                'label' => 'Selected posts',
                'name' => 'blog__posts',
                'type' => 'post_object',
                'post_type' => ['post'],
                'multiple' => true,
                'return_format' => 'object',
                'required' => 1,
                'allow_null' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_blog-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'template-home_blog-type',
                            'operator' => '==',
                            'value' => 'some_of_them',
                        ),
                    ),
                ),
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_templates/home.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;