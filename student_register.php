<?php
    // ob_start();
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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="student_register_2.css">
    <title>Student Registration</title>
</head>
<body>
    <div class="student_container">
        <h1>Student Registration</h1>
        <?php
             if(isset($_POST["submit"])){
                $firstname=$_POST["firstName"];
                $lastname = $_POST["lastName"];
                $gender = $_POST["gender"];
                $email = $_POST["email"];
                $phone=$_POST["phone"];
                $studentID = $_POST["studentID"];
                $branch = $_POST["branch"];
                $year = $_POST["year"];
                $password = $_POST["password"];
                $passwordRepeat = $_POST["repeatPassword"];
                // echo "Password: $password";
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $errors = array();
                // $len = strlen($password);
                // echo "Leng of password: $len";
                if(empty($firstname) OR empty($lastname) OR empty($gender) OR empty($email) OR empty($phone) OR empty($studentID) OR empty($branch) OR empty($year) OR empty($password) OR empty($passwordRepeat)){
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
                require_once "connection.php";
                $sql = "SELECT * From student_record WHERE email = '$email' ";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if($rowCount>0){
                    array_push($errors, "Email already exists!!");
                }
                if(count($errors)>0){
                    foreach($errors as $error){
                        echo " <div class='alert alert-danger'>$error</div> ";
                    }
                }
                else{
                       $sql = "INSERT INTO student_record (firstname, lastname, gender, email, phone, studentID, branch, year, password) values (?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
                       $stmt = mysqli_stmt_init($conn);
                       $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                       if($prepareStmt){
                        mysqli_stmt_bind_param($stmt, "sssssssis", $firstname,$lastname,$gender, $email, $phone, $studentID, $branch, $year, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>You are registered successfully.</div>";
                       }else{
                        die("something went wrong");
                       }
                }
            }
        ?>
        <form action="student_register.php" method="POST">
            <div class="FirstName" id="inputboxing">
                <label for="">First Name: </label>
                <input type="text" name="firstName" placeholder="Enter First Name">
            </div>
            <div class="LastName" id="inputboxing">
                <label for="">Last Name: </label>
                 <input type="text" name="lastName" placeholder="Enter Family Name">
            </div>
            <div class="Gender" id="inputboxing">
                <label for="">Gender: </label>
                <select name="gender" id="" style="border-radius:45px;height:40px;">
                    <option disabled="disabled" selected="selected">--Choose an Option</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="LGBTQA+">LGBTQA+</option>
                </select>
            </div>
            <div class="Email" id="inputboxing">
                <label for="">Email: </label>
            <input type="email" name="email" placeholder="Email to keep in touch">
            </div>
            <div class="Phone" id="inputboxing">
                <label for="">Phone Number: </label>
                <!-- <input type="text" class="areacode" name="phoneAreacode" placeholder="Area Code"> -->
                <input type="text" name="phone" placeholder="Phone number with area code">
            </div>
            <!-- <div class="Contact" id="inputboxing">
                <label for="">Phone Number for Contact Purposes: </label>
                <input type="text" class="areacode" name="contactAreacode" placeholder="Area Code"> 
                <input type="text" name="contact" placeholder="Phone number with area code - Available to take a Call">
            </div> -->
            <div class="StudentID" id="inputboxing">
                <label for="">Student ID: </label>
                <input type="text" name="studentID" placeholder="College ID number">
            </div>
            <!-- <div class="linkedin" id="inputboxing">
                <label for="">LinkedIN Profile ID: </label>
                <input type="text" name="linkedin" placeholder="Linkedin URL">
            </div> -->
            <div class="branch" id="inputboxing">
                <label for="">Engineering Branch: </label>
                <select name="branch" id="" style="border-radius:45px;height:40px;">
                    <option disabled="disabled" selected="selected">--Choose an Option</option>
                    <option value="Computer Science and Engineering (CSE)">Computer Science and Engineering (CSE)</option>
                    <option value="Mechanical Engineering (ME)">Mechanical Engineering (ME)</option>
                    <option value="Information Technology (IT)">Information Technology (IT)</option>
                    <option value="Electrical and Communication Engineering (ECE)">Electrical and Communication Engineering (ECE)</option>
                    <option value="Electrical and Electronics Engineering (EEE)">Electrical and Electronics Engineering (EEE)</option>
                    <option value="Civil Engineering (CE)">Civil Engineering (CE)</option>
                    <option value="Artificial Intelligence and Data Science (AIDS)">Artificial Intelligence and Data Science (AIDS)</option>
                    <option value="Artificial Intelligence and Machine Learning (AIML)">Artificial Intelligence and Machine Learning (AIML)</option>
                    <option value="Internet of Things (IoT)">Internet of Things (IoT)</option>
                </select>
            </div>
            <div class="year" id="inputboxing">
                <label for="">Studying Year: </label>
                <select name="year" id="" style="border-radius:45px;height:40px;">
                    <option disabled="disabled" selected="selected">--Choose an Option</option>
                    <option value="1">I Year</option>
                    <option value="2">II Year</option>
                    <option value="3">III Year</option>
                    <option value="4">IV Year</option>
                </select>
            </div>
            <div class="password" id="inputboxing">
                <label for="">Enter your Password : </label>
                <input type="password" name="password" placeholder="password">
            </div>
            <div class="confirmPassword" id="inputboxing">
                <label for="">Confirm  your Password : </label>
                <input type="password" name="repeatPassword" placeholder="confirm password">
            </div>
            <button class="registerButton" type="submit" value="Register" name="submit">Register</button>
        </form>
    </div>
</body>
</html>