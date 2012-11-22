<?php
the_post ();
$query = $_SERVER ['QUERY_STRING'];
?>

<?php if ($query == 'ajax'): ?>
	<?php
	get_template_part ('content', 'header');
	get_template_part ('content', 'body');
	get_template_part ('content', 'nav');
	return true;
	?>
<?php endif ?>

<?php
get_header ();
get_template_part ('content', 'header');
?>
<div class='theContent'>
<?php
get_template_part ('content', 'body');
get_template_part ('content', 'nav');
?>
</div> <!-- /theContent -->
<?php
get_footer ();
