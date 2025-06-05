<?php
get_header();
?>
    <main>
        <?php
            get_template_part('partials/global/breadcrumbs');

            get_template_part('partials/part-hero', '', [
                'repeater' => get_field('hero__repeater'),
            ]);
        ?>

        <section class="single-service-section">
            <div class="container">
                <div class="content single-service-section__content">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>

        <?php
            get_template_part('partials/global/part-form');

            get_template_part('partials/part-solutions');
        ?>
    </main>
<?php
get_footer();
