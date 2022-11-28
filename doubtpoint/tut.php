<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>DoubtPoint</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Ubuntu:wght@300&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


   <!-- data table CDN required -->

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.0/datatables.min.css" />


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<!-- font awesome cdn  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- datatable pdf buttons -->
   
<link rel="preconnect" href=" https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
      <link rel="preconnect" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">


</head>

<body>


  <section id="title">
    <div class="container-fluid">

      <!-- Nav Bar -->

      <nav class="navbar navbar-expand-lg navbar-dark">
        <p class="navbar-brand " style="font-size: 50px;" id="demo1"><i class="fas fa-pen-nib"></i>DoubtPoint</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Download section</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">About us</a>
            </li>
            <li class="nav-item ps-2">
              <div class="nav-link">
                <button type="button" class="btn btn1" data-toggle="modal" data-target="#exampleModal" style="border: 2px solid #fff; color:white">Sign
                  In</button>

                <button type="button" class="btn btn1" data-target="#signup" data-toggle="modal" style="border: 2px solid #fff; color:white">Sign up</button>
              <?php
              if(isset($_SESSION['signin']))
              {
                if($_SESSION['signin'])
              echo '<a  class="btn btn-primary" href="logout.php" role="button">Logout</a>';
              }
              ?>
              </div>
            </li>

          </ul>
        </div>
      </nav>
      <!-- <a class="btn btn-primary" href="logout.php" role="button">Logout</a> -->
      <?php
      if(isset($_SESSION['signin']) && isset($_SESSION['temp1']))
      {
        if($_SESSION["temp1"]){
          if($_SESSION['signin']){
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="far fa-check-circle"></i>
              <strong>Success!</strong> You are Logged in.
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </div>';
          }
          else{
              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Opps!</strong> Sign in Unsuccesful.
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </div>';
          }  
      }
    }
      ?>


    <?php
     if( isset($_SESSION['insert']) && isset($_SESSION['temp'])){
     if($_SESSION['temp'] )
    {
      if($_SESSION['insert']){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Successfully signed up.</strong> 
      <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </div>';}
      else
      {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Unsuccessful.</strong><button type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span></div>'; 
      }
    }
  }
    ?>



      <!-- Modal of Sign Up -->

      <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="color:black">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="signup">Sign up
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </button>
            </div>
            <div class="modal-body">

              <form class="row g-3" action="conn.php" method="POST">
                <div class="col-md-6">
                  <label for="name" class="form-label">First Name</label>
                  <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
                </div>
                <div class="col-md-6">
                  <label for="name" class="form-label">Last Name</label>
                  <input type="name" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
                </div>
                <div class="col-12">
                  <label for="InputUsername" class="form-label">Username</label>
                  <input type="text" name="Username" class="form-control" id="inputUsername"
                    aria-describedby="usernameHelp" placeholder="username">
                  <p id="userEror" style="color:red;">***Username should be of character 3 to 10.</p>
                </div>
                <div class="col-12">
                  <label for="Number" class="form-label">Contact Number</label>
                  <input type="tel" name="contact" class="form-control" id="contact" placeholder="Contact Number">
                  <p id="contactEror" style="color:red;">***Invalid number</p>
                </div>
                
                  <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password">
                  </div>
                  <div class="col-md-6">
                    <label for="password" class="form-label">Repeat Password</label>
                    <input type="repeatpassword" name="repeatpassword" class="form-control" id="repeatpassword"
                      placeholder="Repeat Password">
                    <!-- <p id="passwordEror" style="color:red;">***Invalid number.</p> -->
                  </div>
                
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Remember me
                    </label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button id="signUPSubmit" type="submit" class="btn btn-primary" name="submit" value="submit"
                    style="background-color: #382d2e">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>



      <!-- Modal sign in -->
      <div class="container" style="color:black;">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="signin.php" method="POST">
                  <div class="mb-3">
                    <label for="InputUsername" class="form-label ">Username</label>
                    <input type="text" name="Username" class="form-control" id="InputUsername"
                      aria-describedby="usernameHelp">
                  </div>
                  <div class="mb-3">
                    <label for="InputPassword" class="form-label">Password</label>
                    <input type="password" name="Password" class="form-control" id="InputPassword">
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary"  style="background-color: #382d2e">

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



      <!-- Title -->

      <div class="row">
        <div class="col-lg-6 sec1">
          <h1>Get your doubts cleared at one place<br>by using our app.</h1>
          
        
        </div>
        </div>
        <div class="row ">
        <div class="col-lg-6 sec1 bt">
        <img class="homeHeader_appLinks_icon" src="//static-cf.toppr.com/marketing/343aafa/images/home/app-links/play-store.png" alt="Google Play">
         &nbsp&nbsp&nbsp&nbsp<img  src="//static-cf.toppr.com/marketing/343aafa/images/home/app-links/brand-apple.png" alt="App Store">
         
        
        </div>
        
        
        <div class="col-lg-6">
        <i class="fas fa-graduation-cap fa-10x icon iconx" style="color:white"></i>
        </div>
        </div>
        <div >
             <center>
             <br><br><br><br><h3><i class="fas fa-edit fa-2x icon" style="color:white"></i>Click below for scholarship registration form.</h3>
          <a href="student_form/form.php"><i class="fas fa-link"></i>Click here</a>
             </center>
        </div>
       </section>

  <!-- Features -->

  <section id="features">
    <div class="row">
      <div class=" feature-box col-lg-4">
        <i class="fas fa-check fa-4x icon"></i>
        <h3 ">Easy to use.</h3>
        <p>UI is very user friendly.</p>
      </div>


      <div class=" feature-box col-lg-4">
      <i class="fas fa-pencil-alt fa-4x icon"></i>
          <h3>Doubt cleareance guarantee</h3>
          <p>Send your questions and get solutions within few hours.</p>
      </div>

      <div class=" feature-box col-lg-4">
      <i class="fas fa-book fa-4x icon"></i>
        <h3>Study materials</h3>
        <p>For every exam like board,JEE,ADV,NEET,etc.</p>

      </div>
    </div>


  </section>


  <!-- Testimonials -->

  <section id="testimonials">

    <div id="testimonial-carousel" class="carousel slide" data-ride="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <h2>Complete learning app for schools and exams.</h2>
          <img class="testimonials-img" src="https://static-cf.toppr.com/marketing/343aafa/images/home/productLearnNew.png" alt="pic">
        
        </div>
        <div class="carousel-item">
          <h2 class="testimonial-text">Homework help app for instant answers.</h2>
          <img class="testimonials-img" src="https://static-cf.toppr.com/marketing/343aafa/images/home/productAnswr.png" alt="pic">
          
        </div>
      </div>
      <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>





  </section>


  <!-- Press -->

  <section id="press">
    <img  src="images/english.png" alt="tc-logo">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <img  src="images/logical.png" alt="tc-logo">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <img  src="images/chemistry.png" alt="tc-logo">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <img  src="images/physics.png" alt="tc-logo">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <img  src="images/maths.png" alt="tc-logo">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <img  src="images/history.png" alt="tc-logo">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <img  src="images/geography.png" alt="tc-logo">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <img  src="images/gk.png" alt="tc-logo">


  </section>


  <!-- Pricing -->

  <section id="pricing">

    <h2>Various courses available at our platform</h2>
    <p>Available at affordable price.</p>

    <div class="row">
      <div class="col-lg-4 col-md-6 pricing-column">


        <div class="card">
          <div class="card-header">
            <h3>JEE</h3>
          </div>
          <div class="card-body">
            <h2>Free demo classes</h2>
            <p>Last year papers</p>
            <p>Crash course available</p>
            <p>Batches ongoing</p>
            <button type="button" class="btn btn-lg btn-block btn-block btn-outline-dark">Explore</button>

          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 pricing-column">

        <div class="card">
          <div class="card-header">
            <h3>NEET</h3>
          </div>
          <div class="card-body">
            <h2>Free demo classes</h2>
            <p>Last year papers</p>
            <p>Crash course available</p>
            <p>Batches ongoing</p>
            <button type="button" class="btn btn-lg btn-block btn-block btn-outline-dark">Explore</button>
          </div>
        </div>
      </div>

      <div class="col-lg-4 pricing-column">
        <div class="card">
          <div class="card-header">
            <h3>UPSC</h3>
          </div>
          <div class="card-body">

            <h2>Free demo classes</h2>
            <p>Last year papers</p>
            <p>Crash course available</p>
            <p>Batches ongoing</p>
            <button type="button" class="btn btn-lg btn-block btn-block btn-outline-dark">Explore</button>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section>
  <h1 align="center" class="p-3"><i class="fas fa-book-open fa-1.25x icon"></i></i>List of applicants for scholarship exam</h1>
    <div class="container">
        <div style="overflow-x:auto;">

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Student_Id</th>
                        <th>Name</th>
                        <th>Father name</th>
                        <th>Mother name</th> 
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Category</th>
                        <th>Gender</th>
                        <th>Religion</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Class</th>
                        <th>Facilities</th>
                        <th>Changes</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                      include 'student_form/connection.php';
                      $selectquery=" select * from details,category_master,religion_master WHERE details.category_id=category_master.category_id 
                      AND details.religion_id=religion_master.religion_id";
                      $query =mysqli_query($conn,$selectquery);

                      $nums =mysqli_num_rows($query);

                      while($res = mysqli_fetch_array($query)){

                     ?>

                      <tr>
                         <td><?php echo $res['student_id']; ?></td>
                          <td><?php echo $res['name']; ?></td>
                          <td><?php echo $res['father_name']; ?></td>
                          <td><?php echo $res['mother_name']; ?></td>
                          <td><?php echo $res['email']; ?></td>
                          <td><?php echo $res['dob']; ?></td>
                          <td><?php echo $res['category_name']; ?></td>
                          <td><?php echo $res['gender']; ?></td>
                          <td><?php echo $res['religion']; ?></td>
                          <td><?php echo $res['number']; ?></td>
                          <td><?php echo $res['address']; ?></td>
                          <td><?php echo $res['class']; ?></td>

                          <td>
                            <?php
                                 $facility_name =  '';
                                 $sqli="SELECT facility_name FROM `student_facility` sf, facility_master fm 
                                 WHERE student_id=".$res['student_id']." and sf.facility_id=fm.facility_id";
                                 $resi=mysqli_query($conn,$sqli);
                                 while($sqli_arr=mysqli_fetch_assoc($resi)){
                                    $facility_name .=  $sqli_arr['facility_name'].', ';
                                 }
                                 echo $facility_name = rtrim($facility_name,", ");

                            ?>
                           </td>



                          <td><a href="student_form/form.php?id=<?php echo $res['student_id']; ?>">
                          <i class="fas fa-user-edit" style="font-size:30px; color:blue;"></i></td>
                       
                          <td><a class="del_btn" href="student_form/delete.php?id=<?php echo $res['student_id']; ?>">
                          <i class="fa fa-trash" style="font-size:30px; color:red;"></i></a></td>
 
                          
                      </tr>
                       <?php
                       }
                       ?>
                      
                </tbody>
            </table>
        </div> 
    </div>
    <center>
                       <a class="btn btn-outline-dark" href="student_form/table.php" role="button">Click here for more details</a>
                       </center>







    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

    <!-- data table jquery required  -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.0/datatables.min.js"></script>

    <!-- data table buttons script links -->

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>      
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>



    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "searching": true,
                "pageLength": 5,
                "paging": true,
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
              ]

            });
        });
    </script>

<script>

$('.del_btn').click(function(e){
 
var del=confirm('Are you sure you want to delete this item?');

if(del!=true){
    e.preventDefault();
}

});
</script>


  </section>


  <!-- Call to Action -->

  <section id="cta">

    <h4>Download the app to excel in academics.</h4>
    <br>
    <div class="bt1">
    <img class="homeHeader_appLinks_icon" src="//static-cf.toppr.com/marketing/343aafa/images/home/app-links/play-store.png" alt="Google Play">
         &nbsp&nbsp&nbsp&nbsp<img  src="//static-cf.toppr.com/marketing/343aafa/images/home/app-links/brand-apple.png" alt="App Store">
    </div>
  </section>


  <!-- Footer -->

  <footer id="footer">
  <br>
    <p class="demo1">© Copyright 2021 DoubtPoint</p>
 
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="validation.js" charset="utf-8"></script>
</body>

</html>