<?php

class random{
          // function for getting ip address of user
      public static function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    public static function getDays($a, $b){
        //date format must Y-m-d
         $start =  strtotime($a);
         $end = strtotime($b);
        // return abs($start - $end / 86400);
         return ceil(abs($start - $end) / 86400);
      // here first we are ceil(rounds a number UP to the nearest integer)
         //then we uses abc(for absolute positive value)
         // devided by total numbers of seconds in a day.
     }
     public static function HideMe($someVal){
        return openssl_encrypt($someVal, "AES-128-CTR", "chat", 0,
         "1234567891011121");
     }
     public static function showMe($someValue){
        return openssl_decrypt($someValue, "AES-128-CTR", "chat", 0,
         "1234567891011121");
     }
     

}

 
?>

