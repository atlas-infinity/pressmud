<!doctype html>
<html>
<head>
<?php
wp_enqueue_script ('jquery');
wp_enqueue_style ('bootstrap');
wp_enqueue_style ('custom');
wp_head ();
?>
</head>
<body>
<?php get_template_part ('sub', 'header');
