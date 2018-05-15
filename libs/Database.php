<?php

class Database {
  function __construct()
  {
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $db_name = "ads";
    public $db = new mysqli($servername, $username, $password, $db_name);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
  }
}

 ?>
