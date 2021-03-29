<?php
/* All in array*/
$all_V;
// all value from tables
$er;
// Any field that is not required
$val_S;
// final values ;
if ( isset( $_GET['q'] ) ) {
    require 'select.php';
    $tables = array( 'frm', 'inup', 'pro' );
    $field_names = array( 'name', 'email' );
    for ( $t = 0; $t<count( $tables );
    $t++ ) {
        // table
        $sel = new select( $tables[$t] );
        for ( $v = 0; $v<count( $field_names );
        $v++ ) {
            // field
            for ( $w = 0; $w<$sel->field_counted; $w++ ) {
                if ( $field_names[$v]  == "id" ) {
                    die();
                } elseif ( $field_names[$v] == $sel->row_field[$w] ) {
                    for ( $z = 0; $z<$sel->rows_counted; $z++ ) {
                        $all_V[] = $sel->row_value[$z][$w];
                    }

                }
            }
        }
    }
    if ( !empty( $all_V ) ) {
        for ( $ac = 0; $ac<count( $all_V );
        $ac++ ) {
            if ( stristr( $all_V[$ac], $_GET['q'] ) ) {
                echo   $val_S = $all_V[$ac]."<br>";
                /* here echo is for sending value as a responcetext to ajax request */

            }
        }
    }

}

?>
