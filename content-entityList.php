<?php
/**
 * Gets entities with a location set to this room
 */
$id = get_the_ID ();
$sql = "
	select
		meta.post_id,
		posts.post_title
	from wp_postmeta as meta
	left join wp_posts as posts
		on posts.ID = meta.post_id
	where meta.meta_key = 'Location'
	and meta.meta_value = $id;
";
// todo: prepare statement
$results = $wpdb -> get_results ($sql, OBJECT);
// todo: check if num rows > 0
$i = 0;
if (! empty ($results)): ?>
	<ul class='entities'>
	<?php foreach ($results as $entity):
		$link = get_permalink ($entity -> post_id);
		?>
		<li>
			<a id="entity-<?= $i ?>" class='entity modalLoad' href='<?= $link ?>'>
				<?= $entity -> post_title ?>
			</a>
			<div id="entityHolder-<?= $i ?>" class="entityHolder modal hide fade"></div>
		</li>
	<?php
	$i ++;
	endforeach ?>
	</ul>
<?php
endif ?>
