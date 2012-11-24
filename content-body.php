<?php
/**
 * Prints the post title
 * the ID number of the room
 * and the content of the post
 */
?>
<h1 class='roomName'>
	<?php the_title () ?>
	<small class='roomLocation'>
		<a rel='tooltip' title='Room ID' data-placement='right'>
			<?php the_ID () ?>
		</a> <!-- /permalink -->
	</small> <!-- /roomLocation -->
</h1> <!-- /roomName -->
<?php the_content () ?>
