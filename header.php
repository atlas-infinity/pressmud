<!doctype html>
<html>
<head>
<?php
wp_enqueue_script ('typekit');
wp_enqueue_script ('coffeescript');
wp_enqueue_script ('jquery');
wp_enqueue_style ('bootstrap');
wp_enqueue_style ('fontawesome');
wp_enqueue_script ('less');
wp_enqueue_style ('custom');
#wp_enqueue_script ('custom'); // inline link for now
wp_head ();
?>
<script type="text/javascript">try {Typekit.load ();} catch (e) {}</script>
<script type="text/coffeescript" src="/mudpress/wp-content/themes/mudpress/custom.js"></script>
</head>
<body>
<?php get_template_part ('sub', 'header');
