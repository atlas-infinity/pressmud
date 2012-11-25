<?php
require_once (dirname (__FILE__) . '/../entity.class.php');

class Shop extends Entity {

	public function __construct ($location) {
		parent :: __construct ($location);
		$this -> commands ['listGoods'] = 'List goods for sale';
	} // construct ()

	protected function listGoods () {
		return 'test';
	} // listGoods ()

} // class Shop
