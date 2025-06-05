<?php
$queried_object = get_queried_object();

get_template_part('partials/templates/template', 'vacancies', [
    'content' => get_field('common__description', $queried_object->taxonomy . '_' . $queried_object->term_id),
    'title' => $queried_object->name,
]);