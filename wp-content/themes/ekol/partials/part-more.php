<?php
if (empty($args))
    return;

$title = $args['title'];
$description = $args['description'];
$tag = $args['tag'];
$button = $args['button'];
$posts = $args['posts'];
$post_type = $args['post_type'];

if (empty($posts))
    return;
?>
<section class="part-more">
    <div class="container part-more__top">
        <div class="part-more__left">
            <p class="pretitle" data-aos="fade-up"><?= $tag; ?></p>

            <h2 class="part-more__title" data-aos="fade-up"><?= $title; ?></h2>

            <?php
                if ($description) {
                    ?>
                    <p class="part-more__description" data-aos="fade-up"><?= $description; ?></p>
                    <?php
                }
            ?>
        </div>

        <?php
            if (!empty($button)) {
                ?>
                <a data-aos="fade-up" href="<?= $button['link']; ?>" class="button button--primary part-more__button part-more__button--<?= $post_type; ?>"><?= $button['title']; ?></a>
                <?php
            }
        ?>
    </div>

    <div class="part-more__bottom">
        <div class="container">
            <div class="swiper part-more__slider" data-aos="fade-up" data-post_type="<?= $post_type; ?>">
                <div class="swiper-wrapper">
                    <?php
                        foreach ($posts as $post) {
                            ?>
                            <div class="swiper-slide part-more__slide">
                                <?php
                                    setup_postdata($post);
                                    get_template_part('partials/previews/preview', $post_type);
                                ?>
                            </div>
                            <?php
                        }

                        wp_reset_postdata();
                    ?>
                </div>
            </div>

            <?php
                if (!empty($button)) {
                    ?>
                    <a data-aos="fade-up" href="<?= $button['link']; ?>" class="button button--primary part-more__button part-more__button--<?= $post_type; ?>"><?= $button['title']; ?></a>
                    <?php
                }
            ?>
        </div>
    </div>
</section>