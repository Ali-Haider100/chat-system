<?php

class ibase {
    public $array;

    function __construct( array $a, array $b, array $c, array $d, array $e, array $f ) {
        for ( $cnt = 0; $cnt<count( $a['name'] );
        $cnt++ ) {
            //echo count( $a['name'] )."<br>".$cnt;
            $this->array[] = "";
            $this->array[] = $a['name'][$cnt];
            $this->array[] = $b[$cnt];
            $this->array[] = $c[$cnt];
            $this->array[] = $d[$cnt];
            $this->array[] = $e[$cnt];
            $this->array[] = $f[$cnt];
            $var = new IU( "gallery", $this->array, "", "", "insert" );
            $var->clean();
            $var->main();

        }

    }

}

// $iBase = new ibase($_FILES['img'], $_POST['alt'], array( 'rand()' ), array( rand() ), array( date( 'Y/m/d' ), array( 'h:i:sa' ) ) );
// form input must be in array  name="image[]" == true ,name="image" == false  and every input must be in arrary you can manuplate 
// while using this function like as many arrays you want but all  parameter must be in array
?>