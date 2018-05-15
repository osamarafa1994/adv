
<script type="text/javascript">
 $(document).ready(function(){
     $("#username_form").keyup(function (){
          var userName = $("#username_form").val().trim();
          var name_len = $("#username_form").val().length;
          var postData =  'username='+userName;
          if(userName != ''){
            $('#username_error').show();
          $.ajax({
            type: "POST",
            url:"<?= BASE_URL ?>Ads/Adverts/get_valid_username",
            data:postData ,
            success: function(response){
              if(response > 0){
                          $("#username_error").html("<span class='text-danger'>allready used choose anther one</span>");
                      }else{
                        if (name_len < 6) {
                          $("#username_error").html("<span class='text-danger'>please enter more than 6 letters</span>");
                        }else{
                          $("#username_error").html("<span class='text-success'>valid</span>");
                        }
                      }
                   },
            error: function () {
              alert("bcks");
            }
          });
        }else{
          $("#username_error").hide();
        }
      });

      $("#email_form").keyup(function (){
           var email = $("#email_form").val().trim();
           var postData =  'email='+email;
           if(email != ''){
             $('#email_error').show();
           $.ajax({
             type: "POST",
             url:"<?= BASE_URL ?>Ads/Adverts/get_valid_email",
             data:postData ,
             success: function(response){
               if(response > 0){
                           $("#email_error").html("<span class='text-danger'>allready used choose anther one</span>");
                       }
                    },
             error: function () {
               alert("bcks");
             }
           });
         }else{
           $("#email_error").hide();
         }
       });
  });
</script>

<div class="card bg-secondary mb-3" style="width: 25rem;" id="adv">
   <h3 class="card-header" style="color:blue;text-align:center;">Registeration</h3>
   <div class="card-body">
      <form class="" action="<?= BASE_URL ?>ads/Adverts/register" method="post">
        <?php if (isset($data['error'])): ?>
          <div class="alert alert-dismissible alert-warning">
            <h4 class="alert-heading">Warning!</h4>
            <p class="mb-0"><?= $data['error'] ?></p>
          </div>
        <?php endif; ?>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" id="name_form" name="name" placeholder="Enter name" minlength="3" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" id="email_form" name="email" placeholder="Enter email" required>
            <div class="invalid-feedback" id="email_error"></div>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" id="username_form" name="username" placeholder="Enter username" minlength="6" required>
            <div id="username_error"></div>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="password_form" name="password" placeholder="Enter password" minlength="6" required>
            <div class="invalid-feedback" id="password_error"></div>
          </div>
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
      </form>
  </div>
</div>
