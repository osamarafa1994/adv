<?php

class View {

	function __construct() {
		//echo 'this is the view';
	}

	public function render($name, $data = false)
	{
		$vars = array();
		require 'views/' . $name . '.php';
		$vars = $data;
	}

}
