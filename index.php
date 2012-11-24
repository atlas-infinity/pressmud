<?php
the_post ();
$query = $_SERVER ['QUERY_STRING'];
?>

<?php if ($query == 'ajax'): ?>
	<?php
	get_template_part ('content', 'body');
	get_template_part ('content', 'entityList');
	get_template_part ('content', 'roomNavigation');
	return true;
	?>
<?php endif ?>

<?php get_header () ?>
<div class='theContent'>
	<?php
	get_template_part ('content', 'body');
	get_template_part ('content', 'entityList');
	get_template_part ('content', 'roomNavigation');
	?>
</div> <!-- /theContent -->
<?php get_footer () ?>
