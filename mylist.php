<?php 
    //includes db connection
    require_once 'db_connect.php';

    //includes session info
    session_start();

    $notice = '';

    //checks if user is logged in, if the user is not logged redirect to login page
    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['need_log'] = true;
        header('Location: login.php');
        //close db connection
        $db = null;
        exit();
    }

    //prepares query for getting password
	$query = $db->prepare('SELECT * FROM list WHERE username = :user');
	$query->bindParam(':user', $_SESSION['user']);

	//gets password from database
	$query->execute();
	$result = $query->fetch();
    $num_results = $query->fetch();
    // print_r($result);

    // if ($result) {
    //     //outputs all results passed
    //     foreach ($result as $row) {
    //         echo $row['username'];
    //     }
        
    // } else {
    //     echo "<h6 class='text-center mt-5' style='color: rgba(232,84,74,255);'>No results.</h6>";
    // }

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
    <style>
        .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover th {
            background-color: lightsalmon;
        }
    </style>
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

    <div class="container text-center mx-auto">
        <h2 class="mt-3">My Lists</h2>
    </div>

    

    <div class="container py-5 h-50">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-13 col-xl-13">
                <div class="card shadow-2-strong card-manage" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <table class="table table-hover">
                            <h3 class="text-center"><u>Anime Stats</u></h3>
                            <thead>
                                <tr>
                                    <th>Watching</th>
                                    <th>Finished</th>
                                    <th>On Hold</th>
                                    <th>Dropped</th>
                                    <th>Plan to Watch</th>
                                </tr>
                            </thead>
                            <td>
                                <?php 
                                    // displays amount of Currently Watching shows
                                    $query = $db->prepare('SELECT * FROM list WHERE status = :status AND username = :user');
                                    $var = "Currently Watching";
                                    $query->bindParam(':status', $var);
                                    $query->bindParam(':user', $_SESSION['user']);
                                
                                    $query->execute();
                                    $result = $query->fetch();
                                    
                                    $count = $query->rowCount();
                                    $count_cw = $count;
                                    echo $count_cw;
                                ?>
                            </td>
                            <td>
                                <?php
                                    // displays amount of Finished shows for user
                                    $query = $db->prepare('SELECT * FROM list WHERE status = :status AND username = :user');
                                    $var = "Finished";
                                    $query->bindParam(':status', $var);
                                    $query->bindParam(':user', $_SESSION['user']);
                                
                                    $query->execute();
                                    $result = $query->fetch();
                                    
                                    $count = $query->rowCount();
                                    $count_finished = $count; 
                                    echo $count_finished;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    // displays amount of On Hold shows for user
                                    $query = $db->prepare('SELECT * FROM list WHERE status = :status AND username = :user');
                                    $var = "On Hold";
                                    $query->bindParam(':status', $var);
                                    $query->bindParam(':user', $_SESSION['user']);
                                
                                    $query->execute();
                                    $result = $query->fetch();
                                    
                                    $count = $query->rowCount();
                                    $count_onhold = $count;
                                    echo $count_onhold;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    // displays amount of Dropped shows for user
                                    $query = $db->prepare('SELECT * FROM list WHERE status = :status AND username = :user');
                                    $var = "Dropped";
                                    $query->bindParam(':status', $var);
                                    $query->bindParam(':user', $_SESSION['user']);
                                
                                    $query->execute();
                                    $result = $query->fetch();
                                    
                                    $count = $query->rowCount();
                                    $count_dropped = $count;
                                    echo $count_dropped;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    // displays amount of Plan to Watch shows for user
                                    $query = $db->prepare('SELECT * FROM list WHERE status = :status AND username = :user');
                                    $var = "Plan to Watch";
                                    $query->bindParam(':status', $var);
                                    $query->bindParam(':user', $_SESSION['user']);
                                
                                    $query->execute();
                                    $result = $query->fetch();
                                    
                                    $count = $query->rowCount();
                                    $count_ptw = $count;
                                    echo $count_ptw;
                                ?>
                            </td>
                        </table>
                        <div class="piechart">
                            <?php
                                $dataPoints = array( 
                                    array("label"=>"Watching", "y"=>$count_cw),
                                    array("label"=>"Finished", "y"=>$count_finished),
                                    array("label"=>"On Hold", "y"=>$count_onhold),
                                    array("label"=>"Dropped", "y"=>$count_dropped),
                                    array("label"=>"Plan to Watch", "y"=>$count_ptw),
                                )
                            ?>
                            <script>
                                    window.onload = function() {
                                    
                                    
                                    var chart = new CanvasJS.Chart("chartContainer", {
                                        animationEnabled: true,
                                        
                                        data: [{
                                            type: "pie",
                                            // yValueFormatString: "#,##0.00\"%\"",
                                            indexLabel: "{label} ({y})",
                                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                        }]
                                    });
                                    chart.render();
                                    
                                    }
                            </script>
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

    <?php
		//closes db connection
		$db = null;
	?>
</html>