<?php 
  include('../includes/conn.php');
  $_function = $_GET['t'];

	switch ($_function) {
		case 'add_task':
                  add_task();
                  break;		
                default: break;
        }
  function add_task(){
    echo"ASDFASDF";
  }
  
?>
