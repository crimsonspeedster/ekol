<?php

function getLinkAttrs (array $link) : void {
    if (!empty($link['target']) && $link['target'] === '_blank')
        echo 'rel="nofollow noopener noindex" target="_blank"';
}

function getPostThumbnail (int|false|null $post_id, string $classes = '') : void {
    $title = pll__('Немає зображення');

    if ($post_id) {
        $title = get_the_title($post_id);
    }

    if (get_the_post_thumbnail($post_id)) {
        echo get_the_post_thumbnail($post_id, 'full', ['class' => $classes]);
    }
    else {
        ?>
        <img src="<?= get_template_directory_uri(); ?>/dist/img/no_image_placeholder.jpg" alt="<?= esc_attr($title); ?>" class="<?= esc_attr($classes); ?>">
        <?php
    }
}

function get_reading_time (int|null $post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $content = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( wp_strip_all_tags( $content ) );
    $words_per_minute = 200;

    return ceil( $word_count / $words_per_minute );
}

function getPhoneString (string $string) : string {
    return preg_replace('/\D/', '', $string);
}

function getNumberHelperIcon (string $type) : string {
    switch ($type) {
        case 'plus':
            return '
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28 16C28 16.2652 27.8946 16.5196 27.7071 16.7071C27.5196 16.8946 27.2652 17 27 17H17V27C17 27.2652 16.8946 27.5196 16.7071 27.7071C16.5196 27.8946 16.2652 28 16 28C15.7348 28 15.4804 27.8946 15.2929 27.7071C15.1054 27.5196 15 27.2652 15 27V17H5C4.73478 17 4.48043 16.8946 4.29289 16.7071C4.10536 16.5196 4 16.2652 4 16C4 15.7348 4.10536 15.4804 4.29289 15.2929C4.48043 15.1054 4.73478 15 5 15H15V5C15 4.73478 15.1054 4.48043 15.2929 4.29289C15.4804 4.10536 15.7348 4 16 4C16.2652 4 16.5196 4.10536 16.7071 4.29289C16.8946 4.48043 17 4.73478 17 5V15H27C27.2652 15 27.5196 15.1054 27.7071 15.2929C27.8946 15.4804 28 15.7348 28 16Z" fill="#06AEEF"/>
                </svg>
            ';
        case 'percent':
            return '
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.7078 7.70497L7.70779 25.705C7.52015 25.8926 7.26566 25.998 7.00029 25.998C6.73493 25.998 6.48043 25.8926 6.29279 25.705C6.10515 25.5173 5.99974 25.2628 5.99974 24.9975C5.99974 24.7321 6.10515 24.4776 6.29279 24.29L24.2928 6.28997C24.4803 6.10233 24.7346 5.99685 24.9999 5.99673C25.2651 5.99661 25.5195 6.10187 25.7072 6.28935C25.8948 6.47682 26.0003 6.73116 26.0004 6.9964C26.0005 7.26165 25.8953 7.51608 25.7078 7.70372V7.70497ZM6.31779 12.68C5.47391 11.8359 4.99988 10.6912 5 9.49765C5.00012 8.3041 5.47437 7.15948 6.31842 6.3156C7.16247 5.47171 8.30718 4.99769 9.50073 4.9978C10.6943 4.99792 11.8389 5.47217 12.6828 6.31622C13.5267 7.16027 14.0007 8.30499 14.0006 9.49854C14.0005 10.6921 13.5262 11.8367 12.6822 12.6806C11.8381 13.5245 10.6934 13.9985 9.49985 13.9984C8.3063 13.9983 7.16168 13.524 6.31779 12.68ZM7.00029 9.49997C7.00062 9.91103 7.10229 10.3157 7.29632 10.6781C7.49035 11.0404 7.77074 11.3494 8.11267 11.5775C8.4546 11.8057 8.84751 11.946 9.25661 11.9861C9.66572 12.0262 10.0784 11.9647 10.4581 11.8073C10.8378 11.6498 11.1728 11.4011 11.4334 11.0832C11.6941 10.7654 11.8723 10.3882 11.9524 9.98497C12.0325 9.58178 12.0119 9.16507 11.8925 8.77174C11.7731 8.37841 11.5585 8.02059 11.2678 7.72997C10.918 7.3803 10.4724 7.14223 9.98726 7.04589C9.50214 6.94955 8.99935 6.99927 8.5425 7.18875C8.08565 7.37824 7.69527 7.69898 7.42075 8.11038C7.14623 8.52179 6.9999 9.00538 7.00029 9.49997ZM27.0003 22.5C27.0001 23.5411 26.6388 24.5499 25.9782 25.3545C25.3176 26.1591 24.3984 26.7098 23.3773 26.9127C22.3561 27.1155 21.2962 26.9581 20.3782 26.4671C19.4601 25.9762 18.7407 25.1821 18.3425 24.2202C17.9443 23.2583 17.8919 22.188 18.1943 21.1918C18.4967 20.1956 19.1352 19.3351 20.0009 18.7569C20.8666 18.1786 21.9061 17.9185 22.9421 18.0207C23.9782 18.1229 24.9468 18.5812 25.6828 19.3175C26.102 19.7344 26.4342 20.2304 26.6604 20.7767C26.8865 21.323 27.0021 21.9087 27.0003 22.5ZM25.0003 22.5C25.0004 21.9216 24.8 21.361 24.4331 20.9139C24.0663 20.4667 23.5558 20.1605 22.9885 20.0476C22.4212 19.9346 21.8324 20.0219 21.3222 20.2944C20.8121 20.567 20.4122 21.008 20.1908 21.5423C19.9693 22.0766 19.94 22.6712 20.1078 23.2247C20.2756 23.7782 20.6302 24.2565 21.111 24.5779C21.5919 24.8993 22.1693 25.044 22.7449 24.9874C23.3206 24.9308 23.8587 24.6764 24.2678 24.2675C24.5007 24.0359 24.6853 23.7605 24.8111 23.4571C24.9368 23.1537 25.0011 22.8284 25.0003 22.5Z" fill="#06AEEF"/>
                </svg>
            ';
        default:
            return '';
    }
}

function remove_wp_version_strings(string $src) : string {
    if (strpos( $src, 'ver='))
        $src = remove_query_arg( 'ver', $src );

    return $src;
}

class Mobile_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output  = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';

        if ( in_array( 'menu-item-has-children', $classes ) ) {
            $item_output .= '
                <svg class="menu-item__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.96979 14.97L11.4698 7.46996C11.5394 7.40023 11.6222 7.34491 11.7132 7.30717C11.8043 7.26943 11.9019 7.25 12.0004 7.25C12.099 7.25 12.1966 7.26943 12.2876 7.30717C12.3787 7.34491 12.4614 7.40023 12.531 7.46996L20.031 14.97C20.1718 15.1107 20.2508 15.3016 20.2508 15.5006C20.2508 15.6996 20.1718 15.8905 20.031 16.0312C19.8903 16.1719 19.6994 16.251 19.5004 16.251C19.3014 16.251 19.1105 16.1719 18.9698 16.0312L12.0004 9.0609L5.03104 16.0312C4.96136 16.1009 4.87863 16.1562 4.78759 16.1939C4.69655 16.2316 4.59896 16.251 4.50042 16.251C4.40187 16.251 4.30429 16.2316 4.21325 16.1939C4.1222 16.1562 4.03948 16.1009 3.96979 16.0312C3.90011 15.9615 3.84484 15.8788 3.80712 15.7878C3.76941 15.6967 3.75 15.5991 3.75 15.5006C3.75 15.402 3.76941 15.3045 3.80712 15.2134C3.84484 15.1224 3.90011 15.0396 3.96979 14.97Z" fill="#06AEEF"/>
                </svg>
            ';
        }

        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}