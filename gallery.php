<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="gallery_2.css">
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXa9oLIrhHfGAoRZp_vfloogr47-mDplxycQ&s">
</head>
<body>
    <h1>Gallery</h1>
    <div class="gallery">
        
            <?php 
                $dir = "Ach_Images/";
                if($opendir = opendir($dir)){
                    while(($file = readdir($opendir)) != FALSE){
                        if($file!="." && $file!=".." && $file!=".DS_Store"){
                            // echo " <img src='$dir$file' width='300' height='200'> ";
                            ?> 
                            <div class="imgs">
                                <a href="<?php echo "$dir$file" ?>" target="_blank">
                                    <img src="<?php echo "$dir$file" ?>" alt="" width="300" height="200">
                                </a>
                            </div>
                            <?php
                            // echo "$dir$file";
                        }
                    }
                }
            ?>
        
        <!-- <div class="imgs">
            <a href="Images\alumni_icon_2.png" target="_blank">
                <img src="Images\alumni_icon_2.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\alumni_icon_1.png" target="_blank">
                <img src="Images\alumni_icon_1.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\alumniloginimage.png" target="_blank">
                <img src="Images\alumniloginimage.png" alt=""width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\back-ground-1.jpg" target="_blank">
                <img src="Images\back-ground-1.jpg" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\background-image.png" target="_blank">
                <img src="Images\background-image.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\black-fabric-texture.png" target="_blank">
                <img src="Images\black-fabric-texture.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\button_background_2.jpeg" target="_blank">
                <img src="Images\button_background_2.jpeg" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\gud_img_3.png" target="_blank">
                <img src="Images\gud_img_3.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\gud_logo.jpeg" target="_blank">
                <img src="Images\gud_logo.jpeg" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\gud_tilte.png" target="_blank">
                <img src="Images\gud_title.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\Student_icon.png" target="_blank">
                <img src="Images\Student_icon.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\Student_login_icon.jpeg" target="_blank">
                <img src="Images\Student_login_icon.jpeg" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\alumni_icon_2.png" target="_blank">
                <img src="Images\alumni_icon_2.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\alumni_icon_2.png" target="_blank">
                <img src="Images\alumni_icon_2.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\Student_login_icon.jpeg" target="_blank">
                <img src="Images\Student_login_icon.jpeg" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\student_background_img.jpg" target="_blank">
                <img src="Images\student_background_img.jpg" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\student.png" target="_blank">
                <img src="Images\student.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\studentloginimage.png" target="_blank">
                <img src="Images\studentloginimage.png" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\teacherloginimage.jpg" target="_blank">
                <img src="Images\teacherloginimage.jpg" alt="" width="300" height="200">
            </a>
        </div>
        <div class="imgs">
            <a href="Images\alumni_icon_2.png" target="_blank">
                <img src="Images\alumni_icon_2.png" alt="" width="300" height="200">
            </a>
        </div> -->
    </div>
</body>
</html>