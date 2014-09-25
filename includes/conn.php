<?php
include('conf.php');
include('columns.php');


  $conn = mysql_connect($host, $user, $password) or die("cant connect  " . mysql_error() );
 
  mysql_select_db($db ,$conn) or die("cant select the db " .mysql_error());
 // print_r($conn);
 // var_dump($conn);
// echo "<br>connected<br>";
   

?>
