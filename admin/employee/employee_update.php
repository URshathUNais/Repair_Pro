<?php
include("../../connection.php");

if(isset($_POST['submit']))
{
  $Employee_Type_ID_FK = $_POST["employee_type_id_fk"];  
  $Employee_Name = $_POST["employee_name"];
  $Address = $_POST["address"];
  $DOB = $_POST["dob"];
  $NIC = $_POST["nic"];
  $Email = $_POST["email"];
  $Username = $_POST["username"];
  $Password = ($_POST['password']);
  $old_image_name = $_POST['old_image'];
  $update_image = "";
  
  if($_FILES["image"]["error"]>0)
  {
    $update_image = $old_image_name;
   
  }
  else
  {
    $fileName = $_FILES["image"]["name"];
    $filesize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode ('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if(!in_array($imageExtension, $validImageExtension))
    {
      echo
      "<script>alert('Invalid Image Extension');</script>";
    }
    else if($filesize > 1000000)
    {
      echo
      "<script>alert('Image Size Is Too Large');</script>";
    }
    else
    {
      $update_image = uniqid();
      $update_image .= '.' . $imageExtension;
      
      move_uploaded_file($tmpName, '../../employeeImg/'. $update_image);

    }
  }
  mysqli_query($conn, "UPDATE employee set Employee_Type_ID_FK ='".$_POST['employee_type_id_fk']."', Employee_Name='".$_POST['employee_name']."', Address='".$_POST['address']."', Date_Of_Birth='".$_POST['dob']."', NIC_Number='".$_POST['nic']."' , Email='".$_POST['email']."' , Username='".$_POST['username']."', Password='".$_POST['password']."', Image='".$update_image."' WHERE Employee_ID = '".$_POST['id']."'");
  echo"<script>alert('Update Successfully');
  document.location.href = 'employee_table.php'</script>";
}

$result = mysqli_query($conn,"SELECT * FROM employee WHERE Employee_ID='".$_GET['updateid']."'");
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
  <title>Employee Update Page</title>
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
           <div class="card-title">Employee Update Form</div>
           <hr>
          <form class="" action="employee_update.php" method="post" autocomplete="off" enctype="multipart/form-data">

          <div><?php if(isset($message)) {echo $message;} ?></div>
          <input type="text" value="<?php echo $row['Image']; ?>" name="old_image" hidden>

          <input type="hidden" name="id" value=<?php  echo $_GET['updateid']; ?>>
          <div class="form-group">
            <label for="employee_type_id_fk">Employee Type ID</label> 
            <input type="text" name="employee_type_id_fk" value="<?php echo $row['Employee_Type_ID_FK']; ?>" class="form-control form-control-rounded" id="employee_type_id_fk">
           </div>
           <div class="form-group">
            <label for="employee_name">Name</label> 
            <input type="text" name="employee_name" value="<?php echo $row['Employee_Name']; ?>" class="form-control form-control-rounded" id="employee_name">
           </div>
           <div class="form-group">
            <label for="address">Address</label> 
            <input type="text" name="address" value="<?php echo $row['Address']; ?>" class="form-control form-control-rounded" id="address">
           </div>
           <div class="form-group">
            <label for="dob">Date Of Birth</label> 
            <input type="text" name="dob" value="<?php echo $row['Date_Of_Birth']; ?>" class="form-control form-control-rounded" id="dob">
           </div>
           <div class="form-group">
            <label for="nic number">NIC Number</label>
            <input type="text" name="nic" value="<?php echo $row['NIC_Number']; ?>" class="form-control form-control-rounded" id="nic">
           </div>
           <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $row['Email']; ?>" class="form-control form-control-rounded" id="email">
           </div>
           <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $row['Username']; ?>" class="form-control form-control-rounded" id="username">
           </div>
           
           <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="<?php echo $row['Password']; ?>" class="form-control form-control-rounded" id="password">
           </div>
           <div class="form-group">
            <label for="image">Old Image</label>
            <img src=<?php echo "../../employeeImg/".$row['Image']; ?> style ="height:60px;width:80px;">
           </div>
           <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image"  accept=".jpg, .jpeg, .png" class="form-control form-control-rounded" id="image">
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