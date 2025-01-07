<?php
    session_start();
    if(!isset($_SESSION["facultyid"])){
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
    <link rel="stylesheet" href="faculty_authorization.css">
    <!-- <link rel="stylesheet" href="alumni_register.css"> -->
    <title>Faculty Dash Board</title>
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
                    <a href="faculty_alumnicityvisits.php">
                       <i class="fas fa-city"></i>
                        <span>Alumni City Visit</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_dashboard.php">
                       <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_search.php">
                       <i class="fas fa-search"></i>
                        <span>Search</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_events.php">
                       <i class="material-icons" style="font-size:25px">event</i>
                        <span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_news.php">
                       <i class="fa fa-newspaper-o"></i>
                        <span>News</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_job_offerings.php">
                       <i class="fas fa-bell"></i>
                        <span>Job Offerings</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                       <i class="material-icons">remove_red_eye</i>
                        <span>Unpublished</span>
                    </a>
                </li>
                <li>
                    <a href="faculty_logout.php">
                       <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <span>Authorizing</span>
                    <h2>Publications</h2>
                </div>
                <div class="user--info">
                    <a href="https://www.gecgudlavalleru.ac.in" target="_blank"><img src="Images/gud_logo.jpeg" alt=""></a>
                </div>
            </div>
            <div class="profile--section">
                <?php
                        $id = $_SESSION["facultyid"];
                        

                         /*********** Achievement Delete ***********/


                        if(isset($_POST['achievements_submit'])){
                            $achievementTitle = $_POST['achievementTitle'];
                            require_once "connection.php";
                            // Check if the achievement title exists
                            $checkSql = "SELECT id FROM achievements WHERE achievementTitle = ?";
                            $checkStmt = mysqli_stmt_init($conn);
                            $prepareCheckStmt = mysqli_stmt_prepare($checkStmt, $checkSql);

                            if ($prepareCheckStmt) {
                                mysqli_stmt_bind_param($checkStmt, "s", $achievementTitle);
                                mysqli_stmt_execute($checkStmt);
                                mysqli_stmt_store_result($checkStmt);

                                // Check if any rows are returned
                                if (mysqli_stmt_num_rows($checkStmt) > 0) {

                                    $retrieveFileNameSql = "SELECT imageName FROM achievements WHERE achievementTitle = ?";
                                    $retrieveStmt = mysqli_stmt_init($conn);
                                    $prepareRetrieveStmt = mysqli_stmt_prepare($retrieveStmt, $retrieveFileNameSql);

                                    if ($prepareRetrieveStmt) {
                                        mysqli_stmt_bind_param($retrieveStmt, "s", $achievementTitle);
                                        mysqli_stmt_execute($retrieveStmt);
                                        mysqli_stmt_store_result($retrieveStmt);
                                        if(mysqli_stmt_num_rows($retrieveStmt) > 0){
                                            mysqli_stmt_bind_result($retrieveStmt, $file_name);
                                            while(mysqli_stmt_fetch($retrieveStmt)){
                                                // echo "This is the file name inside while: $file_name";
                                            }
                                            // Achievement title is valid, proceed to delete
                                            $sql = "DELETE FROM achievements WHERE achievementTitle = ?";
                                            $stmt = mysqli_stmt_init($conn);
                                            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                                            if ($prepareStmt) {
                                                mysqli_stmt_bind_param($stmt, "s", $achievementTitle);
                                                mysqli_stmt_execute($stmt);
                                                unlink("Ach_Images/".$file_name);
                                                echo "<div class='alert alert-success'>The related achievement is successfully deleted</div>";
                                            } else {
                                                echo "<div class='alert alert-danger'>Failed to prepare the delete statement</div>";
                                            }
                                        }
                                        else{
                                            echo "<div class='aler alert-warning'>The Image Name is Invalid</div>";
                                        }
                                    }
                                    else{
                                        echo "<div class='aler alert-danger'>Failed to prepare the Retrieve Statement</div>";
                                    }

                                } else {
                                    // No matching achievement title found
                                    echo "<div class='alert alert-warning'>The given achievement title is invalid</div>";
                                }

                                // Close the check statement
                                mysqli_stmt_close($checkStmt);
                            } else {
                                echo "<div class='alert alert-danger'>Failed to prepare the check statement</div>";
                            }
                        }


                         /*********** Blog Delete ***********/



                        if(isset($_POST['blogs_submit'])){
                            $blogTitle = $_POST['blogTitle'];
                            require_once "connection.php";
                            // Check if the achievement title exists
                            $checkSql = "SELECT id FROM blogs WHERE blogTitle = ?";
                            $checkStmt = mysqli_stmt_init($conn);
                            $prepareCheckStmt = mysqli_stmt_prepare($checkStmt, $checkSql);

                            if ($prepareCheckStmt) {
                                mysqli_stmt_bind_param($checkStmt, "s", $blogTitle);
                                mysqli_stmt_execute($checkStmt);
                                mysqli_stmt_store_result($checkStmt);

                                // Check if any rows are returned
                                if (mysqli_stmt_num_rows($checkStmt) > 0) {
                                    // Achievement title is valid, proceed to delete
                                    $sql = "DELETE FROM blogs WHERE blogTitle = ?";
                                    $stmt = mysqli_stmt_init($conn);
                                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                                    if ($prepareStmt) {
                                        mysqli_stmt_bind_param($stmt, "s", $blogTitle);
                                        mysqli_stmt_execute($stmt);
                                        echo "<div class='alert alert-success'>The related Blog is successfully deleted</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Failed to prepare the delete statement</div>";
                                    }
                                } else {
                                    // No matching achievement title found
                                    echo "<div class='alert alert-warning'>The given Blog title is invalid</div>";
                                }

                                // Close the check statement
                                mysqli_stmt_close($checkStmt);
                            } else {
                                echo "<div class='alert alert-danger'>Failed to prepare the check statement</div>";
                            }
                        }


                        /*********** Event Delete ***********/


                        if(isset($_POST['events_submit'])){
                            $eventTitle = $_POST['eventTitle'];
                            require_once "connection.php";
                            // Check if the achievement title exists
                            $checkSql = "SELECT id FROM events WHERE eventTitle = ?";
                            $checkStmt = mysqli_stmt_init($conn);
                            $prepareCheckStmt = mysqli_stmt_prepare($checkStmt, $checkSql);

                            if ($prepareCheckStmt) {
                                mysqli_stmt_bind_param($checkStmt, "s", $eventTitle);
                                mysqli_stmt_execute($checkStmt);
                                mysqli_stmt_store_result($checkStmt);

                                // Check if any rows are returned
                                if (mysqli_stmt_num_rows($checkStmt) > 0) {
                                    // Achievement title is valid, proceed to delete
                                    $sql = "DELETE FROM events WHERE eventTitle = ?";
                                    $stmt = mysqli_stmt_init($conn);
                                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                                    if ($prepareStmt) {
                                        mysqli_stmt_bind_param($stmt, "s", $eventTitle);
                                        mysqli_stmt_execute($stmt);
                                        echo "<div class='alert alert-success'>The related Event is successfully deleted</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Failed to prepare the delete statement</div>";
                                    }
                                } else {
                                    // No matching achievement title found
                                    echo "<div class='alert alert-warning'>The given Event title is invalid</div>";
                                }

                                // Close the check statement
                                mysqli_stmt_close($checkStmt);
                            } else {
                                echo "<div class='alert alert-danger'>Failed to prepare the check statement</div>";
                            }
                        }


                        /**********Discussion Room Delete **********/


                        if(isset($_POST['rooms_submit'])){
                            $roomTopic = $_POST['roomTopic'];
                            $roomDate = date('Y-m-d', strtotime($_POST['roomDate']));
                            require_once "connection.php";
                            // Check if the achievement title exists
                            $checkSql = "SELECT id FROM discussionRoom WHERE roomTopic = ? and roomDate = ?";
                            $checkStmt = mysqli_stmt_init($conn);
                            $prepareCheckStmt = mysqli_stmt_prepare($checkStmt, $checkSql);

                            if ($prepareCheckStmt) {
                                mysqli_stmt_bind_param($checkStmt, "ss", $roomTopic,$roomDate);
                                mysqli_stmt_execute($checkStmt);
                                mysqli_stmt_store_result($checkStmt);

                                // Check if any rows are returned
                                if (mysqli_stmt_num_rows($checkStmt) > 0) {
                                    // Achievement title is valid, proceed to delete
                                    $sql = "DELETE FROM discussionRoom WHERE roomTopic = ? and roomDate = ?";
                                    $stmt = mysqli_stmt_init($conn);
                                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                                    if ($prepareStmt) {
                                        mysqli_stmt_bind_param($stmt, "ss", $roomTopic, $roomDate);
                                        mysqli_stmt_execute($stmt);
                                        echo "<div class='alert alert-success'>The related Room is successfully deleted</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Failed to prepare the delete statement</div>";
                                    }
                                } else {
                                    // No matching achievement title found
                                    echo "<div class='alert alert-warning'>The given Room Topic or Date is invalid</div>";
                                }

                                // Close the check statement
                                mysqli_stmt_close($checkStmt);
                            } else {
                                echo "<div class='alert alert-danger'>Failed to prepare the check statement</div>";
                            }
                        }



                        /**********Job Delete **********/


                        if(isset($_POST['jobs_submit'])){
                            $jobTitle = $_POST['jobTitle'];
                            $jobLink = $_POST['jobLink'];
                            require_once "connection.php";
                            // Check if the achievement title exists
                            $checkSql = "SELECT id FROM jobs WHERE jobTitle = ? and jobLink = ?";
                            $checkStmt = mysqli_stmt_init($conn);
                            $prepareCheckStmt = mysqli_stmt_prepare($checkStmt, $checkSql);

                            if ($prepareCheckStmt) {
                                mysqli_stmt_bind_param($checkStmt, "ss", $jobTitle,$jobLink);
                                mysqli_stmt_execute($checkStmt);
                                mysqli_stmt_store_result($checkStmt);

                                // Check if any rows are returned
                                if (mysqli_stmt_num_rows($checkStmt) > 0) {
                                    // Achievement title is valid, proceed to delete
                                    $sql = "DELETE FROM jobs WHERE jobTitle = ? and jobLink = ?";
                                    $stmt = mysqli_stmt_init($conn);
                                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                                    if ($prepareStmt) {
                                        mysqli_stmt_bind_param($stmt, "ss", $jobTitle, $jobLink);
                                        mysqli_stmt_execute($stmt);
                                        echo "<div class='alert alert-success'>The related Job is successfully deleted</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Failed to prepare the delete statement</div>";
                                    }
                                } else {
                                    // No matching achievement title found
                                    echo "<div class='alert alert-warning'>The given Job Title or Link is invalid</div>";
                                }

                                // Close the check statement
                                mysqli_stmt_close($checkStmt);
                            } else {
                                echo "<div class='alert alert-danger'>Failed to prepare the check statement</div>";
                            }
                        }


                        /**********News Delete **********/


                        if(isset($_POST['news_submit'])){
                            $newsTitle = $_POST['newsTitle'];
                            $newsDate = date('Y-m-d', strtotime($_POST['newsDate']));
                            require_once "connection.php";
                            // Check if the achievement title exists
                            $checkSql = "SELECT id FROM news WHERE newsTitle = ? and newsDate = ?";
                            $checkStmt = mysqli_stmt_init($conn);
                            $prepareCheckStmt = mysqli_stmt_prepare($checkStmt, $checkSql);

                            if ($prepareCheckStmt) {
                                mysqli_stmt_bind_param($checkStmt, "ss", $newsTitle,$newsDate);
                                mysqli_stmt_execute($checkStmt);
                                mysqli_stmt_store_result($checkStmt);

                                // Check if any rows are returned
                                if (mysqli_stmt_num_rows($checkStmt) > 0) {
                                    // Achievement title is valid, proceed to delete
                                    $sql = "DELETE FROM news WHERE newsTitle = ? and newsDate = ?";
                                    $stmt = mysqli_stmt_init($conn);
                                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                                    if ($prepareStmt) {
                                        mysqli_stmt_bind_param($stmt, "ss", $newsTitle, $newsDate);
                                        mysqli_stmt_execute($stmt);
                                        echo "<div class='alert alert-success'>The related News is successfully deleted</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Failed to prepare the delete statement</div>";
                                    }
                                } else {
                                    // No matching achievement title found
                                    echo "<div class='alert alert-warning'>The given News Title or Date is invalid</div>";
                                }

                                // Close the check statement
                                mysqli_stmt_close($checkStmt);
                            } else {
                                echo "<div class='alert alert-danger'>Failed to prepare the check statement</div>";
                            }
                        }



                        /**********Alumni City Visit Delete **********/


                        if(isset($_POST['alumniMeet_submit'])){
                            $alumniName = $_POST['alumniName'];
                            $startDate = date('Y-m-d', strtotime($_POST['startDate']));
                            $endDate = date('Y-m-d', strtotime($_POST['endDate']));
                            require_once "connection.php";
                            // Check if the achievement title exists
                            $checkSql = "SELECT id FROM alumniCityVisit WHERE alumniName = ? and startDate = ? and endDate = ?";
                            $checkStmt = mysqli_stmt_init($conn);
                            $prepareCheckStmt = mysqli_stmt_prepare($checkStmt, $checkSql);

                            if ($prepareCheckStmt) {
                                mysqli_stmt_bind_param($checkStmt, "sss", $alumniName,$startDate,$endDate);
                                mysqli_stmt_execute($checkStmt);
                                mysqli_stmt_store_result($checkStmt);

                                // Check if any rows are returned
                                if (mysqli_stmt_num_rows($checkStmt) > 0) {
                                    // Achievement title is valid, proceed to delete
                                    $sql = "DELETE FROM alumniCityVisit WHERE alumniName = ? and startDate = ? and endDate = ?";
                                    $stmt = mysqli_stmt_init($conn);
                                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                                    if ($prepareStmt) {
                                        mysqli_stmt_bind_param($stmt, "sss", $alumniName, $startDate, $endDate);
                                        mysqli_stmt_execute($stmt);
                                        echo "<div class='alert alert-success'>The related Alumni City Visit is successfully deleted</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Failed to prepare the delete statement</div>";
                                    }
                                } else {
                                    // No matching achievement title found
                                    echo "<div class='alert alert-warning'>The given Alumni Name or Start Date or End Date is invalid</div>";
                                }

                                // Close the check statement
                                mysqli_stmt_close($checkStmt);
                            } else {
                                echo "<div class='alert alert-danger'>Failed to prepare the check statement</div>";
                            }
                        }



                    ?>
                <div class="profile">
                    <form action="faculty_authorization.php" method="POST">
                        <div class="table achievements">
                            <label for="">Achievement Title:</label>
                            <input type="text" name="achievementTitle" class="form-control">
                            <button type="submit" name="achievements_submit" class="btn btn-primary">Delete the Record</button>
                        </div>
                        <hr>
                        <div class="table alumniMeets">
                            <div class="inputs">
                                <div class="fields">
                                    <label for="">Alumni Name:</label>
                                    <input type="text" name="alumniName" class="form-control">
                                </div>
                                <div class="fields">
                                    <label for="">Alumni Visit Start Date:</label>
                                    <input type="date" name="startDate" class="form-control">
                                </div>
                                <div class="fields">
                                    <label for="">Alumni Visit End Date:</label>
                                    <input type="date" name="endDate" class="form-control">
                                </div>
                            </div>
                            <button type="submit" name="alumniMeet_submit" class="btn btn-primary">Delete the Record</button>
                        </div>
                        <hr>
                        <div class="table blogs">
                            <label for="">Blog Title:</label>
                            <input type="text" name="blogTitle" class="form-control">
                            <button type="submit" name="blogs_submit" class="btn btn-primary">Delete the Record</button>
                        </div>
                        <hr>
                        <div class="table discussionRooms">
                            <div class="inputs">
                                <div class="fields">
                                    <label for="">Room Topic:</label>
                                    <input type="text" name="roomTopic" class="form-control">
                                </div>
                                <div class="fields">
                                    <label for="">Room Date:</label>
                                    <input type="date" name="roomDate" class="form-control">
                                </div>
                            </div>
                            <button type="submit" name="rooms_submit" class="btn btn-primary">Delete the Record</button>
                        </div>
                        <hr>
                        <div class="table events">
                            <label for="">Event Title:</label>
                            <input type="text" name="eventTitle" class="form-control">
                            <button type="submit" name="events_submit" class="btn btn-primary">Delete the Record</button>
                        </div>
                        <hr>
                        <div class="table jobs">
                            <div class="inputs">
                                    <div class="fields">
                                        <label for="">Job Title:</label>
                                        <input type="text" name="jobTitle" class="form-control">
                                    </div>
                                    <div class="fields">
                                        <label for="">Job Link:</label>
                                        <input type="text" name="jobLink" class="form-control">
                                    </div>
                                </div>
                            <button type="submit" name="jobs_submit" class="btn btn-primary">Delete the Record</button>
                        </div>
                        <hr>
                        <div class="table news">
                            <div class="inputs">
                                    <div class="fields">
                                        <label for="">News Title:</label>
                                        <input type="text" name="newsTitle" class="form-control">
                                    </div>
                                    <div class="fields">
                                        <label for="">News Date:</label>
                                        <input type="date" name="newsDate" class="form-control">
                                    </div>
                                </div>
                            <button type="submit" name="news_submit" class="btn btn-primary">Delete the Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>