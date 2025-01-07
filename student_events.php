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
    <link rel="stylesheet" href="student_news.css"/>
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
                <li>
                    <a href="student_dashboard.php">
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
                <li class="active">
                    <a href="#">
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
            <div class="profile--section">
                <?php
                        $id = $_SESSION["studentid"];
                        if(isset($_POST['event_submit'])){
                            $eventTitle = $_POST["eventTitle"];        
                            $eventDescription = $_POST["eventDescription"];
                            // $eventDate = date('Y-m-d',strtotime( $_POST["eventDate"]));
                            $eventDate = date("Y-m-d", strtotime($_POST["eventDate"]));
                            $extraInfo = $_POST["extraInfo"];
                            $errors = array();

                            if(empty($eventTitle) OR empty($eventDescription) OR empty($eventDate) OR empty($extraInfo)){
                                array_push($errors, "All fields are required");
                            }
                            if(count($errors)>0){
                                foreach($errors as $error){
                                    echo " <div class='alert alert-danger'>$error</div> ";
                                }
                            }
                            
                            else{   
                                    require_once "connection.php";
                                   $sql = "INSERT INTO events (alumniId, eventTitle, eventDescription, eventDate, extraInfo) values ('$id', '$eventTitle', '$eventDescription', '$eventDate', '$extraInfo')"; 
                                   $result = mysqli_query($conn, $sql);
                                   if($result){
                                        echo "<div class='alert alert-success'>You have created an Event successfully.</div>";
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
                    
                    <form action="student_events.php" method="POST">
                        <?php
                            $curr_id = $_SESSION["studentid"];
                            $sql = "SELECT * FROM student_record WHERE id=$curr_id";
                            $result = mysqli_query($conn, $sql);

                            if($result){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        // print_r($row);
                                        ?>
                                            <div class="form-group">
                                                <label for="">Event Title: </label>
                                                <input type="text" name="eventTitle" class="form-control" placeholder="Title of the Event">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Event Description: </label>
                                                <input type="text" name="eventDescription" class="form-control" placeholder="Brief Overview of the Event">
                                           </div>
                                           <div class="form-group">
                                                <label for="">Event Dates: </label>
                                                <input type="date" name="eventDate" class="form-control">
                                           </div>
                                            <div class="form-group">
                                                <label for="">Extra Info: </label>
                                                <input type="text" name="extraInfo" class="form-control" placeholder="Additional Information regarding the Event">
                                            </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="button">
                            <button type="submit" name="event_submit" class="btn btn-primary">Submit</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>