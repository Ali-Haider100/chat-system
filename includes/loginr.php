<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

// require 'includes/databasec.php';
// require 'includes/select.php';
// require 'includes/IU.php';
// require 'includes/validation.php';
// require 'includes/check.php';
// require 'includes/random.php';
// require 'includes/loginr.php';

class inup {
    public  static $svalue;
    // BOTH MATCHED VALUES IN ARRAY
    public static $num = 0;
    private static $id;
    public  static $error;
    public  static $status;
    public static $signup;
    //public static $rown;
    //inup::login( array('',''), array('','',''), 'table-name');
     public static function login(array $cred, array $key, $tablName, $vluNum){
           if(count($cred) == count($key)){
               validation::strict($cred, $key);
               if(!empty(validation::$def)){
                   self::$error =  validation::$def;
                }else{
                  $logSel  = new select($tablName);
                  for ($c=0; $c <$logSel->rows_counted ; $c++) { 
                         $ids[] = $logSel->row_value[$c][0]; 
                  }
                  check::idVise($ids, validation::$value, $tablName);
                  if(check::$cntExist == $vluNum){
                      if(count(array_unique(check::$exist)) === 1){
                       $UPDATE = "UPDATE ".$tablName." SET statuss='on' WHERE id=".check::$exist[0]." ";
                       if(database::$con->query($UPDATE) === true){
                           self::$status = "On";
                       }else{
                           self::$status = database::$con->error;
                       }
                      }
                  }else{
                      self::$error = check::$cntExist;
                  }
                }
           }
           
     }
    /*  /inup::signup(array(2,3),array(values), array(value_types), 'table_name','destination _url');*/
    public static function signup(array $liFlds, array $lichk, array $c, array $d, $liTable){
        array_push($c, "newOff");
        validation::strict($c,$d);
        if(!empty(validation::$def)){
           self::$error = validation::$def;   
        }else{
             if(count($liFlds) == count($lichk)){
                  for ($t=0; $t < count($lichk); $t++) { 
                        $tmp = $lichk[$t];
                       $chkVar[]  = validation::$value[$tmp]; 
                  }
                 check::MVM($liFlds, $chkVar, $liTable);
                 if(!empty(check::$cntExist)){
                     self::$error = check::$exist;
                 }else{
                      $var = new iu($liTable, validation::$value , "", "", "insert");
                      $var->clean();
                      $var->main();
                      if($var->ins == "Inserted"){ 
                           self::$signup = "success";
                       }else {
                          self::$error = $var->ins;
                      }
                 }
             }else {
                 self:;$error = "Argeument one and two are not equal";
             }
        }
      
 }

    public static function logoff($email, $status){
        function get_client_ip() {
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP')."a";
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR')."b";
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED')."c";
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR')."d";
            else if(getenv('HTTP_FORWARDED'))
               $ipaddress = getenv('HTTP_FORWARDED')."e";
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR')."f";
            else
                $ipaddress = 'UNKNOWN';
            return $ipaddress;
        }
        if(filter_var(get_client_ip(), FILTER_VALIDATE_IP)){
            if($_SESSION['ip'] == get_client_ip() && $status == "on"){
                database::$con->query( "UPDATE inup SET status='off' where email=".$email."" );
                session_unset();
                session_destroy();
                return "off";
            }
        }
    }
}
// inup::login(array('imalihaider1@dgmail.com','asd123ASD!@#'), array('email','pwd'), 'login', 2);
// if(!empty(inup::$error)){
//     print_r(gettype(inup::$error));
// }else{
//     echo inup::$status;
// }

 
// inup::signup(array('3','4'), array('2','3'), array('image','name','e@maakhsajsial.com','p123ASD1ajsalsjkk23wd'), array('text','text','email','pwd','text'), 'login', '../index.php');
// if(inup::$error ){
//     print_r(inup::$error);

// }
 
//MUST BE EQUAL       //MUST BE EQUAL    // Must apply validateion before running this function
//  LOGIN
//echo inup::$error;  : ERRORS
//if there is no valuenof less value than second array
//echo inup::$status; WETHER STATUS IS ON OR PROBLEM IN QUERY  : TO WORK FURTHER
//echo inup::$num; NUMBER TO CHECK
//inup::signup(array(flds_num),array(values), array(value_types), 'table_name','destination _url') SIGNUP
//echo inup::$status; TO WORK FURTHER
//inup::logoff('email','status');



    /* signup info */
// inup::signup(array(), array, array, array, 'table_name', 'destination_after_success');
//array_one = number of database table fields for checking purpose 
// array_two = number of array values inside $c arguement : thise values which you want to check
//array_three = values
//array_four = value types to validation purpose
// inup::error = in cas any error occurs in while signing up.  


 /* login info*/
 //inup::login(array('imalihaider1@gmail.com','asd123ASD!@#'), array('email','pwd'), 'login', 2);
 //ARG-1 = VALUES FROM INPUT FIELDS OF LOGIN 
 //ARG-2 = TYPE OF THOSE VALUES
 //ARG-3 = TABLE_NAME
 //ARG-4 = NUMBER OF HOW MUCH VALUES ARE IN FIRST ARRAY ARGUEMENT
 //INUP::$status  = TO FINED ABOUT STATUS WHETHER IT IS ON OR OFF
 //INUP::$error = IF there is one or no value in table or if email of password is not valid 
  
 



?>

