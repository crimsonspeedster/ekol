<?php
/*
Template Name: Vacancies page
*/

get_template_part('partials/templates/template', 'vacancies', [
    'title' => get_field('common__title') ?: get_the_title(),
    'content' => get_field('common__description'),
]);