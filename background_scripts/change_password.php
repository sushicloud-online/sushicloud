<?php
	//includes db connection
	require_once '../db_connect.php';

	//includes session info
	session_start();

	//checks if user is logged in, if the user is not logged redirect to login page
    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['need_log'] = true;
        header('Location: login.php');
        //close db connection
        $db = null;
        exit();
    }

	//takes input and assigns it to variables
	$old_password = trim($_POST['old_password']);
	$new_password = trim($_POST['new_password']);
    $confirm_new_password = trim($_POST['confirm_new_password']);

    //prepares query for getting password
	$query = $db->prepare('SELECT * FROM users WHERE username = :user');
	$query->bindParam(':user', $_SESSION['user']);

	//gets info from database
	$query->execute();
	$result = $query->fetch();

    $current_password = $result['password'];

	//checks if all input was passed
	if (empty($old_password) || empty($new_password) || empty($confirm_new_password)) {
		$_SESSION['new_pass_fail'] = true;
		header('Location: ../user_settings.php');
		//closes db connection
		$db = null;
		exit();
	}
    else if(!password_verify($old_password, $current_password)){
        $_SESSION['new_pass_fail'] = true;
		header('Location: ../user_settings.php');
		//closes db connection
		$db = null;
		exit();
    }
    else if($new_password != $confirm_new_password){
        $_SESSION['new_pass_fail'] = true;
		header('Location: ../user_settings.php');
		//closes db connection
		$db = null;
		exit();
    }

    // hash new password
    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    $query = $db->prepare('UPDATE users SET password = :new_pass WHERE username = :user');
    $query->bindParam(':new_pass', $new_password);
    $query->bindParam(':user', $_SESSION['user']);

    if($query->execute()){
	    $result = $query->fetch();
        $_SESSION['passwordChange_success'] = 'pass_changed';
	    header('Location: ../user_settings.php');
    }
    else{
        $_SESSION['new_pass_fail'] = true;
		header('Location: ../user_settings.php');
		//closes db connection
		$db = null;
		exit();
    }
	
	//closes db connection
	$db = null;
	exit();
?>