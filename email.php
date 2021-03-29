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
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="input" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit"  name="btnE" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <?php
            if(isset($_POST['btnE'])){
             $new = new select('login');
             if(!empty($new->rows_counted)){
              $v = $new->rows_counted-1 ;
             
             for ($i=0; $i < $new->rows_counted; $i++) { 
                  if($new->row_value[$i][3] == sha1($_POST['input'], false)){  ?>
                    <script>window.location.href = 'recover-password.php?q=<?php echo $new->row_value[$i][2] ;?>';</script>
                  <?php break; }elseif ($i == $v && $new->row_value[$i][3] != sha1($_POST['input'], false)){ ?>
                    <script>alert('Please provide Write Email');history.go(-1);</script>   
               <?php }
             }
            }
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
<?php
require 'footer-main.php';
?>
</body>
</html>
<?php
}else {?>
<script>window.location.href = 'index.php';</script>
<?php } ?>