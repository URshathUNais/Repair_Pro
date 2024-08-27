<?php
include ("../connection.php");

if(isset($_POST['submit']))
{
  $rate = $_POST['rate'];
  $command = $_POST['command'];

$Bit_ID ="";
if(isset($_GET['BitID']))
{
  $Bit_ID = $_GET['BitID']; 
}

  $query = "UPDATE `bit` SET `Employer_Rating`='$rate',`Employer_Command`='$command' WHERE Bit_ID = '$Bit_ID'";

        $res = $conn->query($query);
        if($res)
        { 
            header("location: complete_work.php");
        }
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
  <title>Payment Successful Page</title>
  <!-- loader-->
  <link href="../assets1/css/pace.min.css" rel="stylesheet"/>
  <script src="../assets1/"></script>
  <!--favicon-->
  <link rel="icon" href="../assets/img/favicon.jpg" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="../assets1/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="../assets1/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../assets1/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="../assets1/css/app-style.css" rel="stylesheet"/>
  <link href="../assets/css/style.css" rel="stylesheet">
  
</head>

<body id="pay_success">
 

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
<!-- end loader -->
<div style="padding-top: center; padding-left: center;"  id="wrapper">
 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div>
		<img src="../assets/img/payment_success.jpg" style="height: 350px; width: 350px; margin-left: 590px; margin-top:50px;" alt="">
		<h2 style="text-align: justify; padding-left: 465px; padding-top: 40px; color:Black;"><b>Your Payment Was Successfull !</b></h2>
    <button style="text-align: justify; margin-left: 610px; margin-top: 30px;" id="modal_btn" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
      Rating for the Work ! Please Click me
    </button>
	</div>
<!-- Start wrapper-->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div id="modal_background" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Work Rating and Command</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nic number">Select the Rating Value</label>
            <br/>
              <select name="rate" id="rate" style="border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important; border-radius: 30px !important; display: block; width: 100%; height: calc(1.5em + .75rem + 2px); padding: .375rem .75rem; font-size: 1rem;">
                <option>Please Choose the Work and Employee Rating</option>
                <div style="color: white;">
                  <option value="One">1 Star</option>
                  <option value="Two">2 Star</option>
                  <option value="Three">3 Star</option>
                  <option value="Four">4 Star</option>
                  <option value="Five">5 Star</option>
                </div>
              </select>
           </div>
           <div class="form-group">
            <label for="command number">Commands</label>
            <input type="command" name="command" required value="" class="form-control form-control-rounded" id="command" placeholder="Enter the Commands">
           </div>
           <br>
           <div class="modal-footer" class="form-group">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Insert</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
</div>
<!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="../assets1/js/jquery.min.js"></script>
  <script src="../assets1/js/popper.min.js"></script>
  <script src="../assets1/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="../assets1/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../assets1/js/app-script.js"></script>
  
</body>
</html>
