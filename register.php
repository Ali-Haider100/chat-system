<?php
require 'header.php';
?>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
      <div class="card-header"  style="text-align:center">
      <div class="row justify-content-center">
      <img class="img-circle elevation-1 img-thumbnail" src="dist/img/abc.png" id="imgSrc" style="width:150px; height:150px;">
      </div>
      <a href="#" style="margin-top:3px;" id="removebtn" >remove</a>
      </div>
    <div class="card-body">
      <form action="register.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
          <div class="custom-file">  
            <input type="file" class="custom-file-input" name="img[]" id="fileUp" accept="image/*" onchange="openFile(event)">
               <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
            </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="input[]">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="input[]">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-0">
        <input type="password" class="form-control" id="pwd1" onkeyup="validate(this.value)" placeholder="Password" name="input[]">
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
         </div>
         <small class="float-right mb-2 text-muted">(number, alphabets, and special-char. upto 8)</small>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="pwd2" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          <a href="index.php" class="text-center">I already have a membership</a>

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="submit" name="submit" disabled>Register</button>
          </div>
          <!-- /.col -->
        </div>

        <?php
          if(isset($_POST['submit'])){
            $imgSel = new select('login');
            if(array_search("", $_POST['input']) == true || empty($_FILES['img']['name'][0])){ 
              ?>
             <script>alert('All fields must not be empty');history.go(-1); </script>
            <?php }else {
              
                 array_splice($_POST['input'], 0, 0, "image");
                 array_push($_POST['input'],'0','0', $imgSel->row_value[0][7] + 1, date('Y-m-d'));
             inup::signup(array('3','4'), array('2','3'), $_POST['input'], array('text','text','email','pwd','text','text','text','text','text'), 'login');
              for ($i=0; $i <$imgSel->rows_counted ; $i++) { 
                    $fg = $imgSel->row_value[0][7]+1;
                     database::$con->query("UPDATE login SET members='".$fg."' WHERE id=".$imgSel->row_value[$i][0]." ");
                    }
            if(!empty(inup::$error)){ 
              echo "<script>alert('try changing email or password');history.go(-1);</script>";  
             }else {
              $imgSel = new select('login');
              $image = new imge($_FILES['img'], "images/", "login");
                $image->updateI(array('image'), 'id', $imgSel->last_id);
                if($image->imgU == "Updated"){
                      $image->uploadI();
                      ?>
                   <script>window.location.href = 'index.php'; </script>
                <?php exit();  }else {
                        $DELETE = "DELETE FROM login WHERE id=".$imgSel->last_id." ";
                        if(database::$con->query($DELETE) === true){ ?>
                        <script>alert('There was a problem in updation'); history.go(-1);</script>
                        <?php }else { ?>
                            <script>alert('There is a problem in deletionm');</script> 
                      <?php }
                }
                 
             }

            }
          }
        
        ?>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<?php
require 'footer-main.php';
?>

<script>
// <input type='file' accept='image/*' onchange='openFile(event)'><br>
// <img id='output'>
   //   file reader is a api for showing image instantly 
  var openFile = function(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('imgSrc');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);

  };

    document.getElementById('removebtn').addEventListener("click", function(){
    document.getElementById('imgSrc').src = "dist/img/abc.png";
    document.getElementById('fileUp').value ="";
  });

   document.getElementById('pwd2').addEventListener("keyup", function(){
            var ss = document.getElementById('pwd1').value;
              //  var f = document.forms;
              // var  o =  f[0].elements[4].id;   // 3 4
              // alert(o);
              if(ss != this.value){
                 var form = document.forms;
                 for(var i=0; i<form[0].elements.length; i++){
                    if(i == 3 || i == 4){
                      continue;
                    }else{
                      form[0].elements[i].disabled = true;
                    }
                 }
                 document.getElementById('submit').disabled = true;
                 
              }else if(ss == this.value){
                var form = document.forms;
                 for(var i=0; i<form[0].elements.length; i++){
                  form[0].elements[i].disabled = false;
                 }
                 document.getElementById('submit').disabled = false;
              }
            
            
   });

   function validate(str){
     var valuee = document.getElementById('pwd1');
         if(!str.match(/^(?=.*\d)(?=.*[@#$%^&*()_+!])(?=.*[a-z])(?=.*[A-Z]).{8,}$/g)){
           valuee.className = "form-control text-danger";
           document.getElementById('submit').disabled = true;

          }else{
           valuee.className = "form-control text-success";
           document.getElementById('submit').disabled = false;

          }
      }



</script>
</body>
</html>
