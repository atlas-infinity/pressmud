<?php
/**
 * Creates an Entity object and populates it
 * with information from the post
 * Commands are sent via post
 */

/**
 * Get the entity
 */
the_post ();
$entity = getObject (get_post_custom (), 'Entity');

/**
 * If POST is set, then a command has been pressed
 */
if (! empty ($_POST)):
	$command = $_POST ['command'];
	$response = $entity -> $command ();
	?>
		<dl>
			<dt class='action'><strong>[You]</strong>: <?= $command ?>.</dt>
			<dd class='response'><strong>[Entity]</strong>: <?= $response ?>.</dd>
		</dl>
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
		<p>Location: <?= $entity -> location ?></p>
		<p>Program: <?= $entity -> program ?></p>
		<?php if (! empty ($commands)): ?>
			<p>Available commands:</p>
			<ul class='entityCommands'>
			<?php foreach ($commands as $command): ?>
				<li>
					<a href='<?= get_permalink () ?>' data-target='writeArea' class='ajaxPost'><?= $command ?></a>
					<input name='command' type='hidden' value='<?= $command ?>'>
				</li>
			<?php endforeach ?>
			</ul>
		<?php endif ?>
	</div>
	<div class='modal-footer writeArea'>
	</div>
<?php endif ?>
