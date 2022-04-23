<?php 
    //includes db connection
	require_once 'db_connect.php';

	//includes session info
	session_start();

    //checks if user is logged in, if the user is not logged redirect to login page
	if (!isset($_SESSION['logged_in'])) {
		$_SESSION['need_log'] = true;
		header('Location: login.php');
		//closes db connection
		$db = null;
		exit();
	}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>sushicloud</title>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./homepage.php">sushicloud</a>
            <div class="collapse navbar-collapse" id="navbarNav">   
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./mylist.php">My Lists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center mx-auto">
        <h2 class="mt-3">Anime Title goes here</h2>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

    <?php
		//closes db connection
		$db = null;
	?>
</html>