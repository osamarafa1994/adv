<?php

class Adverts extends Controller {

	function __construct() {
		parent::__construct();
		require 'models/Advert.php';
		$this->Advert_model = new Advert();
		//echo 'We are inside Avderts <br />';
	}

	/*
	public function text($arg = false) {
		echo 'we are inside test<br />';
		echo 'Optional: ' . $arg . '<br />';

		require 'models/help_model.php';
		$model = new Help_Model();
	}

	*/

	public function show_adverts() {
		$data['adverts'] = $this->Advert_model->getAll();
    $data['subview'] = 'adverts/index';
		$this->view->render('admin_view', $data);
	}

	public function show_one($id)
	{
		$data['advert'] = $this->Advert_model->getById($id);
		$data['comments'] = $this->Advert_model->getCommetByPK($id);
    $data['subview'] = 'adverts/ad_info';
		$this->view->render('admin_view', $data);
	}



//_______________add  advertisement____________
	public function addADV()
	{
		if (isset($_FILES['userfile']['name']) && isset($_POST['desc'])) {
	  $descr = $_POST['desc'];
		$image_name ="";
		$uploaddir = './uploads/';
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
				$image_name = $_FILES['userfile']['name'];
		    echo "File is valid, and was successfully uploaded.{$_FILES['userfile']['name']} \n";
		} else {
		    echo "Possible file upload attack!\n";
		}

	  $data['add'] = $this->Advert_model->addADV($descr, $image_name);
		if($data['add']){
			header('location:http://localhost/ads/Adverts/admin');
		}

			if(!$data['add']){
				  header("location:http://localhost/ads/Adverts/addADV");
			}
		}else {
		$data['subview'] = 'adverts/addADV';
		$this->view->render('admin_view', $data);
		}
	}

	public function editADV($id)
  {
    $data['subview'] = 'adverts/editADV';
    $data['advert'] = $this->Advert_model->getById($id);

    $this->view->render('admin_view', $data);
  }

	public function updateADV($id)
	{
		if (!isset($_SESSION['logged_in'])) {
			header("location:http://localhost/ads/Adverts/show_adverts");
		}

		if($_POST['desc']){
			$desc = $_POST['desc'];
			$updated = $this->Advert_model->updateADV($desc,$id);
			if($updated) {
				header('location:http://localhost/ads/Adverts/admin');
			}
		}else {
			header("location:http://localhost/ads/Adverts/editADV/$id");
		}

	}

//_______________Users Actions__________________

	public function register()
	{
		if(isset($_POST['submit'])){
			$insertData = array(
				'name' => $_POST['name'],
				'username' => $_POST['username'],
				'email' => $_POST['email'],
				'password' => md5($_POST['password'])
			);

			$registered = $this->Advert_model->register($insertData);
			if($registered){
				$data['subview'] = 'adverts/registered';
				$this->view->render('admin_view', $data);
			}else {
				$data['error'] = 'Your email or username allready exist please login or register by anther one';
				$data['subview'] = 'adverts/register';
				$this->view->render('admin_view', $data);
			}

		}else{
			$data['subview'] = 'adverts/register';
			$this->view->render('admin_view', $data);
		}
	}

	public function get_valid_username()
	{
		$username = $_POST['username'];
		$count = $this->Advert_model->valid_username($username);
		echo $count;
	}

	public function get_valid_email()
	{
		$email = $_POST['email'];
		$count = $this->Advert_model->valid_email($email);
		echo $count;
	}





	public function login()
	{
		if (isset($_POST['username']) && isset($_POST['password'])) {
	  $username = filter_input(INPUT_POST, 'username' , FILTER_SANITIZE_STRING);
	  $password = md5($_POST['password']);

	  $data['user_data'] = $this->Advert_model->checkloginAdmin($username, $password);

			if(!$data['user_data']){
				  header("location:http://localhost/ads/Adverts/login");
			}elseif ($data['user_data']['user_id']) {
				$_SESSION['user_id'] = $data['user_data']['user_id'];
	      $_SESSION['username'] = $data['user_data']['username'];
				if($_SESSION['username'] === "admin"){
					$_SESSION['logged_in'] = true;
				}
				$data['session'] = $_SESSION;
				$data['adverts'] = $this->Advert_model->getAll();
				$data['subview'] = 'admin/session';

			 	$this->view->render('admin_view', $data);

			}
		}else {
		$data['subview'] = 'login/login';
		$this->view->render('admin_view', $data);
		}
	}

	public function admin()
	{
		$data['adverts'] = $this->Advert_model->getAll();
		$data['subview'] = 'admin/control';
		$this->view->render('admin_view', $data);
	}



	public function logout()
	{
			session_start();
			if (!isset($_SESSION['logged_in'])) {
				header('location:http://localhost/ads/Adverts/show_adverts');
			}
		  $_SESSION =array();
		  header('location:http://localhost/ads/Adverts/show_adverts');
	}

	public function deleteADV($id)
	{
		$delete = $this->Advert_model->deleteADV($id);
		if($delete){
		header('location:http://localhost/ads/Adverts/admin');
		}
	}

	public function createCOM($ad_id,$user_id)
	{
		if($_POST['com_body']){
			$body = $_POST['com_body'];
			$created = $this->Advert_model->createCOM($body, $ad_id ,$user_id);
			if($created) {
				header("location:http://localhost/ads/Adverts/show_one/$ad_id");
			}
		}else {
			header("location:http://localhost/ads/Adverts/show_adverts");
		}

	}



	public function deleteCOM($id)
	{
		$delete = $this->Advert_model->deleteCOM($id);
		if($delete){
		header("location:http://localhost/ads/Adverts/show_adverts");
		}
	}



}
 ?>
