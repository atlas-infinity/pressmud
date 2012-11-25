<?php
/**
 * Template: entity ajax loads
 */
the_post ();
$custom = get_post_custom ();
$location = $custom ['Location'] [0];
$program = $custom ['Program'] [0];
require_once ("class/Entity/$program.class.php");
$entity = new Entity ($location);
?>
<div class='modal-header'>
	<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
	<h3><?php the_title () ?></h3>
</div>
<div class='modal-body'>
	<?php the_content () ?>
</div>
<div class='modal-footer'>
<p>Location: <?= $location ?></p>
<p>Program: <?= $program ?></p>
</div>
