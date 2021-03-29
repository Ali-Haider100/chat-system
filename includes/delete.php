<?php
include 'databasec.php';
class delete
{
    private $table;
    private $values;
    private $all;
    private $foreign;
    private $cT;
    private $cV;
    public $del;
    public function __construct(array $a, array $b, $c, $d)
    {
        $this->table   = $a;
        $this->values  = $b;
        $this->all     = $c;
        $this->foreign = $d;
        $this->cT      = count($a);
        $this->cV      = count($b);
    }
    // Deleting all data from multiple or single table
    // $delete = new delete(array('pro','aa'), array(''), "all", "");
    // $delete->set1();
    public function set1()
    {
        if($this->all == "all") {
            for($g = 0; $g < $this->cT; $g++) {
                 $dQuery = "DELETE FROM " . $this->table[$g] . "";  
                if(database::$con->query($dQuery) === True) {           
                     $this->del = "Tables Deleted";                 
                } else {
                     $this->del = "Error";
                }
            }
        }
    }
    //For deleting single or multiple value from one table
    //$delete = new delete(array('pro'), array('77','34','23'), "", "");
    //$delete->set2();
    public function set2()
    {
        if(!empty($this->values)) {
            for($h = 0; $h < $this->cV; $h++) {
                 $dQuery = "DELETE FROM " . $this->table[0] . " WHERE id=" . $this->values[$h] . "";
                if(database::$con->query($dQuery) === True) {                
                     $this->del = "Tables Data Deleted";
                } else {
                     $this->del = "Error";
                }
            }
        }
    }
    //For deleting data with foreign key from single or multiple tables
    //$delete = new delete(array('pro','aa'), array('77'), "", "foreign-key-name");
    //$delete->set3();
    public function set3()
    {
        if(!empty($this->foreign)) {
            for($j = 0; $j < $this->cT; $j++) {
                for($k = 0; $k < $this->cV; $k++) {
                     $dQuery = "DELETE FROM " . $this->table[$j] . " WHERE " . $this->foreign . "=" . $this->values[$k] . "";
                    if(database::$con->query($dQuery) === True) {
                         $this->del = "Tables Data With Same Values Deleted";
                    } else {
                         $this->del = "Error";
                    }
                }
            }
        }
    }
}

?>

