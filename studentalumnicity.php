<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/> -->
    <!-- <link rel="stylesheet" href="student_dashboard.css"> -->
    <link rel="stylesheet" href="studentalumnicity_3.css">
</head>
<body>
<h1>Alumni City Visits</h1>
    <div class="main--content">
        <div class="dashboard">
            
                <?php
                    require_once "connection.php";
                    $sql = "SELECT * FROM alumniCityVisit ORDER BY id DESC";
                    $rows_result = mysqli_query($conn, $sql);
                    foreach($rows_result as $row):
                        ?>
                            <div class="message">
                                <div class="matter">
                                    <h2>A Alumni Visit Authorized By - <?php echo $row['alumniName']?> </h2>
                                    <p><b>City:</b> <?php echo $row['city']?></p>
                                    <p><b>Location: </b><?php echo $row['alumniCityLocation']?></p>
                                    <p><b>Start Date: </b><?php 
                                        $startDate = date("d-M-Y, D", strtotime($row['startDate']));
                                        echo $startDate;
                                    ?></p>
                                    <p><b>End Date: </b> <?php 
                                        $endDate = date("d-M-Y, D", strtotime($row['endDate']));
                                        echo $endDate;
                                    ?></p>
                                    <p><b>Alumni Available Timings in those Dates: </b><?php echo $row['timing']?></p>
                                </div>
                                <div class="image">
                                <?php 
                                        if($row['city']=="Banglore")
                                        {
                                            $path="banglore.jpg";
                                        }
                                        else if($row['city']=="Hyderabad")
                                        {
                                            $path="hyderabad.jpg";
                                        }
                                        else if($row['city']=="Chennai")
                                        {
                                            $path="chennai.jpg";
                                        }
                                        else if($row['city']=="Delhi")
                                        {
                                            $path="delhi.jpg";
                                        }
                                        else if($row['city']=="Kochi")
                                        {
                                            $path="kochi.jpg";
                                        }
                                        else if($row['city']=="Kolkata")
                                        {
                                            $path="kolkata.jpg";
                                        }
                                        else if($row['city']=="Mumbai")
                                        {
                                            $path="mumbai.jpg";
                                        }
                                        else if($row['city']=="Noida")
                                        {
                                            $path="noida.jpg";
                                        }
                                        else if($row['city']=="Pune")
                                        {
                                            $path="pune.jpg";
                                        }
                                        else if($row['city']=="Visakhapatnam")
                                        {
                                            $path="visakapatnam.jpg";
                                        }
                                    ?>
                                <img src="Alumni_City_Images/<?php echo $path?>
                                    
                                ">
                                </div>
                                
                            </div>
                        <?php
                        endforeach;
                ?>
            </div>
    </div>
</body>
</html>