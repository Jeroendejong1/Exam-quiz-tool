 <?php

//make sure the right DB values are selected
define('DB_NAME','activiteiten_tracker');		//name of database
define('DB_USER','root');		//name of user
define('DB_PASSWORD','');		//password
define('DB_HOST','localhost');	//server
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>