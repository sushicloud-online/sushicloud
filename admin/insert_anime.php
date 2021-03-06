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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>sushicloud</title>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_homepage.php">sushicloud</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_settings.php">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../user_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="text-center mx-auto mt-5">
            <img src="../assets/sushicloud.png" width="300px" height="100px" alt="sushicloud">
            <h2 class="mt-2">Insert New Anime</h2>
        </div>

        <form class="form-row align-items-center mt-5" action="./background_scripts/insert_validation.php" method="post">
            <div class="row justify-content-center">
                <label class="control-label col-sm-1" for="title">Title:</label>

                <div class="col-sm-3">
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
            </div>

            <div class="row justify-content-center mt-3">
                <label class="control-label col-sm-1" for="year">Year:</label>

                <div class="col-sm-3">
                    <input type="text" class="form-control" id="year" name="year" pattern="\d{4}" required>
                </div>
            </div>

            <!-- TODO: need to fix incorrect pattern redirect -->

            <div class="row justify-content-center mt-3">
                <label class="control-label col-sm-1" for="Season">Season:</label>

                <div class="col-sm-3">
                    <select class="form-control" id="season" name="season" required>
                        <option value=''>Select a Season</option>
                        <option value="Winter">Winter</option>
                        <option value="Spring">Spring</option>
                        <option value="Summer">Summer</option>
                        <option value="Fall">Fall</option>
                    </select>
                </div>
            </div>

            <div class="row justify-content-center mt-3">
                <label class="control-label col-sm-1" for="genre">Genre:</label>

                <div class="col-sm-3">
                    <input type="text" class="form-control" id="genre" name="genre" required>
                </div>
            </div>

            <div class="row justify-content-center mt-3">
                <label class="control-label col-sm-1" for="description">Description:</label>

                <div class="col-sm-3">
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
            </div>

            <div class="row justify-content-center mt-3">
                <label class="control-label col-sm-1" for="image_url">Image URL:</label>

                <div class="col-sm-3">
                    <input type="text" class="form-control" id="image_url" name="image_url" required>
                </div>
            </div>

            <div class="row justify-content-center mt-3">
                <label class="control-label col-sm-1" for="image_url">Episodes:</label>

                <div class="col-sm-3">
                    <input type="number" class="form-control" id="episodes" name="episodes" required>
                </div>
            </div>

            <div class="row offset mt-5">
                <center>
                    <input type="submit" class="btn btn-dark" value="Insert">
                    <input type="reset" class="btn btn-danger" value="Clear">
                </center>
            </div>
        </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>