<?php
include("../connection.php");

if(isset($_POST['submit']))
{
  $Bit_ID = $_POST["bit_id"];
  $Amount = $_POST['amount'];
  $Date = $_POST["date"];

  $sql = "INSERT INTO payment(Bit_ID_FK,Payment_Amount,Payment_Date) VALUES('$Bit_ID','$Amount','$Date')";
  mysqli_query($conn, $sql);
  echo"<script>document.location.href = 'payment_success.php?BitID=$Bit_ID'</script>";
}

$result = mysqli_query($conn,"SELECT * FROM bit WHERE Bit_ID ='".$_GET['payid']."'");
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
  <title>Payment Page</title>
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

<body id="hero_pay">
 

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
<!-- end loader -->

<!-- Start wrapper-->
<div style="padding-top: center; padding-left: center;"  id="wrapper">
 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2" style="height: 600px; width: 350px;">
		 	<div class="text-center">
		 		<h4 style="text-align: justify; padding-left: 60px;"><b>Payment Details</b></h4>
		 	</div>
		  <div class="card-title text-uppercase text-center py-2"> </div>
		  
        <form class="row g-3" action="payment.php" method="post">
          <div><?php if(isset($message)) {echo $message;} ?></div>
          <input type="hidden" name="id" value=<?php  echo $_GET['payid']; ?>>

          <div class="col-md-12">
            <label for="validationDefault01" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="validationDefault01" value="" required placeholder="1234 - 1234 - 1234 - 1234">
          </div>
          <img src="../assets/img/bank_card.png" style="width: 100px; height: 20px; margin-left: 250px;" alt="">
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label">Expiry</label>
            <input type="text" class="form-control" id="validationDefault02" value="" required placeholder="MM / YY">
          </div>
          <div class="col-md-6">
            <label for="validationDefaultUsername" class="form-label">CVC</label>
            <div class="input-group">
              <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required placeholder="CVC">
            </div>
          </div>
          <div class="col-md-12">
            <label style = "padding-top: 20px;" for="validationDefault03" class="form-label">Bit ID</label>
            <input type="text" class="form-control" id="bit_id" value="<?php echo $row['Bit_ID']; ?>" name="bit_id" required placeholder="00000">
          </div>
          <div class="col-md-12">
            <label style = "padding-top: 20px;" for="validationDefault03" class="form-label">Amount</label>
            <input type="text" class="form-control" id="amount" value="<?php echo $row['Employee_Expected_Amount']; ?>" name="amount" required placeholder="00000">
          </div>
          <div class="col-md-12">
            <label style = "padding-top: 20px;" for="validationDefault05" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
          </div>
          <div class="col-12">
            <div class="form-check" style = "padding-top: 20px;">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
              <label class="form-check-label" for="invalidCheck2">
                Agree to terms and conditions
              </label>
            </div>
          </div>
          <div class="col-12" style = "padding-top: 20px;">
            <button class="btn btn-outline-primary , col-12" type="submit" name="submit" value="submit"><b>Pay Now</b></button>
          </div>
        </form>

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
