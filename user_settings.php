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

/*
    TODO: create query for getting user info, so something like SELECT * FROM user where username = $_SESSION['user']
*/

$query = $db->prepare('SELECT * FROM users WHERE username = :user');
$query->bindParam(':user', $_SESSION['user']);

//gets query results
$query->execute();
$result = $query->fetch();
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
                        <a class="nav-link" href="./mylist.php">My Lists</a>
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

    <div class="container-fluid bg-light mt-3">
        <div class="text-center mx-auto mt-5">
            <img src="./assets/sushicloud.png" width="300px" height="100px" alt="sushicloud">
            <h2 class="mt-2">User Account Details</h2>
            <div class="row offset mt-3">
                <center>
                    <button type="button" class="btn btn-dark btn active" data-toggle="modal" data-target="#editModal">
                        Edit Profile
                    </button>
                </center>

                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                                <!-- close button -->
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> -->
                            </div>
                            <div class="modal-body">
                                <!-- <form class="form-row align-items-center" action="#" method="post">
                                    <fieldset disabled>
                                        <div class="form-group">
                                            <label for="disabledTextInput" class="col-form-label">Username:</label>
                                            <input type="text" class="form-control" id="username" placeholder="#">
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <label for="password" class="col-form-label">Password:</label>
                                        <input type="text" class="form-control" id="username">
                                    </div>
                                </form> -->
                            </div>
                            <div class="center modal-footer">
                                <input type="submit" class="btn btn-dark" value="Insert">
                                <input type="reset" class="btn btn-danger" value="Clear">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="vh-200">

        <div class="container py-3 h-50">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <?php
                                    echo '<h5>Username: <span class="text-muted">' . $result['username'] . '</span></h5>';
                                    echo '<h5>Email: <span class="text-muted">' . $result['email'] . '</span></h5>';
                                    echo '<h5>First Name: <span class="text-muted">' . $result['first_name'] . '</span></h5>';
                                    echo '<h5>Last Name: <span class="text-muted">' . $result['last_name'] . '</span></h5>';
                                    echo '<h5>Address: <span class="text-muted">' . $result['address'] . '</span></h5>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>