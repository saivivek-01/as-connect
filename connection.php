<?php
    $hostName="db";
    $dbUser="user";
    $dbPassword="pass";
    $dbName="asconnect_db";
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
    if(!$conn){
        die("someting went wrong;");
    }
    // else{
    //     echo "Connected successfully..";
    // }
?>