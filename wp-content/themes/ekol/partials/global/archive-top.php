<?php
if (empty($args)) {
    return;
}

$title = $args['title'];
$content = $args['content'];
$post_type = $args['post_type'] ?: 'post';
$is_search_enabled = $args['is_search_enabled'];
$terms = $args['terms'];
$main_term = $args['main_term'];

$active_object_id = get_queried_object_id();
?>
<div class="archive-top">
    <div class="archive-top__row">
        <div class="archive-top__left">
            <h1 data-aos="fade-up" class="archive-top__title"><?= $title; ?></h1>

            <?php
                if ($content) {
                    ?>
                    <div data-aos="fade-up" class="content archive-top__content"><?= apply_filters('the_content', $content); ?></div>
                    <?php
                }
            ?>
        </div>

        <?php
            if ($is_search_enabled) {
                ?>
                <form data-aos="fade-up" role="search" class="archive-top-search">
                    <button class="button archive-top-search__button" type="submit">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.5396 20.4795L16.8456 15.7864C18.2061 14.153 18.8845 12.058 18.7397 9.93709C18.5949 7.81622 17.638 5.83283 16.0681 4.3995C14.4982 2.96617 12.4362 2.19326 10.3109 2.24156C8.18566 2.28986 6.16084 3.15565 4.65767 4.65882C3.1545 6.16199 2.28872 8.18681 2.24042 10.3121C2.19212 12.4373 2.96502 14.4994 4.39835 16.0693C5.83168 17.6392 7.81508 18.5961 9.93594 18.7409C12.0568 18.8857 14.1519 18.2072 15.7853 16.8467L20.4784 21.5408C20.5481 21.6105 20.6308 21.6657 20.7218 21.7034C20.8129 21.7412 20.9105 21.7606 21.009 21.7606C21.1076 21.7606 21.2051 21.7412 21.2962 21.7034C21.3872 21.6657 21.4699 21.6105 21.5396 21.5408C21.6093 21.4711 21.6646 21.3884 21.7023 21.2973C21.74 21.2063 21.7594 21.1087 21.7594 21.0102C21.7594 20.9116 21.74 20.814 21.7023 20.723C21.6646 20.6319 21.6093 20.5492 21.5396 20.4795ZM3.759 10.5102C3.759 9.17513 4.15488 7.87008 4.89658 6.76005C5.63828 5.65002 6.69249 4.78486 7.92589 4.27396C9.15929 3.76307 10.5165 3.6294 11.8259 3.88985C13.1352 4.1503 14.338 4.79318 15.282 5.73718C16.226 6.68119 16.8689 7.88392 17.1293 9.19329C17.3898 10.5027 17.2561 11.8599 16.7452 13.0933C16.2343 14.3267 15.3691 15.3809 14.2591 16.1226C13.1491 16.8643 11.844 17.2602 10.509 17.2602C8.7194 17.2582 7.00367 16.5464 5.73822 15.2809C4.47278 14.0155 3.76099 12.2998 3.759 10.5102Z" fill="#80959D"/>
                        </svg>
                    </button>

                    <input class="archive-top-search__input" name="s" type="search" placeholder="<?= pll__('Пошук'); ?>">

                    <input type="hidden" name="post_type" value="<?= $post_type; ?>">
                </form>
                <?php
            }
        ?>
    </div>

    <?php
        if (!empty($terms)) {
            ?>
            <div data-aos="fade-up" class="archive-top__terms">
                <?php
                    if (!empty($main_term)) {
                        if ($main_term['id'] === $active_object_id) {
                            ?>
                            <p class="archive-top-link active"><?= $main_term['title']; ?></p>
                            <?php
                        }
                        else {
                            ?>
                            <a class="archive-top-link" href="<?= $main_term['link']; ?>"><?= $main_term['title']; ?></a>
                            <?php
                        }
                    }

                    foreach ($terms as $term) {
                        if (is_a($term, 'WP_Term')) {
                            if ($term->term_id === $active_object_id) {
                                ?>
                                <p class="archive-top-link active"><?= $term->name; ?></p>
                                <?php
                            }
                            else {
                                ?>
                                <a class="archive-top-link" href="<?= get_term_link($term); ?>"><?= $term->name; ?></a>
                                <?php
                            }
                        }
                    }
                ?>
            </div>
            <?php
        }
    ?>
</div>