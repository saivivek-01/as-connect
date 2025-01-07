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
    <!-- <link rel="stylesheet" href="std_style.css"> -->
    <link rel="stylesheet" href="student_search.css">
    <!-- <link rel="stylesheet" href="alumni_register.css"> -->
    <title>Student's - Alumni Search</title>
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
                <li>
                    <a href="student_dashboard.php">
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
                    <span>Alumni</span>
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
                        <!--<th style="padding:1em;">Contact</th>-->
                        <!-- <th>Student ID</th> -->
                        <th>LinkedIn ID</th>
                        <!-- <th>Qualification</th> -->
                        <th>Occupation</th>
                        <th>Domains</th>
                    </tr>
                    <?php
                        // $curr_id = $_SESSION["studentid"];
                        // $sql = "SELECT * FROM student_record WHERE id=$curr_id";
                        $sql = "SELECT * FROM alumni_record";
                        $result = mysqli_query($conn, $sql);

                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
                                $firstname=$row['firstname'];
                                $lastname=$row['lastname'];                                
                                $email=$row['email'];
                                $contact=$row['contact'];
                                $studentID=$row['studentID'];
                                $linkedin=$row['linkedin'];                                
                                $qualification=$row['qualification'];
                                $occupation=$row['occupation'];
                                // $domain=$row['domains'];

                               
                                                               
                                    ?>
                                        <tr>
                                            <td ><?php  echo $firstname.' '.$lastname;  ?></td>
                                            <td ><?php  echo $email;  ?></td>
                                            <!--<td style="text-align: center;"><?php // echo $contact;  ?></td>-->
                                            <!-- <td ><?php // echo $studentID;  ?></td> -->
                                            <td > <a href="<?php  echo $linkedin;  ?>" target="_blank">LinkedIn Link</a></td>
                                            <!-- <td ><?php  //echo $qualification;  ?></td> -->
                                            <td ><?php  echo $occupation;  ?></td>
                                            <td><p class='domains'>
                                                
                                            <?php

                                                $sql = "SELECT * FROM alumni_domains where email='$email'";
                                                $answer = mysqli_query($conn, $sql);

                                                if($answer){
                                                    if(mysqli_num_rows($answer) > 0){
                                                                        //         // while($dm = mysqli_fetch_array($answer)){
                                                        foreach($answer as $item){
                                                            echo '- '.$item['domains'] 
                                            ?>
                                            <br><?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </p></td>
                                            <!-- <td><?php // echo $domain;  ?></td> -->
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