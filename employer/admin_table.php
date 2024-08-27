<?php

//Databse Connection
include("../connection.php");
$query = "SELECT * FROM admin JOIN admin_mobile_number ON admin_mobile_number.Admin_ID_FK = admin.Admin_ID";
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
  <title>Admin Page</title>
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
        <h5 class="modal-title" id="exampleModalLabel">Admin Insert Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
           
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
              <h5 class="card-title">Admin Details</h5>
			  <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Nic Number</th>
                    <th scope="col">Image</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                    <td> <?php echo  $row['Admin_ID']; ?></td>
                    <td> <?php echo  $row['Name']; ?></td>
                    <td> <?php echo  $row['Mobile_Number']; ?></td>
                    <td> <?php echo  $row['NIC_Number']; ?></td>
                    <td><img src="../adminImg/<?php echo  $row['Image']; ?>" width = 75 , height = 75 title="<?php echo $row['Image']; ?>"></td>
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
