<?php

require 'header.php';
if(isset($_SESSION['user'])){
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Chat</b>-System</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div class="input-group mb-3">
          <input type="password" name="input[]" class="form-control" placeholder="Old Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="input[]" class="form-control" id="pwd1" onkeyup="validate(this.value)" placeholder="New Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="cover" class="btn btn-primary btn-block">Change password</button>
          </div>
          <?php
          
           if(isset($_POST['cover'])){
             if(isset($_POST['input']) && !empty($_POST['input'][0]) && !empty($_POST['input'][1])){
              $sen = new select('login');
             if(!empty($sen->rows_counted)){
               $va = $sen->rows_counted-1 ;
             for ($i=0; $i < $sen->rows_counted ; $i++) { 
                if($sen->row_value[$i][4] == sha1($_POST['input'][0])){
                  $value = sha1($_POST['input'][1]);
                   $query = "UPDATE login SET password='".$value."' WHERE id=".$sen->row_value[$i][0]." ";
                   if(database::$con->query($query)){ ?>
                     <script>alert('Your Password Has Changed'); window.location.href= 'index.php';</script>
                   <?php }else { ?>
                    <script>alert('Problem in changing Password. Please try again'); history.go(-1);</script>
                   <?php }
                }elseif($i == $va && $sen->row_value[$i][4] == sha1($_POST['input'][0])) { ?>
                <script>alert('We could not find you Password. Please try again'); history.go(-1);</script>
              <?php }
              }
             }
            }else { ?>
              <script>alert('BOth Field are Required'); history.go(-1);</script>
           <?php }

           }
          
          ?>
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.html">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script>
 function validate(str){
     var valuee = document.getElementById('pwd1');
         if(!str.match(/^(?=.*\d)(?=.*[@#$%^&*()_+!])(?=.*[a-z])(?=.*[A-Z]).{8,}$/g)){
           valuee.className = "form-control text-danger";
          }else{
           valuee.className = "form-control text-success";
          }
      }</script>
<?php
require 'footer-main.php';
?>
</body>
</html>
<?php
}else{ ?>
<script>window.location.href = 'index.php';</script>
<?php  } ?>