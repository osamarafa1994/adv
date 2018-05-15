<?php

class Help extends Controller {

	function __construct() {
		parent::__construct();
		//echo 'We are inside help<br />';
	}


	public function text($arg = false) {
		echo 'we are inside test<br />';
		echo 'Optional: ' . $arg . '<br />';

		require 'models/help_model.php';
		$model = new Help_Model();
		$s = $model->returnn();
		echo $s;
	}



	public function login(){
		$data['j'] = "fs";
		$this->view->render('login/login',$data);
	}

}
