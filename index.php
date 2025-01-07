<?php
    ob_start();
    session_start();
    if(isset($_SESSION["studentid"])){
        header("Location: student_profile.php");
    }
    if(isset($_SESSION['alumniid'])){
        header("Location: alumni_profile.php");
    }
    if(isset($_SESSION['facultyid'])){
        header("Location: faculty_profile.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="index_final.css">

    <!-- <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXa9oLIrhHfGAoRZp_vfloogr47-mDplxycQ&s"> -->
    <link rel="icon" type="image/x-icon" href="Images/studentAlumniMeet.png">
    <title>AS-CONNECT</title>
    
</head>
<body>
    <header>
        <ul class="heading" style="overflow: hidden;">
            <li><img src="Images/studentAlumniMeet.png" width="100" height="70"></li>
            <li style="padding-top:20px; padding-left:20px;">Asconnect</li>
        </ul>
        <ul class="links">
            <li><a href="#aboutus">About Us</a></li>
            <li><a href="#eventspage">Events</a></li>
            <li><a href="#">Donations</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li> 
                <a href="#">Login::Register</a>
                <ul class="dropdown">
                    <li><a href="alumni_login.php">Alumni Login</a></li>
                    <li><a href="student_login.php">Student Login</a></li>
                    <li><a href="faculty_login.php">Faculty Login</a></li>
                </ul>
            </li>
            <li> 
                <a href="#">More</a>
                <ul class="dropdown">
                    <li><a href="achievements.php">Achievements</a></li>
                    <li><a href="jobboard.php">Job Board</a></li>
                    <li><a href="blogs.php">Alumni Blogs</a></li>
                    <li><a href="studentalumnicity.php">Alumni City Visits</a></li>
                    <li><a href="discussionRooms.php">Discussion Rooms</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <hr color="lightgrey">
    <div class="gallery" id="gallery">
        <img class="slide" src="https://vaave.s3.amazonaws.com/album_photos/851f5ac9941d720844d143ed9cfcf60a_ccdf0af584e1081d1dd781696ec32983.jpeg" width="80%" height="600">
        <img class="slide" src="https://gecgudlavalleru.ac.in/images/admin/1572335828_bv1.jpg" width="80%" height="600"> 
        <img class="slide" src="https://vaave.s3.amazonaws.com/album_photos/851f5ac9941d720844d143ed9cfcf60a_e85ecbe418b3152f22f3edfe092beac0.jpeg" width="80%" height="600">
    </div>
    <div id="aboutus">
        <div class="content">
            <h1>About Us</h1>
            <pre>
                Established in 2001, IIT Bombay Alumni Association
                (IITBAA) creates and maintains a life-long connection
                between IIT Bombay and its alumni. In collaboration 
                with an extremely dedicated volunteer Board of Directors,
                the Alumni Association works to connect alumni, support
                students, and build an unforgettable Institute experience 
                through a diversity of events, programmes and services.
            </pre>
            <h1>Our Mission</h1>
            <pre>
                The mission of the Association is to foster strong bonds
                between alumni, students and the Institute, to keep alumni
                informed,and to create a network enabling them to remain engaged
                with their alma mater and help shape its future through 
                the Association's programmes and services. 
            </pre>
            <h1>Our Objectives</h1>
            <pre>
                To promote interaction amongst the Alumni members and improve 
                engagement between the Alumni and the Indian Institute of Technology, 
                Bombay (Institute).To encourage, promote and facilitate 
                education and research and other activities of the Institute.
            </pre>
        </div>
        <div class="aboutusImage">
            <img src="Images/alumni_icon.png" width="400" height="300">
        </div>
    </div>
    <hr>
    <div class="events" id="eventspage">
        <div class="news">
            <br>
            <h1>Newsroom</h1><br>

            <?php
                    require_once "connection.php";
                    $sql = "SELECT * FROM news ORDER BY id DESC";
                    $rows_result = mysqli_query($conn, $sql);
                    foreach($rows_result as $row):
                        ?>
                           <div class="news-update">
                                <a href="eventpage.php">
                                    <div class="news-row">
                                        <p><?php echo $row['newsTitle']?></p>
                                        <p style="color: grey"><?php echo $row['newsDate']?></p>
                                    </div>
                                </a>
                            </div>
                        <?php
                        endforeach;
                ?>
        </div>
        <div class="event">
            <br>
            <h1>Events</h1><br>

            <?php
                    require_once "connection.php";
                    $sql = "SELECT * FROM events ORDER BY id DESC";
                    $rows_result = mysqli_query($conn, $sql);
                    foreach($rows_result as $row):
                        ?>
                           <div class="event-update">
                                <a href="eventpage.php">
                                    <div class="event-row">
                                        <p><?php echo $row['eventTitle']?></p>
                                        <p style="color: grey"><?php echo $row['eventDate']?></p>
                                    </div>
                                </a>
                            </div>
                        <?php
                        endforeach;
                ?>
    </div>

    <script>
        var index=0;
        slider();
        function slider(){
            var i;
            var x=document.getElementsByClassName("slide");
            for(i=0;i<x.length;i++)
            {
                x[i].style.display="none";
            }
            index++;
            if(index>x.length){
                index=1;
            }
            x[index-1].style.display="block";
            setTimeout(slider,2000);
        }
    </script>
</body>
</html>