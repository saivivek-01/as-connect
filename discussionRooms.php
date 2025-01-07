<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/> -->
    <!-- <link rel="stylesheet" href="student_dashboard.css"> -->
    <link rel="stylesheet" href="discussionRoom.css">
</head>
<body>
<h1>Discussion Rooms</h1>
    <div class="main--content">
        <div class="dashboard">
            
                <?php
                    require_once "connection.php";
                    $sql = "SELECT * FROM discussionRoom ORDER BY id DESC";
                    $rows_result = mysqli_query($conn, $sql);
                    foreach($rows_result as $row):
                        ?>
                            <div class="message">
                                <div class="matter">
                                 <?php
                                        $alumniId=$row['alumniId'];
                                        $retrieveAlumniName = "SELECT firstname FROM alumni_record WHERE id = ?";
                                        $retrieveStmt = mysqli_stmt_init($conn);
                                        $prepareRetrieveStmt = mysqli_stmt_prepare($retrieveStmt, $retrieveAlumniName);

                                        if ($prepareRetrieveStmt) {
                                            mysqli_stmt_bind_param($retrieveStmt, "i", $alumniId);
                                            mysqli_stmt_execute($retrieveStmt);
                                            mysqli_stmt_store_result($retrieveStmt);
                                            if(mysqli_stmt_num_rows($retrieveStmt) > 0){
                                                mysqli_stmt_bind_result($retrieveStmt, $alumniName);
                                                while(mysqli_stmt_fetch($retrieveStmt)){
                                                    // echo "This is the file name inside while: $file_name";
                                                }
                                            }
                                            else{
                                                echo "<div class='aler alert-danger'>The Alumni Id is Incorrect.</div>";
                                            }
                                        }
                                        else{
                                            echo "<div class='aler alert-danger'>Failed to prepare the Retrieve Statement</div>";
                                        }

                                 ?>   
                                <h2>A Discussion Room by: - <?php echo $alumniName?> </h2>
                                    <p><b>Room Topic:</b> <?php echo $row['roomTopic']?></p>
                                    <p><b>Room Platform: </b><?php echo $row['roomPlatform']?></p>
                                    <p><b>Room Date: </b><?php 
                                        $roomDate = date("d-M-Y, D", strtotime($row['roomDate']));
                                        echo $roomDate;
                                    ?></p>
                                    <p><b>Start Time: </b> <?php 
                                        echo $row['startTime'];
                                    ?></p>
                                    <p><b>End Time: </b> <?php 
                                        echo $row['endTime'];
                                    ?></p>
                                   <br>
                                   <br>
                                    <p><a href="<?php echo $row['roomLink']?>" target="_blank">JOIN NOW</a></p>
                                </div>
                                <div class="image">
                                <?php 
                                        if($row['roomPlatform']=="Google Meet")
                                        {
                                            $path="google.png";
                                        }
                                        else if($row['roomPlatform']=="ClickUp")
                                        {
                                            $path="Clickup.jpg";
                                        }
                                        else if($row['roomPlatform']=="Zoom")
                                        {
                                            $path="zoom.jpg";
                                        }
                                        else if($row['roomPlatform']=="Discord")
                                        {
                                            $path="discord.jpg";
                                        }
                                        else if($row['roomPlatform']=="Qoura")
                                        {
                                            $path="quora.png";
                                        }
                                        else if($row['roomPlatform']=="Microsoft Teams")
                                        {
                                            $path="teams.png";
                                        }
                                        else if($row['roomPlatform']=="Youtube")
                                        {
                                            $path="youtube.jpg";
                                        }
                                        else if($row['roomPlatform']=="Facebook")
                                        {
                                            $path="facebook.png";
                                        }
                                        else if($row['roomPlatform']=="Reddit")
                                        {
                                            $path="reddit.jpg";
                                        }
                                        else if($row['roomPlatform']=="Skype")
                                        {
                                            $path="skype.jpeg";
                                        }
                                    ?>
                                <img src="Discussion_Room_Images/<?php echo $path?>
                                    
                                " >
                                </div> 
                                
                            </div>
                        <?php
                        endforeach;
                ?>
            </div>
    </div>
</body>
</html>