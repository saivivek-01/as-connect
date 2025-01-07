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
                <li>
                    <a href="alumni_blog_publications.php">
                       <i class="fab fa-blogger"></i>
                        <span>Blog Publications</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
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
                    <h2>Discussion Room</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="profile--section">
                <?php
                        $id = $_SESSION["alumniid"];
                        if(isset($_POST['discussion_room_submit'])){
                            $roomTopic = $_POST["roomTopic"];        
                            $roomPlatform = $_POST["roomPlatform"];
                            $roomLink = $_POST["roomLink"];
                            $roomDate = date("Y-m-d", strtotime($_POST["roomDate"]));
                            $startTime = $_POST["startTime"];
                            $endTime = $_POST["endTime"];
                            $errors = array();

                            if(empty($roomTopic) OR empty($roomPlatform) OR empty($roomLink) OR empty($roomDate)OR empty($startTime) OR empty($endTime)){
                                array_push($errors, "All fields are required");
                            }
                            if(count($errors)>0){
                                foreach($errors as $error){
                                    echo " <div class='alert alert-danger'>$error</div> ";
                                }
                            }
                            
                            else{   
                                    require_once "connection.php";
                                   $sql = "INSERT INTO discussionRoom (alumniId, roomTopic, roomPlatform, roomLink, roomDate, startTime, endTime) values ('$id', '$roomTopic', '$roomPlatform', '$roomLink', '$roomDate', '$startTime', '$endTime')"; 
                                   $result = mysqli_query($conn, $sql);
                                   if($result){
                                        echo "<div class='alert alert-success'>You have created a Discussion Room Successfully.</div>";
                                   }
                                   else{
                                    die("something went wrong");
                                   }

                                //    $stmt = mysqli_stmt_init($conn);
                                //    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                                //    if($prepareStmt){
                                //     mysqli_stmt_bind_param($stmt, "issss", $id, $eventTitle,$eventDescription,$eventTime, $extraInfo);
                                //     mysqli_stmt_execute($stmt);
                                //     echo "<div class='alert alert-success'>You have created an Event successfully.</div>";
                                //    }else{
                                //     die("something went wrong");
                                //    }
                            }
                        }
                    ?>
                <div class="profile">
                    
                    <form action="alumni_discussion_room.php" method="POST">
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
                                                <label for="">Room Title / Topic: </label>
                                                <input type="text" name="roomTopic" class="form-control" placeholder="Title of the Discussion Topic">
                                            </div>
                                            <div class="form-group-select">
                                                <label for="">Room Platform: </label>
                                                <!-- <input type="text" name="roomPlatform" class="form-control" placeholder="Platform of the Discussion Room"> -->
                                                <select name="roomPlatform" required>
                                                    <option disabled="disabled" selected="selected" value="">--Choose an Option</option>
                                                    <option value="ClickUp">ClickUp</option>
                                                    <option value="Google Meet">Google Meet</option>
                                                    <option value="Zoom">Zoom</option>
                                                    <option value="Microsoft Teams">Microsoft Teams</option>
                                                    <option value="Skype">Skype</option>
                                                    <option value="Reddit">Reddit</option>
                                                    <option value="Discord">Discord</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Youtube">Youtube</option>
                                                    <option value="Quora">Quora</option>
                                                </select>
                                            </div>
                                           <div class="form-group">
                                                <label for="">Room Link: </label>
                                                <input type="text" name="roomLink" class="form-control" placeholder="Link of the Discussion Room">
                                           </div>
                                           <div class="form-group">
                                                <label for="">Room Date: </label>
                                                <input type="date" name="roomDate" class="form-control">
                                           </div>
                                           <div class="form-group">
                                                <label for="">Start Time</label>
                                                <input type="time" name="startTime" class="form-control">
                                           </div>
                                           <div class="form-group">
                                                <label for="">End Time</label>
                                                <input type="time" name="endTime" class="form-control">
                                           </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="button">
                            <button type="submit" name="discussion_room_submit" class="btn btn-primary">Submit</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>