<?php
    //includes db connection
    require_once '../../db_connect.php';

    //includes sesstion info
    session_start();

    // create short variable names
    $title = $_POST['title'];
    $year = $_POST['year'];
    $season = $_POST['season'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    //checks if all required values are input
    if (empty($title) || empty($year) || empty($season) || empty($genre) || empty($description) || empty($image_url)) {
      //redirects to insert page if all values are not input
      $_SESSION['reg_err'] = true;
      header('Location: ../insert_anime.php');

      //closes db connection
      $db = null;
      exit();
    }

    $query = $db->prepare("INSERT INTO anime VALUES (:title, :year, :season, :genre, :description, :image_url)");
    $query->bindParam(':title', $title);
    $query->bindParam(':year', $year);
    $query->bindParam(':season', $season);
    $query->bindParam(':genre', $genre);
    $query->bindParam(':description', $description);
    $query->bindParam(':image_url', $image_url);

    //checks if insert was successful
	if ($query->execute()) {
		//redirects to manage_anime if successful
		$_SESSION['reg_success'] = true;
		header("Location: ../manage_anime.php");
	}

	else {
		//redirects to insert page if failed
		$_SESSION['reg_err'] = true;
		header('Location: ../insert_anime.php');
	}

	//closes db connection
	$db = null;
	exit();
?>