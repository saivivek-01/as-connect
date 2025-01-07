<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="blogs_1.css">
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXa9oLIrhHfGAoRZp_vfloogr47-mDplxycQ&s">
</head>
<body>
    <div class="container">
        <div class="blog-section">
            <div class="title">
                <h2><b>Blogs</b></h2>
            </div>
            
            <div class="cards">
            <?php  
                require_once "connection.php";
                $res = mysqli_query($conn, "SELECT * FROM blogs");
                while($row = mysqli_fetch_assoc($res)){
            ?>
                <div class="card">
                    <div class="image-section">
                        <?php 
                            $imgLink = "";
                            if($row['blogType']=="Academic"){
                                $imgLink = "academics.jpg";
                            }
                            else if($row['blogType']=="Business"){
                                $imgLink = "business.jpg";
                            }
                            else if($row['blogType']=="Career"){
                                $imgLink = "career.jpg";
                            }
                            else if($row['blogType']=="Education"){
                                $imgLink = "education.png";
                            }
                            else{
                                $imgLink = "personalityDevelopment.jpg";
                            }
                        ?>
                        <img src="Images/<?php echo $imgLink ?>" alt="">
                    </div>
                    <div class="content">
                        <h4><?php echo $row['blogTitle'] ?></h4>
                        <p> <?php echo $row['blogDescription'] ?></p>
                        <a href="<?php echo $row['blogLink']?>" target="_blank">Read more</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
</body>
</html>