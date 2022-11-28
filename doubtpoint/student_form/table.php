<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>

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

<!-- datatable pdf buttons -->
   
<link rel="preconnect" href=" https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
      <link rel="preconnect" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">




</head>
<body>
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
                      include 'connection.php';
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



                          <td><a href="form.php?id=<?php echo $res['student_id']; ?>">
                          <i class="fas fa-user-edit" style="font-size:30px; color:blue;"></i></td>
                       
                          <td><a class="del_btn" href="delete.php?id=<?php echo $res['student_id']; ?>">
                          <i class="fa fa-trash" style="font-size:30px; color:red;"></i></a></td>
 
                          
                      </tr>
                       <?php
                       }
                       ?>
                </tbody>
            </table>
        </div> 
    </div>


    
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

</body>
</html>


