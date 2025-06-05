<?php
/*
Template Name: Home page
*/

get_header();

$hero__title = get_field('hero__title');
$hero__description = get_field('hero__description');
$hero__link = get_field('hero__link');
$hero__video = get_field('hero__video');

$partners__condition = get_field('partners__condition');
$partners__pretitle = get_field('partners__pretitle');
$partners__title = get_field('partners__title');
$partners__description = get_field('partners__description');
$partners__link = get_field('partners__link');
$partners__bg = get_field('partners__bg');
?>
<main>
    <section class="home-hero background-block">
        <div class="background-block__image" data-video="<?= $hero__video; ?>">
            <video src="" loop autoplay muted playsinline></video>
        </div>

        <div class="container background-block__container">
            <div class="home-hero__wrapper">
                <h1 class="home-hero__title hero--animation"><?= $hero__title; ?></h1>

                <?php
                    if ($hero__description) {
                        ?>
                        <div class="content home-hero__description hero--animation"><?= $hero__description; ?></div>
                        <?php
                    }

                    if (!empty($hero__link)) {
                        ?>
                        <a href="<?= $hero__link['url']; ?>" class="button button--primary home-hero__link hero--animation" <?php getLinkAttrs($hero__link); ?>><?= $hero__link['title']; ?></a>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <?php
        get_template_part('partials/part-about');

        get_template_part('partials/part-services');

        get_template_part('partials/part-solutions');

        if ($partners__condition) {
            ?>
            <section class="partners background-block">
                <div class="background-block__image">
                    <?php
                        echo wp_get_attachment_image($partners__bg, 'full', null, ['class' => 'image image--pc']);
                    ?>
                </div>

                <div class="container background-block__container">
                    <p class="pretitle partners__pretitle"><?= $partners__pretitle; ?></p>

                    <h2 class="partners__title"><?= $partners__title; ?></h2>

                    <div class="content partners__description"><?= $partners__description; ?></div>

                    <?php
                        if (!empty($partners__link)) {
                            ?>
                            <a class="button button--primary partners__link" href="<?= $partners__link['url']; ?>" <?php getLinkAttrs($partners__link); ?>><?= $partners__link['title']; ?></a>
                            <?php
                        }
                    ?>
                </div>
            </section>
            <?php
        }

        get_template_part('partials/part-cases');

        get_template_part('partials/part-posts');

        get_template_part('partials/part-vacancies');

        get_template_part('partials/global/part-form');
    ?>
</main>
<?php
get_footer();
