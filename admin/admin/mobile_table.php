<?php

//Databse Connection
include("../../connection.php");
$query = "SELECT * FROM `admin` JOIN admin_mobile_number ON admin.Admin_ID = admin_mobile_number.Admin_ID_FK;";
$result = mysqli_query($conn,$query);

//Delete Query
if(isset($_GET['deleteid']))
{
    $Admin_Mobile_Id = $_GET['deleteid'];

    $sql = "DELETE FROM `admin_mobile_number` WHERE Admin_Mobile_Number_ID =$Admin_Mobile_Id";
    mysqli_query($conn, $sql);
    echo"<script>alert('Delete Successfully');
    document.location.href = 'mobile_table.php'</script>";
}

//Inesrt New Admin Query
if (isset($_POST["submit"]))
{
  $Admin = $_POST["admin"];
  $Mobile = $_POST["mobile"];
  
    $query = "INSERT INTO admin_mobile_number VALUES ('','$Admin','$Mobile')";
    mysqli_query($conn, $query);
    echo"<script>alert('Insert Successfully');
    document.location.href = 'mobile_table.php'</script>";
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
  <title>Mobile Number Page</title>
  <!-- loader-->
  <link href="../../assets1/css/pace.min.css" rel="stylesheet"/>
  <script src="../../assets1/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../../assets1/images/favicon.ico" type="image/x-icon">
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
        <h5 class="modal-title" id="exampleModalLabel">Mobile Number Insert Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
           <div class="form-group">
            <label for="admin">Admin ID</label>
            <select class="form-control form-control-rounded" name="admin" id="admin">
                <option value=""></option>
                <?php
                  $conn = mysqli_connect($s_name, $u_name, $p_word, $d_name);
                  $query = mysqli_query($conn , "select * from admin");
                  while ($row=mysqli_fetch_array($query)) { 
                    ?>
                    <option value=<?php echo $row['Admin_ID'];?>><?php echo $row['Name'];?></option>
                    <?php 
                    } 
                    ?>
               </select>
           </div>
           <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <input type="text" name="mobile" required value="" class="form-control form-control-rounded" id="mobile" placeholder="Enter the Mobile Number">
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
              <h5 class="card-title">Admin Mobile Number Details</h5>
			  <div class="table-responsive">
              <table class="table table-hover">
              <button id="modal_btn" type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                Insert New Mobile Number
              </button>
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Mobile Number</th>
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
                    <td> <?php echo  $row['Admin_Mobile_Number_ID']; ?></td>
                    <td> <?php echo  $row['Name']; ?></td>
                    <td> <?php echo  $row['Mobile_Number']; ?></td>
                    <td><a href="mobile_update.php?updateid=<?php echo  $row['Admin_Mobile_Number_ID']; ?>" class="btn btn-primary">Update</a></td>
                    <td><a href="mobile_table.php?deleteid=<?php echo  $row['Admin_Mobile_Number_ID']; ?>" class="btn btn-danger">Delete</a></td>
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
