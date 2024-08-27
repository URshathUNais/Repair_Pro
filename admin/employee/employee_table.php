<?php

//Databse Connection
include("../../connection.php");
$query = "SELECT * FROM employee JOIN employee_type on employee.Employee_Type_ID_FK = employee_type.Employee_Type_ID WHERE employee.Approved_Status = 'true' ORDER by Employee_ID";
$result = mysqli_query($conn,$query);

//Delete Query
if(isset($_GET['deleteid']))
{
    $Employee_ID  = $_GET['deleteid'];

    $sql = "DELETE FROM `employee` WHERE Employee_ID=$Employee_ID";
    mysqli_query($conn, $sql);
    echo"<script>alert('Delete Successfully');
    document.location.href = 'employee_table.php'</script>";
}

//Inesrt New Admin Query
if (isset($_POST["submit"]))
{
  $Employee_Type_ID_FK = $_POST["employee_type_id_fk"];
  $Employee_Name = $_POST["employee_name"];
  $Address = $_POST["address"];
  $DOB = $_POST["dob"];
  $NIC = $_POST["nic"];
  $Email = $_POST["email"];
  $Username = $_POST["username"];
  $Password= ($_POST['password']);
  if($_FILES["image"]["error"]===4)
  {
    echo
    "<script>alert('Image Does Not Exist');</script>";
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
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, '../../employeeImg/'. $newImageName);
      $query = "INSERT INTO employee VALUES('','$Employee_Type_ID_FK','$Employee_Name','$Address','$DOB','$NIC','$Email','$Username','$Password','false','$newImageName')";
      mysqli_query($conn, $query);
      echo"<script>alert('Insert successful... Waiting for admin approval');
      document.location.href = 'employee_table.php'</script>";
    }
  }
}

//Approved Query
if(isset($_POST['pendingButton']))
{
  $Employee_ID  = $_POST['approveid'];

  $sql = "Update `employee` set Approved_Status = 'false'  WHERE Employee_ID = $Employee_ID";
  mysqli_query($conn, $sql);
  echo"<script>alert('Employee Permission Removed.');
  document.location.href = 'employee_pending.php'</script>";
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
  <title>Employee Page</title>
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
        <h5 class="modal-title" id="exampleModalLabel">Employee Insert Form</h5>
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
            <label for="name">Name</label>
            <input type="text" name="employee_name" required value="" class="form-control form-control-rounded" id="employee_name" placeholder="Enter the Name">
           </div>
           <div class="form-group">
            <label for="name">Address</label>
            <input type="text" name="address" required value="" class="form-control form-control-rounded" id="address" placeholder="Enter the Address">
           </div>
           <div class="form-group">
            <label for="name">Date Of Birth</label>
            <input type="date" name="dob" required value="" class="form-control form-control-rounded" id="dob" placeholder="Enter the Date Of Birth">
           </div>
           <div class="form-group">
            <label for="nic number">NIC Number</label>
            <input type="text" name="nic" required value="" class="form-control form-control-rounded" id="nic" placeholder="Enter the NIC Number">
           </div>
           <div class="form-group">
            <label for="nic number">Email</label>
            <input type="text" name="email" required value="" class="form-control form-control-rounded" id="email" placeholder="Enter the Email">
           </div>
           <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" required value="" class="form-control form-control-rounded" id="username" placeholder="Enter the Username ">
           </div>
           <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required value="" class="form-control form-control-rounded" id="password" placeholder="Enter the Password">
           </div>
           <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" value="" accept=".jpg, .jpeg, .png" class="form-control form-control-rounded" id="image">
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
              <h5 class="card-title">Employee Details</h5>
			  <div class="table-responsive">
              <table class="table table-hover">

              <div>
                <a href="employee_pending.php">
                  <button id="modal_btn" type="button" class="btn btn-outline-danger">Pending Employees</button>
                </a>

                <button id="modal_btn" type="button" class="btn btn-outline-info " data-toggle="modal" data-target="#exampleModal">
                  Insert New Employee
                </button>
              </div>
              
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Employee Type</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date Of Birth</th>
                    <th scope="col">Nic Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Password</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
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
                    <td> <?php echo  $row['Employee_ID']; ?></td>
                    <td> <?php echo  $row['Employee_Type_Name']; ?></td>
                    <td> <?php echo  $row['Employee_Name']; ?></td>
                    <td> <?php echo  $row['Address']; ?></td>
                    <td> <?php echo  $row['Date_Of_Birth']; ?></td>
                    <td> <?php echo  $row['NIC_Number']; ?></td>
                    <td> <?php echo  $row['Email']; ?></td>
                    <td> <?php echo  $row['Username']; ?></td>
                    <td> <?php echo  $row['Password']; ?></td>
                    <td><img src="../../employeeImg/<?php echo  $row['Image']; ?>" width = 75 , height = 75 title="<?php echo $row['Image']; ?>"></td>
                    <td>
                        <form  action="employee_table.php" method="post" >
                            <input name="approveid" type="hidden" value=<?php echo $row['Employee_ID'];  ?> />
                            <button type="submit" name="pendingButton" class="btn btn-success">Approved</button>
                        </form>
                    </td>

                    <td><a href="employee_update.php?updateid=<?php echo  $row['Employee_ID']; ?>" class="btn btn-primary">Update</a></td>
                    <td><a href="employee_table.php?deleteid=<?php echo  $row['Employee_ID']; ?>" class="btn btn-danger">Delete</a></td>
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
