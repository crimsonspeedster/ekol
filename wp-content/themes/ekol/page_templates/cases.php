<?php
/*
Template Name: Cases page
*/

get_template_part('partials/templates/template', 'cases', [
    'title' => get_the_title(),
    'content' => get_field('common__description'),
]);
