<!doctype html>
<?php
include 'insert.php';

?>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <label for="id">id</label>
    <input type="text" name="input[]" id="name" ><p></p>
    <label for="name">Name</label>
    <input type="text" name="input[]" id="name"><p></p>
    <label for="lname">lname</label>
    <input type="text" name="input[]" id="lname"><p></p>
    <label for="email">E-mail</label>
    <input type="email" name="input[]" id="email"><p></p>
    <label for="adr">Address</label>
    <input type="text" name="input[]" id="adr"><p></p>
    <label for="num">web</label>
    <input type="number" name="input[]" id="num"><p></p>
     <label for="adr">contact</label>
    <input type="text" name="input[]" id="adr"><p></p>
    <input type="submit" name="submit" id="sub" value="submit">
   </form>
  </body>
</html>

<?php

if(isset($_POST['submit'])){
    $var = new insert("frm", $_POST['input']);
    $var->clean();
    $var->main();
}
?>