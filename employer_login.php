<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Employer Login Page</title>
  <!-- loader-->
  <link href="assets1/css/pace.min.css" rel="stylesheet"/>
  <script src="assets1/"></script>
  <!--favicon-->
  <link rel="icon" href="assets/img/favicon.jpg" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets1/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets1/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets1/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets1/css/app-style.css" rel="stylesheet"/>
  <link href="assets/css/style.css" rel="stylesheet">
  
</head>

<body id="hero1">
 

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
<!-- end loader -->

<!-- Start wrapper-->
<div style="padding-top: 90px; padding-left: 200px;"  id="wrapper">
 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img style="height: 100px; width: 100px;" src="assets1/images/logo-icon.jpg" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3"> </div>
		  <form name="form" action="employer/login.php" onsubmit="return isvalid()" method="post">
			  <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">Username</label>
			   <div class="position-relative has-icon-right">
				  <input name="user" type="text" id="user" class="form-control input-shadow" placeholder="Enter Username">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input name="pass" type="password" id="pass" class="form-control input-shadow" placeholder="Enter Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			       <button name="submit" type="submit" class="btn btn-light btn-block"><a href=""><b>LOGIN</b></a></button>
             <a href="employer/signin.php" class="btn btn-light btn-block" id="sign_btn" ><b>Sign in</b></a>
             <div class="form-row">
                <div class="form-group col-6">
                </div>
             </div>
			</form>
		  </div>
		  </div>
	     </div>
        <script>
         function isvalid() 
        {
          var user = document.form.user.value;
          var pass = document.form.pass.value;
          if(user.length == "" && pass.length =="")
          {
            alert("Username and Password Field is Empty!!!");
            return false
          }
          else
          {
            if(user.length == "")
            {
              alert("Username is Empty!!!");
              return false
            }
            if(pass.length == "")
            {
              alert("Password is Empty!!!");
              return false
            }
          }
        }
         </script>    

     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
</div>
<!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets1/js/jquery.min.js"></script>
  <script src="assets1/js/popper.min.js"></script>
  <script src="assets1/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="assets1/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets1/js/app-script.js"></script>
  
</body>
</html>
