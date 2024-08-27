<?php

//Databse Connection
include("../connection.php");

$user = $_SESSION['user_id'];
$query = "select * from jobs join employee_type on employee_type.Employee_Type_ID = jobs.Employee_Type_ID_FK  where Employer_ID_FK = '$user' ORDER BY Job_ID";
$result = mysqli_query($conn,$query);

//Inesrt New Admin Query
if (isset($_POST["submit"]))
{
  $user = $_SESSION['user_id'];
  $Employee_Type_ID_FK = $_POST["employee_type_id_fk"];
  $Expected_Start_Date = $_POST["start_date"];
  $Expected_End_Date = $_POST["end_date"];
  $Discription = $_POST["discription"];
  
    $query = "INSERT INTO jobs VALUES('','$user','$Employee_Type_ID_FK','$Expected_Start_Date','$Expected_End_Date','$Discription')";
    mysqli_query($conn, $query);
    echo"<script>alert('Insert successful... Waiting for Employee Bit...');
    document.location.href = 'job_details.php'</script>";
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
  <title>Jobs Page</title>
  <!-- loader-->
  <link href="../assets1/css/pace.min.css" rel="stylesheet"/>
  <script src="../assets1/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../assets1/images/favicon.ico" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="../assets1/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="../assets1/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="../assets1/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../assets1/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="../assets1/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="../assets1/css/app-style.css" rel="stylesheet"/>
  
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
        <h5 class="modal-title" id="exampleModalLabel">Jobs Insert Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group">
              <label for="employee_type_id_fk">Employee Type ID</label>
              <select class="form-control form-control-rounded" name="employee_type_id_fk" id="employee_type_id_fk">
                <option value=""></option>
                <?php
                  $conn = mysqli_connect($s_name, $u_name, $p_word, $d_name);
                  $query = mysqli_query($conn , "select * from employee_type");
                  while ($row=mysqli_fetch_array($query)) { 
                    ?>
                    <option value=<?php echo $row['Employee_Type_ID'];?>><?php echo $row['Employee_Type_Name'];?></option>
                    <?php 
                    } 
                    ?>
              </select>
           </div>
           <div class="form-group">
            <label for="start_date">Expected Start Date</label>
            <input type="date" name="start_date" required value="" class="form-control form-control-rounded" id="start_date" placeholder="Select the Date">
           </div>
           <div class="form-group">
            <label for="end_date">Expected End Date</label>
            <input type="date" name="end_date" required value="" class="form-control form-control-rounded" id="end_date" placeholder="Select the Date">
           </div>
           <div class="form-group">
            <label for="discription">Description</label>
            <input type="text" name="discription" required value="" class="form-control form-control-rounded" id="discription" placeholder="Enter the Description">
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
              <h5 class="card-title">Jobs Details</h5>
			  <div class="table-responsive">
              <table class="table table-hover">

              <div>
                <button id="modal_btn" type="button" class="btn btn-outline-info " data-toggle="modal" data-target="#exampleModal">
                  Insert New Jobs
                </button>
              </div>
              
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Employee Type</th>
                    <th scope="col">Expexted Start Date</th>
                    <th scope="col">Expexted End Date</th>
                    <th scope="col">Description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                    <td> <?php echo  $row['Job_ID']; ?></td>
                    <td> <?php echo $row['Employee_Type_Name']; ?></td>
                    <td> <?php echo  $row['Expected_Start_Date']; ?></td>
                    <td> <?php echo  $row['Expected_End_Date']; ?></td>
                    <td> <?php echo  $row['Discription']; ?></td>
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
  <script src="../assets1/js/jquery.min.js"></script>
  <script src="../assets1/js/popper.min.js"></script>
  <script src="../assets1/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="../assets1/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../assets1/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../assets1/js/app-script.js"></script>
	
</body>
</html>
