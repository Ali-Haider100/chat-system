<?php
// require 'databasec.php';
// require 'select.php';
class iu{
        private $table;
        private $values;
        private $key;
        private $updValue;
        private $qry;
        private $newField;
        private $newValue;
        public $error;
        public $ins;
   function __construct($a, array $b, $c, $d, $e){
              $this->table = $a;
              $this->values = $b;
              $this->key = $c;
              $this->updValue = $d ;
              $this->qry = $e;
   }

    public function clean(){
        foreach ( $this->values as $key=>$value ) {
            $this->values[$key] = trim( $value );
            $this->values[$key] = addslashes( $this->values[$key] );
            $this->values[$key] = htmlspecialchars( $this->values[$key] );
        }
    }

  public function main(){
            // require 'select.php'; must be in headers with all other includes
          $selIU = new select($this->table);
            // checking if any value is empty
          for ($i=0; $i <count($this->values); $i++) { 
               if($this->values[$i] == ""){
                   $this->values[$i] = "NVI"; //  Stands for no value intered
               }
          }
            // checking if any value is empty end!
           
           if($selIU->field_counted - 1 == count($this->values)){
                    if($this->qry == "insert"){
                          for ($i=0; $i < count($this->values); $i++) { 
                                    if($i == 0){
                                      $this->newField = "(".$selIU->row_field[$i+1];
                                      $this->newValues = "('".$this->values[$i]."'";
                                    }elseif ($i == count($this->values)-1) {
                                        $this->newField .= ",".$selIU->row_field[$i+1].")";
                                        $this->newValues .= ", '".$this->values[$i]."')";
                                    }else {
                                        $this->newField .= ",".$selIU->row_field[$i+1];
                                        $this->newValues .= ", '".$this->values[$i]."'";
                                    }
                          }
                          $iQuery = "INSERT INTO ".$this->table." ".$this->newField." VALUES ".$this->newValues." ";
                          if(database::$con->query($iQuery) === true){
                              $this->ins = "Inserted";
                          }else {
                               $this->ins = database::$con->error;
                          }

                    }elseif($this->qry == "update"){
                               for ($i=0; $i < count($this->values); $i++) { 
                                   if($i == 0){
                                    $this->newField = $selIU->row_field[$i+1].'='.'"'.$this->values[$i].'"';
                                   }else {
                                    $this->newField .= ', '.$selIU->row_field[$i+1].'='.'"'.$this->values[$i].'"';
                                   }
                                       
                               }
                            $uQuery = "UPDATE ".$this->table." SET ".$this->newField." WHERE ".$this->key."=".$this->updValue;
                            if(database::$con->query($uQuery) === true){
                                $this->ins = "Updated";
                            }else {
                                 $this->ins = "Not Updated";
                            }
                    }
           } else{
               $this->error = "Difference in fields and values";
           }
        


  }

}







           // ID IS NOT REQUIRED WHILE INSERTING OR UPDATING DATA.
    // $var = new iu("login", array('imag""es','na/me\s','em<script>ails','passwords','statuss') , "id", "12", "update");
    // $var->clean();
    // $var->main();


?>