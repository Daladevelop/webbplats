<?php

function daladevelop_menu_latest_posts( $items, $menu, $args ) {
    $posts_page = get_option( 'page_for_posts' );
    $menu_order = count( $items );
    $children = array();

    // Go through all menu items.
    foreach ( $items as $item ) {
        if ( $item->object_id === $posts_page ) {
            // Get latest posts.
            $posts = get_posts( array(
                'posts_per_page' => 3
            ) );

            // Add each post to array.
            foreach ( $posts as $post ) {
                $post->menu_item_parent = $item->ID;
                $post->post_type = 'nav_menu_item';
                $post->object = 'custom';
                $post->type = 'posts-item';
                $post->menu_order = ++$menu_order;
                $post->title =
                    '<span class="menu-item-date">' . strtolower( date( 'j F Y', strtotime( $post->post_date ) ) ) . '</span>' .
                    '<span class="menu-item-title">' . $post->post_title . '</span>';
                $post->url = get_permalink( $post->ID );

                $children[] = $post;
            }
        }
    }

    return array_merge( $items, $children );
}

if ( ! is_admin() ) {
    add_filter( 'wp_get_nav_menu_items', 'daladevelop_menu_latest_posts', 10, 3 );
}