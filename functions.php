<?php
remove_action ('wp_head', 'rsd_link');
remove_action ('wp_head', 'wlwmanifest_link');
remove_action ('wp_head', 'wp_generator');

remove_action ('wp_head', 'feed_links_extra', 3);
remove_action ('wp_head', 'feed_links', 2);

function disablePostLinks () { return false; }
add_filter ('index_rel_link', 'disablePostLinks');
add_filter ('parent_post_rel_link', 'disablePostLinks');
add_filter ('start_post_rel_link', 'disablePostLinks');
add_filter ('previous_post_rel_link', 'disablePostLinks');
add_filter ('next_post_rel_link', 'disablePostLinks');

remove_action ('wp_head', 'wp_shortlink_wp_head', 10, 0 );

remove_action ('wp_head', 'rel_canonical');

add_filter ('show_admin_bar', '__return_false');

wp_register_style ('bootstrap', 'http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css');
wp_register_style ('custom', get_template_directory_uri () . '/custom.css');

wp_register_script ('custom', get_template_directory_uri () . '/custom.js');

