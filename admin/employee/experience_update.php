<?php
include("../../connection.php");

if(isset($_POST['submit']))
{
    $Employee_ID_FK = $_POST["employee_id_fk"];
    $Company_Employer = $_POST["company_employer"];
    $Join_Date = $_POST["join_date"];
    $Leave_Date = $_POST["leave_date"];
    $Experience_Duration= ($_POST['experience_duration']);

    mysqli_query($conn, "UPDATE experience set Employee_ID_FK ='".$_POST['employee_id_fk']."', Company_Employer='".$_POST['company_employer']."', Join_Date='".$_POST['join_date']."', Leave_Date='".$_POST['leave_date']."', Experience_Duration='".$_POST['experience_duration']."' WHERE Experience_ID = '".$_POST['id']."'");
    echo"<script>alert('Update Successfully');
    document.location.href = 'experience_table.php'</script>";
}

$result = mysqli_query($conn,"SELECT * FROM experience WHERE Experience_ID ='".$_GET['updateid']."'");
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
  <title>Experience Update Page</title>
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
  
<!--End topbar header-->
<div class="clearfix"></div>
	
  <div id="reg1" class="content-wrapper">
    <div class="container-fluid">

    <div class="row mt-3">
      <div class="col-lg-12">
        <div id="reg" class="card">
           <div class="card-body">
           <div class="card-title">Experience Update Form</div>
           <hr>
          <form class="" action="experience_update.php" method="post" autocomplete="off" enctype="multipart/form-data">

          <div><?php if(isset($message)) {echo $message;} ?></div>
          <input type="hidden" name="id" value=<?php  echo $_GET['updateid']; ?>>
          <div class="form-group">
            <label for="employee_id_fk">Employee Id</label> 
            <input type="text" name="employee_id_fk" value="<?php echo $row['Employee_ID_FK']; ?>" class="form-control form-control-rounded" id="employee_id_fk">
           </div>
           <div class="form-group">
            <label for="company_employer">Company Name</label> 
            <input type="text" name="company_employer" value="<?php echo $row['Company_Employer']; ?>" class="form-control form-control-rounded" id="company_employer">
           </div>
           <div class="form-group">
            <label for="join_date">Join Date</label>
            <input type="date" name="join_date" value="<?php echo $row['Join_Date']; ?>" class="form-control form-control-rounded" id="join_date">
           </div>
           <div class="form-group">
            <label for="leave_date">Leave Date</label>
            <input type="date" name="leave_date" value="<?php echo $row['Leave_Date']; ?>" class="form-control form-control-rounded" id="leave_date">
           </div>
           <div class="form-group">
            <label for="experience_duration">Duration</label>
            <input type="text" name="experience_duration" value="<?php echo $row['Experience_Duration']; ?>" class="form-control form-control-rounded" id="experience_duration">
           </div>
           <br>
           <div class="form-group">
            <button type="submit" name="submit" value="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i> Update </button>
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