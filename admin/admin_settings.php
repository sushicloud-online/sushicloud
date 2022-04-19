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

    <div class="container-fluid bg-light mt-3">
        <div class="text-center mx-auto mt-5">
            <img src="../assets/sushicloud.png" width="300px" height="100px" alt="sushicloud">
        </div>
        <div class="text-center p-2">
            <p class="lead">
            <h1>Admin Account Details</h1>
            </p>
        </div>
    </div>
    <section class="vh-200">

        <div class="container py-3 h-50">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">

                            <!-- Row #2 -->
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <h5>Username:</h5>
                                        <?php echo $user; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Row #2 -->
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <h5>Email:</h5>
                                        <?php echo $email; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Row #2 -->
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <h5>First Name:</h5>
                                        <?php echo $Fname; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Row #2 -->
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <h5>Last Name:</h5>
                                        <?php echo $Lname; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Row #2 -->
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <h5>Address:</h5>
                                        <?php echo $address; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>