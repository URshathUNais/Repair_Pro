<?php
include("../connection.php");

if(isset($_POST['submit']))
{
  $Job_ID_FK = $_POST["job_id_fk"];
  $user = $_SESSION['user_id'];
  $Employee_Expected_Amount = $_POST["expected_amount"];
  $Duration= ($_POST['duration']);
  $Discription= ($_POST['description']);

  $sql = "INSERT INTO bit(Job_ID_FK,Employee_ID_FK,Employee_Expected_Amount,Duration,Discription,Employer_Selection,Employer_Rating,Employer_Command) VALUES('$Job_ID_FK','$user','$Employee_Expected_Amount','$Duration','$Discription','Waiting for Employer Selection','Waiting for Employer Rating','Waiting for Employer Command')";
  mysqli_query($conn, $sql);
  echo"<script>alert('Bit added Successfully');
  document.location.href = 'job_table.php'</script>";
}

$result = mysqli_query($conn,"SELECT * FROM jobs WHERE Job_ID ='".$_GET['bitid']."'");
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
  <title>Add Bit Page</title>
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
           <div class="card-title">Bit added Form</div>
           <hr>
          <form class="" action="bit_table.php" method="post" autocomplete="off" enctype="multipart/form-data">

          <div><?php if(isset($message)) {echo $message;} ?></div>
          <input type="hidden" name="id" value=<?php  echo $_GET['bitid']; ?> >
           <div class="form-group">
            <label for="job_id_fk">Job ID</label> 
            <input type="text" name="job_id_fk" value="<?php echo $row['Job_ID']; ?>" class="form-control form-control-rounded" id="job_id_fk">
           </div>
           <div class="form-group">
            <label for="user_id">Employee ID</label>
            <input type="text" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" class="form-control form-control-rounded" id="user_id">
           </div>
           <div class="form-group">
            <label for="expected_amount">Expected Amount</label>
            <input type="text" name="expected_amount" required value="" class="form-control form-control-rounded" id="expected_amount" placeholder="Enter the Expected Amount">
           </div>
           <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" name="duration" required value="" class="form-control form-control-rounded" id="duration" placeholder="Enter the Duration">
           </div>
           <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" required value="" class="form-control form-control-rounded" id="description" placeholder="Enter the Description">
           </div>
           <br>
           <div class="form-group">
            <button type="submit" name="submit" value="submit" class="btn btn-light btn-round px-5 float-right"><i class="icon-lock"></i> ADD </button>
          </div>
          </form>
         </div>
         </div>
      </div>
    </div>

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