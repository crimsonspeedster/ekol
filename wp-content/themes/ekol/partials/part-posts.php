<?php
$blog__condition = get_field('blog__condition');
$blog__pretitle = get_field('blog__pretitle');
$blog__title = get_field('blog__title');
$blog__description = get_field('blog__description');
$blog__link = get_field('blog__link');
$blog__type = get_field('blog__type');
$blog__posts = [];

switch ($blog__type) {
    case 'some_of_them':
        $blog__posts = get_field('blog__posts');

        if (!is_array($blog__posts)) {
            $blog__posts = [];
        }
        break;
    case 'number':
        $blog__posts_number = get_field('blog__posts_number');

        $blog__posts = get_posts([
            'post_type'      => 'post',
            'posts_per_page' => $blog__posts_number,
            'post_status'    => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        break;
    default:
        $blog__posts_number = -1;

        $blog__posts = get_posts([
            'post_type'      => 'post',
            'posts_per_page' => $blog__posts_number,
            'post_status'    => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        break;
}

if ($blog__condition) {
    ?>
    <section class="blog-part">
        <div class="container">
            <div class="blog-part__top">
                <div class="blog-part__left">
                    <p class="pretitle blog-part__pretitle" data-aos="fade-up"><?= $blog__pretitle; ?></p>

                    <h2 class="blog-part__title" data-aos="fade-up"><?= $blog__title; ?></h2>

                    <div class="content blog-part__description" data-aos="fade-up"><?= $blog__description; ?></div>
                </div>

                <?php
                    if (!empty($blog__link)) {
                        ?>
                        <a data-aos="fade-up" class="button button--primary blog-part__button" href="<?= $blog__link['url']; ?>" <?php getLinkAttrs($blog__link); ?>><?= $blog__link['title']; ?></a>
                        <?php
                    }
                ?>
            </div>
        </div>

        <?php
            if (!empty($blog__posts)) {
                ?>
                <div class="swiper blog-part-slider" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($blog__posts as $post) {
                                ?>
                                <div class="swiper-slide blog-part__slide">
                                    <?php
                                        setup_postdata($post);

                                        get_template_part('partials/previews/preview', $post->post_type);
                                    ?>
                                </div>
                                <?php
                            }

                            wp_reset_postdata();
                        ?>
                    </div>

                    <div class="swiper-scrollbar blog-part-slider__scrollbar"></div>
                </div>
                <?php
            }

            if (!empty($blog__link)) {
                ?>
                <a data-aos="fade-up" class="button button--primary blog-part__button" href="<?= $blog__link['url']; ?>" <?php getLinkAttrs($blog__link); ?>><?= $blog__link['title']; ?></a>
                <?php
            }
        ?>
    </section>
    <?php
}