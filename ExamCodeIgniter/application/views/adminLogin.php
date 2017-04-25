<?php

include ('login/config.php');
session_start();
$error = "";


if($_SERVER['REQUEST_METHOD'] == "POST"){
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	$sql = "SELECT id FROM student WHERE username = '$username' and password = '$password'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$count = mysqli_num_rows($result);
	
	//if the result matched username and password, the table should have 1 row
	if($count == 1){
		$_SESSION['login_user'] = $username;
		
		header("location: admin_start.php");
	}
	else{
		$error = "invalid name or password.";
	}
}

?>

<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css" type="text/css"> 
</head>

<body>
<form method="post">
<fieldset>
<legend>Login</legend>
	<input type="text" name="username" placeholder="gebruikersnaam"><br><br>
	<input type="password" name="password" placeholder="wachtwoord"><br><br>
	<button type="submit" name="submit">Inloggen</button><br>
</fieldset>
</form>
<p><?php echo $error; ?></p>
</body>
</html>