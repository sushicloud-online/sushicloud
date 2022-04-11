<?php
	//attempts to connect to db
	try {
  	$dsn = 'mysql:host=localhost; dbname=sushicloud';
  	$db = new PDO ($dsn, "sushi_admin", "sushi_password");

  	// set the PDO error mode to exception
  	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database Connection Successful";
	} 	

	//outputs error if db connection fails
	catch(PDOException $e) {
  		echo "Connection failed: ".$e->getMessage();
	}
?>