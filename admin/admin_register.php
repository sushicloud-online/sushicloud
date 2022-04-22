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

    <div class="container pb-5">

        <div class="text-center mx-auto mt-5">
            <img src="../assets/sushicloud.png" width="300px" height="100px" alt="sushicloud">
        </div>

        <form class="form-horizontal form-group mt-5" action="./background_scripts/admin_registration_validation.php" method="post">
            <div class="row">
                <label class="control-label col-sm-2" for="username">Username:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username"
                        required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="control-label col-sm-2" for="password">Password:</label>

                <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password"
                        required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="control-label col-sm-2" for="password">Email:</label>

                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email"
                        required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="control-label col-sm-2" for="fname">First Name:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname"
                        required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="control-label col-sm-2" for="lname">Last Name:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname"
                        required>
                </div>
            </div>

            <div class="row">
                <div class="offset-sm-2 col-sm-10 mt-3">
                    <input type="submit" class="btn btn-dark" value="Login" name="login">
                    <input type="reset" class="btn btn-danger" value="Clear">
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