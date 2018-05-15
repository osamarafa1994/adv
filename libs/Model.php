<?php

class Model {

	function __construct() {

}

public function dbase()
{
 	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "ads";
	return $db = new mysqli($servername, $username, $password, $db_name);

 // Check connection
 if ($db->connect_error) {
		 die("Connection failed: " . $db->connect_error);
 }
}

}

?>
