<?php

//Databse Connection
include("../../connection.php");
$query = "SELECT * FROM experience JOIN employee on experience.Employee_ID_FK = employee.Employee_ID;";
$result = mysqli_query($conn,$query);

//Delete Query
if(isset($_GET['deleteid']))
{
    $Experience_Id = $_GET['deleteid'];

    $sql = "DELETE FROM `experience` WHERE Experience_ID  = $Experience_Id";
    mysqli_query($conn, $sql);
    echo"<script>alert('Delete Successfully');
    document.location.href = 'experience_table.php'</script>";
}

//Inesrt New Admin Query
if (isset($_POST["submit"]))
{
  $Employee_ID_FK = $_POST["employee_id_fk"];
  $Company_Employer = $_POST["company_employer"];
  $Join_Date = $_POST["join_date"];
  $Leave_Date = $_POST["leave_date"];
  $Experience_Duration= ($_POST['experience_duration']);
  
    $query = "INSERT INTO experience VALUES('','$Employee_ID_FK','$Company_Employer', '$Join_Date', '$Leave_Date', '$Experience_Duration')";
    mysqli_query($conn, $query);
    echo"<script>alert('Insert Successfully');
    document.location.href = 'experience_table.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Experience Page</title>
  <!-- loader-->
  <link href="../../assets1/css/pace.min.css" rel="stylesheet"/>
  <script src="../../assets1/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../../assets1/images/favicon.jpg" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="../../assets1/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="../../assets1/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="../../assets1/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../../assets1/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="../../assets1/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="../../assets1/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme2">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

<!--Start sidebar-wrapper-->
  <?php include"sidebar.php";?>
<!--End sidebar-wrapper-->

<!--Start topbar header-->
  <?php include"header.php";?>
<!--End topbar header-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div id="modal_background" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employee Experience Insert Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group">
                <label for="employee_id_fk">Employee ID</label>
                <select class="form-control form-control-rounded" name="employee_id_fk" id="employee_id_fk">
                    <option value=""></option>
                    <?php
                    $conn = mysqli_connect($s_name, $u_name, $p_word, $d_name);
                    $query = mysqli_query($conn , "select * from employee");
                    while ($row=mysqli_fetch_array($query)) { 
                    ?>
                    <option value=<?php echo $row['Employee_ID'];?>><?php echo $row['Employee_Name'];?></option>
                    <?php 
                    } 
                    ?>
               </select>
           </div>
           <div class="form-group">
            <label for="company_employer">Company</label>
            <input type="text" name="company_employer" required value="" class="form-control form-control-rounded" id="company_employer" placeholder="Enter the Company Name">
           </div>
           <div class="form-group">
            <label for="join_date">Join Date</label>
            <input type="date" name="join_date" required value="" class="form-control form-control-rounded" id="join_date" placeholder="Select the Join Date">
           </div>
           <div class="form-group">
            <label for="leave_date">Leave Date</label>
            <input type="date" name="leave_date" required value="" class="form-control form-control-rounded" id="leave_date" placeholder="Select the Join Date">
           </div>
           <div class="form-group">
            <label for="experience_duration">Duration</label>
            <input type="text" name="experience_duration" required value="" class="form-control form-control-rounded" id="experience_duration" placeholder="Enter the Experience Duration">
           </div>
           <br>
           <div class="modal-footer" class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Insert</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">  
      </div>
        <div class="col-lg-12">
          <div id="form_ta" class="card">
            <div class="card-body">
              <h5 class="card-title">Employee Experience Details</h5>
			  <div class="table-responsive">
              <table class="table table-hover">
              <button id="modal_btn" type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                Insert Employee Experience
              </button>
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Join Date</th>
                    <th scope="col">Leave Date</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                    <td> <?php echo  $row['Experience_ID']; ?></td>
                    <td> <?php echo  $row['Employee_Name']; ?></td>
                    <td> <?php echo  $row['Company_Employer']; ?></td>
                    <td> <?php echo  $row['Join_Date']; ?></td>
                    <td> <?php echo  $row['Leave_Date']; ?></td>
                    <td> <?php echo  $row['Experience_Duration']; ?></td>
                    <td><a href="experience_update.php?updateid=<?php echo  $row['Experience_ID']; ?>" class="btn btn-primary">Update</a></td>
                    <td><a href="experience_table.php?deleteid=<?php echo  $row['Experience_ID']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                  
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
	  
	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	
	<!--End footer-->
	
  </div><!--End wrapper-->


  <!-- Bootstrap core JavaScript-->
  <script src="../../assets1/js/jquery.min.js"></script>
  <script src="../../assets1/js/popper.min.js"></script>
  <script src="../../assets1/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="../../assets1/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../../assets1/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../../assets1/js/app-script.js"></script>
	
</body>
</html>
