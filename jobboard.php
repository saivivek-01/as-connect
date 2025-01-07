<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="jobboard_1.css">
</head>
<body>
    <h1>Job Board</h1>
    
    <div class="job-listings">
        
        <ul>
        <?php  
                require_once "connection.php";
                $res = mysqli_query($conn, "SELECT * FROM jobs");
                while($row = mysqli_fetch_assoc($res)){
            ?>
            <div class="main">
                <div class="sub">
                    <li>
                        <!-- <h2> The title </h2> -->
                        <h2><?php echo $row['jobTitle'] ?></h2>
                        <p>Company: <?php echo $row['jobCompany']?></p>
                        <p>Location: <?php echo $row['jobLocation']?></p>
                        <p>Job Type: <?php echo $row['jobType']?></p>
                        <p>Job Domain: <?php echo $row['jobDomain']?></p>
                        <br>
                        <a href="<?php echo $row['jobLink']?>">APPLY</a>
                       
                    </li>
                </div>
                <div class="sub-img">
                    <img src="https://cdn4.iconfinder.com/data/icons/logos-brands-7/512/google_logo-google_icongoogle-512.png" width="150px">
                </div>     
                
            </div>
            <?php } ?>
        </ul>
    </div>
</body>
</html>