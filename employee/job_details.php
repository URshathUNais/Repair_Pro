<?php

//Databse Connection
include("../connection.php");
$user_type = $_SESSION['user_type'];
$query = "SELECT * FROM jobs JOIN employers ON jobs.Employer_ID_FK = employers.Employer_ID JOIN employee_type ON jobs.Employee_Type_ID_FK = employee_type.Employee_Type_ID JOIN employers_mobile_number ON employers_mobile_number.Employer_ID_FK = employers.Employer_ID where Employee_Type_ID_FK = '$user_type'";
$result = mysqli_query($conn,$query);

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
  <link rel="icon" href="../assets1/images/favicon.jpg" type="image/x-icon">
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
              
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Employer</th>
                    <th scope="col">Employer Mobile Number</th>
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
                    <td> <?php echo  $row['Employer_Name']; ?></td>
                    <td> <?php echo  $row['Mobile_Number']; ?></td>
                    <td> <?php echo  $row['Employee_Type_Name']; ?></td>
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
