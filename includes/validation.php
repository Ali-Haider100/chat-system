<?php

class validation{

    public static $value;
    public static $def;

public static function strict( array $val, array $key){
   
    if(count($val) === count($key)){
         /*  sanitization */
      for($n=0; $n<count($val); $n++){
        if($key[$n] == "email"){
            $val[$n] = filter_var($val[$n], FILTER_SANITIZE_EMAIL); 
        }elseif ($key[$n] == "url") {
            $val[$n] =filter_var($val[$n], FILTER_SANITIZE_URL);
        }elseif ($key[$n] == "pwd") {
            $val[$n] = sha1($val[$n], false);
        }
    }
           /*  validation */
    for($o=0; $o<count($val); $o++){ 
        if($key[$o] == "email"){
            if(filter_var($val[$o], FILTER_VALIDATE_EMAIL)){
                $val[$o] = sha1($val[$o], false);
            }else{
                $val[$o] = $val[$o]." Not_Valid";
            }
        }elseif($key[$o] == "url"){
            if(filter_var($val[$o], FILTER_VALIDATE_URL)){ 
                $val[$o] = sha1($val[$o], false);
            }else {
                $val[$o] = $val[$o]." Not_Valid";
            }
        }elseif($key[$o] == "ip"){
            if(filter_var($val[$o], FILTER_VALIDATE_IP)){
                $val[$o] = sha1($val[$o], false);
            }else {
                $val[$o] = $val[$o]." Not_Valid";
            }
        }
            // if any specific validation is required like for domain for for numbers etc you can simply add those oprations here. 
               /* --------- */
            if(strpos($val[$o], "Not_Valid") == true){
                   self::$def[] = $key[$o];
               }else{
                   self::$value[] = $val[$o];
               }
    }

    
}

}

}

//validation::strict(array('abc','ali.//haider@sdf..com','127.0.0.100'),array('text','email','ip'));
//echo "<pre>";
//var_dump(validation::$value);
//echo "</pre>";
//echo "<pre>";
//var_dump(validation::$def);
//echo "</pre>";

// $value = all clean value and if any defective value is present that would be in $def. Both are arrays. 



?>

