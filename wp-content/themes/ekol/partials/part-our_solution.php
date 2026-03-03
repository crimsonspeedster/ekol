<?php
$our_solution__show_section = get_field('our_solution__show_section');
$our_solution__pretitle = get_field('our_solution__pretitle');
$our_solution__title = get_field('our_solution__title');
$our_solution__description = get_field('our_solution__description');
$our_solution__repeater = get_field('our_solution__repeater');
?>

<?php if ($our_solution__show_section) : ?>

    <section class="our-solution">
        <div class="container">
            <?php if ($our_solution__pretitle) { ?>
                <p class="pretitle our-solution__pretitle"><?= $our_solution__pretitle; ?></p>
            <?php } ?>

            <?php if ($our_solution__title) { ?>
                <h2 class="our-solution__title"><?= $our_solution__title; ?></h2>
            <?php } ?>

            <?php if ($our_solution__description) { ?>
                <div class="content our-solution__description"><?= $our_solution__description; ?></div>
            <?php } ?>

            <?php
            if (!empty($our_solution__repeater)) {
                ?>
                <div class="our-solution-tabs">
                    <?php
                    foreach ($our_solution__repeater as $index => $item)
                    {
                        ?>
                        <div class="h4 our-solution-tab <?= $index === 0 ? 'active' : ''; ?>"><?= $item['tab']; ?></div>
                        <?php
                    }
                    ?>
                </div>

                <div class="our-solution-tabs-content">
                    <?php
                    foreach ($our_solution__repeater as $index => $item) {
                        ?>
                        <div class="our-solution-tab-content <?= $index === 0 ? 'active' : ''; ?>">
                            <div class="our-solution-tab-content__left">
                                <h2 class="our-solution-tab-content__title"><?= $item['title']; ?></h2>

                                <div class="content our-solution-tab-content__description"><?= $item['description']; ?></div>

                                <a href="<?= esc_url( $item['button_link']['url'] ); ?>" class="button button--read preview-solutions__button" target="<?= esc_attr( $item['button_link']['target'] ) ?: '_self'; ?>">
                                    <span><?= esc_html( $item['button_link']['title'] ); ?></span>

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.7504 6V15.75C18.7504 15.9489 18.6714 16.1397 18.5307 16.2803C18.3901 16.421 18.1993 16.5 18.0004 16.5C17.8015 16.5 17.6107 16.421 17.4701 16.2803C17.3294 16.1397 17.2504 15.9489 17.2504 15.75V7.81031L6.53104 18.5306C6.39031 18.6714 6.19944 18.7504 6.00042 18.7504C5.80139 18.7504 5.61052 18.6714 5.46979 18.5306C5.32906 18.3899 5.25 18.199 5.25 18C5.25 17.801 5.32906 17.6101 5.46979 17.4694L16.1901 6.75H8.25042C8.0515 6.75 7.86074 6.67098 7.72009 6.53033C7.57943 6.38968 7.50042 6.19891 7.50042 6C7.50042 5.80109 7.57943 5.61032 7.72009 5.46967C7.86074 5.32902 8.0515 5.25 8.25042 5.25H18.0004C18.1993 5.25 18.3901 5.32902 18.5307 5.46967C18.6714 5.61032 18.7504 5.80109 18.7504 6Z" fill="#023D54"></path>
                                    </svg>
                                </a>
                            </div>

                            <div class="our-solution-tab-content__right">
                                <?= wp_get_attachment_image($item['background_id'], 'full'); ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

<?php endif;?>