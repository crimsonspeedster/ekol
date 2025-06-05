<?php
get_header();

get_template_part('partials/global/breadcrumbs');
?>
    <main>
        <section class="page-section">
            <div class="container">
                <?php
                    if (get_field('common__show_preview')) {
                        ?>
                        <div class="page-section__preview"><?php getPostThumbnail(get_the_ID()); ?></div>
                        <?php
                    }

                    if (get_field('common__show_updated')) {
                        ?>
                        <p class="pretitle page-section__pretitle">
                            <?=
                                str_replace('%s1', get_the_modified_date( 'j F Y \р' ), pll__('Оновлено %s1'));
                            ?>
                        </p>
                        <?php
                    }
                ?>

                <div class="content page-section__content"><?php the_content(); ?></div>
            </div>
        </section>
    </main>
<?php
get_footer();