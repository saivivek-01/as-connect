<?php
    session_start();
    if(!isset($_SESSION["studentid"])){
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
    <link rel="stylesheet" href="student_dashboard.css"/>
    <!-- <link rel="stylesheet" href="alumni_register.css"> -->
    <title>Student Dash Board</title>
</head>
<body>
        <!-- <h1>Hey Student... Good to make it here!!!</h1>
        <a href="student_logout.php" class="btn btn-warning">Logout</a> -->
        <div class="sidebar">
            <div class="logo">
                <h3>ALCONNECT</h3>
            </div>
            <ul class="menu">
                <li>
                    <a href="student_profile.php">
                       <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                       <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="student_search.php">
                       <i class="fas fa-search"></i>
                        <span>Search</span>
                    </a>
                </li>
                <li>
                    <a href="student_events.php">
                       <i class="material-icons" style="font-size:25px">event</i>
                        <span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="student_news.php">
                       <i class="fa fa-newspaper-o"></i>
                        <span>News</span>
                    </a>
                </li>
                
                <li>
                    <a href="student_logout.php">
                       <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <span>Student</span>
                    <h2>Dashboard</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="dashboard">
                <?php
                    $curr_id = $_SESSION["studentid"];
                    $sql = "SELECT * FROM student_record WHERE id=$curr_id";
                    $result = mysqli_query($conn, $sql);

                    if($result){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                <h1>Hey there.. <?php  echo $row['firstname'].' '.$row['lastname']  ?></h1>
                                <?php
                            }
                        }
                    }
                ?>
                <div class="message">
                    <h2>A Message from our team: </h2>
                    <p>The core objective of ALCONNECT is to establish a bridge between our college's alumni and the 
                        present B.Tech students, facilitating the students in finding mentors aligned with their desired career
                         fields. This initiative also provides an opportunity for our college alumni to give back to their alma
                          mater. The concept for ALCONNECT originated from our group, as we all share a strong interest in 
                          career-focused subjects like business development, entrepreneurship, and marketing. However, 
                          since these topics aren't integrated into our academic curriculum, we didn't receive any guidance or
                           support from our professors or peers.

                        Consequently, our team conceived the idea of reaching out to our college's alumni as potential 
                        mentors in these fields. To our disappointment, we realized that our college's alumni management 
                        system didn't meet our requirements. Therefore, we decided to create a website that connects our 
                        college's alumni with students seeking mentorship in specific domains, resulting in the birth of 
                        ALCONNECT. On this platform, you can utilize a search feature to discover the most suitable mentors
                         for your needs and initiate contact with them for mentorship.</p>
                </div>
                
            </div>
        </div>
    </body>
</html>