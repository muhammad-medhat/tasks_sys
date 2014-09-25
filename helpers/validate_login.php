<?php 
  include('../includes/conn.php');
  

$__username=$_POST['username'];
$__password=$_POST['password'];

if(login($__username, $__password)){
  
  $loggedin_user = get_user($__username);

  session_start();
	$_SESSION['user_data'] = $loggedin_user;

  switch($_SESSION['user_data']['role_id']){

		case 1 : 

                  header('location:../admin.php');
      
      break;
        

		case 2: echo"member"; break;
		default: echo "asdfasdf";
	}
}
else{
	echo"Wrong Password";

}








function get_role($_username){
	$query = "select role_id from users where username='$_username' ";
	
	$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		//print_r($row);
		$role = $row[0];
	
	return $role;
}

function login($_username, $_password){
	$query = "select * from users where username='$_username' and password=md5('$_password')";
	
   $result = mysql_query($query);
    $row = mysql_fetch_array($result);
	//print_r($row);
if($row) return true;	
else return false;

}

function get_user($_username){
  
	  $query = "select * from users where username='$_username'";
	  $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    return $row;
	
}


  function user_exists($_username){
    $query = "select * from users where username='$_username'";
	
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
	
    if($row) return true;	
    else return false;
  }
?>
