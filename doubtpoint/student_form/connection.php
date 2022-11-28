<?php
    $serverName="localhost";
    $userName="root";
    $password="";
    $database="student_registration";    
    $conn=mysqli_connect($serverName, $userName, $password, $database);
    if(!$conn){
        die('SREVER NOT RESPONDING, We regret for the inconvenience.');
    }
?>