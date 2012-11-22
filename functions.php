<?php
remove_action ('wp_head', 'rsd_link');
remove_action ('wp_head', 'wlwmanifest_link');
remove_action ('wp_head', 'wp_generator');
remove_action ('wp_head', 'feed_links_extra', 3);
remove_action ('wp_head', 'feed_links', 2);
remove_action ('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action ('wp_head', 'rel_canonical');
add_filter ('show_admin_bar', '__return_false');
function disablePostLinks () { return false; }
add_filter ('index_rel_link', 'disablePostLinks');
add_filter ('parent_post_rel_link', 'disablePostLinks');
add_filter ('start_post_rel_link', 'disablePostLinks');
add_filter ('previous_post_rel_link', 'disablePostLinks');
add_filter ('next_post_rel_link', 'disablePostLinks');

/**
 * Bootstrap
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
 * Custom CSS/JS
 */
wp_register_style ('custom', get_template_directory_uri () . '/custom.less');
/* wp_register_script ('custom', get_template_directory_uri () . '/custom.js'); */

/**
 * Coffeescript
 */
/*
function enqueue_coffeescript ($handle, $src_or_srcs, $deps = array (), $ver = false, $in_footer = false) {
	global $wpcs;
	$wpcs -> enqueue ($handle, $src_or_srcs, $deps, $ver, $in_footer);
} // function enqueue_coffeescript ()
*/
wp_register_script ('coffeescript', get_template_directory_uri () . '/coffee-script/extras/coffee-script.js');

/**
 * Less
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
