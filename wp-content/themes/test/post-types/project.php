<?php

function project_init() {
	register_post_type( 'project', array(
		'labels'            => array(
			'name'                  => __( 'Projects', 'html5blank' ),
			'singular_name'         => __( 'Project', 'html5blank' ),
			'all_items'             => __( 'All Projects', 'html5blank' ),
			'archives'              => __( 'Project Archives', 'html5blank' ),
			'attributes'            => __( 'Project Attributes', 'html5blank' ),
			'insert_into_item'      => __( 'Insert into Project', 'html5blank' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Project', 'html5blank' ),
			'featured_image'        => _x( 'Featured Image', 'project', 'html5blank' ),
			'set_featured_image'    => _x( 'Set featured image', 'project', 'html5blank' ),
			'remove_featured_image' => _x( 'Remove featured image', 'project', 'html5blank' ),
			'use_featured_image'    => _x( 'Use as featured image', 'project', 'html5blank' ),
			'filter_items_list'     => __( 'Filter Projects list', 'html5blank' ),
			'items_list_navigation' => __( 'Projects list navigation', 'html5blank' ),
			'items_list'            => __( 'Projects list', 'html5blank' ),
			'new_item'              => __( 'New Project', 'html5blank' ),
			'add_new'               => __( 'Add New', 'html5blank' ),
			'add_new_item'          => __( 'Add New Project', 'html5blank' ),
			'edit_item'             => __( 'Edit Project', 'html5blank' ),
			'view_item'             => __( 'View Project', 'html5blank' ),
			'view_items'            => __( 'View Projects', 'html5blank' ),
			'search_items'          => __( 'Search Projects', 'html5blank' ),
			'not_found'             => __( 'No Projects found', 'html5blank' ),
			'not_found_in_trash'    => __( 'No Projects found in trash', 'html5blank' ),
			'parent_item_colon'     => __( 'Parent Project:', 'html5blank' ),
			'menu_name'             => __( 'Projects', 'html5blank' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => true,
		'rewrite'           => array( 'slug' => 'portfolio', 'with_front' => false ),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-hammer',
		'show_in_rest'      => true,
		'rest_base'         => 'project',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'project_init' );

function project_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['project'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Project updated. <a target="_blank" href="%s">View Project</a>', 'html5blank'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'html5blank'),
		3 => __('Custom field deleted.', 'html5blank'),
		4 => __('Project updated.', 'html5blank'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s', 'html5blank'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Project published. <a href="%s">View Project</a>', 'html5blank'), esc_url( $permalink ) ),
		7 => __('Project saved.', 'html5blank'),
		8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview Project</a>', 'html5blank'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Project</a>', 'html5blank'),
		// translators: Publish box date format, see https://secure.php.net/manual/en/function.date.php
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview Project</a>', 'html5blank'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'project_updated_messages' );
