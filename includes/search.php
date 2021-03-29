<?php
 ini_set("display_errors", "1");
 error_reporting(E_ALL);
session_start();
require 'databasec.php';
require 'select.php'; 

class chk{
    public $value;
    public $first;
    public $second;
    
    function __construct($name, $colNum){
        $sel = new select('login');
         for ($i=0; $i < $sel->rows_counted; $i++) { 
               if(stristr($sel->row_value[$i][$colNum], $name)){ 
                 if($sel->row_value[$i][3] == $_SESSION['user']){
                    $this->value[]  = rand(10,50).$sel->row_value[$i][0].rand(10,50);
                     array_push($this->value, $sel->row_value[$i][1],
                     $sel->row_value[$i][2],$sel->row_value[$i][5],"You");
                     $this->first  = $sel->row_value[$i][3];
                     $this->second = $sel->row_value[$i][2];
                    }else {
                        $this->value[]  = rand(10,50).$sel->row_value[$i][0].rand(10,50);
                        array_push($this->value, $sel->row_value[$i][1],
                        $sel->row_value[$i][2],$sel->row_value[$i][5],"Not-You");
                        $this->first  = $sel->row_value[$i][3];
                        $this->second = $sel->row_value[$i][2];
                }
              $sell = new select('friends');
              if(!empty($sell->rows_counted)){
                $ff = $sell->rows_counted-1; 
            //   echo "<script>alert('".$ff.$sell->rows_counted."');</script>";
        for ($w=0; $w < $sell->rows_counted; $w++) { 
            if($sell->row_value[$w][1] == $this->first && $sell->row_value[$w][4] == $_SESSION['user'] ||
            $sell->row_value[$w][1] == $_SESSION['user'] && $sell->row_value[$w][4] == $this->first){
                $this->value[] = $sell->row_value[$w][6]; 
                break;
             }else{
                // echo "<script>alert('".$ff.$w."');</script>";
                if($sell->row_value[$w][1] != $this->first || $sell->row_value[$w][4] != $_SESSION['user']){
                    if( $w == $ff){
                        $this->value[] = "Add";
                    }
      
                }
             }
           
        }
    }else{
        $this->value[] = "Add";
    }
       
    }
         }
     }
}

if(isset($_GET['q'])){
     $g = new chk($_GET['q'], $_GET['col_num']);
      $chunked = array_chunk($g->value,6);
     echo json_encode($chunked);
   
}

?>