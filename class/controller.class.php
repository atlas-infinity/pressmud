<?php
require_once ('../../../wp-blog-header.php');
class Controller {

	protected $entity;
	protected $command;

	public function __construct ($entityId, $userId, $command) {
		global $wpdb;
		$this -> command = $command;
		$sql = "
			select
				meta.post_id,
				posts.post_title,
				meta.meta_value as program
			from wp_postmeta as meta
			left join wp_posts as posts
				on posts.ID = meta.post_id
			where meta.meta_key = 'Program'
			and meta.post_id = $entityId
			;
		";
		$entityData = $wpdb -> get_results ($sql, OBJECT);
		$entityData = $entityData [0];
		$program = $entityData -> program;
		require_once ("class/$program.class.php");
		$class = ucfirst (preg_replace ('/^Entity\//', '', $program));
		$this -> entity = new $class ($location);
		error_log ("Finished controller construction. command: {$this -> command}");
	} // construct ()

	public function output () {
		error_log ("running ctrl output");
		return $this -> command;
	} // output ()

} // class Controller
