<?php
/**
 * Beginning of HTML document
 * and stylesheet/script loads
 */
?>
<!doctype html>
<html>
<head>
<title>pressmud</title>
<?php
wp_enqueue_script ('typekit');
wp_enqueue_script ('coffeescript');
wp_enqueue_script ('jquery');
wp_enqueue_style ('bootstrap');
wp_enqueue_script ('bootstrap-tooltip');
wp_enqueue_script ('bootstrap-popover');
wp_enqueue_script ('bootstrap-modal');
wp_enqueue_style ('fontawesome');
wp_enqueue_script ('less');
wp_enqueue_style ('custom');
#wp_enqueue_script ('custom'); // WP won't embed coffeescript. Embedded manually below.
wp_head ();
?>
<script type="text/javascript">try {Typekit.load ();} catch (e) {}</script>
<script type="text/coffeescript" src="<?= bloginfo ('siteurl') ?>/wp-content/themes/custom/custom.coffee"></script>
</head>
<body>
