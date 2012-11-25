<?php
class Entity {

	protected $location;
	protected $commands = array ();

	public function __construct ($location) {
		$this -> location = $location;
	} // construct ()

	public function commands () {
		return $this -> commands;
	} // commands ()

} // class Entity
