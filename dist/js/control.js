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
