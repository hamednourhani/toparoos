<?php
/* itstar Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/itstar/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'itstar_flush_rewrite_rules' );

// Flush your rewrite rules
function itstar_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function video_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'video', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'video', 'itstar' ), /* This is the Title of the Group */
			'singular_name' => __( 'video', 'itstar' ), /* This is the individual type */
			'all_items' => __( 'All videos', 'itstar' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'itstar' ), /* The add new menu item */
			'add_new_item' => __( 'Add New videos', 'itstar' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'itstar' ), /* Edit Dialog */
			'edit_item' => __( 'Edit video', 'itstar' ), /* Edit Display Title */
			'new_item' => __( 'New video', 'itstar' ), /* New Display Title */
			'view_item' => __( 'View video', 'itstar' ), /* View Display Title */
			'search_items' => __( 'Search videos', 'itstar' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'itstar' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'itstar' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is a video', 'itstar' ), /* Custom Type Description */
			'public' => true,
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/images/video-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'video', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'video', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', /*'editor', 'author',*/ 'thumbnail', 'excerpt', /*'trackbacks', 'custom-fields','comments','revisions','sticky'*/)
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type( 'category', 'tour' );
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type( 'post_tag', 'tour' );
	register_taxonomy( 'video_cat',
		array('video'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'video Categories', 'itstar' ), /* name of the custom taxonomy */
				'singular_name' => __( 'video Category', 'itstar' ), /* single taxonomy name */
				'search_items' =>  __( 'Search video Categories', 'itstar' ), /* search title for taxomony */
				'all_items' => __( 'All video Categories', 'itstar' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent video Category', 'itstar' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent video Category:', 'itstar' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit video Category', 'itstar' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update video Category', 'itstar' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New video Category', 'itstar' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New video Category Name', 'itstar' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'video-cat' ),
			'show_in_nav_menus' => true,
		)
	);


	// now let's add custom tags (these act like categories)
	register_taxonomy( 'video_tag',
		array('video'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'video Tags', 'itstar' ), /* name of the custom taxonomy */
				'singular_name' => __( 'video Tag', 'itstar' ), /* single taxonomy name */
				'search_items' =>  __( 'Search video Tags', 'itstar' ), /* search title for taxomony */
				'all_items' => __( 'All video Tags', 'itstar' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent video Tag', 'itstar' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent video Tag:', 'itstar' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit video Tag', 'itstar' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update video Tag', 'itstar' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New video Tag', 'itstar' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New video Tag Name', 'itstar' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'show_in_nav_menus' => true,
		)
	);

	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'video_post_type');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)


function slide_post_type() {
	// creating (registering) the custom type
	register_post_type( 'slide', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'slide', 'itstar' ), /* This is the Title of the Group */
			'singular_name' => __( 'slide', 'itstar' ), /* This is the individual type */
			'all_items' => __( 'All slides', 'itstar' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'itstar' ), /* The add new menu item */
			'add_new_item' => __( 'Add New slides', 'itstar' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'itstar' ), /* Edit Dialog */
			'edit_item' => __( 'Edit slide', 'itstar' ), /* Edit Display Title */
			'new_item' => __( 'New slide', 'itstar' ), /* New Display Title */
			'view_item' => __( 'View slide', 'itstar' ), /* View Display Title */
			'search_items' => __( 'Search slides', 'itstar' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'itstar' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'itstar' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
		), /* end of arrays */
			'description' => __( 'This is a slide', 'itstar' ), /* Custom Type Description */
			'public' => true,
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/images/slide-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'slide', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'slide', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', /*'editor','author',*/ 'thumbnail', 'excerpt', /*'trackbacks', 'custom-fields','comments','revisions','sticky'*/)
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type( 'category', 'tour' );
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type( 'post_tag', 'tour' );


}

add_action( 'init', 'slide_post_type');

register_taxonomy( 'slide_cat',
	array('slide'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'slide Categories', 'itstar' ), /* name of the custom taxonomy */
			'singular_name' => __( 'slide slide', 'itstar' ), /* single taxonomy name */
			'search_items' =>  __( 'Search slide Categories', 'itstar' ), /* search title for taxomony */
			'all_items' => __( 'All slide Categories', 'itstar' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent slide Category', 'itstar' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent slide Category:', 'itstar' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit slide Category', 'itstar' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update slide Category', 'itstar' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New slide Category', 'itstar' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New slide Category Name', 'itstar' ) /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'slide-cat' ),
		'show_in_nav_menus' => true,
	)
);

function item_post_type() {
	// creating (registering) the custom type
	register_post_type( 'item', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'item', 'itstar' ), /* This is the Title of the Group */
			'singular_name' => __( 'item', 'itstar' ), /* This is the individual type */
			'all_items' => __( 'All items', 'itstar' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'itstar' ), /* The add new menu item */
			'add_new_item' => __( 'Add New items', 'itstar' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'itstar' ), /* Edit Dialog */
			'edit_item' => __( 'Edit item', 'itstar' ), /* Edit Display Title */
			'new_item' => __( 'New item', 'itstar' ), /* New Display Title */
			'view_item' => __( 'View item', 'itstar' ), /* View Display Title */
			'search_items' => __( 'Search items', 'itstar' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'itstar' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'itstar' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
		), /* end of arrays */
			'description' => __( 'This is a item', 'itstar' ), /* Custom Type Description */
			'public' => true,
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/images/item-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'item', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'item', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', /*'editor','author',*/ 'thumbnail', 'excerpt', /*'trackbacks', 'custom-fields','comments','revisions','sticky'*/)
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type( 'category', 'tour' );
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type( 'post_tag', 'tour' );


}
add_action( 'init', 'item_post_type');

register_taxonomy( 'item_cat',
	array('item'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'item Categories', 'itstar' ), /* name of the custom taxonomy */
			'singular_name' => __( 'item item', 'itstar' ), /* single taxonomy name */
			'search_items' =>  __( 'Search item Categories', 'itstar' ), /* search title for taxomony */
			'all_items' => __( 'All item Categories', 'itstar' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent item Category', 'itstar' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent item Category:', 'itstar' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit item Category', 'itstar' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update item Category', 'itstar' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New item Category', 'itstar' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New item Category Name', 'itstar' ) /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'item-cat' ),
		'show_in_nav_menus' => true,
	)
);

?>