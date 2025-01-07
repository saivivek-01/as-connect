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
    <link rel="stylesheet" href="alumni_profile_1.css">
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
                <li class="active">
                    <a href="#">
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
                    <a href="alumni_events">
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
                    <span>Alumni</span>
                    <h2>Profile</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="profile--section">
                <?php
                        $id = $_SESSION["alumniid"];
                        if(isset($_POST['alumni_update'])){
                            $firstname = $_POST["updateFirstName"];        
                            $lastname = $_POST["updateLastName"];
                            $gender = $_POST["updateGender"];
                            $phone = $_POST["updatePhone"];
                            $contact = $_POST["updateContact"];
                            $studentID = $_POST["updateStudentID"];
                            $year = $_POST["updateYear"];
                            $linkedin = $_POST["updateLinkedin"];
                            $qualification = $_POST["updateQualification"];
                            $occupation= $_POST["updateOccupation"];
                            // $domains = $_POST["updateDomain"];
                            $sql = "UPDATE alumni_record set firstname='$firstname', lastname='$lastname', gender='$gender', phone='$phone', contact='$contact', studentID='$studentID', year='$year', linkedin='$linkedin', qualification='$qualification', occupation='$occupation' where id='$id'";
                            $result  = mysqli_query($conn, $sql);
                            if($result){
                                echo "<div class='alert alert-success'>Alumni Record Updated Successfully</div>";
                            }
                            else{
                                die(mysqli_error($conn));
                            }
                        }
                    ?>
                <div class="profile">
                    
                    <form action="alumni_profile.php" method="POST">
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
                                                <label for="">First Name: </label>
                                                <input type="text" name="updateFirstName" class="form-control" value="<?php  echo $row['firstname']; ?> ">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Last Name: </label>
                                                <input type="text" name="updateLastName" class="form-control" value="<?php  echo $row['lastname']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Gender: </label>
                                                <input type="text" name="updateGender" class="form-control" value="<?php  echo $row['gender']; ?>">
                                            </div>
                                            <div class="form-group-email">
                                                <label for="">Email: </label>
                                                <p class="emailText" style="height: 4em;">
                                                    <?php
                                                       echo $row['email'];
                                                        ?>
                                                            <br>
                                                        <?php
                                                    ?>
                                                    Email can't be changed!!
                                                </p>
                                                <!-- <input type="text" name="updateEmail" class="form-control" value="" placeholder="Email being the primary key, can't be changed!!"> -->
                                           </div>
                                            <div class="form-group">
                                                <label for="">Phone: </label>
                                                <input type="text" name="updatePhone" class="form-control" value="<?php  echo $row['phone']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Contact: </label>
                                                <input type="text" name="updateContact" class="form-control" value="<?php  echo $row['contact']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Student ID:  </label>
                                                <input type="text" name="updateStudentID" class="form-control" value="<?php  echo $row['studentID']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Studying Year: </label>
                                                <input type="text" name="updateYear" class="form-control" value="<?php  echo $row['year']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">LinkedIN Id: </label>
                                                <input type="text" name="updateLinkedin" class="form-control" value="<?php  echo $row['linkedin']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Qualification: </label>
                                                <input type="text" name="updateQualification" class="form-control" value="<?php  echo $row['qualification']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Occupation: </label>
                                                <input type="text" name="updateOccupation" class="form-control" value="<?php  echo $row['occupation']; ?>">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="">Domain: </label>
                                                <input type="text" name="updateDomain" class="form-control" value="<?php  echo $row['domains']; ?>">
                                            </div> -->
                                            <div class="form-group-email">
                                                <label for="">Domains: </label>
                                                <p class="domainText" style="
                                                    width: 100%;
                                                    background: #fff;
                                                    padding: .5em;
                                                    height: 16em;
                                                    font-family: monospace;
                                                    /* text-align: center; */
                                                    border-radius: 10px;
                                                    border: 1px rgb(215, 214, 214) solid;
                                                    margin-top: 15em;
                                                
                                                ">
                                                    <!-- Email being the primary key, can't be changed!! -->
                                                    <?php
                                                        $tmp_email = $row['email'];
                                                        $sql = "SELECT * FROM alumni_domains where email='$tmp_email'";
                                                        $answer = mysqli_query($conn, $sql);
                            
                                                        if($answer){
                                                            if(mysqli_num_rows($answer) > 0){
                                                        //         // while($dm = mysqli_fetch_array($answer)){

                                                            foreach($answer as $item){
                                                                echo '-'.$item['domains'];
                                                                ?>
                                                                    <br>
                                                                <?php
                                                            }
                                                        //         }
                                                            }
                                                        }
                                                    ?>
                                                </p>
                                                <!-- <input type="text" name="updateEmail" class="form-control" value="" placeholder="Email being the primary key, can't be changed!!"> -->
                                            </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="button">
                            <button type="submit" name="alumni_update" class="btn btn-primary">UPDATE</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>