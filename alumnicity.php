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
    <title>Alumni City Visit</title>
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
                <li>
                    <a href="alumni_discussion_room.php">
                       <i class="fa fa-group"></i>
                        <span>Discussion Room</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
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
                    <h2>City Visit</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="profile--section">
            <?php
                        $id = $_SESSION["alumniid"];
                        if(isset($_POST['city_submit'])){
                            $alumniName = $_POST["alumniName"];        
                            $city = $_POST["city"];
                            $alumniCityLocation = $_POST["alumniCityLocation"];
                            $startDate = date("Y-m-d", strtotime($_POST["startDate"]));
                            $endDate = date("Y-m-d", strtotime($_POST["endDate"]));
                            $timing = $_POST["timing"];
                            $errors = array();

                            if(empty($alumniName) OR empty($city) OR empty($alumniCityLocation) OR empty($startDate)OR empty($endDate) OR empty($timing)){
                                array_push($errors, "All fields are required");
                            }
                            if(count($errors)>0){
                                foreach($errors as $error){
                                    echo " <div class='alert alert-danger'>$error</div> ";
                                }
                            }
                            
                            else{   
                                    require_once "connection.php";
                                   $sql = "INSERT INTO alumniCityVisit (alumniId, alumniName, city, alumniCityLocation, startDate, endDate, timing) values ('$id', '$alumniName', '$city', '$alumniCityLocation', '$startDate', '$endDate', '$timing')"; 
                                   $result = mysqli_query($conn, $sql);
                                   if($result){
                                        echo "<div class='alert alert-success'>You have created an Alumni City Visit Successfully.</div>";
                                   }
                                   else{
                                    die("something went wrong");
                                   }
                            }
                        }
                    ?>
                <div class="profile">
                    
                    <form action="alumnicity.php" method="POST">
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
                                                <label for="">Alumni Name: </label>
                                                <input type="text" name="alumniName" class="form-control" value="<?php  echo $row['firstname']; ?> ">
                                            </div>
                                            <div class="form-group-select">
                                                <label for="">City: </label>
                                                <select name="city" required>
                                                    <option disabled="disabled" selected="selected" value="">--Choose an Option</option>
                                                    <option value="Visakhapatnam">Visakhapatnam</option>
                                                    <option value="Hyderabad">Hyderabad</option>
                                                    <option value="Banglore">Banglore</option>
                                                    <option value="Chennai">Chennai</option>
                                                    <option value="Pune">Pune</option>
                                                    <option value="Mumbai">Mumbai</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Kolkata">Kolkata</option>
                                                    <option value="Noida">Noida</option>
                                                    <option value="Kochi">Kochi</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Location: </label>
                                                <input type="text" name="alumniCityLocation" class="form-control" placeholder="Location of Alumni City">
                                           </div>
                                           <div class="form-group">
                                                <label for="">Start Date: </label>
                                                <input type="date" name="startDate" class="form-control">
                                           </div>
                                           <div class="form-group">
                                                <label for="">End Date: </label>
                                                <input type="date" name="endDate" class="form-control">
                                           </div>
                                           <div class="form-group-select">
                                                <label for="">Timing: </label>
                                                <select name="timing" required>
                                                    <option disabled="disabled" selected="selected" value="">--Choose an Option</option>
                                                    <option value="08:00 to 10:00">08:00 to 10:00</option>
                                                    <option value="09:00 to 11:00">09:00 to 11:00</option>
                                                    <option value="10:00 to 12:00">10:00 to 12:00</option>
                                                    <option value="11:00 to 13:00">11:00 to 13:00</option>
                                                    <option value="12:00 to 14:00">12:00 to 14:00</option>
                                                    <option value="13:00 to 15:00">13:00 to 15:00</option>
                                                    <option value="14:00 to 16:00">13:00 to 16:00</option>
                                                    <option value="15:00 to 17:00">15:00 to 17:00</option>
                                                </select>
                                            </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="button">
                            <button type="submit" name="city_submit" class="btn btn-primary">Submit</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
    <!-- <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Alumni</span>
                <h2>Dashboard</h2>
            </div>
            <div class="user--info">
                <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
            </div>
        </div>
        <div class="search">
            <input type="text" placeholder="Search Alumni....">
            <input type="submit" value="search">
        </div>
        <div class="job-listings">
            <ul class="loc">
                <div class="main">
                    <div class="sub">
                        <li>
                            <p>Name: xyzname</p>
                            <p>Company: Google</p>
                            <p>Location: Banglore</p>
                            <br>
                        </li>
                    </div>
                    <div class="sub-img">
                        <img src="Images\boy_image.jpg" width="150px">
                    </div>     
                </div>
                <div class="main">
                    <div class="sub">
                        <li>
                            <p>Name: xyzname</p>
                            <p>Company: Google</p>
                            <p>Location: Banglore</p>
                            <br>
                        </li>
                    </div>
                    <div class="sub-img">
                        <img src="Images\girl_image.jpg" width="150px">
                    </div>        
                </div>
                <br>
            </ul>
        </div>
    </div> -->
