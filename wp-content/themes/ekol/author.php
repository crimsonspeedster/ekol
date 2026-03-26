<?php
/**
 * Template: Standard Author Page
 * 
 * WordPress automatically uses this file for the author archive page.
 */

get_header();

$author    = get_queried_object();
$author_id = $author->ID;

// ACF fields attached to the user profile
$lang     = function_exists('pll_current_language') ? pll_current_language() : 'uk';
$position = get_field('author_position_' . $lang, 'user_' . $author_id);
$linkedin = get_field('author_linkedin', 'user_' . $author_id);

// Standard WordPress user fields
$bio   = $author->description;
$email = $author->user_email;
$name  = $author->display_name;

if ( $lang === 'en' ) {
    $en_name = get_field('author_full_name_en', 'user_' . $author_id);
    if ( $en_name ) {
        $name = $en_name;
    }
}

$photo = get_field('author_photo', 'user_' . $author_id);

$initials = '';
if ( ! empty( $name ) ) {
    $words = explode( ' ', $name );

    foreach ( $words as $word ) {
        $initials .= mb_substr( $word, 0, 1 );
    }
}
$initials = mb_strtoupper( $initials );

// Articles by this author
$articles = new WP_Query(array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 6,
    'author'         => $author_id,
));
?>

<main class="ekol-author-single">

    <!-- ══ HERO ══════════════════════════════════════════════ -->
    <section class="author-single__hero">
        <div class="author-single__hero-stripe"></div>
        <div class="author-single__container">
            <div class="author-single__hero-body">

                <!-- LEFT: photo + stats + social -->
                <div class="author-single__left">

                    <div class="author-single__avatar-ring">
                        <?php if ( $photo ) : ?>
                            <img src="<?php echo esc_url( $photo ); ?>"
                                 alt="<?php echo esc_attr( $name ); ?>"
                                 class="author-single__avatar-img">
                        <?php else : ?>
                            <div class="author-single__avatar-initials">
                                <?php echo esc_html( $initials ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Stats -->
                    <div class="author-single__stats">
                        <div class="author-single__stat">
                            <span class="author-single__stat-num">
                                <?php echo count_user_posts( $author_id ); ?>
                            </span>
                            <span class="author-single__stat-lbl"><?= pll__('Статті'); ?></span>
                        </div>
                    </div>

                    <!-- Social -->
                    <div class="author-single__social">
                        <?php if ( $linkedin ) : ?>
                            <a href="<?php echo esc_url( $linkedin ); ?>"
                               class="author-single__soc"
                               target="_blank" rel="noopener noreferrer"
                               title="LinkedIn">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                    <rect x="2" y="2" width="20" height="20" rx="4" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M7 10v7M7 7v.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M11 17v-4c0-1.657 1.343-3 3-3s3 1.343 3 3v4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M11 10v7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if ( $email ) : ?>
                            <a href="mailto:<?php echo esc_attr( $email ); ?>"
                               class="author-single__soc"
                               title="Email">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <path d="M2 7l10 7 10-7"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>

                </div><!-- /left -->

                <!-- RIGHT: info -->
                <div class="author-single__right">

                    <!-- Badge + CTA -->
                    <div class="author-single__top-row">
                        <span class="author-single__badge">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2a5 5 0 100 10A5 5 0 0012 2zm0 12c-5.33 0-8 2.67-8 4v2h16v-2c0-1.33-2.67-4-8-4z"/>
                            </svg>
                            <?= pll__('Автор блогу · Ekol Ukraine'); ?>
                        </span>
                        <?php if ( $email ) : ?>
                            <a href="mailto:<?php echo esc_attr( $email ); ?>" class="author-card__btn">
                                <?= pll__('Написати автору'); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <h1 class="author-single__name"><?php echo esc_html( $name ); ?></h1>

                    <?php if ( $position ) : ?>
                        <p class="author-single__position"><?php echo esc_html( $position ); ?></p>
                        <div class="author-single__divider"></div>
                    <?php endif; ?>

                    <?php if ( $bio ) : ?>
                        <p class="author-single__bio"><?php echo esc_html( $bio ); ?></p>
                    <?php endif; ?>

                </div><!-- /right -->

            </div><!-- /hero-body -->
        </div>
    </section>

    <!-- ══ ARTICLES ══════════════════════════════════════════ -->
    <?php if ( $articles->have_posts() ) : ?>
        <section class="author-single__articles" id="author_articles">
            <div class="author-single__container">

                <div class="author-single__section-hdr">
                    <h2 class="author-single__section-title">
                        <?= pll__('Статті <span>автора</span>'); ?>
                    </h2>
                    <a href="<?php echo esc_url( home_url('/blog/') ); ?>"
                       class="author-single__see-all">
                        <?= pll__('Всі статті блогу'); ?>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <div class="author-single__articles-grid">
                    <?php while ( $articles->have_posts() ) : $articles->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="author-single__art-card">
                            <div class="author-single__art-thumb">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('medium', ['class' => 'author-single__art-img']); ?>
                                <?php else : ?>
                                    <div class="author-single__art-placeholder">📄</div>
                                <?php endif; ?>
                            </div>
                            <div class="author-single__art-body">
                                <?php
                                $cats = get_the_category();
                                if ( $cats ) : ?>
                                    <span class="author-single__art-cat">
                                    <?php echo esc_html( $cats[0]->name ); ?>
                                </span>
                                <?php endif; ?>
                                <p class="author-single__art-title"><?php the_title(); ?></p>
                                <div class="author-single__art-meta">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <path d="M12 6v6l4 2"/>
                                    </svg>
                                    <?php echo get_the_date('j F Y'); ?>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>

            </div>
        </section>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
