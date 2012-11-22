<?php
add_filter ('show_admin_bar', '__return_false');
wp_register_style ('bootstrap', 'http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css');
wp_register_style ('custom', get_template_directory_uri () . '/custom.css');
