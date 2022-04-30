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
} else if (isset($_SESSION['mi_err']) && $_SESSION['mi_err'] == true) {
    $notice = "<p class='text-danger'>An error has occurred. Please try again.</p>";

    unset($_SESSION['mi_err']);
}

//prepares and executes search statement
$query = $db->prepare('select username, email, first_name, last_name from admin');
$query->execute();

//gets all anime
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
    <style>
        .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover th {
            background-color: lightsalmon;
        }
    </style>
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
            <h2 class="mt-2">Manage Users</h2>
        </div>

        <div class="row offset mt-3">
            <center>
                <a href="admin_register.php" class="btn btn-dark btn active" role="button">Insert Admin</a>
                <!-- <a href="#" class="btn btn-dark btn active" role="button">Edit Anime</a> -->
            </center>
        </div>
    </div>
    <div class="container py-5 h-50">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-11 col-xl-13">
                <div class="card shadow-2-strong card-manage" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($results as $row) {
                                echo "<form action='./background_scripts/delete_admin_validation.php' method='post'>
                                    <td>" . $row['username'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td>" . $row['first_name'] . "</td>
                                    <td>" . $row['last_name'] . "</td>
                                    <td>
                                        <input type='hidden' name='user' value='" . $row['username'] . "'>
                                        <input type='submit' value='Delete' class='btn btn-danger'>
                                        </form>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>