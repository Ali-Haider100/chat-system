<?php
 class image{
       private $pic;
       private $type;
       private $max;
       private $path;
       public $error;

   function __construct(array $a, array $b, $c, $d){
        $this->pic = $a;
        $this->type = $b;
        $this->max = $c;
        $this->path = $d;
   }
   public function upload(){
       for($aa = 0; $aa<count($this->pic['name']); $aa++){
             if($this->pic['size'][$aa] > $this->max){
                   $this->error[] = "Size = ".$this->pic['name'][$aa];  
          }else{
             if(!in_array($this->pic['type'][$aa], $this->type, true)){
                   $this->error[] = "Type = ".$this->pic['name'][$aa];
               }else{
                   move_uploaded_file($this->pic['tmp_name'][$aa], $this->path.$this->pic['name'][$aa]);
               }
           }       
       }
   }

   public function delete(){
        for($dd=0; $dd<count($this->pic['name']); $dd++){
            if(!unlink($this->path.$this->pic['name'][$dd])){
                $this->error = "Image not found";
            }
        }
   } 
}

// In case want to upload files
// $img = new image('$_FILES[img]',array('image/jpeg','image/png','image/gif'), '5000000','images/');
// $img->upload();

// In case want to delete file from folders;
    // $img = new image('$_FILES[img]',array('','',''), '5000000','images/');
    // $img->delete();

    // Important note: name="image[]" == true ,name="image" == false in form input field 

?>