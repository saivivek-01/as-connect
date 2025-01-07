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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="alumni_blog_publications.css">
    <!-- <link rel="stylesheet" href="alumni_register.css"> -->
    <title>Alumni Achievements</title>
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
                <li>
                    <a href="alumni_search.php">
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
                <li class="active">
                    <a href="#">
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
                    <span>Alumni</span>
                    <h2>Achievements</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="profile--section">
                <?php
                        $id = $_SESSION["alumniid"];
                        if(isset($_POST['achievements_submit'])){
                            require_once "connection.php";
                            $achievementTitle = $_POST["achievementTitle"];        
                            $significance = $_POST["significance"];
                            $achievementDescription = $_POST["achievementDescription"];
                            $errors = array();
                            if(empty($achievementTitle) OR empty($significance) OR empty($achievementDescription)){
                                array_push($errors, "All fields are required");
                            }

                            if(count($errors)>0){
                                foreach($errors as $error){
                                    echo " <div class='alert alert-danger'>$error</div> ";
                                }
                            }
                            else{   
                                    $file_name = $_FILES['image']['name'];
                                    $tempname = $_FILES['image']['tmp_name'];
                                    $folder = 'Ach_Images/'.$file_name;
                                    $query = mysqli_query($conn, "INSERT INTO achievements (alumniId, achievementTitle, significance, achievementDescription, imageName) values ('$id', '$achievementTitle', '$significance', '$achievementDescription', '$file_name')");
                                    move_uploaded_file($tempname, $folder);
                                    if($query){
                                        echo "<div class='alert alert-success'>You have Posted an Achievement successfully.</div>";
                                    }
                                    else{
                                        die("something went wrong");
                                    }
                            }
                        }
                    ?>
                <div class="profile">
                    
                    <form action="alumni_achievements.php" method="POST" enctype="multipart/form-data">
                        <?php
                            $curr_id = $_SESSION["alumniid"];
                            $sql = "SELECT * FROM alumni_record WHERE id=$curr_id";
                            $result = mysqli_query($conn, $sql);

                            if($result){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        // print_r($row);
                                        ?>
                                            <div class="form-group">
                                                <label for="">Achievement Title: </label>
                                                <input type="text" name="achievementTitle" class="form-control" placeholder="Title of the Achievement">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Significance: </label>
                                                <input type="text" name="significance" class="form-control" placeholder="Importance of the Achievement">
                                           </div>
                                           <div class="form-group">
                                                <label for="">Achievement Description: </label>
                                                <input type="text" name="achievementDescription" class="form-control" placeholder="Brief Description of the Achievement">
                                           </div>
                                           <div class="form-group">
                                                <label for="">Media Related: </label>
                                                <input type="file" name="image" class="form-control">
                                           </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="button">
                            <button type="submit" name="achievements_submit" class="btn btn-primary">Submit</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>