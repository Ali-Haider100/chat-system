<?php
//    ini_set("display_errors", "1");
//    error_reporting(E_ALL);
  
//    require 'databasec.php';
class imge{
  private $name;
  private $path;
  private $table; 
  public $error;
  public $imgI;
  public $imgU;
 function __construct(array $a ,$b, $c){
    $this->name = $a;
    $this->path = $b; 
    $this->table = $c;
 }
 public function uploadI(){
     for ($i=0; $i < count($this->name['name']); $i++) { 
        move_uploaded_file($this->name['tmp_name'][$i], $this->path.$this->name['name'][$i]);
     }
 }
 public function insertI(array $field){
      if(count($this->name['name']) != count($field)){
            $this->error = "Numbers are not equal in insert";
      }else{
          for ($m=0; $m <count($field) ; $m++) { 
               if($m == 0){
                   $fname = "(".$field[$m];
                   $vname  = "('".$this->name['name'][$m]."'";
                }elseif($m == count($field) - 1){
                    $fname .= ", ".$field[$m].")";
                    $vname .= ", '".$this->name['name'][$m]."')";
                }else{
                    $fname .= ", ".$field[$m];
                    $vname .= ", '".$this->name['name'][$m]."' ";
                }
          }
          $iIQuery = "INSERT INTO ".$this->table." ".$fname." VALUES ".$vname." ";
          if(database::$con->query($iIQuery) === true){
              $this->imgI = "Inserted";
          }else{
              $this->imgI = "Not Inserted";
          }
      }
 }

 public function updateI(array $aa,  $bb, $cc){
      if(count($aa) != count($this->name['name'])){
         $this->error = "Numbers are not equal in update";
      }else{
        for ($mm=0; $mm < count($aa); $mm++) { 
              if($mm == 0) {
                  $stmt = $aa[$mm]."='".$this->name['name'][$mm]."'";
              }else{
                $stmt .= ", ".$aa[$mm]."='".$this->name['name'][$mm]."'";
              }
        }
        $uIQuery = "UPDATE ".$this->table." SET ".$stmt." WHERE  ".$bb."=".$cc."";
        if(database::$con->query($uIQuery) === true){
          $this->imgU = "Updated";
        }else{
            $this->imgU = $uIQuery.database::$con->error;
        }
      }

 }
   public function deleteI($f, $p){
         if($f == "unload"){
             for ($ii=0; $ii < count($this->name['name']); $ii++) { 
                if(!file_exists($p.$this->name['name'][$ii])){
                    $this->error = "This file not exist : ".$this->name['name'][$ii];
                }else{
                       unlink($p.$this->name['name'][$ii]);
                        $this->error[] = "Unlinked ".$p.$this->name['name'][$ii];
                }
             }
         }
   }
     
}
 
 
 // abc = new imge(array('name'), "images/", "table-name");
 // abc->uploadI();
 // $abc->insertI(array('field-names'));
 // $abc->updateI(array('field-names'), "id", "value");
 // $abc->deleteI("unload", "images/");
 // $abc->error   for checking  iin casae of delete it is array
 // $abc->imgI for checking insertion
 // $abc->imgU for checking updation
?>

