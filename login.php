<html>
<head>
<title>Login Form</title>

<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>
	 <form method="post" action="helpers/validate_login.php" >
		<div class="login">
			<div class="login_heading">
				<h2>Login</h2>
			</div>
			<div class="login_form">
			User name:<br> <input type="text" name="username" id="u_name"> <br>
			Password:<br> <input type="password" name="password" id="pass">
			</div>
			<div class="submit_button">
				<input type="submit" value="Submit" id="button"/>
			</div>
			
		</div>
</form>
</body>
</html>
