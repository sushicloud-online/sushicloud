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
            <a class="navbar-brand mx-auto" href="./index.php">sushicloud</a>
        </div>
    </nav>



    <div class="container pb-5">

        <div class="text-center mx-auto mt-5">
            <img src="./assets/sushicloud.png" width="300px" height="100px" alt="sushicloud">
        </div>

        <form class="form-horizontal form-group mt-5" action="./background_scripts/registration_validation.php" method="post">
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

            <div class="row mt-3">
                <label class="control-label col-sm-2" for="street_address">Street Address:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="street_address" placeholder="Enter Street Address" name="street_address"
                        required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="control-label col-sm-2" for="city">City:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="city" placeholder="Enter City" name="city"
                        required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="control-label col-sm-2" for="state">State:</label>

                <div class="col-sm-8">
                        <select id="state" name="state" class="form-control" required>
                    	<option value=''>Select a State</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <label class="control-label col-sm-2" for="zip">Zip Code:</label>

                <div class="col-sm-8">
                    <input type="number" class="form-control" id="zip" placeholder="Enter Zip Code" name="zip"
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