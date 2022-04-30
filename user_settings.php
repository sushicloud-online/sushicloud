<?php
//includes db connection
require_once 'db_connect.php';

//includes session info
session_start();

$message = '';

//checks if user is logged in
if (!isset($_SESSION['logged_in'])) {
    //if user is not logged in, redirects to login page
    $_SESSION['need_log'] = true;
    header('Location: admin_login.php');

    //closes db connection
    $db = null;
    exit();
}
else if (isset($_SESSION['new_pass_fail']) && $_SESSION['new_pass_fail'] == true) {
    $message = "<p class='text-danger mt-3 text-center'>";
    $message .= "Passwords not the same or correct.</p>";
    $message .= "</p>";
    $_SESSION['new_pass_fail'] = false;
}
else if (isset($_SESSION['passwordChange_success']) && $_SESSION['passwordChange_success'] == true){
    $message = "<p class='text-success mt-3 text-center'>";
    $message .= "Password changed!</p>";
    $message .= "</p>";
    $_SESSION['passwordChange_success'] = false;
}

/*
    create query for getting user info, so something like SELECT * FROM user where username = $_SESSION['user']
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

    <h3>
        <?php 
            echo $message;
        ?>
    </h3>

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
                <div class="container">
                        <!-- Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal form-group align-items-center mt-5" action="./background_scripts/change_password.php" method="post">
                                                <div class="row justify-content-center">
                                                    <label class="control-label col-sm-2" for="old_password">Old Password:</label>

                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" id="old_password" name="old_password" required>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center mt-3">
                                                    <label class="control-label col-sm-2" for="new_password">New Password:</label>

                                                    <div class="col-sm-5">
                                                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center mt-3">
                                                    <label class="control-label col-sm-2" for="confirm_new_password">Confirm New Password:</label>

                                                    <div class="col-sm-5">
                                                        <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-dark" value="Save Changes"></input>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- <script>
        function openPasswordForm() {
          document.getElementById("passwordForm").style.display = "block";
        }
        
        function closePasswordForm() {
          document.getElementById("passwordForm").style.display = "none";
        }
        </script> -->

    
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