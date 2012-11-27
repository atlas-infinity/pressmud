<?php
class Entity {

	/**
	 * Sets the post id the entity resides in
	 */
	protected $location;
	public function __construct ($location) {
		$this -> location = $location;
	} // construct ()

	/**
	 * Returns a list of commands
	 */
	protected $commands = array ();
	public function listOfCommands () {
		return $this -> commands;
	} // commands ()

	/**
	 * These commands shouldn't appear in entity's list of commands
	 */
	protected $backendCommands = array (
		'__construct',
		'loadCommands',
		'listOfCommands'
	);

	/**
	 * Returns a list of the functions available to an entity
	 */
	protected function loadCommands () {
		$methods = get_class_methods ($this);
		foreach ($methods as $method):
			if (! in_array ($method, $this -> backendCommands)):
			   	$this -> commands [] = $method;
			endif;
		endforeach;
		return $this -> commands;
	} // loadCommands ()


} // class Entity
