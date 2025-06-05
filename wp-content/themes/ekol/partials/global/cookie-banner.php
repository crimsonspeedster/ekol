<?php
if (isset($_COOKIE['cookie_banner']) && $_COOKIE['cookie_banner'] === 'hide')
    return;
?>
<div class="cookie-banner">
    <div class="cookie-banner__backdrop" data-banner-close="true"></div>

    <div class="cookie-banner__block">
        <button class="button cookie-banner__close" data-banner-close="true">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.2039 17.9991C19.2736 18.0688 19.3289 18.1515 19.3666 18.2425C19.4043 18.3336 19.4237 18.4312 19.4237 18.5297C19.4237 18.6283 19.4043 18.7258 19.3666 18.8169C19.3289 18.9079 19.2736 18.9907 19.2039 19.0603C19.1342 19.13 19.0515 19.1853 18.9604 19.223C18.8694 19.2607 18.7718 19.2801 18.6733 19.2801C18.5747 19.2801 18.4771 19.2607 18.3861 19.223C18.2951 19.1853 18.2123 19.13 18.1426 19.0603L11.9233 12.84L5.70389 19.0603C5.56316 19.2011 5.37229 19.2801 5.17327 19.2801C4.97425 19.2801 4.78337 19.2011 4.64264 19.0603C4.50191 18.9196 4.42285 18.7287 4.42285 18.5297C4.42285 18.3307 4.50191 18.1398 4.64264 17.9991L10.863 11.7797L4.64264 5.56034C4.50191 5.41961 4.42285 5.22874 4.42285 5.02971C4.42285 4.83069 4.50191 4.63982 4.64264 4.49909C4.78337 4.35836 4.97425 4.2793 5.17327 4.2793C5.37229 4.2793 5.56316 4.35836 5.70389 4.49909L11.9233 10.7194L18.1426 4.49909C18.2834 4.35836 18.4742 4.2793 18.6733 4.2793C18.8723 4.2793 19.0632 4.35836 19.2039 4.49909C19.3446 4.63982 19.4237 4.83069 19.4237 5.02971C19.4237 5.22874 19.3446 5.41961 19.2039 5.56034L12.9836 11.7797L19.2039 17.9991Z" fill="#023D54"/>
            </svg>
        </button>

        <div class="cookie-banner__image">
            <img src="<?= get_template_directory_uri(); ?>/dist/img/cookie_banner.svg" alt="cookie" width="96" height="96">
        </div>

        <p class="cookie-banner__title"><?= pll__('Файли cookie'); ?></p>

        <div class="cookie-banner__text">
            <p><?= pll__('Наш веб-сайт використовує файли cookie. Продовжуючи, ми вважаємо, що ви даєте згоду на використання файлів cookie, як зазначено в нашій Політиці конфіденційності.'); ?></p>
        </div>

        <div class="cookie-banner__buttons">
            <button class="button button--primary cookie-banner__button cookie-banner__button--primary" data-banner-close="true"><?= pll__('Прийняти файли cookie'); ?></button>

            <button class="button cookie-banner__button cookie-banner__button--cancel" data-banner-close="true"><?= pll__('Відхилити'); ?></button>
        </div>
    </div>
</div>
