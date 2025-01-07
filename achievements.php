<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements</title>
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXa9oLIrhHfGAoRZp_vfloogr47-mDplxycQ&s">
    <link rel="stylesheet" href="achievements_2.css">
</head> 
<body>
    <h1 class="a-title">Achievements</h1>
    <div class="main">
        <div class="achievements">

            <?php  
                require_once "connection.php";
                $res = mysqli_query($conn, "SELECT * FROM achievements");
                while($row = mysqli_fetch_assoc($res)){
            ?>
            <div class="achievement">
                <div class="img-content">
                    <div class="i-content">
                        <img src="Ach_Images/<?php echo $row['imageName']?>" alt="">
                    </div>
                    <div class="head-content">
                        <h1><?php echo $row['achievementTitle']?></h1>
                    </div>
                </div>
                <div class="content">
                    <h2><?php echo $row['significance']?></h2>
                    <br>
                    <p><?php echo $row['achievementDescription']?></p>
                </div>
            </div>
            <?php } ?>
    </div>
</body>
</html>