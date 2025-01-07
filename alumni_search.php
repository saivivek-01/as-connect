<?php
    session_start();
    if(!isset($_SESSION["alumniid"])){
        header("Location: index.php");
    }
    require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="alumni_profile.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="alumni_profile_1.css">
    <link rel="stylesheet" href="alumni_search.css">
    <!-- <link rel="stylesheet" href="alumni_register.css"> -->
    <title>Alumni's - Alumni Search</title>
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
                    <a href="alumni_profile.php">
                       <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="alumni_dashboard.php">
                       <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                       <i class="fas fa-search"></i>
                        <span>Search</span>
                    </a>
                </li>
                <li>
                    <a href="alumni_events.php">
                       <i class="material-icons" style="font-size:25px">event</i>
                        <span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="alumni_news.php">
                       <i class="fa fa-newspaper-o"></i>
                        <span>News</span>
                    </a>
                </li>
                <li>
                    <a href="alumni_job_offerings.php">
                       <i class="fas fa-bell"></i>
                        <span>Job Offerings</span>
                    </a>
                </li>
                <li >
                    <a href="alumni_achievements.php">
                       <i class="material-icons">gps_fixed</i>
                        <span>Achievements</span>
                    </a>
                </li>
                <li>
                    <a href="alumni_blog_publications.php">
                       <i class="fab fa-blogger"></i>
                        <span>Blog Publications</span>
                    </a>
                </li>
                <li>
                    <a href="alumni_discussion_room.php">
                       <i class="fa fa-group"></i>
                        <span>Discussion Room</span>
                    </a>
                </li>
                <li>
                    <a href="alumnicity.php">
                       <i class="fas fa-city"></i>
                        <span>Alumni City Visit</span>
                    </a>
                </li>
                <li>
                    <a href="alumni_logout.php">
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
                    <h2>Search</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="search--content">
                <table class="search--table">
                    <tr class="search--title">
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Student ID</th>
                        <th>Branch</th>
                        <th>Year</th>
                    </tr>
                    <?php
                        // $curr_id = $_SESSION["studentid"];
                        // $sql = "SELECT * FROM student_record WHERE id=$curr_id";
                        $sql = "SELECT * FROM student_record";
                        $result = mysqli_query($conn, $sql);

                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
                                $firstname=$row['firstname'];
                                $lastname=$row['lastname'];                                
                                $email=$row['email'];
                                $phone=$row['phone'];
                                $studentID=$row['studentID'];
                                $branch=$row['branch'];
                                $year=$row['year'];
                                    ?>
                                        <tr>
                                            <td><?php  echo $firstname.' '.$lastname;  ?></td>
                                            <td><?php  echo $email;  ?></td>
                                            <td><?php  echo $phone;  ?></td>
                                            <td><?php  echo $studentID;  ?></td>
                                            <td><?php  echo $branch;  ?></td>
                                            <td><?php  echo $year;  ?></td>
                                        </tr>
                                    <?php
                                 }
                            }
                    ?>
                 </table>
            </div>
        </div>
    </body>
</html>