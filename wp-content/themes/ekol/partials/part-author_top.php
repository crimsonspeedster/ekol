<?php
$author_id = get_the_author_meta('ID');
$author_name = get_the_author();

$lang = function_exists('pll_current_language') ? pll_current_language() : 'uk';

if ( $lang === 'en' ) {
    $en_name = get_field('author_full_name_en', 'user_' . $author_id);
    if ( $en_name ) {
        $author_name = $en_name;
    }
}

$author_url = get_author_posts_url($author_id);
$author_thumb = get_field('author_photo', 'user_' . $author_id);
$author_position = get_field('author_position_' . $lang, 'user_' . $author_id);

$initials = '';
if ( ! empty( $author_name ) ) {
    $words = explode( ' ', $author_name );

    foreach ( $words as $word ) {
        $initials .= mb_substr( $word, 0, 1 );
    }
}
$initials = mb_strtoupper( $initials );
?>
<section class="post-author-row">

    <?php if ( $author_thumb ) : ?>
        <a href="<?php echo esc_url( $author_url ); ?>" class="post-author-row__avatar">
            <img src="<?php echo esc_url( $author_thumb ); ?>"
                 alt="<?php echo esc_attr( $author_name ); ?>"
                 class="post-author-row__avatar-img">
        </a>
    <?php else : ?>
        <a href="<?php echo esc_url( $author_url ); ?>" class="post-author-row__avatar post-author-row__avatar--initials">
            <?php echo esc_html( $initials ); ?>
        </a>
    <?php endif; ?>

    <div class="post-author-row__info">
        <span class="post-author-row__label"><?= pll__('Автор'); ?></span>
        <a href="<?php echo esc_url( $author_url ); ?>" class="post-author-row__name">
            <?php echo esc_html( $author_name ); ?>
        </a>
        <?php if ( $author_position ) : ?>
            <span class="post-author-row__position">
                <?php echo esc_html( $author_position ) . ' · Ekol Ukraine'; ?>
            </span>
        <?php endif; ?>
    </div>

    <div class="post-author-row__date">
        <span class="post-author-row__date-label"><?= pll__('Дата публікації'); ?></span>
        <span class="post-author-row__date-value">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2"/>
                <path d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
            <?php echo get_the_date( 'j F Y' ); ?>
        </span>
        <?php if ( get_the_modified_date( 'U' ) !== get_the_date( 'U' ) ) : ?>
            <span class="post-author-row__date-updated">
                <?= pll__('Оновлено:'); ?> <?php echo get_the_modified_date( 'd.m.Y' ); ?>
            </span>
        <?php endif; ?>
    </div>

</section>