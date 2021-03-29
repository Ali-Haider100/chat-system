<?php
//  ini_set("display_errors", "1");
//  error_reporting(E_ALL);
// require 'databasec.php';

class select { 
    public $table; 
    public $row_value;
    public $row_field;
    public $field_counted;
    public $table_name;
    public $rows_counted;
    public $FWI;
    public $last_id;
    function __construct($a) {
        
        $this->table = $a;
        $Squery = "SELECT * FROM ".$this->table."";
        $result = database::$con->query( $Squery );
        $this->field_counted = database::$con->field_count;
        $counter = 0;
        while( $row = $result->fetch_all()) {
            $this->rows_counted = count( $row );
            $this->row_value = $row;
            
        }
        if ($this->rows_counted > 0) {
            $this->last_id = $this->row_value[$this->rows_counted-1][0];

        }
        while( $this->field = $result->fetch_field() ) {    
            $this->row_field[] = $this->field->name;
            $this->table_name = $this->field->table;
        }
        for ($i=0; $i < $this->field_counted; $i++) { 
               if($i == 0){
                   continue;
               }else {
                   $this->FWI[] = $this->row_field[$i];
               }
        }
    }
  
}




  
 /* Just a demo function to show data 
 public function ab() {

        echo stripslashes($this->row_value[1]['email']);  first [] is row num and second [] is field name
        echo "<br>";
        echo $this->table_name;   table name
        echo "<br>";
        echo $this->field_counted; number of field in table
        echo "<br>";
        echo $this->row_field[2];  field name 
        echo "<br>";
        echo $this->rows_counted;  number of rows in a table
        ECHO "<BR>";
        $sel->check(array('','abc','def','ghi'), array());
    
    }  */
?>