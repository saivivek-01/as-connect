<?php
    ob_start();
    session_start();
    if(isset($_SESSION["studentid"])){
        header("Location: student_profile.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <!--<link rel="stylesheet" href="student_login.css">-->
    <link rel="stylesheet" href="student_login_1.css">
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXa9oLIrhHfGAoRZp_vfloogr47-mDplxycQ&s">
    <title>AS-CONNECT</title>
    
</head>
<body>
    <div class="Student" id="student">
        <div class="alumniTitle">
            <img src="Images/studentloginimage.png" >
            <!-- <h1 style="font-family:mono-space,Arial,sans-serif; font-weight: 500;">Student Realm</h1> -->
        </div>
        <div class="studentLogin">
            <!--< class="login-form">-->
                <h1 class="login-head">Student Login </h1>
                <br>
                <?php
                    if(isset($_POST["student_login"])){
                        $email = $_POST["student_email"];
                        $password = $_POST["student_password"];
                        require_once "connection.php";
                        $sql = "SELECT * FROM student_record WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        if($user){
                            $std_id = $user['id'];
                            if(password_verify($password, $user["password"])){
                                // $sql="SELECT id FROM student_record WHERE email = '$email'";
                                // $id = mysqli_query($conn, $sql);
                                // echo "ID: $id";
                                // $id = 1;
                                session_start();
                                $_SESSION["studentid"]=$std_id;
                                header("Location: student_dashboard.php");
                                ob_end_flush();
                               // header("Location: student_dashboard.php");
                                die();
                            }
                            else{
                                echo " <div class='alert alert-danger'>Password doesn't Match</div> ";
                                // echo " <div class='alert alert-danger'>Password does not Match</div>"
                            }
                        }
                        else{
                            echo "<div class='alert alert-danger'>Email does not Match</div>";
                        }
                    }
                ?>
                <form action="student_login.php" method="POST">
                    <p class="emaillabel">Email</p>
                    <input type="text" name="student_email" placeholder="Email ID">
                    <p class="passwordlabel">Password</p>
                    <input type="password" name="student_password" placeholder="Password">
                    <br>
                    <br>
                    <div class="student_forget">
                        <button type="submit" value="Login" name="student_login" class="student_login_button">Login</button>
                        <label for=""><a href="#">Forgot Password ?</a></label>
                     </div> 
                    <div class="student_register">
                        <p>Don't have a account ?  <a href="student_register.php">Register</a></p>
                    </div>
                </form>
            
        </div>
    </div>

</body>