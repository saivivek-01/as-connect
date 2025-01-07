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
    <link rel="stylesheet" href="std_style.css">
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
                <li class="active">
                    <a href="#">
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
                    <h2>Profile</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="profile--section">
                <?php
                        $id = $_SESSION["studentid"];
                        if(isset($_POST['student_update'])){
                            $firstname = $_POST["updateFirstName"];        
                            $lastname = $_POST["updateLastName"];
                            $gender = $_POST["updateGender"];
                            $phone = $_POST["updatePhone"];
                            $studentID = $_POST["updateStudentID"];
                            $branch = $_POST["updateBranch"];
                            $year = $_POST["updateYear"];

                            $sql = "UPDATE student_record set firstname='$firstname', lastname='$lastname', gender='$gender', phone='$phone', studentID='$studentID', branch='$branch', year='$year' where id=$id";
                            
                            $result  = mysqli_query($conn, $sql);
                            if($result){
                                echo "<div class='alert alert-success'>Student Record Updated Successfully</div>";
                            }
                            else{
                                die(mysqli_error($conn));
                            }
                        }
                    ?>
                <div class="profile">
                    
                    <form action="student_profile.php" method="POST">
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
                                                <!-- <textarea name="textarea" style="width:250px;height:150px;"></textarea> -->
                                                <p class="emailText" style="height: 4em; text-align: center; font-family: monospace;">
                                                    <?php  
                                                        echo $row['email'];
                                                    ?>
                                                    <br>
                                                    Email can't be changed!!</p>
                                                <!-- <input type="text" name="updateEmail" class="form-control" value="" placeholder="Email being the primary key, can't be changed!!"> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="">Phone: </label>
                                                <input type="text" name="updatePhone" class="form-control" value="<?php  echo $row['phone']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Student ID:  </label>
                                                <input type="text" name="updateStudentID" class="form-control" value="<?php  echo $row['studentID']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Branch: </label>
                                                <input type="text" name="updateBranch" class="form-control" value="<?php  echo $row['branch']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Studying Year: </label>
                                                <input type="text" name="updateYear" class="form-control" value="<?php  echo $row['year']; ?>">
                                            </div>

                                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="button">
                            <button type="submit" name="student_update" class="btn btn-primary">UPDATE</button> 
                        </div>
                        <!-- <div class="form-group">
                            <label for="">First Name: </label>
                            <input type="text" name="updateFirstName" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Last Name: </label>
                            <input type="text" name="updateLastName" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Gender: </label>
                            <input type="text" name="updateGender" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="text" name="updateEmail" class="form-control" value="" placeholder="Email being the primary key, can't be changed!!">
                        </div>
                        <div class="form-group">
                            <label for="">Phone: </label>
                            <input type="text" name="updatePhone" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Student ID:  </label>
                            <input type="text" name="updateStudentID" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Branch: </label>
                            <input type="text" name="updateBranch" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Studying Year: </label>
                            <input type="text" name="updateYear" class="form-control" value="">
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
</body>
</html>