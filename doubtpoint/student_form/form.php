<?php
session_start();
if(isset($_GET['id'])){
    $_SESSION['editForm']=false;
}
?>


<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

            /* background-color:#ff4c68; */

        }

        /* body
        {
            background-image:url(https://thumbs.dreamstime.com/b/e-learning-concept-online-education-login-registration-screen-e-learning-concept-online-education-login-registration-screen-207830679.jpg);
            
        } */

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            /* background-color: #4CAF50; */
            color: black;
            padding: 12px 20px;
            border: 2px;
            border-radius: 4px;
            cursor: pointer;
            float: center;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            /* background-color: #f2f2f2; */
            padding: 20px;
            margin-top: 100px;
            margin-left: 200px;
            margin-bottom: 150px;
            margin-right: 600px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }


        body {
            background:  url(https://c0.wallpaperflare.com/preview/187/633/72/5be997aec83a2.jpg);
             background-size: cover;
            /* background-blend-mode: darken; */
        }
        /* form{
            background-color: #996633;
        } */
        
        .btn2 {
  /* background-color: blue; */
  border: none;
  color: black;
  padding: 12px 28px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;

}
 a:hover {
  background-color: green;
}


        
    </style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>

<body>
<?php
include 'connection.php';
                if(isset($_GET['id'])){
                    $student_id=$_GET['id'];
                    $_SESSION['reset_student_id']=$student_id;
                    $sqla="SELECT * FROM details,category_master,religion_master
                            WHERE details.student_id=$student_id
                            AND details.religion_id=religion_master.religion_id
                            AND details.category_id=category_master.category_id";
                    $resa=mysqli_query($conn,$sqla);
                    $sqla_arr=mysqli_fetch_assoc($resa);
                }
            ?>
          

    <section class="background">

            <!-- <?php
        if(isset($_SESSION['inserted'])){
        if($_SESSION['inserted']){
            echo "<br><h2>Successfully registered</h2>";
        }
        }
        ?> -->
        </center>

        <div class="container">
            <center>
                <h1> REGISTRATION FORM</h1>
            </center>
            <br>
            <br>
            <form action="conn.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-25">
                        <label for="Name"> Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="name" name="name" placeholder="Your name.." <?php if(isset($_GET['id'])){ ?> value="<?php echo $sqla_arr['name'] ?>" <?php } ?> >
                    </div>
                </div> 
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Father Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="fname" name="fname" placeholder="Your father name.." <?php if(isset($_GET['id'])){ ?> value="<?php echo $sqla_arr['father_name'] ?>" <?php } ?> >
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="mname">Mother Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="mname" name="mname" placeholder="Your mother name.." <?php if(isset($_GET['id'])){ ?> value="<?php echo $sqla_arr['mother_name'] ?>" <?php } ?> >
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="class">Class</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="class" name="class" placeholder="Your class is.." <?php if(isset($_GET['id'])){ ?> value="<?php echo $sqla_arr['class'] ?>" <?php } ?> >
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="category">Category</label>
                    </div>
                    <div class="col-75">  
                        
                    <?php
                    include 'connection.php';
                    $sql_category="SELECT category_id,category_name
                    FROM category_master";
                    $result_category=mysqli_query($conn,$sql_category);

                    while($rel_category=mysqli_fetch_assoc($result_category)){ ?>
                      <div class="form-check form-check-inline ms-3">
                        <input class="form-check-input" type="radio" name="Category" value="<?php echo $rel_category["category_id"]; ?>"  
                        <?php
                            if(isset($_GET['id']) && $sqla_arr['category_id']==$rel_category["category_id"]){
                                echo 'checked';
                            }
                        ?> required>
                        <label class="form-check-label" for="inlineRadio1"><?php echo $rel_category["category_name"]; ?></label>
                      </div>
                      <?php
                    }
                  ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="gender">Gender</label>
                    </div>
                    <div class="col-75">
                        <input type="radio" name="gender" value="1" <?php
                            if(isset($_GET['id']) && $sqla_arr['gender']=="Male"){
                                echo 'checked';
                            }?>>
                        <label for="gender">Male</label>
                        <input type="radio" name="gender" value="2" <?php
                        if(isset($_GET['id']) && $sqla_arr['gender']=="Female"){
                            echo 'checked';
                        }?> >
                        <label for="gender">Female</label>
                        <input type="radio" name="gender" value="3" <?php
                        if(isset($_GET['id']) && $sqla_arr['gender']=="Transgender"){
                            echo 'checked';
                        }?> >
                        <label for="gender">Transgender</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="photo">Student photo</label>
                    </div>
                    <div class="col-75">
                        <input type="file" id="photo" name="photo" placeholder="Your class is..">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="religion">Religion</label>
                    </div>
                    <div class="col-75">

                 
                        <select name="religion" class="form-select mt-2" aria-label="Default select example">
                            <option>Select your religion</option>
                            <?php
                      include 'connection.php';
                        $sql="SELECT religion_id ,religion
                        FROM religion_master";
                        $result=mysqli_query($conn,$sql);
                        
                        while ($rel= mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $rel["religion_id"]; ?>" 
                        <?php
                            if(isset($_GET['id']) && $sqla_arr['religion_id']==$rel["religion_id"]){
                                echo 'selected';
                            }
                        ?>
                        ><?php echo $rel["religion"]; ?></option>
                        <?php
                      }
                      ?>

                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="email" name="email" placeholder="Your email is.." <?php if(isset($_GET['id'])){ ?> value="<?php echo $sqla_arr['email'] ?>" <?php } ?> >
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="contact">Contact Number</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="contact" name="contact" placeholder="Your contact number is.." <?php if(isset($_GET['id'])){ ?> value="<?php echo $sqla_arr['number'] ?>" <?php } ?> >
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="address" name="address" placeholder="Your address is.." <?php if(isset($_GET['id'])){ ?> value="<?php echo $sqla_arr['address'] ?>" <?php } ?> >
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="date">DOB</label>
                    </div>
                    <div class="col-75">
                        <input type="date" id="date" name="date" placeholder="Your DOB is.." <?php if(isset($_GET['id'])){ ?> value="<?php echo $sqla_arr['dob'] ?>" <?php } ?> >
                    </div>
                </div>

                <?php
            
                if(isset($_GET['id'])){
                    $sqlb="SELECT student_facility.facility_id 
                            FROM student_facility 
                            WHERE student_facility.student_id=$student_id";
                    $resb=mysqli_query($conn,$sqlb);
                    while($sqlb_arr=mysqli_fetch_assoc($resb)){
                        $sqlbi_arr[]=$sqlb_arr['facility_id'];
                    }
                }
            ?>

                <div class="row">
                    <div class="col-25">
                        <label for="facility" class="form-label" name="facilities">Facilities</label>
                    </div>
                    <div class="col-75">  
                        
                        <?php
                    include 'connection.php';
                    $sql_facility="SELECT facility_id,facility_name
                    FROM facility_master";
                    $result_facility=mysqli_query($conn,$sql_facility);

                    while($rel_facility=mysqli_fetch_assoc($result_facility)){
                      ?>
                      
                        <input type="checkbox"  name="facility[]" value="<?php echo $rel_facility["facility_id"]; ?>" <?php if(isset($_GET['id']) && in_array($rel_facility["facility_id"], $sqlbi_arr)){echo "checked";} ?> >
                        <label >
                            <?php echo $rel_facility["facility_name"]; ?>
                        </label>
                         
                        <?php
                    }
                    ?>
                    </div>
                </div>
                <div class="row">
                    <br><br>
                    
                    <input type="submit" name="submit" value="Submit">
                    

                </div>
                
            </form>
            <a id="view_details"  href="display.php"><button class="btn2">Check Form</button></a>
        </div>
    </section>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js">

    </script>
</body>

</html>