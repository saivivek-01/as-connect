<?php
    // ob_start();
    session_start();
    if(isset($_SESSION["facultyid"])){
        header("Location: faculty_dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Registration</title>
    <!-- <link rel="stylesheet" href="faculty_register1.css"> -->
    <!-- <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXa9oLIrhHfGAoRZp_vfloogr47-mDplxycQ&s"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="student_register_2.css">
</head>
<body>
    <div class="student_container" id="faculty">
        <!-- <div class="alumniTitle">
            <img src="Images/teacherloginimage.jpg" alt="" width="800px" height="625px"> -->
           <!-- <h1 style="font-family:mono-space,Arial,sans-serif; font-weight: 600;">Alumni Realm</h1>-->
        <!-- </div> -->
        <!-- <div class="facultyregister"> -->
        <form action="faculty_register.php" method="POST">
            <h2 class="register-head">Faculty Register</h2><br><br>
            <?php
                if(isset($_POST["submit"])){
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $passwordRepeat = $_POST["repeatPassword"];
                    // echo "Password: $password";
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $errors = array();
                    // $len = strlen($password);
                    // echo "Leng of password: $len";
                    // echo "variable assigning";
                    if(empty($email) OR empty($password) OR empty($passwordRepeat)){
                        array_push($errors, "All fields are required");
                    }
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        array_push($errors, "Email is not valid");
                    }
                    if(strlen($password)<8){
                        array_push($errors, "Password must be atleast 8 characters long");
                    } 
                    if($password!==$passwordRepeat){
                        array_push($errors, "Passwords does not match");
                    }
                    // echo "checking if's";
                    require_once "connection.php";
                    // echo "connecting database file"
                    $sql = "SELECT * From faculty_record WHERE email = '$email' ";
                    // echo "writing query";
                    $result = mysqli_query($conn, $sql);
                    // echo "executing the query and storing in result";
                    $rowCount = mysqli_num_rows($result);
                    // echo "checking row count $rowCount ";
                    if($rowCount>0){
                        array_push($errors, "Email already exists!!");
                    }
                    $counting = count($errors);
                    // echo " $counting is the count of errors";
                    if(count($errors)>0){
                        foreach($errors as $error){
                            echo " <div class='alert alert-danger'>$error</div> ";
                        }
                    }
                    else{
                        // echo "entering into else";
                        $sql = "INSERT INTO faculty_record (email, password) values (?, ?)"; 
                        // echo "writing query";
                        $stmt = mysqli_stmt_init($conn);
                        // echo "initializing connection";
                        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                        // echo " executing the query $prepareStmt";
                        if($prepareStmt){
                            // echo "inside if $email, $passwordHash";
                            mysqli_stmt_bind_param($stmt, "ss", $email, $passwordHash);
                            // echo "biniding the parameters";
                            mysqli_stmt_execute($stmt);
                            // echo "executing the stmt";
                            echo "<div class='alert alert-success'>You are registered successfully.</div>";
                        }else{
                            die("something went wrong");
                        }
                    }
                }
            ?>
                            

            <div class="email" id="inputbox">
                <label for="" class="email-label">Email Id</label>
                    <!--<ion-icon name="mail-outline"></ion-icon>-->
                <input type="email" name="email" required placeholder="enter email....">
            </div><br>

            <div class="password" id="inputbox">
                <label for="" class="password-label">Password</label>
                <!--<ion-icon name="lock-closed-outline"></ion-icon>-->
                <input type="password" name="password" required placeholder="password....">
            </div><br>

            <div class="repeatPassword" id="inputbox">
                <label for="" class="password-label">Confirm Password</label>
                <!--<ion-icon name="lock-closed-outline"></ion-icon>-->
                <input type="password" name="repeatPassword" required placeholder="confirm password....">
            </div><br>
                                <!-- <div class="forget">
                                    <label for=""><input type="checkbox">
                                        Remember Me  <a href="#">Forgot Password ?</a>
                                    </label>
                                </div><br> -->
                                <!-- <button type="submit" value="Login" name="submit" class="faculty_button">Register</button> -->
            <button class="registerButton" type="submit" value="Register" name="submit">Register</button>

            <!-- <div class="log">
                <p> Already have an acount?  <a href="faculty_login.php">Login</a></p>
            </div> -->
        </form>
                    <!-- </div>
                </div>
            </section> -->
            <!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
        <!-- </div> -->
    </div>
</body>
</html>
