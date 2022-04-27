<?php
	//include db connection
	require_once '../../db_connect.php';

	//includes session info
	session_start();

	//takes input and assigns it to variable
	$title = $_POST['title'];

	//prepares statement
	$query = $db->prepare('delete from anime where title = :title');
	$query->bindParam(':title', $title);

	//checks if delete with successful
	if ($query->execute())
		$_SESSION['del_success'] = true;

	else
		$_SESSION['del_fail'] = true;

	//redirects to manage anime page
	header('Location: ../manage_anime.php');

	//closes db connection
	$db = null;
	exit();
?>