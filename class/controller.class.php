<?php
class Controller {

	public function __construct ($entityId, $userId, $command) {
		$sql = "
			select
				meta.post_id,
				posts.post_title,
				meta.meta_value
			from wp_postmeta as meta
			left join wp_posts as posts
				on posts.ID = meta.post_id
			where meta.meta_key = 'Program'
			and meta.post_id = $entity
			;
		";
		$program = $entity -> Program;
		require_once ("class/$program.class.php");
		$entity = new $class ($location);
		return $entity -> $command;
	} // construct ()

} // class Controller
