
<?php

if (isset($_SESSION['user_id'])) {
  header("Refresh:0; url=<?= BASE_URL ?>ads/Adverts/show_adverts");
}

?>

 <div class="card bg-secondary mb-3" style="max-width: 30rem;" id="adv">
  <h3 class="card-header">Admin Login</h3>
  <div class="card-body">
    <div class="alert alert-dismissible alert-danger">
      <form action="<?= BASE_URL ?>ads/Adverts/login" method="post">
        <div class="form-group">
         <label for="user">Username</label>
         <input type="text" class="form-control" id="user" name="username" placeholder="Enter Username">
       </div>
       <div class="form-group">
         <label for="pass">Password</label>
         <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
       </div>
       <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</div>
