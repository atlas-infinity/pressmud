<?php
require_once (dirname (__FILE__) . '/../entity.class.php');

class Shop extends Entity {

	public function __construct ($location) {
		parent :: __construct ($location);
		$this -> loadCommands ();
	} // construct ()

	public function listGoods () {
		return 'test';
	} // listGoods ()

	public function buyGood ($good) {
		return 'test2';
	} // listGoods ()

} // class Shop
