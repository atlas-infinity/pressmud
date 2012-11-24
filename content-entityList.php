<?php
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
// prepare statement
$results = $wpdb -> get_results ($sql, OBJECT);
// if num rows
$i = 0;
if (! empty ($results)): ?>
	<ul class='entities'>
	<?php foreach ($results as $entity): ?>
		<li>
			<a class='entity modalLoad' href="#modal-<?= $i ?>">
				<?= $entity -> post_title ?>
			</a>
		</li>
	<?php endforeach ?>
	</ul>
<?php
$i ++;
endif ?>
