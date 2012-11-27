<?php
/**
 * Remove default <head> junk
 */
remove_action ('wp_head', 'rsd_link');
remove_action ('wp_head', 'wlwmanifest_link');
remove_action ('wp_head', 'wp_generator');
remove_action ('wp_head', 'feed_links_extra', 3);
remove_action ('wp_head', 'feed_links', 2);
remove_action ('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action ('wp_head', 'rel_canonical');
function disablePostLinks () { return false; }
add_filter ('index_rel_link', 'disablePostLinks');
add_filter ('parent_post_rel_link', 'disablePostLinks');
add_filter ('start_post_rel_link', 'disablePostLinks');
add_filter ('previous_post_rel_link', 'disablePostLinks');
add_filter ('next_post_rel_link', 'disablePostLinks');

/**
 * Disable admin bar
 */
add_filter ('show_admin_bar', '__return_false');

/**
 * Remove auto-p
 */
remove_filter ('the_content', 'wpautop');

/**
 * Bootstrap styles and scripts
 */
wp_register_style ('bootstrap', get_template_directory_uri () . '/bootstrap.less');
wp_register_style ('fontawesome', get_template_directory_uri () . '/Font-Awesome/css/font-awesome.css');
wp_register_script ('bootstrap-tooltip', get_template_directory_uri () . '/bootstrap/js/bootstrap-tooltip.js');
wp_register_script ('bootstrap-affix', get_template_directory_uri () . '/bootstrap/js/bootstrap-affix.js');
wp_register_script ('bootstrap-alert', get_template_directory_uri () . '/bootstrap/js/bootstrap-alert.js');
wp_register_script ('bootstrap-button', get_template_directory_uri () . '/bootstrap/js/bootstrap-button.js');
wp_register_script ('bootstrap-carousel', get_template_directory_uri () . '/bootstrap/js/bootstrap-carousel.js');
wp_register_script ('bootstrap-collapse', get_template_directory_uri () . '/bootstrap/js/bootstrap-collapse.js');
wp_register_script ('bootstrap-dropdown', get_template_directory_uri () . '/bootstrap/js/bootstrap-dropdown.js');
wp_register_script ('bootstrap-modal', get_template_directory_uri () . '/bootstrap/js/bootstrap-modal.js');
wp_register_script ('bootstrap-popover', get_template_directory_uri () . '/bootstrap/js/bootstrap-popover.js');
wp_register_script ('bootstrap-scrollspy', get_template_directory_uri () . '/bootstrap/js/bootstrap-scrollspy.js');
wp_register_script ('bootstrap-tab', get_template_directory_uri () . '/bootstrap/js/bootstrap-tab.js');
wp_register_script ('bootstrap-tooltip', get_template_directory_uri () . '/bootstrap/js/bootstrap-tooltip.js');
wp_register_script ('bootstrap-transition', get_template_directory_uri () . '/bootstrap/js/bootstrap-transition.js');
wp_register_script ('bootstrap-typeahead', get_template_directory_uri () . '/bootstrap/js/bootstrap-typeahead.js');

/**
 * Typekit
 */
wp_register_script ('typekit', 'http://use.typekit.net/qya1eek.js');

/**
 * Coffeescript
 * (doesn't work)
 *
function enqueue_coffeescript ($handle, $src_or_srcs, $deps = array (), $ver = false, $in_footer = false) {
	global $wpcs;
	$wpcs -> enqueue ($handle, $src_or_srcs, $deps, $ver, $in_footer);
} // function enqueue_coffeescript
*/
wp_register_script ('coffeescript', get_template_directory_uri () . '/coffee-script/extras/coffee-script.js');
/* wp_register_script ('custom', get_template_directory_uri () . '/custom.coffee'); */

/**
 * Less
 *
 * Modifies enqueue style to change the rel attribute
 */
function enqueue_less_styles ($tag, $handle) {
	global $wp_styles;
	$match_pattern = '/\.less$/U';
	if (preg_match ($match_pattern, $wp_styles -> registered [$handle] -> src )):
		$handle = $wp_styles -> registered [$handle] -> handle;
		$media = $wp_styles -> registered [$handle] -> args;
		$href = $wp_styles -> registered [$handle] -> src . '?ver=' . $wp_styles -> registered [$handle] -> ver;
		$rel = isset ($wp_styles -> registered [$handle] -> extra ['alt']) && $wp_styles -> registered [$handle] -> extra ['alt'] ? 'alternate stylesheet' : 'stylesheet';
		$title = isset ($wp_styles -> registered [$handle] -> extra ['title']) ? "title='" . esc_attr ( $wp_styles -> registered [$handle] -> extra ['title'] ) . "'" : '';
		$tag = "<link rel='stylesheet/less' id='$handle'$title href='$href' type='text/css' media='$media' />";
	endif;
	return $tag;
} // function enqueue_less_styles
add_filter( 'style_loader_tag', 'enqueue_less_styles', 5, 2);
wp_register_script ('less', get_template_directory_uri () . '/less.js/dist/less-1.3.1.min.js');
wp_register_style ('custom', get_template_directory_uri () . '/custom.less');

/**
 * Custom post type: entities
 */
register_post_type (
	'entities',
	array (
		'label' => 'Entities',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array ('slug' => ''),
		'query_var' => true,
		'exclude_from_search' => false,
		'supports' => array (
			'title',
			'editor',
			'excerpt',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes',
		),
		'labels' => array (
			'name' => 'Entities',
			'singular_name' => 'Entity',
			'menu_name' => 'Entities',
			'add_new' => 'Add Entity',
			'add_new_item' => 'Add New Entity',
			'edit' => 'Edit',
			'edit_item' => 'Edit Entity',
			'new_item' => 'New Entity',
			'view' => 'View Entity',
			'view_item' => 'View Entity',
			'search_items' => 'Search Entities',
			'not_found' => 'No Entities Found',
			'not_found_in_trash' => 'No Entities Found in Trash',
			'parent' => 'Parent Entity',
		),
	)
);


/**
 * Custom post type: rooms
 */
register_post_type (
	'room',
	array (
		'label' => 'Rooms',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array ('slug' => ''),
		'query_var' => true,
		'exclude_from_search' => false,
		'supports' => array (
			'title',
			'editor',
			'excerpt',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes',
		),
		'labels' => array (
			'name' => 'Rooms',
			'singular_name' => 'Room',
			'menu_name' => 'Rooms',
			'add_new' => 'Add Room',
			'add_new_item' => 'Add New Room',
			'edit' => 'Edit',
			'edit_item' => 'Edit Room',
			'new_item' => 'New Room',
			'view' => 'View Room',
			'view_item' => 'View Room',
			'search_items' => 'Search Rooms',
			'not_found' => 'No Rooms Found',
			'not_found_in_trash' => 'No Rooms Found in Trash',
			'parent' => 'Parent Room',
		),
	)
);

/**
 * Figure out which object to instantiate based on post's custom data
 */
function getObject ($customData, $type) {
	$location = $customData ['Location'] [0];
	$program = $customData ['Program'] [0];
	$class = ucfirst (preg_replace ("/^$type\//", '', $program));
	require_once ("class/$program.class.php");
	$entity = new $class ($location);
	return $entity;
} // getObject ()
