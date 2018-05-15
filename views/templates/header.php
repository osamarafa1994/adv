<?php session_start();
define("BASE_URL", "http://localhost/");

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= BASE_URL ?>Ads/assets/css/bootstrap.min.css">
    <script src="<?= BASE_URL ?>Ads/assets/js/jquery.min.js"></script>
    <style media="screen">
    #adv {
      position: absolute;
      margin: 20px 0 0 -200px;
      left: 50%;
    }
    #com {
      position: absolute;
      margin: 390px 0 0 -110px;
      left: 50%;
      color:green;
    }

    .df {
      position: absolute;
      margin: 500px 0 0 -290px;
      left: 50%;
    }

    #ad {
      margin: 80px 0 0 0;
    }
    </style>
    <title>Advertisements</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <?php if (isset($_SESSION['logged_in'])): ?>
      <a class="navbar-brand" href="<?= BASE_URL ?>ads/Adverts/admin">Admin panel</a>
      <?php endif; ?>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= BASE_URL ?>ads/Adverts/show_adverts">Home</a>
          </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
          <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL ?>ads/Adverts/logout">Logout</a>
          </li>
          <?php endif; ?>
          <?php if (!(isset($_SESSION['logged_in']) || isset($_SESSION['user_id']))): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL ?>ads/Adverts/login">Login</a>
          </li>
          <li class="nav-item">
          <a href="<?= BASE_URL ?>ads/Adverts/register" class="nav-link" >Register</a>
        </li>
        <?php endif; ?>
        </ul>
      </div>
    </nav>
