<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
//include_once 'select.php';

class check
{
	public static $exist;
	public static $error;
	public static $cntExist;

	public static function MVM(array $chkFlds, array $chkVal, $chkTable)
	{
		$chkSel = new select($chkTable);
		if (count($chkFlds) == count($chkVal)) {
			for ($i = 0; $i < count($chkFlds); $i++) {
				for ($m = 0; $m < $chkSel->rows_counted; $m++) {
					$num = $chkFlds[$i];
					if ($chkSel->row_value[$m][$num] == $chkVal[$i]) {
						self::$exist[] = $chkSel->row_field[$num] . "-" . $chkSel->row_value[$m][$num];
					}
				}
			}
			if (!empty(self::$exist)) {
				self::$cntExist = count(self::$exist);
			}
		} else {
			self::$error = "Equal fields and values are required BY check";
		}
	}
	public static function colVise(array $chkFlds, array $chkVal, $chkTable)
	{
		$chkSel = new select($chkTable);
		for ($v = 0; $v < count($chkFlds); $v++) {
			$numf = $chkFlds[$v];
			for ($d = 0; $d < count($chkVal); $d++) {
				for ($s = 0; $s < $chkSel->rows_counted; $s++) {
					if ($chkSel->row_value[$s][$numf] == $chkVal[$d]) {
						self::$exist[] = "ID = " . $chkSel->row_value[$s][0] . "@" . $chkSel->row_field[$numf] . "=" . $chkSel->row_value[$s][$numf];
					}
				}
			}
		}
		if (!empty(self::$exist)) {
			self::$cntExist = count(self::$exist);
		}
	}

	public static function idVise(array $chkFlds, array $chkVal, $chkTable)
	{
		$chkSel = new select($chkTable);
		for ($r = 0; $r < count($chkFlds); $r++) {
			$id = $chkFlds[$r];
			for ($y = 0; $y < $chkSel->rows_counted; $y++) {
				if ($chkSel->row_value[$y][0] == $id) {
					for ($o = 0; $o < $chkSel->field_counted; $o++) {
						for ($p = 0; $p < count($chkVal); $p++) {
							if ($chkSel->row_value[$y][$o] == $chkVal[$p]) {
								self::$exist[] = $chkSel->row_value[$y][0];
							}
						}
					}
				}
			}
		}
		if (!empty(self::$exist)) {
			self::$cntExist = count(self::$exist);
		}else{
			self::$cntExist = "No value found";
		}
	}
	public static function UVAL($chkFlds, $chkVal, $chkid, $chkTable)
	{
		$chkSel = new select($chkTable);
		for ($q = 0; $q < $chkSel->rows_counted; $q++) {
			if ($chkSel->row_value[$q][$chkFlds] == $chkVal) {
				if ($chkSel->row_value[$q][0] != $chkid) {
					self::$exist[] = $chkVal . "@" . $chkSel->row_value[$q][0];
				}
			}
		}
		if (!empty(self::$exist)) {
			self::$cntExist = count(self::$exist);
		}
	}
	 // check::CIMG($_FILES['img'],array('image/jpeg','image/jpeg','image/jpeg'), '500000000', 50 , '$table_name');
	public static function CIMG(array $chkImg, array $chkType, $chkMax, $chkMin, $chkTable){
			for ($w=0; $w < count($chkImg['name']); $w++) { 
					if(!in_array($chkImg['type'][$w], $chkType)){
						self::$error = "NotT";
					}else {
						if($chkImg['size'][$w] > $chkMax || $chkImg['size'][$w] < $chkMin){
                         self::$error = "NotS";
						}
					}
				   }
     }
}

// check::CIMG(array('1'),array(),array(), '500000000', 50 , 'login');

   // SYNTEX FOR WRITING FUNCTION
//  check::UVAL('2','ali', '1', 'login');
//  if(check::$cntExist){
//      print_r(check::$exist);
//      echo check::$cntExist;
//  }else {
//      echo "no value";
//  }
 
// check::MVM(array(''), array(''), 'table_name'); //  for  login
// check::colVise(array(''|| '',''), array(''|| '',''), 'table_name');// for checking  M || O cols vs M||O values
// check::idVise(array(''|| '',''), array(''|| '',''), 'table_name'); //  for checking  M || O rows vs M||O values
// check::UVAL('field_num','value','id', 'table_name'); // for checking if any other value exist besides one value in specific colm
// check::$cntExist;  // for checking   how many value exist;
// check::$exist;  // for checking detail about those values : is in array 
// check::$error;  // for checking error in MVM only
//check::CIMG($_FILES['abc'],array('image/jpeg','image/png','image/gif','image/jpg'), '500000000', 50 , 'login');
// CHECK::$error: if image is  different in size ir type

?>
<!-- <form action="check.php" method="post" enctype="multipart/form-data">
<input type="file" name="abc[]" id="">
<input type="submit" value="submit" name="ab">

 
//  if(isset($_POST['ab'])){
// 	check::CIMG($_FILES['abc'],array('image/jpeg', 'image/png','image/gif','image/jpg'), '500000000', 50 , 'login');
// 	if (check::$error) {
// 		echo check::$error;
// 	}else {
// 		echo "all ok";
// 	}

//  }


</form> -->