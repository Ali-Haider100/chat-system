<?php 
session_start();
if(isset($_SESSION['user'])){
require 'includes/databasec.php';
require 'includes/select.php';
require 'includes/IU.php';
require 'includes/random.php';
if(isset($_GET['q'])){
    $ajax;
    if($_GET['q'] == "data"){
        $ajax[] = new select('login');
        $ajax[] = new select('friends');
        $ajax[] = new select('messages');
        echo json_encode($ajax);
    }
     /// same structur as in select.php
    
    exit;
     
 }elseif (isset($_GET['a'])) {
         $msg = array();
         $sel  = new select('friends');
         for ($i=0; $i <$sel->rows_counted ; $i++) { 
              if($sel->row_value[$i][0] == $_GET['a']){
                  $new = new select('login');
                   for ($v=0; $v < $new->rows_counted; $v++) { 
                        if($new->row_value[$v][3] == $sel->row_value[$i][1]){
                             $msg[] = $new->row_value[$v][2];
                             $ff = $new->row_value[$v][5];
                             $rr =  $new->row_value[$v][6];
                             $ff++;
                             if($rr != 0){
                                $rr--;
                             }elseif($rr == 0) {
                                 $rr = "0";
                             }
                             
                            $u = "UPDATE login SET friends='".$ff."', requests='".$rr."' WHERE id=".$new->row_value[$v][0]." "; 
                            database::$con->query($u);
                        }
                        if($new->row_value[$v][3] == $sel->row_value[$i][4]){
                            $msg[] = $new->row_value[$v][2];
                            $ff = $new->row_value[$v][5];
                            $rr =  $new->row_value[$v][6];
                            $ff++;
                            if($rr != 0){
                                $rr--;
                             }elseif($rr == 0) {
                                 $rr = "0";
                             }
                           $u = "UPDATE login SET friends='".$ff."', requests='".$rr."' WHERE id=".$new->row_value[$v][0]." "; 
                           database::$con->query($u);
                       }
                   }  
                      $frn = new select('friends');
                      $collec = array();
                      for ($f=0; $f <$frn->field_counted; $f++) { 
                             $collec[] = $frn->row_value[$i][$f]; 
                      }   
                          $rand = rand(10, 100);
                          $var = new iu("messages", array($collec[1], $collec[2],$collec[3], $collec[4], random::HideMe("New Friend"), $rand), "", "", "insert");
                          $var->clean();
                          $var->main();
                          $var = new iu("messages", array($collec[4], $collec[3],$collec[2], $collec[1], random::HideMe("New Friend"), $rand), "", "", "insert");
                          $var->clean();
                          $var->main();
              }
              
         }
        
        $update = "UPDATE friends SET rqstStatus = 'friended' WHERE id=".$_GET['a']." ";
          if(database::$con->query($update) === true){
            echo "Ok";
        } else {
              echo "Problem";
          }
 }elseif (isset($_GET['d'])) {
    $sel  = new select('friends');
    for ($i=0; $i <$sel->rows_counted ; $i++) { 
         if($sel->row_value[$i][0] == $_GET['d']){
             $new = new select('login');
              for ($v=0; $v < $new->rows_counted; $v++) { 
                   if($new->row_value[$v][3] == $sel->row_value[$i][1]){
                        $ff = $new->row_value[$v][6];
                        if($ff != 0){
                            $ff--;
                        }elseif ($ff == 0) {
                            $ff = "0";
                        }
                      $u = "UPDATE login SET requests='".$ff."' WHERE id=".$new->row_value[$v][0]." "; 
                       database::$con->query($u);
                   }
              }
         }
    }
    $delt = "DELETE FROM friends WHERE id=".$_GET['d']." ";
    database::$con->query($delt);
     
}elseif (isset($_GET['msg'])) {
   $log = new select('login');
   $msgs = new select('messages');
   $imgCol = array();
   $oneCol = array();
   $twoCol = array();

   for ($i=0; $i < $log->rows_counted; $i++) { 
        if($log->row_value[$i][3] == $_SESSION['user']){
              $imgCol[] = $log->row_value[$i][1];
              $imgCol[] = $log->row_value[$i][2];
        }
   }
   for ($i=0; $i < $log->rows_counted; $i++) { 
    if($log->row_value[$i][3] == $_GET['msg']){
          $imgCol[] = $log->row_value[$i][1];
          $imgCol[] = $log->row_value[$i][2];
    }
}
 for ($d=0; $d < $msgs->rows_counted; $d++) { 
      if($msgs->row_value[$d][1] == $_SESSION['user'] && $msgs->row_value[$d][4] == $_GET['msg'] || 
      $msgs->row_value[$d][1] == $_GET['msg'] && $msgs->row_value[$d][4] == $_SESSION['user']){
                  $oneCol[] =    $msgs->row_value[$d][2];
                  $oneCol[] =   random::showMe($msgs->row_value[$d][5]);
                  $oneCol[] =    $msgs->row_value[$d][7];
      }
      if($msgs->row_value[$d][1] == $_GET['msg'] && $msgs->row_value[$d][4] == $_SESSION['user'] && $msgs->row_value[$d][6] == "unread"){
             $ups = "UPDATE messages SET msgStatus='read' WHERE id =".$msgs->row_value[$d][0]." ";
             database::$con->query($ups);
      }
 }
//  for ($f=0; $f < $msgs->rows_counted; $f++) { 
//     if($msgs->row_value[$f][1] == $_GET['msg'] && $msgs->row_value[$f][4] == $_SESSION['user']){
//             $twoCol[] =  $msgs->row_value[$f][5];
//     }
// }
   $abc = array();
   array_push($abc, $imgCol, $oneCol);
   echo  json_encode($abc);
}elseif (isset($_GET['main'])) {
    $name;
       $sle = new select('login');
       for ($i=0; $i < $sle->rows_counted; $i++) { 
              if($sle->row_value[$i][3] == $_SESSION['user']){
                $name = $sle->row_value[$i][2];
              }
               
        }
        $val = random::hideMe($_GET['value']);
            date_default_timezone_set('Asia/Karachi');
            $date = date('Y-m-d h:i:s A');
            $var = new iu("messages", array($_SESSION['user'], $name, $_GET['name'], $_GET['main'], $val, "unread", $date) , "", "", "insert");
            $var->clean();
            $var->main();
}elseif (isset($_GET['logout'])) {
                                   
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
    }     // session_abort();
           session_destroy(); ?>
           <script>window.location.href = 'index.php';</script>
           <?php
    }
}else{ ?>
<script>window.location.href = 'index.php';</script>
<?php }
?>