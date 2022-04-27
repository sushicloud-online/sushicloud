<?php
  require_once '../db_connect.php';

  //includes session info
	session_start();

  // take in input from view_anime.php
	$title = $_POST['title'];
	$status = $_POST['status'];
	$ep_count = $_POST['ep_count'];
	$score = $_POST['score'];

  //checks if all input was passed
	if (empty($status) || empty($ep_count) || empty($score)) {
		//if all input was not passed, redirects user to homepage.php
		$_SESSION['invalid_input'] = true;
		header('Location: ../view_anime.php');
		//closes db connection
		$db = null;
		exit();
	}

  	// Inserting anime into the database
	$query = $db->prepare('INSERT INTO list (username, title, status, episodes, score) VALUES (:user, :title, :status, :ep_count, :score)');
	$query->bindParam(':user', $_SESSION['user']);
	$query->bindParam(':title', $title);
	$query->bindParam(':status', $status);
	$query->bindParam(':ep_count', $ep_count);
	$query->bindParam(':score', $score);
  
	// Getting the count of the number of rows in table
	$sql = "SELECT COUNT(*) FROM list WHERE username = ? AND title = ?";
	$result2 = $db->prepare($sql);
	$result2->execute(array($_SESSION['user'], $title));
	$num_of_rows = $result2->fetchColumn();

	echo $num_of_rows;

	// if anime is already in db then redirect to homepage
	if($num_of_rows > 0){
		$_SESSION['anime_already_in_db'] = true;
		header("Location: ../homepage.php");
	}
	else if ($query->execute()) {
		$result = $query->fetch();
		//redirects to manage_anime if successful
		$_SESSION['anime_added'] = true;
		header("Location: ../mylist.php");
	}
	else {
		//redirects to view_page.php if inserting into database failed
		$_SESSION['anime_notadded'] = true;
		header('Location: ../view_anime.php');
	}

?>