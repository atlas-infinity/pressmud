<?php
require_once (dirname (__FILE__) . '/../entity.class.php');

class Shop extends Entity {

	public function __construct ($location) {
		error_log ("construct shop");
		parent :: __construct ($location);
		$this -> commands ['listGoods'] = 'List goods for sale';
	} // construct ()

	protected function listGoods () {
		error_log ("entity listGoods");
		return 'test';
	} // listGoods ()

} // class Shop
