<?php
/**
 * Creates an Entity object and populates it
 * with information from the post
 * Commands are sent via post
 */

the_post ();

/**
 * Get the location and program name
 */
$custom = get_post_custom ();
$location = $custom ['Location'] [0];
$program = $custom ['Program'] [0];
$class = ucfirst (preg_replace ('/^Entity\//', '', $program));

/**
 * Create a new object and get the commands
 */
require_once ("class/$program.class.php");
$entity = new $class ($location);


/**
 * If POST is set, then a command has been pressed
 */
if (! empty ($_POST)):
	$command = $_POST ['command'];
	?>
	[<?= get_class ($entity) ?>]
	[<?= $command ?>]
	[<?= $entity -> $command () ?>]
	<?php
	return;

/**
 * Else the entity needs to be observed
 * Print name, description and list of commands
 */
else:
	$commands = $entity -> listOfCommands ();
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
		<?php if (! empty ($commands)): ?>
			<p>Available commands:</p>
			<ul class="entityCommands">
			<?php foreach ($commands as $command): ?>
				<li><a href="#"><?= $command ?></a></li>
			<?php endforeach ?>
			</ul>
		<?php endif ?>
	</div>
<?php endif ?>
