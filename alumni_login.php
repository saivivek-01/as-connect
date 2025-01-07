<?php
    ob_start();
    session_start();
    if(isset($_SESSION['alumniid'])){
        header("Location: alumni_profile.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>AL-CONNECT</title>
    <!--<link rel="stylesheet" href="alumni_login.css">-->
    <link rel="stylesheet" href="alumni_login_1.css">
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXa9oLIrhHfGAoRZp_vfloogr47-mDplxycQ&s">
</head>
<body>
<div class="Alumni" id="alumni">

        <div class="alumniTitle">
            <img src="Images/alumniloginimage.png" alt="" width="800px" height="325px">
           <!-- <h1 style="font-family:mono-space,Arial,sans-serif; font-weight: 600;">Alumni Realm</h1>-->
        </div>
        <div class="alumniLogin">
            <section>
                <div class="form-box">
                    <div class="form-value">
                           
                        <form action="alumni_login.php" method="POST">
                        <?php
                                if(isset($_POST["login"])){
                                    $email = $_POST["email"];
                                    $password = $_POST["password"];
                                    // echo "$email $password";
                                    require_once "connection.php";
                                    $sql = "SELECT * FROM alumni_record WHERE email = '$email' ";
                                    $result = mysqli_query($conn, $sql);
                                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    if($user){
                                        $al_id = $user['id'];
                                        if(password_verify($password, $user["password"])){
                                            echo "Passwords Match";
                                            session_start();
                                            $_SESSION["alumniid"]=$al_id;
                                            header("Location: alumni_dashboard.php");
                                            ob_end_flush();
                                            die();
                                        }
                                        else{
                                            echo " <div class='alert alert-danger'>Password doesn't Match</div> ";
                                        }
                                    }
                                    else{
                                        echo "<div class='alert alert-danger'>Email does not Match</div>";
                                    }
                                }
                            ?>
                            <h2 class="login-head">Alumni Login</h2><br><br>
                            <div class="inputbox">
                                <label for="" class="email-label">Email Id</label>
                                <!--<ion-icon name="mail-outline"></ion-icon>-->
                                <input type="email" name="email" required>
                            </div><br>
                            <div class="inputbox">
                                <label for="" class="password-label">Password</label>
                                <!--<ion-icon name="lock-closed-outline"></ion-icon>-->
                                <input type="password" name="password" required>
                            </div><br>
                            <div class="forget">
                                <label for=""><input type="checkbox">
                                    Remember Me  <a href="#">Forgot Password ?</a>
                                </label>
                            </div><br>
                            <button type="submit" value="Login" name="login" class="alumni_button">Log in</button>
                            <div class="register">
                           <p> Don't have a account ?    <a href="alumni_register.php">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
        </div>
    </div>
</body>