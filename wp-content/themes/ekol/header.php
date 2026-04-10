<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<?php
    $common__header_logo = get_field('common__header_logo', 'option');
    $common__header_logo_light = get_field('common__header_logo_light', 'option');
    $common__header_button = get_field('common__header_button', 'option');

    $contacts__phones = get_field('contacts__phones', 'option');
?>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

    <header class="header">
        <div class="container">
            <?php
               if ($common__header_logo) {
                    if (is_front_page()) {
                        ?>
                        <div class="header__logo">
                            <?php
                                echo wp_get_attachment_image($common__header_logo, 'full', null, ['class' => 'header__image header__image--default']);

                                echo wp_get_attachment_image($common__header_logo_light, 'full', null, ['class' => 'header__image header__image--light']);
                            ?>
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <a href="<?= trailingslashit(get_home_url()); ?>" class="header__logo">
                            <?php
                                echo wp_get_attachment_image($common__header_logo, 'full', null, ['class' => 'header__image header__image--default']);

                                echo wp_get_attachment_image($common__header_logo_light, 'full', null, ['class' => 'header__image header__image--light']);
                            ?>
                        </a>
                        <?php
                    }
                }

                if (has_nav_menu('header-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'menu_class' => 'header__menu',
                        'container' => '',
                        'depth' => 2,
                    ));
                }

                if (!empty($common__header_button) || function_exists('pll_the_languages') || !empty($contacts__phones)) {
                    ?>
                    <div class="header__right">
                        <?php
                            if (!empty($contacts__phones)) {
                                $phone_number = $contacts__phones[0]['phone'];
                                $formatted_phone = preg_replace( '/[^0-9]/', '', $phone_number );
                                ?>
                                <a href="<?php echo 'tel:' . $formatted_phone;?>">
                                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="44" height="44" rx="22" fill="#DAF3FD"/>
                                        <path d="M23.5254 12C28.198 12 32 15.802 32 20.4746" stroke="#023D54" stroke-width="1.4" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M23.5254 15.3898C26.3293 15.3898 28.6101 17.6707 28.6101 20.4746" stroke="#023D54" stroke-width="1.4" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M23.5254 18.7796C24.4614 18.7796 25.2203 19.5385 25.2203 20.4746" stroke="#023D54" stroke-width="1.4" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.9426 19.065L17.3529 20.6547C18.1475 21.6934 19.0825 22.8004 20.1411 23.8589C21.1991 24.9169 22.3054 25.8516 23.3456 26.6468L24.935 25.0574C25.5969 24.3955 26.6701 24.3955 27.332 25.0574L30.9274 28.6529L29.1297 30.4506L28.5713 31.0091C27.4458 32.1345 25.6977 32.3194 24.3511 31.4708C22.5764 30.3523 20.0683 28.5801 17.7441 26.256C15.42 23.9319 13.6477 21.4236 12.5293 19.6489C11.6806 18.3024 11.8654 16.5542 12.991 15.4288L13.5494 14.8703L15.3471 13.0726L18.9426 16.668C19.6045 17.3299 19.6045 18.4031 18.9426 19.065Z" stroke="#023D54" stroke-width="1.4" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                                <?php
                            }

                            if (!empty($common__header_button)) {
                                ?>
                                <a href="<?= $common__header_button['url']; ?>" data-form-select="Commercial offer" class="button button--primary header-link" <?php getLinkAttrs($common__header_button); ?>>
                                    <?= $common__header_button['title']; ?>
                                </a>
                                <?php
                            }

                            if (function_exists('pll_the_languages')) {
                                ?>
                                <div class="header-langs">
                                    <div class="header-langs__backdrop"></div>

                                    <svg class="header-langs__title" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.747 9.41505 20.7188 6.93683 18.891 5.109C17.0632 3.28116 14.585 2.25298 12 2.25ZM20.2144 11.25H16.4803C16.3125 7.82719 14.9944 5.40656 13.9134 3.975C15.5918 4.37804 17.102 5.29628 18.2321 6.60095C19.3623 7.90562 20.0558 9.53129 20.2153 11.25H20.2144ZM9.02157 12.75H14.9784C14.7619 16.6509 12.8944 19.0416 12 19.9688C11.1047 19.0406 9.23813 16.65 9.02157 12.75ZM9.02157 11.25C9.23813 7.34906 11.1056 4.95844 12 4.03125C12.8953 4.96219 14.7619 7.35281 14.9784 11.25H9.02157ZM10.0866 3.975C9.00563 5.40656 7.6875 7.82719 7.51969 11.25H3.78469C3.94425 9.53129 4.63773 7.90562 5.76788 6.60095C6.89803 5.29628 8.40818 4.37804 10.0866 3.975ZM3.78469 12.75H7.51969C7.69032 16.1728 9.00563 18.5934 10.0866 20.025C8.40818 19.622 6.89803 18.7037 5.76788 17.399C4.63773 16.0944 3.94425 14.4687 3.78469 12.75ZM13.9097 20.025C14.9906 18.5934 16.3059 16.1728 16.4766 12.75H20.2116C20.0522 14.4682 19.3593 16.0935 18.2299 17.3981C17.1005 18.7027 15.5911 19.6213 13.9134 20.025H13.9097Z" fill="#023D54"/>
                                    </svg>

                                    <ul class="header-langs__list">
                                        <?php
                                        pll_the_languages([
                                                'echo' => 1,
                                        ]);
                                        ?>
                                    </ul>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                }

                if (has_nav_menu('header-mobile-menu')) {
                    ?>
                    <div class="header-button">
                        <div class="header-button__mini">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>

        <?php
            if (has_nav_menu('header-mobile-menu')) {
                ?>
                <div class="header-sidebar">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'header-mobile-menu',
                            'menu_class' => 'header-sidebar__menu',
                            'container' => '',
                            'walker' => new Mobile_Walker_Nav_Menu(),
                            'depth' => 2,
                        ));

                        if (!empty($common__header_button) || function_exists('pll_the_languages') || !empty($contacts__phones)) {
                            ?>
                            <div class="header__right">
                                <?php
                                    if (!empty($contacts__phones)) {
                                        $phone_number = $contacts__phones[0]['phone'];
                                        $formatted_phone = preg_replace( '/[^0-9]/', '', $phone_number );
                                        ?>
                                        <a href="<?php echo 'tel:' . $formatted_phone;?>">
                                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="44" height="44" rx="22" fill="#DAF3FD"/>
                                                <path d="M23.5254 12C28.198 12 32 15.802 32 20.4746" stroke="#023D54" stroke-width="1.4" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M23.5254 15.3898C26.3293 15.3898 28.6101 17.6707 28.6101 20.4746" stroke="#023D54" stroke-width="1.4" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M23.5254 18.7796C24.4614 18.7796 25.2203 19.5385 25.2203 20.4746" stroke="#023D54" stroke-width="1.4" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M18.9426 19.065L17.3529 20.6547C18.1475 21.6934 19.0825 22.8004 20.1411 23.8589C21.1991 24.9169 22.3054 25.8516 23.3456 26.6468L24.935 25.0574C25.5969 24.3955 26.6701 24.3955 27.332 25.0574L30.9274 28.6529L29.1297 30.4506L28.5713 31.0091C27.4458 32.1345 25.6977 32.3194 24.3511 31.4708C22.5764 30.3523 20.0683 28.5801 17.7441 26.256C15.42 23.9319 13.6477 21.4236 12.5293 19.6489C11.6806 18.3024 11.8654 16.5542 12.991 15.4288L13.5494 14.8703L15.3471 13.0726L18.9426 16.668C19.6045 17.3299 19.6045 18.4031 18.9426 19.065Z" stroke="#023D54" stroke-width="1.4" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <?php
                                    }

                                    if (!empty($common__header_button)) {
                                        ?>
                                        <a href="<?= $common__header_button['url']; ?>" data-form-select="Commercial offer" class="button button--primary header-link" <?php getLinkAttrs($common__header_button); ?>>
                                            <?= $common__header_button['title']; ?>
                                        </a>
                                        <?php
                                    }

                                    if (function_exists('pll_the_languages')) {
                                        ?>
                                        <div class="header-langs">
                                            <div class="header-langs__backdrop"></div>

                                            <svg class="header-langs__title" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.747 9.41505 20.7188 6.93683 18.891 5.109C17.0632 3.28116 14.585 2.25298 12 2.25ZM20.2144 11.25H16.4803C16.3125 7.82719 14.9944 5.40656 13.9134 3.975C15.5918 4.37804 17.102 5.29628 18.2321 6.60095C19.3623 7.90562 20.0558 9.53129 20.2153 11.25H20.2144ZM9.02157 12.75H14.9784C14.7619 16.6509 12.8944 19.0416 12 19.9688C11.1047 19.0406 9.23813 16.65 9.02157 12.75ZM9.02157 11.25C9.23813 7.34906 11.1056 4.95844 12 4.03125C12.8953 4.96219 14.7619 7.35281 14.9784 11.25H9.02157ZM10.0866 3.975C9.00563 5.40656 7.6875 7.82719 7.51969 11.25H3.78469C3.94425 9.53129 4.63773 7.90562 5.76788 6.60095C6.89803 5.29628 8.40818 4.37804 10.0866 3.975ZM3.78469 12.75H7.51969C7.69032 16.1728 9.00563 18.5934 10.0866 20.025C8.40818 19.622 6.89803 18.7037 5.76788 17.399C4.63773 16.0944 3.94425 14.4687 3.78469 12.75ZM13.9097 20.025C14.9906 18.5934 16.3059 16.1728 16.4766 12.75H20.2116C20.0522 14.4682 19.3593 16.0935 18.2299 17.3981C17.1005 18.7027 15.5911 19.6213 13.9134 20.025H13.9097Z" fill="#023D54"/>
                                            </svg>

                                            <ul class="header-langs__list">
                                                <?php
                                                pll_the_languages([
                                                        'echo' => 1,
                                                ]);
                                                ?>
                                            </ul>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </div>
                <?php
            }
        ?>
    </header>
