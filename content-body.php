<?php
the_content ();
$getCustom = get_post_custom ();
$custom = array ();
$order = array (
	'Up',
	'North',
	'West',
	'East',
	'South',
	'Down'
);
foreach ($order as $key):
	if (array_key_exists ($key, $getCustom)):
		$custom [$key] = $getCustom [$key];
		unset ($getCustom [$key]);
	endif;
endforeach;

if (! empty ($custom)): ?>
	<ul class='roomNavigation'>
	<?php foreach ($custom as $name => $value):
		if ($name [0] == '_') continue; // meta data like _edit_lock, _wp_page_template
		$value = $value [0];
		$link = get_permalink ($value);
		?>
		<li><a href='<?= $link ?>'><?= $name ?></a></li>
	<?php endforeach ?>
	</ul> <!-- / roomNavigation -->
<?php endif ?>
