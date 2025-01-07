<?php
    // ob_start();
    session_start();
    if(isset($_SESSION["alumniid"])){
        header("Location: alumni_dashboard.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="multi.css">
    <link rel="stylesheet" href="alumni_register_1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Alumni Registration</title>
</head>
<body>
        <div class="container">
            <h1>Alumni Registration</h1>
            <form action="alumni_register.php" method="POST">
                <?php
                     if(isset($_POST["submit"])){
                        $firstname=$_POST["firstName"];
                        $lastname = $_POST["lastName"];
                        $gender = $_POST["gender"];
                        $email = $_POST["email"];
                        $phone=$_POST["phone"];
                        $contact=$_POST["contact"];
                        $studentID = $_POST["studentID"];
                        $year = $_POST["year"];
                        $linkedin = $_POST["linkedin"];
                        $qualification=$_POST["qualification"];
                        $occupation=$_POST["occupation"];
                        $domain = $_POST["mentorDomains"];
                        $password = $_POST["password"];
                        $passwordRepeat = $_POST["repeatPassword"];
                        // echo "Password: $password";
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                        $errors = array();
                        // $len = strlen($password);
                        // echo "Leng of password: $len";
                        if(empty($firstname) OR empty($lastname) OR empty($gender) OR empty($email) OR empty($phone) OR empty($contact) OR empty($studentID) OR empty($year) OR empty($linkedin) OR empty($qualification) OR empty($occupation) OR empty($domain) OR empty($password) OR empty($passwordRepeat)){
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
                        $sql = "SELECT * From alumni_record WHERE email = '$email' ";
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
                                
                            foreach($domain as $item){
                                $query = "INSERT INTO alumni_domains (email, domains) VALUES ('$email', '$item')";
                                $query_run = mysqli_query($conn, $query);
                                if(!$query_run){    
                                    echo "<div class='alert alert-danger'>Something went wrong with domains database</div>";
                                }
                           
                            }
                            
                               $sql = "INSERT INTO alumni_record (firstname, lastname, gender, email, phone, contact, studentID, year, linkedin, qualification, occupation, password) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
                               $stmt = mysqli_stmt_init($conn);
                               $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                               if($prepareStmt){
                                mysqli_stmt_bind_param($stmt, "sssssssissss", $firstname,$lastname,$gender, $email, $phone,$contact, $studentID, $year, $linkedin, $qualification, $occupation, $passwordHash);
                                mysqli_stmt_execute($stmt);
                                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                               }else{
                                die("something went wrong");
                               }
                        }
                    }
                ?>
                <div class="FirstName" id="inputboxing">
                    <label for="">First Name: </label>
                    <input type="text" name="firstName" placeholder="Enter First Name" required>
                </div>
                <div class="LastName" id="inputboxing">
                    <label for="">Last Name: </label>
                     <input type="text" name="lastName" placeholder="Enter Family Name" required>
                </div>
                <div class="Gender" id="inputboxing">
                    <label for="">Gender: </label>
                    <select name="gender" id="" style="border-radius:45px;height:40px;"  required>
                        <option disabled="disabled" selected="selected" value="">--Choose an Option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="LGBTQA+">LGBTQA+</option>
                    </select>
                </div>
                <div class="Email" id="inputboxing">
                    <label for="">Email: </label>
                <input type="email" name="email" placeholder="Email to keep in touch" required>
                </div>
                <div class="Phone" id="inputboxing">
                    <label for="">Phone Number: </label>
                    <!-- <input type="text" class="areacode" name="phoneAreacode" placeholder="Area Code"> -->
                    <input type="text" name="phone" placeholder="Phone number with area code" required>
                </div>
                <div class="Contact" id="inputboxing">
                    <label for="">Phone Number for Contact Purposes: </label>
                    <!-- <input type="text" class="areacode" name="contactAreacode" placeholder="Area Code"> -->
                    <input type="text" name="contact" placeholder="Phone number with area code - Available to take a Call" required>
                </div>
                <div class="StudentID" id="inputboxing">
                    <label for="">Student ID: </label>
                    <input type="text" name="studentID" placeholder="College ID number" required>
                </div>
               <div class="PassedoutYear" id="inputboxing">
                <label for="">Passed-out Year: </label>
                <select name="year" id="" style="border-radius:45px;height:40px;" required>
                    <option disabled="disabled" selected="selected" value="">--Choose an Option</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
               </div>
                <div class="linkedin" id="inputboxing">
                    <label for="">LinkedIN Profile ID: </label>
                    <input type="text" name="linkedin" placeholder="Linkedin URL" required>
                </div>
                <div class="Qualification" id="inputboxing">
                    <label for="">Highest Qualification: </label>
                    <select name="qualification" id="" style="border-radius:45px;height:40px;" required>
                        <option disabled="disabled" selected="selected" value="">--Choose an Option</option>
                        <option value="PhD">PhD</option>
                        <option value="M.S">M.S</option>
                        <option value="M.Tech">M.Tech</option>
                        <option value="MBA">MBA</option>
                        <option value="B.Tech">B.Tech</option>
                    </select>
                </div>
                <div class="Occupation" id="inputboxing">
                    <label for="">Current Occupation: </label>
                    <input type="text" name="occupation" placeholder="Job Role/ Job Title" required>
                </div>
                <div style="color:#000;" class="Mentoring" id="inputboxing">
                    <label style="color:#fff;" for="">Available to Mentor in Domains: </label>
                    <select name="mentorDomains[]" id="mentorDomains" required multiple >  <!-- multiple style="border-radius:45px;height:40px;" -->
                        <!-- <option disabled="disabled" selected="selected" value="">--Choose an Option</option> -->
                        <option value="Data Analyst">Data Analyst</option>
                        <option value="Software Developer">Software Developer</option>
                        <option value="Software Tester">Software Tester</option>
                        <option value="Accountant">Accountant</option>
                        <option value="Product Manager">Product Manager</option>
                        <option value="Sales Manager">Sales Manager</option>
                        <option value="Career Specialist">Career Specialist</option>
                        <option value="Prompt Engineer">Prompt Engineer</option>
                        <option value="Market Analyst">Market Analyst</option>
                        <option value="Bussiness Development">Bussiness Development</option>
                    </select>
                </div>
                <div class="password" id="inputboxing">
                    <label for="">Enter your Password : </label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="confirmPassword" id="inputboxing">
                    <label for="">Confirm  your Password : </label>
                    <input type="password" name="repeatPassword" placeholder="Confirm Password" required>
                </div>
                <button class="registerButton" type="submit" value="Register" name="submit">Register</button>
            </form>
            <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
            <script>
                new MultiSelectTag('mentorDomains')  // id
            </script>
            <!-- <section>
                <div class="form-box">
                    <div class="form-value">
                        <form action="">
                            <h2>Alumni Registration</h2>
                            <div class="inputbox">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input type="email" required>
                                <label for="">Email</label>
                            </div>
                            <div class="inputbox">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                                <input type="password" required>
                                <label for="">Password</label>
                            </div>
                            <div class="forget">
                                <label for=""><input type="checkbox">
                                    Remember Me  <a href="#">Forgot Password ?</a>
                                </label>
                            </div>
                            <button>Log in</button>
                            <div class="register">
                                <p>Don't have a account ?    <a href="#">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </section> -->
        </div>
</body>
</html>