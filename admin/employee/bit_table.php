<?php

//Databse Connection
include("../../connection.php");
$query = "SELECT * FROM bit JOIN employee on employee.Employee_ID = bit.Employee_ID_FK JOIN jobs on jobs.Job_ID = bit.Job_ID_FK JOIN employers on jobs.Employer_ID_FK = employers.Employer_ID;";
$result = mysqli_query($conn,$query);

//Delete Query
if(isset($_GET['deleteid']))
{
    $Bit_ID  = $_GET['deleteid'];

    $sql = "DELETE FROM `bit` WHERE Bit_ID = $Bit_ID";
    mysqli_query($conn, $sql);
    echo"<script>alert('Delete Successfully');
    document.location.href = 'bit_table.php'</script>";
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
  <title>Bit Page</title>
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
        <h5 class="modal-title" id="exampleModalLabel">....</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          
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
              <h5 class="card-title">Bit Details</h5>
			  <div class="table-responsive">
              <table class="table table-hover">

              <div>
                
              </div>
              
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Job Id</th>
                    <th scope="col">Employer</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Employee Expect Amount</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Description</th>
                    <th scope="col">Employer Selection</th>
                    <th scope="col">Employer Rating</th>
                    <th scope="col">Employer Command</th>
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
                    <td> <?php echo  $row['Bit_ID']; ?></td>
                    <td> <?php echo  $row['Job_ID_FK']; ?></td>
                    <td> <?php echo  $row['Employer_Name']; ?></td>
                    <td> <?php echo  $row['Employee_Name']; ?></td>
                    <td> <?php echo  $row['Employee_Expected_Amount']; ?></td>
                    <td> <?php echo  $row['Duration']; ?></td>
                    <td> <?php echo  $row['Discription']; ?></td>
                    <td> <?php echo  $row['Employer_Selection']; ?></td>
                    <td> <?php echo  $row['Employer_Rating']; ?></td>
                    <td> <?php echo  $row['Employer_Command']; ?></td>
                    <td><a href="bit_update.php?updateid=<?php echo  $row['Bit_ID']; ?>" class="btn btn-primary">Update</a></td>
                    <td><a href="bit_table.php?deleteid=<?php echo  $row['Bit_ID']; ?>" class="btn btn-danger">Delete</a></td>
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
