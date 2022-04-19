<?php
//includes db connection
require_once '../db_connect.php';

//includes session info
session_start();

$notice = '';

//checks if user is logged in
if (!isset($_SESSION['logged_in'])) {
    //if user is not logged in, redirects to login page
    $_SESSION['need_log'] = true;
    header('Location: admin_login.php');

    //closes db connection
    $db = close;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>sushicloud.com</title>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_homepage.php">sushicloud.com</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_settings.php">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="text-center mx-auto mt-5">
            <img src="../assets/sushicloud.png" width="600px" height="200px" alt="sushicloud">
        </div>

        <div class="row offset mt-5">
            <center>
                <a href="manage_anime.php" class="btn btn-dark btn-lg active" role="button">Manage Anime</a>
                <a href="manage_users.php" class="btn btn-dark btn-lg active" role="button">Manage Users</a>
            </center>   
        </div>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>