<?php
//includes db connection
require_once 'db_connect.php';

//includes session info
session_start();

$message = '';

//checks if user is logged in, if the user is not logged redirect to login page
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['need_log'] = true;
    header('Location: login.php');
    //close db connection
    $db = null;
    exit();
}
else if (isset($_SESSION['anime_already_in_db']) && $_SESSION['anime_already_in_db'] == true) {
    $message = "<p class='text-danger'>";
    $message .= "anime already saved to a list.</p>";
    $message .= "</p>";
    $_SESSION['anime_already_in_db'] = false;
}

//informs the user if they have successfully registered
else if (isset($_SESSION['reg_success']) && $_SESSION['reg_success'] == true) {
    $message = "<p class='text-success'>You have successfully registered!</p>";
}

// user query for specific anime

$anime_search = 'SELECT title, year, description, image_url from anime';

// checking if search terms were inputted
if (!empty($_POST['title']) || !empty($_POST['year']) || !empty($_POST['genre'])) {
    $anime_search = $anime_search . ' where';

    //adds title to query if title was input
    if (!empty($_POST['title'])) {
        $title = trim($_POST['title']);
        $anime_search = $anime_search . ' title like :title';

        if (!empty($_POST['year']) || !empty($_POST['genre']))
            $anime_search = $anime_search . ' or';
    }

    //adds year to query if genre was selected
    if (!empty($_POST['year'])) {
        $year = $_POST['year'];
        $anime_search = $anime_search . ' year like :year';

        if (!empty($_POST['genre']))
            $anime_search = $anime_search . ' or';
    }

    $anime_search = 'SELECT title, year, description, image_url from anime';

    // checking if search terms were inputted
    if (!empty($_POST['title']) || !empty($_POST['year']) || !empty($_POST['genre'])) {
        $anime_search = $anime_search . ' where';

        //adds title to query if title was input
        if (!empty($_POST['title'])) {
            $title = trim($_POST['title']);
            $anime_search = $anime_search . ' title like :title';

            if (!empty($_POST['year']) || !empty($_POST['genre']))
                $anime_search = $anime_search . ' or';
        }

        //adds year to query if genre was selected
        if (!empty($_POST['year'])) {
            $year = $_POST['year'];
            $anime_search = $anime_search . ' year like :year';

            if (!empty($_POST['genre']))
                $anime_search = $anime_search . ' or';
        }

        //adds genre to query if genre was selected
        if (!empty($_POST['genre'])) {
            $genre = $_POST['genre'];
            $anime_search = $anime_search . ' genre like :genre';
        }
    }

    //prepares query
    $query = $db->prepare($anime_search);

    //binds title parameter if exists
    if (!empty($title)) {
        $title = '%' . $title . '%';
        $query->bindParam(':title', $title);
    }

    //binds rating parameter if exists
    if (!empty($year))
        $query->bindParam(':year', $year);

    //binds genre parameter if exists
    if (!empty($genre)) {
        $genre = '%' . $genre . '%';
        $query->bindParam(':genre', $genre);
    }
}

//prepares query
$query = $db->prepare($anime_search);

//binds title parameter if exists
if (!empty($title)) {
    $title = '%' . $title . '%';
    $query->bindParam(':title', $title);
}

//binds rating parameter if exists
if (!empty($year))
    $query->bindParam(':year', $year);

//binds genre parameter if exists
if (!empty($genre)) {
    $genre = '%' . $genre . '%';
    $query->bindParam(':genre', $genre);
}

// TODO: need to make a season query (would do it but i don't want to mess something up)

//runs query and gets results
$query->execute();
$results = $query->fetchAll();

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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./homepage.php">sushicloud</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./mylist.php">My Lists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user_settings.php">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="text-center mx-auto mt-5">
            <h3>
                <?php
                echo $message;
                ?>
            </h3>
            <img src="./assets/sushicloud.png" width="300px" height="100px" alt="sushicloud">
            <h2 class="mt-3">Search for your favorite anime!</h2>
        </div>

        <form action="./homepage.php" method="post">
            <div class="row mt-4">
                <div class="col">
                    <input name="title" type="text" class="form-control" placeholder="Anime Title">
                </div>
                <div class="col">
                    <input name="year" type="text" class="form-control" placeholder="Year">
                </div>
                <div class="col">
                    <select name="genre" class="form-control">
                        <option value=''>Select a Genre</option>
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Drama">Drama</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Music">Music</option>
                        <option value="Romance">Romance</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Seinen">Seinen</option>
                        <option value="Shojo">Shojo</option>
                        <option value="Shonen">Shonen</option>
                        <option value="SliceofLife">Slice of Life</option>
                        <option value="Sports">Sports</option>
                        <option value="Supernatural">Supernatural</option>
                        <option value="Thriller">Thriller</option>
                    </select>
                </div>
                <div class="col">
                    <select name="season" class="form-control">
                    <option value=''>Select a Season</option>
                        <option value="Winter">Winter</option>
                        <option value="Spring">Spring</option>
                        <option value="Summer">Summer</option>
                        <option value="Fall">Fall</option>
                    </select>
                </div>
                <div class="col">
                    <input name="search" type="submit" class="btn btn-dark border-light form-control" style="background-color: rgba(232,84,74,255);" value="Submit">
                </div>
            </div>
        </form>
    </div>

    <div class='container bg-light overflow-auto'>
        <h3 class="text-center mt-4">Anime</h3>
        <div class='row justify-content-center'>
            <?php

            if ($results) {
                //outputs all results passed
                foreach ($results as $row) {
                    echo '<div class="card text-center ms-3 mt-3" style="width: 25rem;">';
                    echo "<img src='" . $row['image_url'] . "' class='card-img-top mx-auto mt-3' alt='anime image' style='width: 200px; height: 275px;'>";
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['year'] . '</h6>';
                    echo '<p class="card-text text-truncate">' . $row['description'] . '</p>';
                    echo '<form action="view_anime.php" method="post">';
                    echo "<input type='hidden' name='title' value='" . $row['title'] . "'>";
                    echo "<input class='btn btn-dark border-light' type='submit' value='View Anime' style='background-color: rgba(232,84,74,255);'>";
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<h6 class='text-center mt-5' style='color: rgba(232,84,74,255);'>No results.</h6>";
            }
            ?>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

<?php
//closes db connection
$db = null;
?>

<!-- footer -->
<div class="pt-5"></div>

</html>