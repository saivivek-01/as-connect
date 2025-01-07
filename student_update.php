<?php
    include "connection.php";
    $id = $_GET["updateid"];
    if(isset($_POST['submit'])){
        $firstname = $_POST["updateFirstName"];        
        $lastname = $_POST["updateLastName"];
        $gender = $_POST["updateGender"];
        $phone = $_POST["updatePhone"];
        $studentID = $_POST["updateStudentID"];
        $branch = $_POST["updateBranch"];
        $year = $_POST["updateYear"];

        $sql = "UPDATE `student_register` set firstname='$firstname', lastname='$lastname', gender='$gender', phone='$phone', studentID='$studentID', branch='$branch', year='$year' where id=$id";
        $result  = mysqli_query($conn, $sql);
        if($result){
            echo "updated successfully";
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>