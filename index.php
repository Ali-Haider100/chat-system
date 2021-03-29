<?php


require 'header.php';
// ini_set("display_errors", "1");
// error_reporting(E_ALL);

// require 'includes/databasec.php';
// require 'includes/select.php';
// require 'includes/IU.php';
// require 'includes/validation.php';
// require 'includes/check.php';
// require 'includes/random.php';
// require 'includes/loginr.php';
// require 'header.php';
?>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>CHAT</b>-SYSTEM</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in here</p>

      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="input[]" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="input[]" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          <p class="pt-1">
          <a href="register.php" class="text-center">Register a new membership</a>
          </p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
          </div>
        <?php
         
         if(isset($_POST['submit']) && isset($_POST['input'])){
           if(!empty($_POST['input'][0]) && !empty($_POST['input'][1])){
            inup::login($_POST['input'], array('email','pwd'), 'login', 2);
            if(!empty(inup::$error)){
                if(gettype(inup::$error) == "array"){ ?>
                     <script>alert('Email is not correct'); history.go(-1);</script>
                <?php }elseif(gettype(inup::$error) == "integer"){ ?>
                  <script>alert('Email or password in not write'); history.go(-1); </script>
                <?php }
            }elseif(inup::$status == "On"){ 
                 $_SESSION['user'] = sha1($_POST['input'][0], false);
                 $_SESSION['ip'] = random::getUserIpAddr();
                 $ne = new select('friends');
                 for ($t=0; $t < $ne->rows_counted; $t++) { 
                     if($ne->row_value[$t][1] == $_SESSION['user']){
                        $upss = "UPDATE friends SET emailStatus='on' WHERE id=".$ne->row_value[$t][0]." ";
                        database::$con->query($upss);
                     }elseif ($ne->row_value[$t][4] == $_SESSION['user']) {
                      $upss = "UPDATE friends SET frndStatus='on' WHERE id=".$ne->row_value[$t][0]." ";
                      database::$con->query($upss);
                     }
                 }
                 /* this is the place if you want to insert data to users table */
              ?>
                 <script>window.location.href = 'profile.php';</script> 
            <?php }
           
           }
         }
        
        ?>
        </div>
      </form>
   </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<?php
require 'footer-main.php';
?>