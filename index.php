<?php
/**
 * Checks for ajax loads, which don't load header/footer
 */
the_post ();
$query = $_SERVER ['QUERY_STRING'];
?>

<?php if ($query != 'ajax'): ?>
	<?php get_header () ?>
	<div class='theContent'>
<?php endif ?>

<?php get_template_part ('template', 'normal') ?>

<?php if ($query != 'ajax'): ?>
	</div> <!-- /theContent -->
	<?php get_footer () ?>
<?php endif ?>
