<?php

function daladevelop_custom_post_types() {
	register_post_type( 'evenemang', array(
		'labels' => array(
			'name' => 'Evenemang',
			'singular_name' => 'Evenemang',
			'add_new' => 'Lägg till nytt',
			'add_new_item' => 'Lägg till nytt evenemang',
			'edit_item' => 'Redigera evenemang',
			'new_item' => 'Ny evenemang',
			'view_item' => 'Visa evenemang',
			'search_items' => 'Sök evenemang',
			'not_found' =>  'Inga evenemang hittades',
			'not_found_in_trash' => 'Inga evenemang hittades i papperskorgen'
		),
		'public' => true,
		'exclude_from_search' => false,
		'query_var' => true,
		'has_archive' => true,
		'rewrite' => array( 'slug' => 'evenemang' ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'show_in_nav_menus' => false,
		'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' )
	) );

    register_post_type( 'partner', array(
        'labels' => array(
            'name' => 'Partners',
            'singular_name' => 'Partner',
            'add_new' => 'Lägg till nytt',
            'add_new_item' => 'Lägg till nytt partner',
            'edit_item' => 'Redigera partner',
            'new_item' => 'Ny partner',
            'view_item' => 'Visa partner',
            'search_items' => 'Sök partners',
            'not_found' =>  'Inga partners hittades',
            'not_found_in_trash' => 'Inga partners hittades i papperskorgen'
        ),
        'public' => true,
        'exclude_from_search' => false,
        'query_var' => true,
        'has_archive' => false,
        'rewrite' => array( 'slug' => 'partner' ),
        'capability_type' => 'post',
        'hierarchical' => false,
        'show_in_nav_menus' => false,
        'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' )
    ) );

	register_taxonomy( 'evenemangskategori', array( 'evenemang' ), array(
		'hierarchical' => false,
		'labels' => array(
			'name' => 'Kategorier',
			'singular_name' => 'Kategori',
			'search_items' => 'Sök kategorier',
			'popular_items' => 'Populära kategorier',
			'all_items' => 'Alla kategorier',
			'edit_item' => 'Redigera kategori',
			'update_item' => 'Uppdatera kategori',
			'add_new_item' => 'Lägg till ny kategori',
			'new_item_name' => 'Ny kategori',
			'separate_items_with_commas' => 'Separera flera kategorier med komma',
			'add_or_remove_items' => 'Lägg till och ta bort kategorier',
			'choose_from_most_used' => 'Välj bland de vanligaste kategorierna',
			'not_found' => 'Inga kategorier hittades',
			'menu_name' => 'Kategorier'
		),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'evenemangskategori' ),
	) );
}
add_action( 'init', 'daladevelop_custom_post_types' );