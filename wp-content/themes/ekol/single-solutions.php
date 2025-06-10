<?php
get_header();

$page_for_posts_id = get_field( 'common__archive_cases', 'option' );
?>
<main>
    <?php
        get_template_part('partials/global/breadcrumbs');

        get_template_part('partials/part-hero', '', [
            'repeater' => get_field('hero__repeater'),
        ]);
    ?>

    <section class="single-solutions-section">
        <div class="container">
            <div class="content single-solutions-section__content"><?php the_content(); ?></div>
        </div>
    </section>

    <?php
        get_template_part('partials/part-more', '', [
            'title' => pll__('Наші спільні кейси'),
            'description' => pll__('Наші рішення допомогли багатьом компаніям покращити складські процеси'),
            'tag' => pll__('Наші кейси'),
            'button' => [
                'title' => pll__('Більше кейсів'),
                'link' => get_permalink($page_for_posts_id),
            ],
            'posts' => get_posts([
                'post_type'      => 'cases',
                'post_status'    => 'publish',
                'posts_per_page' => 6,
                'post__not_in'   => [get_the_ID()],
            ]),
            'post_type' => 'cases',
        ]);

        get_template_part('partials/global/part-form');
    ?>
</main>
<?php
get_footer();
