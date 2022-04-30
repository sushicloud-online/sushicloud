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

$title = $_POST['title'];

// check if title was empty
if (empty($title)) {
    // if it was empty redirect to homepage
    $_SESSION['mi_err'] = true;
    header('Location: homepage.php');

    $db = null;
    exit();
}

//prepares query for anime title
$query = $db->prepare('SELECT * FROM anime WHERE title = :title');
$query->bindParam(':title', $title);

//gets query results
$query->execute();
$result = $query->fetch();

// if query empty then redirect
if (!$result) {
    $_SESSION['mi_err'] = true;
    header('Location: homepage.php');
} else {
    $title = $result['title'];
    $year = $result['year'];
    $image_url = $result['image_url'];
    $episodes = $result['episodes'];
    $description = $result['description'];
}

$db = null;
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
    <div class="text-center mx-auto mt-5">
        <!-- <img src="./assets/sushicloud.png" width="300px" height="100px" alt="sushicloud"> -->
        <h2>
            <?php
            echo "<p>" . $title . "</p>";
            ?>
        </h2>
    </div>

    <div class="container text-center mx-auto pt-2">

        <p>
            <?php
            echo "<img src='" . $image_url . "' class='card mx-auto mt-3' alt='anime image' style='width: 200px;'>";
            ?>
        </p>

        <label class="control-label col-sm-1 lead">Description:</label>
            <?php
            echo "<p>" . $description . "</p>";
            ?>

        <!-- wrap form around this div -->
    <form action="./background_scripts/add_to_list.php" method = "post">
        <div class="row justify-content-center mt-3">
            <label class="control-label col-sm-1 lead">Status:</label>
            <div class="col-sm-1">
                <select name="status" class="form-control">
                    <option value="">Status</option>
                    <option value="Currently Watching">Currently Watching</option>
                    <option value="Dropped">Dropped</option>
                    <option value="On Hold">On Hold</option>
                    <option value="Finished">Finished</option>
                    <option value="Plan to Watch">Plan to Watch</option>
                </select>
            </div>
        </div>

        <div class="row justify-content-center mt-2">
            <label class="control-label col-sm-1 lead">Episodes:</label>
            <div class="col-sm-1"> 
                <select name="ep_count" class="form-control">
                    <option value="">Episodes</option>
                        <?php 
                            for($i = 1; $i <= $episodes; $i++){
                                echo "<option value=".$i.">".$i."</option>";
                            }
                        ?>
                </select>
            </div>
        </div>

        <div class="row justify-content-center mt-2">
            <label class="control-label col-sm-1 lead">Score:</label>
            <div class="col-sm-1">
                <select name="score" class="form-control">
                    <option value="">Score</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>
        
        <div class="row justify-content-center mt-2">
            <div class="col-sm-2">
            <input type="submit" value="Add to my list" class="btn btn-dark border-light" style="background-color: rgba(232,84,74,255);">
            </div>
        </div>
        <?php 
            echo "<input type='hidden' name='title' value='".$title."'>";
        ?>
        </form>
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