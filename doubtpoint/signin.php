<?php
    session_start();
    $_SESSION['signin']=false;
    $_SESSION['temp1']=false;
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $_SESSION['username'] = $_POST['Username'];
    //     $_SESSION['password'] = $_POST['Password'];   
        
    // }
    $server = "localhost";
    $username = "root";
    $password = "";
    $database="username_details"; 

       
    $conn=mysqli_connect($server, $username, $password,$database);

    $user=$_REQUEST['Username'];
    $pass=$_REQUEST['Password'];

    if(!$conn){
        echo 'SERVER NOT RESPONDING, We regret for the inconvenience.';
    }
    else{
        $_SESSION["temp1"]=true;
        $sql="SELECT * FROM `details` where `Username`='$user' AND `Password`='$pass'";
        $result=mysqli_query($conn, $sql);
        $num= mysqli_num_rows($result);
        if($num==1){
            $_SESSION['username']=$user;
            $_SESSION['password']=$pass;
            $_SESSION['signin']=true;
            
            
        }
        
    }
    header('Location: tut.php');
?>


