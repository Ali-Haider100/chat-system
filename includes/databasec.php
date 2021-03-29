<?php
class database{
    
    public static $db;
    public static $con;
    public static function connect(string $name){
        self::$db = $name;
        if(self::$db != ""){
         self::$db = trim(self::$db);
         self::$con = new mysqli("localhost", "root", "", self::$db);
            if(self::$con->connect_error){
                die("Connection failed: " . self::$con->connect_error);
            }
        }else{
            echo "Database name is required";
        }
        
    }

    
}

database::connect("chatsys");
database::$con;
?>