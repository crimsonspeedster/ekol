<?php
$terms = get_the_terms(get_the_ID(), 'services_cat');
?>

<div class="preview-services_big">
    <div class="preview-services_big__left">
        <a href="<?php the_permalink(); ?>" class="h3 preview-services_big__title"><?php the_title(); ?></a>

        <?php
            if (has_excerpt()) {
                ?>
                <div class="content preview-services_big__description"><?php the_excerpt(); ?></div>
                <?php
            }
        ?>

        <a href="<?php the_permalink(); ?>" class="button button--primary preview-services_big__link"><?= pll__('Дізнатись більше'); ?></a>
    </div>

    <a href="<?php the_permalink(); ?>"  class="preview-services_big__img">
        <?php getPostThumbnail(get_the_ID()); ?>
    </a>
</div>