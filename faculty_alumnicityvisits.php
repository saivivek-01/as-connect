<?php
    session_start();
    if(!isset($_SESSION["facultyid"])){
        header("Location: index.php");
    }
    require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="faculty_alumnicityvisits.css">
    <!-- <link rel="stylesheet" href="alumni_register.css"> -->
    <title>Faculty Dash Board</title>
</head>
<body>
        <!-- <h1>Hey Student... Good to make it here!!!</h1>
        <a href="student_logout.php" class="btn btn-warning">Logout</a> -->
        <div class="sidebar">
            <div class="logo">
                <h3>ALCONNECT</h3>
            </div>
            <ul class="menu">
                <li class="active"> 
                    <a href="#">
                       <i class="fas fa-city"></i>
                        <span>Alumni City Visit</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_dashboard.php">
                       <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_search.php">
                       <i class="fas fa-search"></i>
                        <span>Search</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_events.php">
                       <i class="material-icons" style="font-size:25px">event</i>
                        <span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_news.php">
                       <i class="fa fa-newspaper-o"></i>
                        <span>News</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_job_offerings.php">
                       <i class="fas fa-bell"></i>
                        <span>Job Offerings</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_authorization.php">
                       <i class="material-icons">remove_red_eye</i>
                        <span>Unpublished</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_logout.php">
                       <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <span>Alumni</span>
                    <h2>City Visit</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="dashboard">
                <?php
                    $curr_id = $_SESSION["facultyid"];
                    $sql = "SELECT * FROM alumniCityVisit ORDER BY id DESC";
                    $rows_result = mysqli_query($conn, $sql);
                    foreach($rows_result as $row):
                        ?>
                            <div class="message">
                                <h2>A Alumni Visit Authorized By - <?php echo $row['alumniName']?> </h2>
                                <p><b>City:</b> <?php echo $row['city']?></p>
                                <p><b>Location: </b><?php echo $row['alumniCityLocation']?></p>
                                <p><b>Start Date: </b><?php 
                                     $startDate = date("d-M-Y, D", strtotime($row['startDate']));
                                    echo $startDate;
                                ?></p>
                                <p><b>End Date: </b> <?php 
                                     $endDate = date("d-M-Y, D", strtotime($row['endDate']));
                                    echo $endDate;
                                ?></p>
                                <p><b>Alumni Available Timings in those Dates: </b><?php echo $row['timing']?></p>
                            </div>
                        <?php
                        endforeach;
                    // if($result){
                    //     if(mysqli_num_rows($result) > 0){
                    //         while($row = mysqli_fetch_array($result)){
                    //             
                    //         }
                    //     }
                    // }
                ?>
                
                
            </div>
        </div>
    </body>
</html>