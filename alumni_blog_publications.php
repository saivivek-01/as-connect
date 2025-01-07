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
    <title>Alumni Dash Board</title>
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
                <li>
                    <a href="alumni_achievements.php">
                       <i class="material-icons">gps_fixed</i>
                        <span>Achievements</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
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
                    <h2>Blog Publications</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="profile--section">
                <?php
                        $id = $_SESSION["alumniid"];
                        if(isset($_POST['blog_submit'])){
                            $blogTitle = $_POST["blogTitle"];        
                            $blogDescription = $_POST["blogDescription"];
                            $blogType = $_POST["blogType"];
                            $blogLink = $_POST["blogLink"];
                            $errors = array();

                            if(empty($blogTitle) OR empty($blogDescription) OR empty($blogType) OR empty($blogLink)){
                                array_push($errors, "All fields are required");
                            }
                            if(count($errors)>0){
                                foreach($errors as $error){
                                    echo " <div class='alert alert-danger'>$error</div> ";
                                }
                            }
                            else{   
                                    require_once "connection.php";
                                   $sql = "INSERT INTO blogs (alumniId, blogTitle, blogDescription, blogType, blogLink) values (?, ?, ?, ?, ?)"; 
                                   $stmt = mysqli_stmt_init($conn);
                                   $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                                   if($prepareStmt){
                                    mysqli_stmt_bind_param($stmt, "issss", $id, $blogTitle,$blogDescription,$blogType, $blogLink);
                                    mysqli_stmt_execute($stmt);
                                    echo "<div class='alert alert-success'>You have posted a Blog successfully.</div>";
                                   }else{
                                    die("something went wrong");
                                   }
                            }
                        }
                    ?>
                <div class="profile">
                    
                    <form action="alumni_blog_publications.php" method="POST">
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
                                                <label for="">Blog Title: </label>
                                                <input type="text" name="blogTitle" class="form-control" placeholder="Title of the Blog">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Blog Description: </label>
                                                <input type="text" name="blogDescription" class="form-control" placeholder="Brief Overview of the Blog">
                                           </div>
                                            <div class="form-group-select">
                                                <label for="">Blog Type: </label>
                                                <select name="blogType" required>
                                                    <option disabled="disabled" selected="selected" value="">--Choose an Option</option>
                                                    <option value="Academic">Academic</option>
                                                    <option value="Business">Business</option>
                                                    <option value="Career">Career</option>
                                                    <option value="Education">Education</option>
                                                    <option value="Personality Developement">Personality Developement</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Blog Link: </label>
                                                <input type="text" name="blogLink" class="form-control" placeholder="Official link of the blog">
                                            </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="button">
                            <button type="submit" name="blog_submit" class="btn btn-primary">Submit</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>