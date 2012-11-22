<div class='theContent'>
	<?php the_content () ?>
</div> <!-- /theContent -->
<?php
$getCustom = get_post_custom ();
$custom = array ();
$order = array (
	'Up' => 'icon-chevron-up',
	'North' => 'icon-caret-up',
	'West' => 'icon-caret-left',
	'East' => 'icon-caret-right',
	'South' => 'icon-caret-down',
	'Down' => 'icon-chevron-down'
);

/**
 * Copy the custom fields in the order specified
 */
foreach ($order as $direction => $class):
	if (array_key_exists ($direction, $getCustom)):
		$custom [$direction] = $getCustom [$direction];
	endif;
endforeach;

if (! empty ($custom)): ?>
	<ul class='roomNavigation'>
	<?php foreach ($custom as $name => $value):
		if ($name [0] == '_') continue; // meta data like _edit_lock, _wp_page_template
		$value = $value [0]; // post id
		$title = get_the_title ($value);
		$link = get_permalink ($value);
		$class = $order [$name]; // look up class from the order array
		?>
		<li>
			<a
				rel='tooltip'
				title='<?= $title ?>'
				href='<?= $link ?>'>
				<i class='<?= $class ?> direction-<?= $name ?>'></i>
				<?= $name ?>
			</a>
		</li>
	<?php endforeach ?>
	</ul> <!-- / roomNavigation -->
<?php endif ?>
