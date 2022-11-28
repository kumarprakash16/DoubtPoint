<?php
session_start();

 if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database="student_registration";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password,$database);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";


    $fileName=$_FILES['photo']['name'];
    $tempFileLoc=$_FILES['photo']['tmp_name'];
    $folderLoc='uploaded_images/';
    $fileLoc= $folderLoc.$fileName;
    move_uploaded_file($tempFileLoc,$fileLoc);


    // Collect post variables
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $class = $_POST['class'];
    $category = $_POST['Category'];
    $gender = $_POST['gender'];
    $religion_id = $_POST['religion'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $date= $_POST['date'];

    if(isset($_SESSION['editForm'])){
        $stu_id=$_SESSION['reset_student_id'];
        $sqld="UPDATE `details`
                SET `name`='$name', `father_name`='$fname',`mother_name`='$mname', `class`='$class', `gender`='$gender',
                `religion_id`='$religion_id', `category_id`='$category',`email`='$email', `number`='$contact', `address`='$address',
                `dob`='$date', `photo`='$fileLoc' 
                WHERE student_id='$stu_id' ";
        $results=mysqli_query($con,$sqld);

        $sql_fdelete="DELETE FROM `student_facility` WHERE student_id=$stu_id ";
        $result_fdelete=mysqli_query($con,$sql_fdelete);

        $facility_arri=$_REQUEST['facility'];
        foreach ($facility_arri as $value) {
            $sqld_facility="INSERT INTO `student_facility` (student_id,facility_id)
            VALUES ('$stu_id','$value')";
            mysqli_query($con,$sqld_facility);
        }
        $_SESSION['editForm']=false;
        header('Location: ../tut.php'); 

    }

    else{

    $sql = "INSERT INTO `details` (`name`, `father_name`,`mother_name`,`class`,`category_id`,`gender`,`photo`,`religion_id`,`email`,`number`,`address`,`dob`) VALUES ('$name','$fname', '$mname', '$class', '$category', '$gender','$fileLoc', '$religion_id', '$email', '$contact', '$address', '$date');";
    $result=mysqli_query($con,$sql);
    
    $last_studentId=mysqli_insert_id($con);
        $facility_arr=$_REQUEST['facility'];
    
        foreach ($facility_arr as $value) {
        $sql_facility="INSERT INTO `student_facility` (student_id,facility_id)
        VALUES ('$last_studentId','$value')";

        mysqli_query($con,$sql_facility);
        }

//  header('Location: form.php');
    }
 }



?>


<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = 'sunnykingsman123@gmail.com';
$mail->Password = '9097163644';
$mail->SMTPAuth = true;

$mail->From = 'sunnykingsman123@gmail.com';
$mail->FromName = 'Registration cell';
$mail->AddAddress($email);



$mail->IsHTML(true);
$mail->Subject    = "Student registration";
$mail->Body    = "Dear $name,<br>You have successfully registered the form.<br><br>Thank you";

if(!$mail->Send())
{
  echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
  echo "<br><br><center><h1>Dear $name, <br><br>Confirmation mail has been sent to your mail ID!</h1></center>";
}
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered</title>
    <style>
        body{
            background-image:url("images/1.png");
        }
    </style>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body >
    <center>
        <br><br>
    <img src=<?php echo $fileLoc; ?> height="175" width="175">
    <br>
    <br>
    <a class="btn btn-primary" href="../tut.php" role="button">Return to home page</a>
    </center>
   
</body>
</html>
