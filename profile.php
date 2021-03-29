<?php 

include_once 'header.php';
if(isset($_SESSION['user'])  && !empty($_SESSION['user'])){
$selPro = new select('login');
$clt;

if(isset($_SESSION['user']) && $_SESSION['ip'] == random::getUserIpAddr()){ ?>
     
<?php 
include_once 'nav.php';
include_once 'sidebar.php';
?>

 
  <div class="content-wrapper pt-3">
  
    <section class="content">
      <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
        <div class="row">

         <div class="col-md-12">
         <div class="card collapsed-card" id="card">
                  <div class="card-header bg-info">
                    <h3 class="card-title">Find Members</h3>

                    <div class="card-tools">
                      
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix" id="mem">
                      <!-- <li>
                        <img src="dist/img/user1-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Alexander Pierce</a>
                        <span class="users-list-date">Today</span>
                      </li> -->
                      
                    </ul>
                    
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="javascript:">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
        
         </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Friends</span>
                <span class="info-box-number showData">
                   
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Request Sent</span>
                <span class="info-box-number showData"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
             <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number showData"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- Main row 1-->
      
        <!-- /.row (main row 1) -->
        <div class="row">

        <div class="col-md-5">
     
     <div class="card card-widget widget-user" style="height:360px;">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user- text-capitalize" id="userName" >Name</h3>
                <h5 class="widget-user-desc">Member of Chat-System</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" id="imgF"src="images/abc.png" alt="User Avatar" style="width:100px; height:100px">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right" style="visibility:hidden">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header" id="frnd">000</h5>
                      <span class="description-text">Friends</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4" style="visibility:hidden">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>  
                <!-- /.row -->
                <div class="row justify-content-center p-2">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="hidden" name="sndT" id="sndT">
                <input type="submit" id="wrkB" value="Send Request" class="btn btn-sm btn-info p-1 mr-2" style="width:100px">
                <input type="submit" id="msgB" value="Message" class="btn btn-primary  btn-sm p-1" style="width:100px" disabled>
                <?php
                $login = new select('login');
                $friends = new select('friends');
                $request;
                $collect = array();
                $id;
                $ac;
                if(isset($_POST['wrkB'])){
                  $id = $_POST['sndT'][2].$_POST['sndT'][3];
                   for ($i=0; $i < $login->rows_counted; $i++) { 
                         if($login->row_value[$i][0] == $id){
                          $ac = $login->row_value[$i][9];
                           $request = $login->row_value[$i][6];
                           $request++;
                           array_push($collect, $login->row_value[$i][3], $login->row_value[$i][2]);
                           $upd = "UPDATE login SET requests='".$request."' WHERE id=".$id." ";
                           database::$con->query($upd);
                        } }
                        for ($vv=0; $vv < $login->rows_counted; $vv++) { 
                          if ($login->row_value[$vv][3] == $_SESSION['user']) {
                            array_push($collect, $login->row_value[$vv][2], $login->row_value[$vv][3],
                          "on", "pending", date('Y-m-s h:i:s A'), $ac);
                         }
                        }
                            $send = new iu("friends", $collect, "", "", "insert");
                           $send->clean();
                          $send->main();
                          if($send->ins == "Inserted"){ ?>
                         <script>window.location.href = 'profile.php';</script>
                          <?php }else{
                            $request--;
                            $upd = "UPDATE login SET requests='".$request."' WHERE id=".$id." "; 
                            database::$con->query($upd);
                            ?>
                          <script>alert('<?php echo json_encode($collect); ?>');histpory.go(-1);</script>
                       <?php } }elseif (isset($_POST['cnclR'])) {
                                 $id = $_POST['sndT'][2].$_POST['sndT'][3];
                                 for ($i=0; $i < $login->rows_counted; $i++) { 
                                  if($login->row_value[$i][0] == $id){
                                    $collect[] =  $login->row_value[$i][3];
                                    $request = $login->row_value[$i][6];
                                    $request--;
                                    $upd = "UPDATE login SET requests='".$request."' WHERE id=".$id." ";
                                    database::$con->query($upd);
                                 } }
                                 $delt = "DELETE FROM friends WHERE email='".$collect[0]."' AND identity='".$_SESSION['user']."'";
                                 if(database::$con->query($delt) === true){ ?>
                              <script>window.location.href = 'profile.php';</script>
                                <?php }else {
                                   $request++;
                                   $upd = "UPDATE login SET requests='".$request."' WHERE id=".$id." ";
                                   database::$con->query($upd); ?>
                                     <script>alert('Problem in Canceling Request');</script>
                                <?php } }elseif (isset($_POST['rmvF'])) {
                                     $id = $_POST['sndT'][2].$_POST['sndT'][3];
                                     for ($i=0; $i < $login->rows_counted; $i++) { 
                                      if($login->row_value[$i][0] == $id){
                                        $collect[] = $login->row_value[$i][3];
                                        $request = $login->row_value[$i][5];
                                        if($request != 0){
                                          $request--;
                                        }elseif($request <= 0) {
                                          $request = "0";
                                        }
                                       $upd = "UPDATE login SET friends='".$request."' WHERE id=".$id." ";
                                        database::$con->query($upd);
                                     }
                                     if($login->row_value[$i][3] == $_SESSION['user']){
                                      $collect[] = $login->row_value[$i][3];
                                      $request = $login->row_value[$i][5];
                                      if($request != 0){
                                        $request--;
                                      }elseif($request <= 0) {
                                        $request = "0";
                                      }
                                      $upd = "UPDATE login SET friends='".$request."' WHERE id=".$login->row_value[$i][0]." ";
                                      database::$con->query($upd);
                                   } 
                                    }
                                    $rmv = new select('messages');
                                    for ($y=0; $y < $rmv->rows_counted; $y++) { 
                                            if($rmv->row_value[$y][1] == $collect[0] && $rmv->row_value[$y][4] == $collect[1] ||
                                            $rmv->row_value[$y][1] == $collect[1] && $rmv->row_value[$y][4] == $collect[0]){
                                              $de = "DELETE FROM messages WHERE id=".$rmv->row_value[$y][0]."";
                                              database::$con->query($de);
                                            }
                                    }
                                $delt = "DELETE FROM friends WHERE email='".$collect[0]."' AND identity='".$collect[1]."' or email='".$collect[1]."' AND identity='".$collect[0]."' ";
                                if(database::$con->query($delt) === true){ ?>
                                 <script>window.location.href = 'profile.php'</script>
                                <?php }else { ?>
                                 <script>alert('lag gaye');history.go(-1);</script>    
                                <?php } }elseif (isset($_POST['|||'])) {
                                   
                                   $ne = new select('friends');
                                   for ($t=0; $t < $ne->rows_counted; $t++) { 
                                       if($ne->row_value[$t][1] == $_SESSION['user']){
                                          $upss = "UPDATE friends SET emailStatus='off' WHERE id=".$ne->row_value[$t][0]." ";
                                          database::$con->query($upss);
                                       }elseif ($ne->row_value[$t][4] == $_SESSION['user']) {
                                        $upss = "UPDATE friends SET frndStatus='off' WHERE id=".$ne->row_value[$t][0]." ";
                                        database::$con->query($upss);
                                       }
                                   }
                                   $ne = new select('login');
                                   for ($t=0; $t < $ne->rows_counted; $t++) { 
                                       if($ne->row_value[$t][3] == $_SESSION['user']){
                                        $upss = "UPDATE login SET statuss='off' WHERE id=".$ne->row_value[$t][0]." ";
                                          database::$con->query($upss);
                                       }
                                   }      //session_abort();
                                          session_destroy();
                                  ?>
                                <script>window.location.href = 'index.php';</script>
                               <?php } ?> 
                 </form>
                </div>
              </div>
            </div>
     </div> 

    <div class="col-md-7 mt-auto">
    <div class="row justify-content-center" id="msgs">
      
    </div>
    </div>

         </div>
                <!--/.direct-chat -->
              </div> 
           </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php

 include_once 'footer.php';
 include_once 'footer-main.php'; 
?>
  <script>
        var good;
        $str = "<?php echo $_SESSION['user']; ?>";
        var $abc;
       setInterval(() => {
        var $shw = document.getElementsByClassName('showData');
            var xmlR = new XMLHttpRequest();
            var fr = document.getElementById('frnds');
            
             xmlR.onreadystatechange = function(){
               if(this.readyState == 4 && this.status == 200){
                 $abc = JSON.parse(this.responseText);
                for (let index = 0; index < $abc[0].rows_counted; index++) {
                    if($abc[0].row_value[index][3] == $str && $abc[0].row_value[index][9] == "on"){
                       $shw[0].innerHTML= $abc[0].row_value[index][5];
                       $shw[1].innerHTML= $abc[0].row_value[index][6];
                       $shw[2].innerHTML= $abc[0].row_value[index][7];
                       document.getElementById("shww").innerHTML = $abc[0].row_value[index][6];
                       document.getElementById('user-name').innerHTML = $abc[0].row_value[index][2];
                       document.getElementById('picture').src = "images/"+$abc[0].row_value[index][1];
                       
                    } } 
                     var fff = document.getElementById('friendds');
                     fff.innerHTML = "";
                   for (var val = 0; val < $abc[1].rows_counted; val++) { 
                  if($abc[1].row_value[val][1] == "<?php echo $_SESSION['user']; ?>" && $abc[1].row_value[val][6] == "friended"){
                      if($abc[1].row_value[val][5] == "on"){
                        fff.innerHTML += '<li class="nav-item">'+
                                         '<a href="javascript:void(0)" class="nav-link" onclick="funMsg(\''+$abc[1].row_value[val][4]+'\', \''+$abc[1].row_value[val][3]+'\')">'+
                                         '<i id="abc" class="far fa-circle nav-icon text-success m-1"></i>'+
                                         '<p class="text-capitalize pl-2">'+$abc[1].row_value[val][3]+'</p></a></li>';  
                      }else if($abc[1].row_value[val][5] == "off"){
                        fff.innerHTML += '<li class="nav-item">'+
                                         '<a href="javascript:void(0)" class="nav-link" onclick="funMsg(\''+$abc[1].row_value[val][4]+'\', \''+$abc[1].row_value[val][3]+'\')">'+
                                         '<i id="abc" class="far fa-circle nav-icon text-secondary m-1"></i>'+
                                         '<p class="text-capitalize pl-2">'+$abc[1].row_value[val][3]+'</p></a></li>'; 
                      }
                    }else if($abc[1].row_value[val][4] == "<?php echo $_SESSION['user']; ?>" && $abc[1].row_value[val][6] == "friended"){
                      if($abc[1].row_value[val][8] == "on"){
                        fff.innerHTML += '<li class="nav-item">'+
                                         '<a href="javascript:void(0)" class="nav-link" onclick="funMsg(\''+$abc[1].row_value[val][1]+'\', \''+$abc[1].row_value[val][2]+'\')">'+
                                         '<i id="abc" class="far fa-circle nav-icon text-success m-1"></i>'+
                                         '<p class="text-capitalize pl-2">'+$abc[1].row_value[val][2]+'</p></a></li>';  
                      }else if($abc[1].row_value[val][8] == "off"){
                        fff.innerHTML += '<li class="nav-item">'+
                                         '<a href="javascript:void(0)" class="nav-link" onclick="funMsg(\''+$abc[1].row_value[val][1]+'\', \''+$abc[1].row_value[val][2]+'\')">'+
                                         '<i id="abc" class="far fa-circle nav-icon text-secondary m-1"></i>'+
                                         '<p class="text-capitalize pl-2">'+$abc[1].row_value[val][2]+'</p></a></li>'; 
                      }
                    }
                     
                   }
                 
           var $rqst = document.getElementById('showRequest');
           var $col;
           var $gg;
           var $coollect = 0;
           $rqst.innerHTML = "";
          for (var cnt = 0; cnt < $abc[1].rows_counted; cnt++) {
             
              if($abc[1].row_value[cnt][1] == "<?php echo $_SESSION['user'] ;?>" && $abc[1].row_value[cnt][6] == "pending"){
                   
                for (var one = 0; one < $abc[0].rows_counted; one++) {
               if($abc[0].row_value[one][3] == $abc[1].row_value[cnt][4]){
                 $col  =  $abc[0].row_value[one][1];
               }
             }
             if($abc[1].row_value[cnt][6] == "Pending"){
                 $gg =  "text-info";
             }else {
              $gg =  "text-success";
             }
             var value = '<div class="dropdown-item"><div class="media">'+
                '<img src="images/'+$col+'" alt="User Avatar" class="img-size-50 mr-3 img-circle">'+
                '<div class="media-body">'+
                '<h3 class="dropdown-item-title text-capitalize">'+$abc[1].row_value[cnt][3]+'<span class="float-right text-sm '+$gg+'">'+
                '<i class="fas fa-star "></i></span></h3>'+
                '<p class="text-sm pt-1"><input type="button" name="'+$abc[1].row_value[cnt][0]+'" onclick="funC(this.name, this.id)" id="'+$abc[1].row_value[cnt][0]+'aa" value="Accept" class="btn btn-sm btn-info mr-1" style="">'+
                '<input type="button" value="Cancel" name="'+$abc[1].row_value[cnt][0]+'" onclick="delT(this.name, this.id)" id="'+$abc[1].row_value[cnt][0]+'dd" class="btn btn-sm btn-secondary">'+
                '<br><span class="text-secondary">Sent You a Friend Request</span></p>'+
                '<p class="text-sm text-muted"><i class="far fa-clock mr-1">&nbsp; '+$abc[1].row_value[cnt][7]+'</i></p></div></div></div>'+
                '<div class="dropdown-divider"></div>'; 
             
                  $rqst.innerHTML += value;
                
            
              }
            
          } 
            document.getElementById('newMsg').innerHTML = "";
            document.getElementById('numMsg').innerHTML = "";
            var cont  = 0 ;
            
          for (let jkl = 0; jkl < $abc[2].rows_counted; jkl++) {
              if($abc[2].row_value[jkl][4] == "<?php echo $_SESSION['user']; ?>" && $abc[2].row_value[jkl][6] == "unread"){
                document.getElementById('newMsg').innerHTML +=   '<div class="dropdown-divider"></div>'+
                                                                 '<a href="javascript:void(0)" onclick="funMsg(\''+$abc[2].row_value[jkl][1]+'\', \''+$abc[2].row_value[jkl][2]+'\')" class="dropdown-item">'+
                                                 '<i class="fas fa-envelope mr-2 text-capitalize"></i> Message from <strong>'+$abc[2].row_value[jkl][2]+'</strong>'+
                                                                                '</a>';
                document.getElementById('numMsg').innerHTML = cont+1;
              }
            
          }
          

        } 
             };
             xmlR.open("GET", "ajax.php?q=data", true);
             xmlR.send();
       }, 1000);
     


   document.getElementById('srhM').addEventListener("keyup", function() {
    // alert(this.value.length);
       if(this.value.length >= "3"){
        document.getElementById('card').className = "card";
         var srhM = new XMLHttpRequest();
         srhM.onreadystatechange = function (){
           if(this.readyState == 4 && this.status == 200){
            var $v = JSON.parse(this.responseText);
            for (var r = 0; r < $v.length; r++) {
              if(r == 0){
               // document.getElementById('mem').innerHTML  = $v;
             document.getElementById('mem').innerHTML ='<li><img src="images/'+$v[r][1]+'" alt="User Image" style="width:150px; height:150px;"><a onclick="myFunn(\''+$v[r][0]+'\',\''+$v[r][1]+'\',\''+$v[r][2]+'\',\''+$v[r][3]+'\',\''+$v[r][4]+'\',\''+$v[r][5]+'\')" href="javascript:void(0)" class="users-list-name text-capitalize mt-2" id="'+$v[r][2]+'" >'+$v[r][2]+'</a></li>';
               }else{
                document.getElementById('mem').innerHTML +='<li><img src="images/'+$v[r][1]+'" alt="User Image" style="width:150px; height:150px;"><a onclick="myFunn(\''+$v[r][0]+'\',\''+$v[r][1]+'\',\''+$v[r][2]+'\',\''+$v[r][3]+'\',\''+$v[r][4]+'\',\''+$v[r][5]+'\')" href="javascript:void(0)" class="users-list-name text-capitalize mt-2" id="'+$v[r][2]+'" >'+$v[r][2]+'</a></li>';

              }
             }
            // document.getElementById('show').innerHTML = $v;
           }
         };
         srhM.open("GET","includes/search.php?q="+this.value+"&col_num=2", true);
         srhM.send();
       }else{
        document.getElementById('card').className = "card collapsed-card";
       }
   }); 
       function myFunn(i, mg, n, f, m, r){
      document.getElementById('userName').innerHTML = n; 
      document.getElementById('imgF').src ='images/'+mg; 
      document.getElementById('frnd').innerHTML = f; 
      document.getElementById('sndT').value = i;
      var btn = document.getElementById('wrkB');
      if(r == "pending"){
        btn.value = "Cancel Request";
        btn.name = "cnclR";
        btn.class = "btn btn-sm btn-secondary p-1 mr-2";
      }else if(r == "friended"){
        btn.value = "Remove Friend";
        btn.name = "rmvF";
        btn.class = "btn btn-sm btn-danger p-1 mr-2";

      }else if(r == "Add" && m == "You"){
        btn.value = "Log Out";
        btn.name = "|||";
        btn.class = "btn btn-sm btn-warning p-1 mr-2";
  }else if(r == "Add" && m == "Not-You"){
        btn.value = "Add Friend";
        btn.name = "wrkB";
        btn.class = "btn btn-sm btn-success p-1 mr-2";

      }
       }
       function funC(def, fh) {
                document.getElementById(fh).value = "Friend";
                document.getElementById(fh).disabled = true;
                document.getElementById(def+'dd').style.display = "none";
        var xmlRequest = new XMLHttpRequest();
          xmlRequest.open("GET", "ajax.php?a="+def, true);
           xmlRequest.send();

       }

       function delT(def, fh) {
        document.getElementById(fh).value = "Deleted";
        document.getElementById(fh).disabled = true;
        document.getElementById(def+'aa').style.display = "none";
        var xmlReques = new XMLHttpRequest();
           xmlReques.open("GET", "ajax.php?d="+def, true);
           xmlReques.send();
 }
      
       function funMsg($var, $nam){
        document.getElementById('msgs').innerHTML = '<div class="col-md-6 mt-auto" id="'+$var+'boxx">'+
'              <div class="card direct-chat direct-chat-warning">'+
'                  <div class="card-header bg-warning">'+
'                  <h3 class="card-title text-capitalize" id="nof">'+$nam+'</h3>'+
'                  <div class="card-tools">'+
'                     <button type="button" class="btn btn-tool" onclick="minimize(\''+$var+'\', \''+$nam+'\')" data-card-widget="collapse">'+
'                        <i class="fas fa-minus" id="minus'+$var+'"></i>'+
'                      </button>'+
'                      <button type="button" class="btn btn-tool" data-card-widget="remove" onclick="allRemove(\''+$var+'\')">'+
'                        <i class="fas fa-times"></i>'+
'                      </button>'+
'                    </div>'+
'                  </div>'+
'                 <div class="card-body" >'+
'                 <div class="direct-chat-messages" id="cardbody">'+
'                 <div id="'+$var+'"></div></div></div>'+
'                   <div class="card-footer">'+
'                      <div class="input-group">'+
'                        <input type="text"  id="'+$var+'this" placeholder="Type Message ..." class="form-control">'+
'                        <span class="input-group-append">'+
'                          <button type="button" onclick="mainFun(\''+$var+'\',\''+$nam+'\')" class="btn btn-warning">Send</button>'+
'                        </span>'+
'                      </div>'+
'                  </div>'+
'                </div>';
  
if(document.getElementById('msgs').innerHTML != ""){
      good =  setInterval(() => {
           var boddy = document.getElementById('cardbody');
           var $msd = new XMLHttpRequest();
             $msd.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  document.getElementById($var).innerHTML= "";
                  var $msgs = JSON.parse(this.responseText);
                //   if(document.getElementById('minus'+$var).ClassName == "fas fa-minus"){
                //     funMsg($var, $nam);
                // }
                  for (var cnn = 0; cnn < $msgs[1].length; cnn++) {
                    if(cnn == dat){
                      continue;
                    }else{
                    var n = cnn+1;
                    var dat = n+1;
                     if($msgs[1][cnn] == $msgs[0][1]){
                      document.getElementById($var).innerHTML += '<div class="direct-chat-msg right" id="'+$var+'cht1">'+
                                                           '<div class="direct-chat-infos clearfix">'+
                                         '<span class="direct-chat-name float-right text-capitalize">'+$msgs[0][1]+'</span>'+
                                             '<span class="direct-chat-timestamp float-left">'+$msgs[1][dat]+'</span></div>'+
                                         '<img class="direct-chat-img" src="images/'+$msgs[0][0]+'" alt="message user image">'+
                                                              '<div class="direct-chat-text">'+
                                                                        $msgs[1][n] +
                                                                          '</div></div>';
                     }else if($msgs[1][cnn] == $msgs[0][3]){
                      document.getElementById($var).innerHTML += '<div class="direct-chat-msg" id="'+$var+'cht2">'+
                                                           '<div class="direct-chat-infos clearfix">'+
                                         '<span class="direct-chat-name float-left text-capitalize">'+$msgs[0][3]+'</span>'+
                                             '<span class="direct-chat-timestamp float-right">2'+$msgs[1][dat]+'</span></div>'+
                                         '<img class="direct-chat-img" src="images/'+$msgs[0][2]+'" alt="message user image">'+
                                                              '<div class="direct-chat-text">'+
                                                                        $msgs[1][n] +
                                                                          '</div></div>';
                     }
                   }
                  }
                  boddy.scrollTop = boddy.scrollHeight;

                }
              };
              $msd.open("GET", "ajax.php?msg="+$var, true);
              $msd.send();
              
        }, 1000); 
      }
       }
       function mainFun($aa, $bb){
         var inputt =  document.getElementById($aa+'this').value; 
         var  $$con = new XMLHttpRequest();
         $$con.open("GET", "ajax.php?main="+$aa+"&name="+$bb+"&value="+inputt, true);
         $$con.send();
           document.getElementById($aa+'this').value = "Message Sent";
       }
       function allRemove($rmmv){
        clearInterval(good);
        var thisis = document.getElementById($rmmv+'boxx');
        thisis.remove();  
       }
       function minimize($one, $two){
         if(document.getElementById('minus'+$one).className == "fas fa-minus"){
               clearInterval(good);
         }else if(document.getElementById('minus'+$one).className == "fas fa-plus"){
          funMsg($one, $two);
         }
        
       }
   
</script>

<?php
} 
}else{ ?>
<script>alert('Try to Login first or Make Your Account'); window.location.href ='index.php';</script>
<?php } ?>
