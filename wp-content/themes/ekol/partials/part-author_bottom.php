<?php
$author_id       = get_the_author_meta( 'ID' );
$lang            = function_exists( 'pll_current_language' ) ? pll_current_language() : 'uk';
$author_name_en  = get_field( 'author_full_name_en', 'user_' . $author_id );
$author_name     = ( $lang === 'en' && $author_name_en ) ? $author_name_en : get_the_author_meta( 'display_name' );
$author_url      = get_author_posts_url( $author_id );
$author_thumb    = get_field( 'author_photo', 'user_' . $author_id );
$author_position = get_field( 'author_position_' . $lang, 'user_' . $author_id );
$author_bio      = get_the_author_meta( 'description' );
$author_linkedin = get_field( 'author_linkedin', 'user_' . $author_id );
$author_email    = get_the_author_meta( 'user_email' );

$author_posts = get_posts( array(
    'author'         => $author_id,
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'fields'         => 'ids',
) );

$author_categories = array();
if ( ! empty( $author_posts ) ) {
    $author_categories = wp_get_object_terms( $author_posts, 'category', array( 'fields' => 'all' ) );
    if ( ! is_wp_error( $author_categories ) ) {
        // Забезпечуємо унікальність категорій за ID та виключаємо "Без категорії"
        $temp_categories = array();
        foreach ( $author_categories as $cat ) {
            if ( $cat->slug === 'uncategorized' || $cat->slug === 'bez-kategoriyi' || $cat->slug === 'uncategorized-uk' ) {
                continue;
            }
            $temp_categories[ $cat->term_id ] = $cat;
        }
        $author_categories = $temp_categories;
    } else {
        $author_categories = array();
    }
}

$initials = '';
if ( ! empty( $author_name ) ) {
    $words = explode( ' ', $author_name );

    foreach ( $words as $word ) {
        $initials .= mb_substr( $word, 0, 1 );
    }
}
$initials = mb_strtoupper( $initials );
?>

<section class="post-author-card">

    <?php if ( $author_thumb ) : ?>
        <a href="<?php echo esc_url( $author_url ); ?>" class="post-author-card__avatar">
            <img src="<?php echo esc_url( $author_thumb ); ?>"
                 alt="<?php echo esc_attr( $author_name ); ?>"
                 class="post-author-card__avatar-img">
        </a>
    <?php else : ?>
        <a href="<?php echo esc_url( $author_url ); ?>" class="post-author-card__avatar post-author-card__avatar--initials">
            <?php echo esc_html( mb_substr( $author_name, 0, 1 ) ); ?>
        </a>
    <?php endif; ?>

    <div class="post-author-card__info">

        <p class="post-author-card__label"><?php echo pll__( 'Про автора' ); ?></p>

        <a href="<?php echo esc_url( $author_url ); ?>" class="post-author-card__name">
            <?php echo esc_html( $author_name ); ?>
        </a>

        <?php if ( $author_position ) : ?>
            <p class="post-author-card__position">
                <?php echo esc_html( $author_position ) . ' · Ekol Ukraine'; ?>
            </p>
        <?php endif; ?>

        <?php if ( $author_bio ) : ?>
            <p class="post-author-card__bio">
                <?php echo esc_html( $author_bio ); ?>
            </p>
        <?php endif; ?>

        <span class="post-author-card__date">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2"/>
                <path d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
            <?php echo pll__( 'Опубліковано:' ); ?> <strong><?php echo get_the_date( 'j F Y' ); ?></strong>
        </span>

        <?php if ( ! empty( $author_categories ) ) : ?>
            <div class="post-author-card__categories">
                <div class="post-author-card__categories-list">
                    <?php foreach ( $author_categories as $cat ) : ?>
                        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="post-author-card__categories-item">
                            <?php echo esc_html( $cat->name ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="post-author-card__links">
            <?php if ( $author_linkedin ) : ?>
                <a href="<?php echo esc_url( $author_linkedin ); ?>"
                   class="author-card__link author-card__link--linkedin"
                   target="_blank" rel="noopener noreferrer">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <rect x="2" y="2" width="20" height="20" rx="4" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M7 10v7M7 7v.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M11 17v-4c0-1.657 1.343-3 3-3s3 1.343 3 3v4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M11 10v7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    LinkedIn
                </a>
            <?php endif; ?>

            <?php if ( $author_email ) : ?>
                <a href="mailto:<?php echo esc_attr( $author_email ); ?>"
                   class="author-card__link author-card__link--email">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                        <path d="M2 7l10 7 10-7"/>
                    </svg>
                    <?php echo esc_html( $author_email ); ?>
                </a>
            <?php endif; ?>
        </div>

        <a href="<?php echo esc_url( $author_url ) . '#author_articles'; ?>" class="author-card__btn">
            <?php echo pll__( 'Всі статті автора' ); ?>
        </a>

    </div>
</section>