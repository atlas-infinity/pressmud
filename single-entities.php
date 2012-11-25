<?php
/**
 * Template: entity ajax loads
 */
the_post ();
?>
<div class='modal-header'>
	<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
	<h3><?php the_title () ?></h3>
</div>
<div class='modal-body'>
	<?php the_content () ?>
</div>
