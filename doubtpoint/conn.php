<?php
session_start();

if(isset($_POST['firstname'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $Username = $_POST['Username'];
    $contact= $_POST['contact'];
    $password=$_POST['password'];
    $sql = "INSERT INTO `username_details`.`details` (`First_name`, `Last_name`, `Email`, `Username`, `Contact_number`, `Password`, `Date`) VALUES ('$firstname', '$lastname', '$email', '$Username', '$contact', '$password', current_timestamp());";
    // echo $sql;
     
    $_SESSION['temp']=true;
    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $_SESSION['insert']  = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
header('Location: tut.php');
?>