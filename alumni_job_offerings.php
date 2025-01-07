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
    <title>Alumni Job Offerings</title>
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
                <li class="active">
                    <a href="#">
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
                    <h2>Job Offerings</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="profile--section">
                <?php
                        $id = $_SESSION["alumniid"];
                        if(isset($_POST['job_submit'])){
                            $jobTitle = $_POST["jobTitle"];        
                            $jobCompany = $_POST["jobCompany"];
                            $jobLocation = $_POST["jobLocation"];
                            $jobType = $_POST["jobType"];
                            $jobDomain= $_POST["jobDomain"];
                            $jobLink = $_POST["jobLink"];
                            $errors = array();

                            if(empty($jobTitle) OR empty($jobCompany) OR empty($jobLocation) OR empty($jobType)OR empty($jobDomain) OR empty($jobLink)){
                                array_push($errors, "All fields are required");
                            }
                            if(count($errors)>0){
                                foreach($errors as $error){
                                    echo " <div class='alert alert-danger'>$error</div> ";
                                }
                            }
                            else{   
                                    require_once "connection.php";
                                   $sql = "INSERT INTO jobs (alumniId, jobTitle, jobCompany, jobLocation, jobType, jobDomain, jobLink) values (?, ?, ?, ?, ?, ?, ?)"; 
                                   $stmt = mysqli_stmt_init($conn);
                                   $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                                   if($prepareStmt){
                                    mysqli_stmt_bind_param($stmt, "issssss", $id, $jobTitle,$jobCompany,$jobLocation, $jobType, $jobDomain, $jobLink);
                                    mysqli_stmt_execute($stmt);
                                    echo "<div class='alert alert-success'>You have posted a Job Notification successfully.</div>";
                                   }else{
                                    die("something went wrong");
                                   }
                            }
                        }
                    ?>
                <div class="profile">
                    
                    <form action="alumni_job_offerings.php" method="POST">
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
                                                <label for="">Job Title: </label>
                                                <input type="text" name="jobTitle" class="form-control" placeholder="Title of the Job">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Company: </label>
                                                <input type="text" name="jobCompany" class="form-control" placeholder="Name of the Company">
                                           </div>
                                           <div class="form-group">
                                                <label for="">Location: </label>
                                                <input type="text" name="jobLocation" class="form-control" placeholder="Location to be attended">
                                           </div>
                                            <div class="form-group-select">
                                                <label for="">Job Type: </label>
                                                <select name="jobType" required>
                                                    <option disabled="disabled" selected="selected" value="">--Choose an Option</option>
                                                    <option value="Full-Time">Full-Time</option>
                                                    <option value="Hybrid">Hybrid</option>
                                                    <option value="Part-Time">Part-Time</option>
                                                    <option value="Work From Home">Work From Home</option>
                                                    <option value="Remote">Remote</option>
                                                </select>
                                            </div>
                                            <div class="form-group-select">
                                                <label for="">Job Domain: </label>
                                                <select name="jobDomain" required>
                                                    <option disabled="disabled" selected="selected" value="">--Choose an Option</option>
                                                    <option value="Software">Software</option>
                                                    <option value="Business">Business</option>
                                                    <option value="Hardware">Hardware</option>
                                                    <option value="Embedded">Embedded</option>
                                                    <option value="Administration">Administration</option>
                                                    <option value="Desk-Work">Desk-Work</option>
                                                    <option value="Support">Support</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Job Application Portal Link: </label>
                                                <input type="text" name="jobLink" class="form-control" placeholder="Link to Apply for the Job">
                                            </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="button">
                            <button type="submit" name="job_submit" class="btn btn-primary">Submit</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>