<?php
$_SESSION = $data['session'];
if(isset($_SESSION['logged_in'])){
header("location:http://localhost/ads/Adverts/admin");
} else {
  header("location:http://localhost/ads/Adverts/show_adverts");
}
 ?>
