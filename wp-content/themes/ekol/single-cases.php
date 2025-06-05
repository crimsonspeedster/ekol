<?php
get_header();

$page_for_posts_id = get_field( 'common__archive_cases', 'option' );

$company__condition = get_field('company__condition');
$company__pretitle = get_field('company__pretitle');
$company__title = get_field('company__title');
$company__description = get_field('company__description');
$company__image = get_field('company__image');

get_template_part('partials/global/breadcrumbs');
?>
    <main>
        <article class="article-case">
            <section class="section-case">
                <div class="container section-case__wrapper">
                    <div class="section-case__image">
                        <?php getPostThumbnail(get_the_ID()); ?>
                    </div>

                    <h1 class="section-case__title"><?php the_title(); ?></h1>
                </div>
            </section>

            <?php
                if ($company__condition) {
                    ?>
                    <section class="case-company">
                        <div class="container">
                            <div class="case-company__top">
                                <div class="case-company__left">
                                    <p class="pretitle case-company__pretitle" data-aos="fade-up"><?= $company__pretitle; ?></p>

                                    <h2 class="case-company__title" data-aos="fade-up"><?= $company__title; ?></h2>
                                </div>

                                <div class="content case-company__description" data-aos="fade-up"><?= $company__description; ?></div>
                            </div>

                            <div class="case-company__image" data-aos="fade-up">
                                <?= wp_get_attachment_image($company__image, 'full'); ?>
                            </div>
                        </div>
                    </section>
                    <?php
                }
            ?>

            <div class="content case__description" data-aos="fade-up"><?php the_content(); ?></div>
        </article>

        <?php
            get_template_part('partials/part-more', '', [
                'title' => pll__('Вас може зацікавити'),
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