<?php
$page_for_posts_id = get_option( 'page_for_posts' );

get_template_part('partials/templates/template', 'blog', [
    'content' => pll__('<p>Будьте в курсі трендів, новітніх технологій та інновацій у сфері логістики</p>'),
    'title' => get_the_title($page_for_posts_id),
]);