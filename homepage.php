<?php 
    //includes db connection
    require_once 'db_connect.php';

    //includes session info
    session_start();

    $notice = '';

    //checks if user is logged in
    if (!isset($_SESSION['logged_in'])) {
        //if user is not logged in, redirects to login page
        $_SESSION['need_log'] = true;
        header('Location: login.php');

        //closes db connection
        $db = null;
        exit();
    }

    //informs the user if they have successfully registered
    else if (isset($_SESSION['reg_success']) && $_SESSION['reg_success'] == true) {
        $notice = "<p class='text-success'>You have successfully registered!</p>";

        unset($_SESSION['reg_success']);
    }

    //informs the user if they are already logged in
    else if (isset($_SESSION['already_li']) && $_SESSION['already_li'] == true) {
        $notice = "<p class='text-danger'>You are already logged in.</p>";

        unset($_SESSION['already_li']);
    }

    //informs the user they have newly logged in
    else if (isset($_SESSION['new_log']) && $_SESSION['new_log'] == true) {
        $notice = "<p class='text-success'>You are now logged in!</p>";

        unset($_SESSION['new_log']);
    }

    else if (isset($_SESSION['mi_err']) && $_SESSION['mi_err'] == true) {
        $notice = "<p class='text-danger'>An error has occurred. Please try again.</p>";

        unset($_SESSION['mi_err']);
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
                        <a class="nav-link" aria-current="page" href="#">My Lists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center mx-auto">
        <h2 class="mt-2">Search for your favorite anime!</h2>

        <form action="./background_scripts/query_anime.php" method="post">
            <div class="row">
                <div class="col">
                    <input name="title" type="text" class="form-control" placeholder="Anime Title">
                </div>
                <div class="col">
                    <select name="year" class="form-control">
                        <option value="">Year</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                    </select>
                </div>
                <div class="col">
                    <select name="season" class="form-control">
                        <option value="">Season</option>
                        <option value="f21">Fall 2021</option>
                        <option value="su21">Summer 2021</option>
                        <option value="sp21">Spring 2021</option>
                        <option value="f20">Fall 2020</option>
                        <option value="su20">Summer 2020</option>
                        <option value="sp20">Spring 2020</option>
                        <option value="f19">Fall 2019</option>
                        <option value="su19">Summer 2019</option>
                        <option value="sp19">Spring 2019</option>
                    </select>
                </div>
                <div class="col">
                    <select name="genre" class="form-control">
                        <option value="">Genre</option>
                        <option value="Romance">Romance</option>
                        <option value="Action">Action</option>
                        <option value="Comedy">Comedy</option>
                        <option value="SlifeofLife">Slice of Life</option>
                    </select>
                </div>
                <div class="col">
                    <input name="search btn" type="button" class="btn btn-dark form-control" style="background-color: rgba(232,84,74,255);" value="Submit">
                </div>
            </div>
        </form>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>