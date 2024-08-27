<?php
include("../connection.php");

$result = mysqli_query($conn,"SELECT * FROM jobs JOIN bit on jobs.Job_ID = bit.Job_ID_FK JOIN employee on employee.Employee_ID = bit.Employee_ID_FK JOIN employee_mobile_number ON employee_mobile_number.Employee_ID_FK = employee.Employee_ID WHERE Job_ID='".$_GET['acceptbit']."' && bit.Employer_Selection = 'Selected'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Accepted Bit Details</title>
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
  
<!--End topbar header-->
<div class="clearfix"></div>
	
  <div id="reg1" class="content-wrapper">
    <div class="container-fluid">

    <div class="row mt-3">
      <div class="col-lg-12">
        <div id="reg" class="card">
           <div class="card-body">
           <div class="card-title">Accept Bit Details</div>
           <hr>
          <form class="" action="view_bit.php" method="post" autocomplete="off" enctype="multipart/form-data">

          <div><?php if(isset($message)) {echo $message;} ?></div>
          <input type="hidden" name="id" value=<?php  echo $_GET['acceptbit']; ?>  >
           <div class="form-group">
            <label for="">Bit ID </label> 
            <input type="text" name="" value="<?php echo $row['Bit_ID']; ?>" class="form-control form-control-rounded" id="">
           </div>
           <div class="form-group">
            <label for="">Job ID </label> 
            <input type="text" name="" value="<?php echo $row['Job_ID']; ?>" class="form-control form-control-rounded" id="">
           </div>
           <div class="form-group">
            <label for="">Employee</label> 
            <input type="text" name="" value="<?php echo $row['Employee_Name']; ?>" class="form-control form-control-rounded" id="">
           </div>
           <div class="form-group">
            <label for="">Employee Mobile Number</label> 
            <input type="text" name="" value="<?php echo $row['Mobile_Number']; ?>" class="form-control form-control-rounded" id="">
           </div>
           <div class="form-group">
            <label for="">Expected Amount</label>
            <input type="text" name="" value="<?php echo $row['Employee_Expected_Amount']; ?>" class="form-control form-control-rounded" id="">
           </div> 
           <div class="form-group">
            <label for="">Duration</label>
            <input type="text" name="" value="<?php echo $row['Duration']; ?>" class="form-control form-control-rounded" id="">
           </div>
           <div class="form-group">
            <label for="nic ">Description</label>
            <input type="text" name="" value="<?php echo $row['Discription']; ?>" class="form-control form-control-rounded" id="">
           </div>
           <br>
           <div class="modal-footer" class="form-group">
            <a href="job_table.php" class="btn btn-outline-danger">Close</a>
          </div>
          </form>
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